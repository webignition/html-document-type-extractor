<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class LowercaseFpiCaseTest extends GetDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->lowercaseFpi()->getAllKnown();
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->getKeyNormalisedDoctypeCollection($this->getGenerator()->lowercaseFpi()->getAllKnown());
    }    
    
}