<?php

namespace webignition\Tests\HtmlDocumentType\Helper;

class DoctypeList
{
    const FPI_VALUE = 'Fpi Value';
    const URI_VALUE = 'url value';

    /**
     * @return array
     */
    public static function create()
    {
        $docTypeValuesCollection = [
            'fpi only: double quoted' => [
                DoctypeFactory::KEY_FPI => '"' . self::FPI_VALUE . '"',
            ],
            'fpi only: single quoted' => [
                DoctypeFactory::KEY_FPI => "'" . self::FPI_VALUE . "'",
            ],
            'fpi only: double-quoted-empty' => [
                DoctypeFactory::KEY_FPI => '""',
            ],
            'fpi only: single-quoted-empty' => [
                DoctypeFactory::KEY_FPI => "''",
            ],
            'fpi and url: both double quoted' => [
                DoctypeFactory::KEY_FPI => '"' . self::FPI_VALUE . '"',
                DoctypeFactory::KEY_URI => '"' . self::URI_VALUE . '"',
            ],
            'fpi and url: both double quoted, empty fpi' => [
                DoctypeFactory::KEY_FPI => '""',
                DoctypeFactory::KEY_URI => '"' . self::URI_VALUE . '"',
            ],
            'fpi and url: both double quoted; empty uri' => [
                DoctypeFactory::KEY_FPI => '"' . self::FPI_VALUE . '"',
                DoctypeFactory::KEY_URI => '""',
            ],
            'fpi and url: both single quoted' => [
                DoctypeFactory::KEY_FPI => "'" . self::FPI_VALUE . "'",
                DoctypeFactory::KEY_URI => "'" . self::URI_VALUE . "'",
            ],
            'fpi and url: both single quoted, empty fpi' => [
                DoctypeFactory::KEY_FPI => "''",
                DoctypeFactory::KEY_URI => "'" . self::URI_VALUE . "'",
            ],
            'fpi and url: both single quoted; empty uri' => [
                DoctypeFactory::KEY_FPI => "'" . self::FPI_VALUE . "'",
                DoctypeFactory::KEY_URI => "''",
            ],
            'fpi and url: fpi single quoted, uri double quoted' => [
                DoctypeFactory::KEY_FPI => "'" . self::FPI_VALUE . "'",
                DoctypeFactory::KEY_URI => '"' . self::URI_VALUE . '"',
            ],
            'fpi and url: fpi double quoted, uri single quoted' => [
                DoctypeFactory::KEY_FPI => '"' . self::FPI_VALUE . '"',
                DoctypeFactory::KEY_URI => "'" . self::URI_VALUE . "'",
            ],
            'dtdless' => [
                DoctypeFactory::KEY_SYSTEM_PUBLIC => null,
            ],
            'html5 legacy compat: uri double quoted' => [
                DoctypeFactory::KEY_SYSTEM_PUBLIC => DoctypeFactory::IDENTIFIER_SYSTEM,
                DoctypeFactory::KEY_FPI => null,
                DoctypeFactory::KEY_URI => '"about:legacy-compat"',
            ],
            'html5 legacy compat: uri single quoted' => [
                DoctypeFactory::KEY_SYSTEM_PUBLIC => DoctypeFactory::IDENTIFIER_SYSTEM,
                DoctypeFactory::KEY_FPI => null,
                DoctypeFactory::KEY_URI => "'about:legacy-compat'",
            ],
        ];

        $list = [];
        foreach ($docTypeValuesCollection as $key => $docTypeValues) {
            $list = array_merge(
                $list,
                DoctypeFactory::createSetFromValues($docTypeValues, $key)
            );
        }

        return $list;
    }
}
