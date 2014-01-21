<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class UppercaseFpiTest extends GetDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->getGenerator()->uppercaseFpi()->getAllKnown();
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->getKeyNormalisedDoctypeCollection($this->getGenerator()->uppercaseFpi()->getAllKnown());
    } 
}