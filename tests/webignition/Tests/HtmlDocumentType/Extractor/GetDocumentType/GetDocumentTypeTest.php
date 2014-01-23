<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\GeneratedFixtureTest;

abstract class GetDocumentTypeTest extends GeneratedFixtureTest {
    
    protected $expectedDoctype;
    
    public function setUp() {
        parent::setUp();
        
        $expectedDoctypeCollection = $this->getExpectedDoctypeCollection();        
        $this->expectedDoctype = $expectedDoctypeCollection[$this->getDataKey()];
        $this->getExtractor()->setHtml($this->getFixtureContent()); 
    }   
    
    protected function getExpectedDoctypeCollection() {
        return $this->doctypeList['default'];
    }
    
    public function testFpi_Only_Double_Quoted() {        
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_Only_Single_Quoted() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_Only_Double_Quoted_And_Empty() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_Only_Single_Quoted_And_Empty() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }    
    
    public function testFpi_And_Uri_Both_Double_Quoted() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }    
    
    public function testFpi_And_Uri_Both_Single_Quoted() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_And_Uri_Both_Double_Quoted_With_Empty_Fpi() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_And_Uri_Both_Double_Quoted_With_Empty_Uri() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_Single_Quoted_And_Uri_Double_Quoted() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testFpi_Double_Quoted_And_Uri_Single_Quoted() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testDtdless() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }
    
    public function testHtml_5_Legacy_Compat() {
        $this->assertEquals($this->expectedDoctype, $this->getExtractor()->getDocumentTypeString());
    }  
}