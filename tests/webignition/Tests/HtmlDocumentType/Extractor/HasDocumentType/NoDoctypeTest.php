<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\BaseTest;

class NoDoctypeTest extends BaseTest {
    
    public function testDocumentWithNoDoctypeHasNoDoctype() {
        $this->getIdentifier()->setHtml($this->getFixture('no-doctype.html'));
        $this->assertFalse($this->getIdentifier()->hasDocumentType());
    } 
    
    public function testNoDocumentHasNoDoctype() {
        $this->assertFalse($this->getIdentifier()->hasDocumentType());
    }
    
    public function testDocumentWithNoDoctypeWithDefaultDoctypeInMarkupHasNoDoctype() {
        $this->getIdentifier()->setHtml($this->getFixture('no-doctype-with-default-doctype-in-markup.html'));
        $this->assertFalse($this->getIdentifier()->hasDocumentType());        
    }
}