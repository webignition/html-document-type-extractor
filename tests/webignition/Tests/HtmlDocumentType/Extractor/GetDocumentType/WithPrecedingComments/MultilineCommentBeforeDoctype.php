<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\WithXmlPrefix;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class SingleLineCommentBeforeDoctypeTest extends GetDocumentTypeTest {    
    
    public function setUp() {
        parent::setUp();
    }
    
    protected function getUnderTestDoctypeCollection() {
        return $this->getGenerator()->getAllKnown();
    }
    
    protected function getFixtureContent() {
        return "<!--[if IE ]>\nFoo\nBar!<![endif]-->" . "\n" . parent::getFixtureContent();                
    }    
}