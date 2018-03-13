<?php

namespace webignition\Tests\HtmlDocumentType\Extractor;

abstract class GeneratedFixtureTest extends BaseTest {  

    /**
     *
     * @var string
     */
    protected $fixtureTemplate = 'default';

    
    abstract protected function getUnderTestDoctypeCollection();
    

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