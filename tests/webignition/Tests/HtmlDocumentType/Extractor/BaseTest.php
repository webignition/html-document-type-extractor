<?php

namespace webignition\Tests\HtmlDocumentType\Extractor;

use webignition\HtmlDocumentType\Extractor;
use webignition\HtmlDocumentType\Generator;

abstract class BaseTest extends \PHPUnit_Framework_TestCase {  
    
    const FIXTURES_BASE_PATH = '/../../../../fixtures';
    
    /**
     *
     * @var \webignition\HtmlDocumentType\Generator
     */
    private $generator;
    
    /**
     *
     * @var \webignition\HtmlDocumentTypeIdentifier\Extractor
     */
    private $identifier;    
    
    /**
     *
     * @var string
     */
    private $fixturePath = null;    
    
    public function setUp() {
        $this->setTestFixturePath(__CLASS__, $this->getName());
        
        $this->generator = new Generator();
        $this->identifier = new Extractor();             
    }    
    
    /**
     * 
     * @return \webignition\HtmlDocumentType\Generator
     */
    protected function getGenerator() {
        return $this->generator;
    }
    
    /**
     * 
     * @return \webignition\HtmlDocumentTypeIdentifier\Extractor
     */
    protected function getIdentifier() {
        return $this->identifier;
    }    

    /**
     * 
     * @param string $testClass
     * @param string $testMethod
     */
    protected function setTestFixturePath($testClass, $testMethod) {
        $this->fixturePath = __DIR__ . self::FIXTURES_BASE_PATH . '/' . $testClass . '/' . $testMethod;       
    }    
    
    
    /**
     * 
     * @return string
     */
    protected function getTestFixturePath() {
        return $this->fixturePath;     
    }
    
    
    /**
     * 
     * @param string $fixtureName
     * @return string
     */
    protected function getFixture($fixtureName) {
        if (file_exists($this->getTestFixturePath() . '/' . $fixtureName)) {
            return file_get_contents($this->getTestFixturePath() . '/' . $fixtureName);
        }
        
        return file_get_contents(__DIR__ . self::FIXTURES_BASE_PATH . '/Common/' . $fixtureName);        
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
     * @param string $key
     * @param string $doctypeString
     * @return string
     */
    protected function generateFixtureFromTemplate($key, $doctypeString) {
        $key = preg_replace('/-alternative[0-9]?/', '', str_replace(array(
            '-legacy-compat'
        ), '', $key));
        
        return str_replace('{{DOCTYPE}}', $doctypeString, $this->getFixture('Templates/'.$key . '.html'));       
    } 
    
    
    protected function getFixtureContent() {
        $dataKey = $this->getDataKey();
        $underTestDoctypeCollection = $this->getKeyNormalisedDoctypeCollection($this->getUnderTestDoctypeCollection());
        return $this->generateFixtureFromTemplate($dataKey, $underTestDoctypeCollection[$dataKey]);
    }    
    
}