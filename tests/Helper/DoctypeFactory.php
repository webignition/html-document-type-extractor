<?php

namespace webignition\Tests\HtmlDocumentType\Helper;

class DoctypeFactory
{
    const IDENTIFIER_PUBLIC = 'PUBLIC';
    const IDENTIFIER_SYSTEM = 'SYSTEM';

    const KEY_FPI = 'fpi';
    const KEY_URI = 'uri';
    const KEY_SYSTEM_PUBLIC = 'system-public';
    const KEY_DOCTYPE_PREFIX = 'prefix';
    const KEY_ROOT_ELEMENT = 'root-element';

    const DOCTYPE_STRING_UPPERCASE = 'DOCTYPE';
    const DOCTYPE_STRING_LOWERCASE = 'doctype';
    const DOCTYPE_STRING_MIXEDCASE = 'DocTYpe';

    const ROOT_ELEMENT_DEFAULT = 'html';

    const INSERT_NEW_LINES = true;

    /**
     * @var array
     */
    private static $docTypePrefixes = [
        'upper case' => self::DOCTYPE_STRING_UPPERCASE,
        'lower case' => self::DOCTYPE_STRING_LOWERCASE,
        'mixed case' => self::DOCTYPE_STRING_MIXEDCASE,
    ];

    /**
     * @param string $fpi
     * @param string $uri
     * @param string $rootElement
     * @param string $systemPublic
     * @param string $doctypePrefix
     * @param bool $insertNewLines
     *
     * @return string
     */
    public static function create(
        $fpi,
        $uri,
        $rootElement = self::ROOT_ELEMENT_DEFAULT,
        $systemPublic = self::IDENTIFIER_PUBLIC,
        $doctypePrefix = self::DOCTYPE_STRING_UPPERCASE,
        $insertNewLines = false
    ) {
        $identifierFpiUri = $systemPublic;

        if ($insertNewLines) {
            $identifierFpiUri .= "\n";
        }

        if (!is_null($fpi)) {
            $identifierFpiUri .= ' ' . $fpi;

            if ($insertNewLines) {
                $identifierFpiUri .= "\n";
            }
        }

        if (!is_null($uri)) {
            $identifierFpiUri .= ' ' . $uri;

            if ($insertNewLines) {
                $identifierFpiUri .= "\n";
            }
        }

        $docType = '<!' . $doctypePrefix;
        $docType .= ' ' . $rootElement;

        if ($insertNewLines) {
            $docType .= "\n";
        }

        if (!empty($identifierFpiUri)) {
            $docType .= ' ' . $identifierFpiUri;
        }

        $docType .= '>';

        return $docType;
    }

    /**
     * @param array $doctypeValues
     * @param bool $insertNewLines
     *
     * @return string
     */
    public static function createFromValues(array $doctypeValues, $insertNewLines = false)
    {
        $fpi = array_key_exists(self::KEY_FPI, $doctypeValues)
            ? $doctypeValues[self::KEY_FPI]
            : null;

        $uri = array_key_exists(self::KEY_URI, $doctypeValues)
            ? $doctypeValues[self::KEY_URI]
            : null;

        $rootElement = array_key_exists(self::KEY_ROOT_ELEMENT, $doctypeValues)
            ? $doctypeValues[self::KEY_ROOT_ELEMENT]
            : self::ROOT_ELEMENT_DEFAULT;

        $systemPublic = array_key_exists(self::KEY_SYSTEM_PUBLIC, $doctypeValues)
            ? $doctypeValues[self::KEY_SYSTEM_PUBLIC]
            : self::IDENTIFIER_PUBLIC;

        $docTypePrefix = array_key_exists(self::KEY_DOCTYPE_PREFIX, $doctypeValues)
            ? $doctypeValues[self::KEY_DOCTYPE_PREFIX]
            : self::DOCTYPE_STRING_UPPERCASE;

        return self::create($fpi, $uri, $rootElement, $systemPublic, $docTypePrefix, $insertNewLines);
    }

    /**
     * @param array $sourceDocTypeValues
     * @param string $key
     *
     * @return array
     */
    public static function createSetFromValues(array $sourceDocTypeValues, $key = '')
    {
        $rootElementValues = [];
        $fpiValues = [];
        $docTypeSetValues = [];

        $sourceRootElement = array_key_exists(self::KEY_ROOT_ELEMENT, $sourceDocTypeValues)
            ? $sourceDocTypeValues[self::KEY_ROOT_ELEMENT]
            : self::ROOT_ELEMENT_DEFAULT;

        $rootElementValues['upper case'] = strtoupper($sourceRootElement);
        $rootElementValues['lower case'] = strtolower($sourceRootElement);
        $rootElementValues['mixed case'] = ucfirst($sourceRootElement);

        $sourceFpi = array_key_exists(self::KEY_FPI, $sourceDocTypeValues)
            ? $sourceDocTypeValues[self::KEY_FPI]
            : null;

        if (!is_null($sourceFpi)) {
            $fpiValues['regular case'] = $sourceDocTypeValues[self::KEY_FPI];
            $fpiValues['upper case'] = strtoupper($sourceDocTypeValues[self::KEY_FPI]);
            $fpiValues['lower case'] = strtolower($sourceDocTypeValues[self::KEY_FPI]);
        } else {
            $fpiValues['none'] = null;
        }

        foreach (self::$docTypePrefixes as $prefixKey => $docTypePrefix) {
            foreach ($rootElementValues as $rootElementKey => $rootElementValue) {
                foreach ($fpiValues as $fpiKey => $fpiValue) {
                    $prefixKeyPart = 'prefix: ' . $prefixKey . ', ';
                    $rootElementKeyPart = 'root element: ' . $rootElementKey . ', ';
                    $fpiKeyPart = 'fpi: ' . $fpiKey . ', ';

                    $docTypeSetValues[$prefixKeyPart . $rootElementKeyPart . $fpiKeyPart . $key] = array_merge(
                        $sourceDocTypeValues,
                        [
                            self::KEY_DOCTYPE_PREFIX => $docTypePrefix,
                            self::KEY_ROOT_ELEMENT => $rootElementValue,
                            self::KEY_FPI => $fpiValue,
                        ]
                    );
                }
            }
        }

        $docTypeSet = [];
        foreach ($docTypeSetValues as $key => $docTypeValues) {
            $docTypeSet[$key] = self::createFromValues($docTypeValues);
            $docTypeSet[$key . ', line breaks: true'] = self::createFromValues($docTypeValues, self::INSERT_NEW_LINES);
        }

        return $docTypeSet;
    }
}
