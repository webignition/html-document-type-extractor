<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\BaseTest;

/**
 * @todo: test with no space between fpi and uri
 * @note: w3c html validator is happy with such doctypes, need to be sure
 *         they are recognised as valid
 */

abstract class GetDocumentTypeTest extends BaseTest {
    
    protected $expectedDoctype;
    
    public function setUp() {
        parent::setUp();

        $expectedDoctypeCollection = $this->getExpectedDoctypeCollection();
        
        $dataKey = $this->getDataKey();
        
        $this->expectedDoctype = $expectedDoctypeCollection[$dataKey];
        $this->getIdentifier()->setHtml($this->getFixtureContent()); 
    }
    
    abstract protected function getUnderTestDoctypeCollection();    
    
    protected function getExpectedDoctypeCollection() {
        return $this->getKeyNormalisedDoctypeCollection($this->getGenerator()->getAllKnown());
    }
    
    public function testHtml_2() { 
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }    
    
    public function testHtml_2_Alternative() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    } 
    
    public function testHtml_32() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_32_Alternative1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_32_Alternative2() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_4_Strict() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
   
    public function testHtml_4_Transitional() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_4_Frameset() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_401_Strict() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_401_Transitional() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_401_Frameset() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_5() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_5_Legacy_Compat() {
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_1_Strict() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }        
    
    public function testXhtml_1_Transitional() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_1_Frameset() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_11() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }
    
    public function testXhtml_Basic_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Basic_11() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Print_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Mobile_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Mobile_11() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Mobile_12() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Rdfa_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Rdfa_11() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    } 
    
    public function testXhtml_Aria_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testXhtml_Aria_1_Alternative() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }      
    
    public function testHtml_Aria_401() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_Rdfa_401_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   

    public function testHtml_rdfa_401_11() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_Rdfalite_401_11() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }   
    
    public function testHtml_Iso15445_1() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }     

    public function testHtml_Iso15445_1_Alternative() {        
        $this->assertEquals($this->expectedDoctype, $this->getIdentifier()->getDocumentTypeString());
    }  
}