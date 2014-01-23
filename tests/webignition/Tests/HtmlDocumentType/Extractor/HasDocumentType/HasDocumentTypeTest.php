<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\GeneratedFixtureTest;

abstract class HasDocumentTypeTest extends GeneratedFixtureTest {
        
    public function setUp() {
        parent::setUp(); 
        $this->getExtractor()->setHtml($this->getFixtureContent());
    }
    
    public function testFpi_Only_Double_Quoted() {         
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_Only_Single_Quoted() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_Only_Double_Quoted_And_Empty() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_Only_Single_Quoted_And_Empty() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }    
    
    public function testFpi_And_Uri_Both_Double_Quoted() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }    
    
    public function testFpi_And_Uri_Both_Single_Quoted() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_And_Uri_Both_Double_Quoted_With_Empty_Fpi() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_And_Uri_Both_Double_Quoted_With_Empty_Uri() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_Single_Quoted_And_Uri_Double_Quoted() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testFpi_Double_Quoted_And_Uri_Single_Quoted() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testDtdless() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }
    
    public function testHtml_5_Legacy_Compat() {
        $this->assertTrue($this->getExtractor()->hasDocumentType());
    }    

//    public function testHtml_2() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }    
//    
//    public function testHtml_2_Alternative() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    } 
//    
//    public function testHtml_32() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_32_Alternative1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_32_Alternative2() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_4_Strict() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//   
//    public function testHtml_4_Transitional() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_4_Frameset() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_401_Strict() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_401_Transitional() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_401_Frameset() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_5() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_5_Legacy_Compat() {
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_1_Strict() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }        
//    
//    public function testXhtml_1_Transitional() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_1_Frameset() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_11() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }
//    
//    public function testXhtml_Basic_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Basic_11() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Print_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Mobile_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Mobile_11() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Mobile_12() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Rdfa_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Rdfa_11() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    } 
//    
//    public function testXhtml_Aria_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testXhtml_Aria_1_Alternative() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }      
//    
//    public function testHtml_Aria_401() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_Rdfa_401_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//
//    public function testHtml_rdfa_401_11() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_Rdfalite_401_11() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }   
//    
//    public function testHtml_Iso15445_1() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }     
//
//    public function testHtml_Iso15445_1_Alternative() {        
//        $this->assertTrue($this->getExtractor()->hasDocumentType());
//    }     
}