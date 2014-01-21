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
    
    
    /**
     *
     * @var string
     */
    protected $fixtureTemplate = 'default';
    
    
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
            'html-5-legacy-compat' => '<!DOCTYPE html SYSTEM "about:legacy-compat">'
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
        //$this->generator = new Generator();
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
    

    /**
     * 
     * @param string $templateName
     * @param string $doctypeString
     * @return string
     */
    protected function generateFixtureFromTemplate($templateName, $doctypeString) {        
        return str_replace('{{DOCTYPE}}', $doctypeString, $this->getFixture('Templates/'.$templateName . '.html'));       
    } 
    
    
    protected function getFixtureContent() {
        $underTestDoctypeCollection = $this->getUnderTestDoctypeCollection();
        return $this->generateFixtureFromTemplate($this->fixtureTemplate, $underTestDoctypeCollection[$this->getDataKey()]);
    }
    
}