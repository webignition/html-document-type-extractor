<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\BaseTest;

abstract class GetDocumentTypeTest extends BaseTest {
    
    protected $expectedDoctype;
    
    public function setUp() {
        parent::setUp();
        
        $expectedDoctypeCollection = $this->getExpectedDoctypeCollection();        
        $this->expectedDoctype = $expectedDoctypeCollection[$this->getDataKey()];
        $this->getExtractor()->setHtml($this->getFixtureContent()); 
    }
    
    abstract protected function getUnderTestDoctypeCollection();    
    
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
    
    
    
    
    
    
//    public function testHtml_2() { 
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }    
//    
//    public function testHtml_2_Alternative() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    } 
//    
//    public function testHtml_32() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_32_Alternative1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_32_Alternative2() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_4_Strict() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//   
//    public function testHtml_4_Transitional() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_4_Frameset() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_401_Strict() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_401_Transitional() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_401_Frameset() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_5() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_5_Legacy_Compat() {
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_1_Strict() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }        
//    
//    public function testXhtml_1_Transitional() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_1_Frameset() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_11() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }
//    
//    public function testXhtml_Basic_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Basic_11() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Print_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Mobile_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Mobile_11() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Mobile_12() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Rdfa_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Rdfa_11() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    } 
//    
//    public function testXhtml_Aria_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testXhtml_Aria_1_Alternative() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }      
//    
//    public function testHtml_Aria_401() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_Rdfa_401_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//
//    public function testHtml_rdfa_401_11() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_Rdfalite_401_11() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }   
//    
//    public function testHtml_Iso15445_1() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }     
//
//    public function testHtml_Iso15445_1_Alternative() {        
//        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
//    }  
}