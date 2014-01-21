<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\FpiCase;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

class LowercaseFpiCaseTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        return $this->doctypeList['lowercase-fpi'];
    }
    
    protected function getExpectedDoctypeCollection() {
        return $this->doctypeList['lowercase-fpi'];
    }    
    
}