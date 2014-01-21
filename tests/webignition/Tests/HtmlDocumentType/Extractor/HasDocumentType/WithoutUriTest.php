<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType;

class WithoutUriTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->noUri()->getAllKnown();
    }
    
}