<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\BaseTest;

class NoDoctypeTest extends BaseTest {
    
    public function testDocumentWithNoDoctypeHasNoDoctype() {
        $this->getExtractor()->setHtml($this->getFixture('no-doctype.html'));
        $this->assertFalse($this->getExtractor()->hasDocumentType());
    } 
    
    public function testNoDocumentHasNoDoctype() {
        $this->assertFalse($this->getExtractor()->hasDocumentType());
    }
    
    public function testDocumentWithNoDoctypeWithDefaultDoctypeInMarkupHasNoDoctype() {
        $this->getExtractor()->setHtml($this->getFixture('no-doctype-with-default-doctype-in-markup.html'));
        $this->assertFalse($this->getExtractor()->hasDocumentType());        
    }
}