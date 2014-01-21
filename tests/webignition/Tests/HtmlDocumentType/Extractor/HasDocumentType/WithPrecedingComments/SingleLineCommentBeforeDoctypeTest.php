<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\WithXmlPrefix;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class MultilineCommentBeforeDoctype extends HasDocumentTypeTest {    
    
    public function setUp() {
        parent::setUp();
    }
    
    protected function getUnderTestDoctypeCollection() {
        return $this->getGenerator()->getAllKnown();
    }
    
    protected function getFixtureContent() {
        return '<!--[if IE ]><![endif]-->' . "\n" . parent::getFixtureContent();
    }    
}