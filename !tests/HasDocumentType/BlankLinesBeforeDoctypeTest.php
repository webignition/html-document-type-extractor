<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

class BlankLinesBeforeDoctypeTest extends HasDocumentTypeTest {    
    
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