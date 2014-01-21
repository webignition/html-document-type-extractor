<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\WithXmlPrefix;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class OnDoctypeLineTest extends HasDocumentTypeTest {    
    
    public function setUp() {
        parent::setUp();
    }
    
    protected function getUnderTestDoctypeCollection() {
        return $this->getGenerator()->getAllKnown();
    }
    
    protected function getFixtureContent() {
        return '<?xml version="1.0" encoding="UTF-8"?>' . parent::getFixtureContent();
    }    
}