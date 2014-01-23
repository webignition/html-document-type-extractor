<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\GeneratedFixtureTest;

class NormaliseWhitespaceTest extends GeneratedFixtureTest {        
    
    protected $expectedDoctype;
    
    public function setUp() {
        parent::setUp();
        
        $expectedDoctypeCollection = $this->getExpectedDoctypeCollection();        
        $this->expectedDoctype = $expectedDoctypeCollection[$this->getDataKey()];
        $this->getExtractor()->setHtml($this->getFixtureContent()); 
    }
    
    function getUnderTestDoctypeCollection() {
        return $this->doctypeList['whitespace-input'];
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->doctypeList['whitespace-output'];
    }
    
    public function testFpi_Alpha_Newline_Alpha() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }  
    
    public function testFpi_Alpha_Tab_Alpha() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }  
    
    public function testFpi_Alpha_Carriage_Return_Alpha() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }      
    
    public function testFpi_Alpha_Space_Newline_Alpha() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }      
    
    public function testFpi_Alpha_Space_Tab_Alpha() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }    
    
    public function testFpi_Alpha_Space_Carriage_Return_Alpha() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }        

}