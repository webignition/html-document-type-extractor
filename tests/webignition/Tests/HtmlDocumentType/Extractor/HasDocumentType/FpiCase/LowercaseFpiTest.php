<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class LowercaseFpiCaseTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->lowercaseFpi()->getAllKnown();
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->getKeyNormalisedDoctypeCollection($this->getGenerator()->lowercaseFpi()->getAllKnown());
    }    
    
}