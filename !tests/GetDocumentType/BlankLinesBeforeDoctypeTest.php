<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

class BlankLinesBeforeDoctypeTest extends GetDocumentTypeTest {    
    
    public function setUp() {
        parent::setUp();
    }
    
    protected function getUnderTestDoctypeCollection() {
        return $this->doctypeList['default'];
    }
    
    protected function getFixtureContent() {
        return "\n\n\n" . parent::getFixtureContent();
    }    
}