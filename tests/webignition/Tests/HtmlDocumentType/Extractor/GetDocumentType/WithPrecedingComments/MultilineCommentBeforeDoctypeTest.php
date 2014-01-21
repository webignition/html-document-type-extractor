<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\WithPrecedingComments;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class SingleLineCommentBeforeDoctypeTest extends GetDocumentTypeTest {    
    
    public function setUp() {
        parent::setUp();
    }
    
    protected function getUnderTestDoctypeCollection() {
        return $this->doctypeList['default'];
    }
    
    protected function getFixtureContent() {
        return "<!--[if IE ]>\nFoo\nBar!<![endif]-->" . "\n" . parent::getFixtureContent();                
    }    
}