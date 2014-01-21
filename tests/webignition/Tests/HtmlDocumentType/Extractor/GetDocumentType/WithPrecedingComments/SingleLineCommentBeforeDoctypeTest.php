<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\WithXmlPrefix;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class MultilineCommentBeforeDoctype extends GetDocumentTypeTest {    
    
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