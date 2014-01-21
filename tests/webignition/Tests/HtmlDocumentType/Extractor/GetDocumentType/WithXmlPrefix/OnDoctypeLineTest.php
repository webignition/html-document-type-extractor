<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\WithXmlPrefix;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class OnDoctypeLineTest extends GetDocumentTypeTest {    
    
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