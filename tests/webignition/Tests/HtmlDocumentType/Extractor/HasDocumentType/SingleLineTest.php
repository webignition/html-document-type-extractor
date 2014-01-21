<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

class SingleLineTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->singleline()->getAllKnown();
    }
    
}