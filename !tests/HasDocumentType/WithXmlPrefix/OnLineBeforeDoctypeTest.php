<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\WithXmlPrefix;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class OnLineBeforeDoctypeTest extends HasDocumentTypeTest {    
    
    public function setUp() {
        parent::setUp();
    }
    
    protected function getUnderTestDoctypeCollection() {
        return $this->doctypeList['default'];
    }
    
    protected function getFixtureContent() {
        return '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . parent::getFixtureContent();
    }    
}