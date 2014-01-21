<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

class MultiLineTest extends GetDocumentTypeTest {    
    
    protected function getUnderTestDoctypeCollection() {
        return $this->getGenerator()->multiline()->getAllKnown();
    } 

}