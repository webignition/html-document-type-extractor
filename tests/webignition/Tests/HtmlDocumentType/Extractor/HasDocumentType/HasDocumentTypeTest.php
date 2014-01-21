<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\BaseTest;

abstract class HasDocumentTypeTest extends BaseTest {

        
    public function setUp() {
        parent::setUp(); 
        $this->getIdentifier()->setHtml($this->getFixtureContent());
    }
    
    abstract protected function getUnderTestDoctypeCollection();         

    public function testHtml_2() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }    
    
    public function testHtml_2_Alternative() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    } 
    
    public function testHtml_32() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_32_Alternative1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_32_Alternative2() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_4_Strict() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
   
    public function testHtml_4_Transitional() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_4_Frameset() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_401_Strict() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_401_Transitional() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_401_Frameset() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_5() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_5_Legacy_Compat() {
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_1_Strict() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }        
    
    public function testXhtml_1_Transitional() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_1_Frameset() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_11() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }
    
    public function testXhtml_Basic_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Basic_11() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Print_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Mobile_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Mobile_11() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Mobile_12() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Rdfa_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Rdfa_11() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    } 
    
    public function testXhtml_Aria_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testXhtml_Aria_1_Alternative() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }      
    
    public function testHtml_Aria_401() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_Rdfa_401_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   

    public function testHtml_rdfa_401_11() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_Rdfalite_401_11() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }   
    
    public function testHtml_Iso15445_1() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }     

    public function testHtml_Iso15445_1_Alternative() {        
        $this->assertTrue($this->getIdentifier()->hasDocumentType());
    }     
}