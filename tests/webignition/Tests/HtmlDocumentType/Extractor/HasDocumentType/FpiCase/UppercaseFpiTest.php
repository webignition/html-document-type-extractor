<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class UppercaseFpiTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->doctypeList['uppercase-fpi'];
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->doctypeList['uppercase-fpi'];
    } 
}