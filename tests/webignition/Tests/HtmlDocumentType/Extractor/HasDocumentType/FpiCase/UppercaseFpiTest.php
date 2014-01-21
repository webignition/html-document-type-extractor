<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class UppercaseFpiTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->uppercaseFpi()->getAllKnown();
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->getKeyNormalisedDoctypeCollection($this->getGenerator()->uppercaseFpi()->getAllKnown());
    } 
}