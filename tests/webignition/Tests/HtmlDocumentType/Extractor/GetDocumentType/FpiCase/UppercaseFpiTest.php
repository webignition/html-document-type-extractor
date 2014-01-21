<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class UppercaseFpiTest extends GetDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->doctypeList['uppercase-fpi'];
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->doctypeList['uppercase-fpi'];
    } 
}