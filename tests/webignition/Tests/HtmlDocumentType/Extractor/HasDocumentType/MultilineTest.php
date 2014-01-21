<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

class MultilineTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->multiline()->getAllKnown();
    }
    
}