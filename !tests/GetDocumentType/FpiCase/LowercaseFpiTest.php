<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

class LowercaseFpiCaseTest extends GetDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->doctypeList['lowercase-fpi'];
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->doctypeList['lowercase-fpi'];
    }    
    
}