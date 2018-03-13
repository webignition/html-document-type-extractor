<?php

namespace webignition\Tests\HtmlDocumentType\Extractor;

use webignition\HtmlDocumentType\Extractor;

abstract class BaseTest extends \PHPUnit_Framework_TestCase {

    const FIXTURES_BASE_PATH = '/../../../../fixtures';

    /**
     *
     * @var \webignition\HtmlDocumentType\Extractor
     */
    private $extractor;


    protected $doctypeList = array(
        'default' => array(
            'fpi-only-double-quoted' => '<!DOCTYPE html PUBLIC "Fpi Value">',
            'fpi-only-single-quoted' => '<!DOCTYPE html PUBLIC \'Fpi Value\'>',
            'fpi-only-double-quoted-and-empty' => '<!DOCTYPE html PUBLIC "">',
            'fpi-only-single-quoted-and-empty' => '<!DOCTYPE html PUBLIC \'\'>',
            'fpi-and-uri-both-double-quoted' => '<!DOCTYPE html PUBLIC "Fpi Value" "uri value">',
            'fpi-and-uri-both-single-quoted' => '<!DOCTYPE html PUBLIC \'Fpi Value\' \'uri value\'>',
            'fpi-and-uri-both-double-quoted-with-empty-fpi' => '<!DOCTYPE html PUBLIC "" "uri value">',
            'fpi-and-uri-both-double-quoted-with-empty-uri' => '<!DOCTYPE html PUBLIC "Fpi Value" "">',
            'fpi-single-quoted-and-uri-double-quoted' => '<!DOCTYPE html PUBLIC \'Fpi Value\' "uri value">',
            'fpi-double-quoted-and-uri-single-quoted' => '<!DOCTYPE html PUBLIC "Fpi Value" \'uri value\'>',
            'dtdless' => '<!DOCTYPE html>',
            'html-5-legacy-compat' => '<!DOCTYPE html SYSTEM "about:legacy-compat">',
        ),
        'lowercase-fpi' => array(
            'fpi-only-double-quoted' => '<!DOCTYPE html PUBLIC "fpi value">',
            'fpi-only-single-quoted' => '<!DOCTYPE html PUBLIC \'fpi value\'>',
            'fpi-only-double-quoted-and-empty' => '<!DOCTYPE html PUBLIC "">',
            'fpi-only-single-quoted-and-empty' => '<!DOCTYPE html PUBLIC \'\'>',
            'fpi-and-uri-both-double-quoted' => '<!DOCTYPE html PUBLIC "fpi value" "uri value">',
            'fpi-and-uri-both-single-quoted' => '<!DOCTYPE html PUBLIC \'fpi value\' \'uri value\'>',
            'fpi-and-uri-both-double-quoted-with-empty-fpi' => '<!DOCTYPE html PUBLIC "" "uri value">',
            'fpi-and-uri-both-double-quoted-with-empty-uri' => '<!DOCTYPE html PUBLIC "fpi value" "">',
            'fpi-single-quoted-and-uri-double-quoted' => '<!DOCTYPE html PUBLIC \'fpi value\' "uri value">',
            'fpi-double-quoted-and-uri-single-quoted' => '<!DOCTYPE html PUBLIC "fpi value" \'uri value\'>',
            'dtdless' => '<!DOCTYPE html>',
            'html-5-legacy-compat' => '<!DOCTYPE html SYSTEM "about:legacy-compat">'
        ),
        'uppercase-fpi' => array(
            'fpi-only-double-quoted' => '<!DOCTYPE html PUBLIC "FPI VALUE">',
            'fpi-only-single-quoted' => '<!DOCTYPE html PUBLIC \'FPI VALUE\'>',
            'fpi-only-double-quoted-and-empty' => '<!DOCTYPE html PUBLIC "">',
            'fpi-only-single-quoted-and-empty' => '<!DOCTYPE html PUBLIC \'\'>',
            'fpi-and-uri-both-double-quoted' => '<!DOCTYPE html PUBLIC "FPI VALUE" "uri value">',
            'fpi-and-uri-both-single-quoted' => '<!DOCTYPE html PUBLIC \'FPI VALUE\' \'uri value\'>',
            'fpi-and-uri-both-double-quoted-with-empty-fpi' => '<!DOCTYPE html PUBLIC "" "uri value">',
            'fpi-and-uri-both-double-quoted-with-empty-uri' => '<!DOCTYPE html PUBLIC "FPI VALUE" "">',
            'fpi-single-quoted-and-uri-double-quoted' => '<!DOCTYPE html PUBLIC \'FPI VALUE\' "uri value">',
            'fpi-double-quoted-and-uri-single-quoted' => '<!DOCTYPE html PUBLIC "FPI VALUE" \'uri value\'>',
            'dtdless' => '<!DOCTYPE html>',
            'html-5-legacy-compat' => '<!DOCTYPE html SYSTEM "about:legacy-compat">'
        ),
        'whitespace-input' => array(
            'fpi-alpha-newline-alpha' => "<!DOCTYPE html PUBLIC \"FPI\nVALUE\">",
            'fpi-alpha-tab-alpha' => "<!DOCTYPE html PUBLIC \"FPI\tVALUE\">",
            'fpi-alpha-carriage-return-alpha' => "<!DOCTYPE html PUBLIC \"FPI\rVALUE\">",
            'fpi-alpha-space-newline-alpha' => "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 \nTransitional//EN\">",
            'fpi-alpha-space-tab-alpha' => "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 \nTransitional//EN\">",
            'fpi-alpha-space-carriage-return-alpha' => "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 \nTransitional//EN\">"
        ),
        'whitespace-output' => array(
            'fpi-alpha-newline-alpha' => "<!DOCTYPE html PUBLIC \"FPI VALUE\">",
            'fpi-alpha-tab-alpha' => "<!DOCTYPE html PUBLIC \"FPI VALUE\">",
            'fpi-alpha-carriage-return-alpha' => "<!DOCTYPE html PUBLIC \"FPI VALUE\">",
            'fpi-alpha-space-newline-alpha' => "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">",
            'fpi-alpha-space-tab-alpha' => "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">",
            'fpi-alpha-space-carriage-return-alpha' => "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">"
        ),
        'multiline' => array(
        'fpi-only-double-quoted' =>
'<!DOCTYPE html PUBLIC
    "Fpi Value">',

            'fpi-only-single-quoted' =>
'<!DOCTYPE html PUBLIC 
    \'Fpi Value\'>',

            'fpi-only-double-quoted-and-empty' =>
'<!DOCTYPE html PUBLIC 
    "">',

            'fpi-only-single-quoted-and-empty' =>
'<!DOCTYPE html PUBLIC 
    \'\'>',

            'fpi-and-uri-both-double-quoted' =>
'<!DOCTYPE html PUBLIC 
    "Fpi Value" 
    "uri value">',

            'fpi-and-uri-both-single-quoted' =>
'<!DOCTYPE html PUBLIC 
    \'Fpi Value\' 
    \'uri value\'>',

            'fpi-and-uri-both-double-quoted-with-empty-fpi' =>
'<!DOCTYPE html PUBLIC 
    "" 
    "uri value">',

            'fpi-and-uri-both-double-quoted-with-empty-uri' =>
'<!DOCTYPE html PUBLIC 
    "Fpi Value" 
    "">',

            'fpi-single-quoted-and-uri-double-quoted' =>
'<!DOCTYPE html PUBLIC 
    \'Fpi Value\' 
    "uri value">',

            'fpi-double-quoted-and-uri-single-quoted' =>
'<!DOCTYPE html PUBLIC 
    "Fpi Value" 
    \'uri value\'>',

            'dtdless' =>
'<!DOCTYPE html>',

            'html-5-legacy-compat' =>
'<!DOCTYPE html SYSTEM 
    "about:legacy-compat">'
        )
    );


    public function setUp() {
        $this->extractor = new Extractor();
    }

    /**
     *
     * @return \webignition\HtmlDocumentType\Extractor
     */
    protected function getExtractor() {
        return $this->extractor;
    }


    /**
     *
     * @param string $fixtureName
     * @return string
     */
    protected function getFixture($fixtureName) {
        return file_get_contents(__DIR__ . self::FIXTURES_BASE_PATH . '/' . $fixtureName);
    }


    /**
     *
     * @return string
     */
    protected function getDataKey() {
        return \ICanBoogie\hyphenate(str_replace('test', '', $this->getName()));
    }


    /**
     *
     * @param array $doctypeCollection
     * @return array
     */
    protected function getKeyNormalisedDoctypeCollection($doctypeCollection) {
        foreach ($doctypeCollection as $key => $value) {
            $normalisedKey = str_replace('+', '-', $key);
            unset($doctypeCollection[$key]);
            $doctypeCollection[$normalisedKey] = $value;
        }

        return $doctypeCollection;
    }

}