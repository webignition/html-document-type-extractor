<?php

namespace webignition\Tests\HtmlDocumentType\Extractor;

use webignition\HtmlDocumentType\Extractor;
use webignition\Tests\HtmlDocumentType\Helper\DoctypeList;
use webignition\Tests\HtmlDocumentType\Helper\HtmlDocumentFactory;

class ExtractorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Extractor
     */
    private $extractor;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->extractor = new Extractor();
    }

    /**
     * @dataProvider getDocumentTypeStringDataProvider
     *
     * @param string $html
     * @param string $expectedDocumentTypeString
     * @param bool $expectedHasDocumentType
     */
    public function testGetHasDocumentTypeString($html, $expectedDocumentTypeString, $expectedHasDocumentType)
    {
        $this->extractor->setHtml($html);

        $this->assertEquals($expectedDocumentTypeString, $this->extractor->getDocumentTypeString());
        $this->assertEquals($expectedHasDocumentType, $this->extractor->hasDocumentType());
    }

    /**
     * @return array
     */
    public function getDocumentTypeStringDataProvider()
    {
        $docTypeList = DoctypeList::create();

        $docTypeInHtmlBodyDataSet = [];
        $hasDocTypeDataSet = [];
        $hasDocTypeHasPrecedingMultiLineCommentDataSet = [];
        $hasDocTypeHasPrecedingSingleLineCommentDataSet = [];
        $hasXmlPrefixOnDocTypeLineDataSet = [];
        $hasXmlPrefixPrecedingDocTypeLineDataSet = [];
        $hasBlankLinesPrecedingDoctypeDataSet = [];

        foreach ($docTypeList as $key => $docType) {
            $docTypeInHtmlBodyDataSet['doctype in html body: ' . $key] = [
                'html' => HtmlDocumentFactory::create($docType, HtmlDocumentFactory::TEMPLATE_KEY_DOCTYPE_IN_HTML_BODY),
                'expectedDocumentTypeString' => '',
                'expectedHasDocumentType' => false,
            ];

            $expectedDocType = $this->createExpectedDocTypeFromTestDocType($docType);

            // Has doctype, no special cases
            $hasDocTypeDataSet['has doctype: ' . $key] = [
                'html' => HtmlDocumentFactory::create($docType),
                'expectedDocumentTypeString' => $expectedDocType,
                'expectedHasDocumentType' => true,
            ];

            // Has doctype, multi-line comment on line before doctype
            $hasDocTypeHasPrecedingMultiLineCommentDataSet['has doctype, preceding multi-line comment: ' . $key] = [
                'html' => HtmlDocumentFactory::create("<!--[if IE ]>\nFoo\nBar!<![endif]-->\n" . $docType),
                'expectedDocumentTypeString' => $expectedDocType,
                'expectedHasDocumentType' => true,
            ];

            // Has doctype, multi-line comment on same line as doctype
            $hasDocTypeHasPrecedingSingleLineCommentDataSet['has doctype, preceding single-line comment: ' . $key] = [
                'html' => HtmlDocumentFactory::create('<!--[if IE ]><![endif]-->' . "\n" . $docType),
                'expectedDocumentTypeString' => $expectedDocType,
                'expectedHasDocumentType' => true,
            ];

            // Has doctype, xml prefix on line before doctype
            $hasXmlPrefixPrecedingDocTypeLineDataSet['has doctype, xml prefix on preceding line: ' . $key] = [
                'html' => HtmlDocumentFactory::create('<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $docType),
                'expectedDocumentTypeString' => $expectedDocType,
                'expectedHasDocumentType' => true,
            ];

            // Has doctype, xml prefix on same line as doctype
            $hasXmlPrefixOnDocTypeLineDataSet['has doctype, xml prefix on same line: ' . $key] = [
                'html' => HtmlDocumentFactory::create('<?xml version="1.0" encoding="UTF-8"?>' . $docType),
                'expectedDocumentTypeString' => $expectedDocType,
                'expectedHasDocumentType' => true,
            ];

            // Blank lines preceding doctype
            $hasBlankLinesPrecedingDoctypeDataSet['has doctype, blank lines preceding: ' . $key] = [
                'html' => HtmlDocumentFactory::create("\n\n\n" . $docType),
                'expectedDocumentTypeString' => $expectedDocType,
                'expectedHasDocumentType' => true,
            ];
        }

        return array_merge(
            [
                'empty html' => [
                    'html' => '',
                    'expectedDocumentTypeString' => '',
                    'expectedHasDocumentType' => false,
                ],
                'no doctype' => [
                    'html' => HtmlDocumentFactory::create(''),
                    'expectedDocumentTypeString' => '',
                    'expectedHasDocumentType' => false,
                ],
            ],
            $docTypeInHtmlBodyDataSet,
            $hasDocTypeDataSet,
            $hasDocTypeHasPrecedingMultiLineCommentDataSet,
            $hasDocTypeHasPrecedingSingleLineCommentDataSet,
            $hasXmlPrefixOnDocTypeLineDataSet,
            $hasXmlPrefixPrecedingDocTypeLineDataSet,
            $hasBlankLinesPrecedingDoctypeDataSet
        );
    }

    private function createExpectedDocTypeFromTestDocType($testDocType)
    {
        $expectedDocType = $testDocType;

        // Expect <!DOCTYPE prefix to be uppercase
        $expectedDocType = preg_replace('/^<!doctype/i', '<!DOCTYPE', $expectedDocType);

        // Expect root element to be lowercase (spec doesn't care about root element case)
        $expectedDocType = preg_replace_callback(
            '/^<!doctype\s[a-z]+/i',
            function (array $matches) {
                $match = $matches[0];
                $matchParts = explode(' ', $match);
                $rootElement = $matchParts[1];

                return $matchParts[0] . ' ' . strtolower($rootElement);
            },
            $expectedDocType
        );

        // Expect DTD to be all on one line
        $expectedDocType = str_replace(["\n"], '', $expectedDocType);
        $expectedDocType = preg_replace('/ >$/', '>', $expectedDocType);

        return $expectedDocType;
    }
}
