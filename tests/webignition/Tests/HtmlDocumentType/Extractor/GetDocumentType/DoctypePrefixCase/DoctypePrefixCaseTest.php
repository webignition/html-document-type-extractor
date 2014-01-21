<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\DoctypePrefixCase;

use webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\GetDocumentTypeTest;

abstract class DoctypePrefixCaseTest extends GetDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        $doctypeCollection = $this->getGenerator()->getAllKnown();
        
        foreach ($doctypeCollection as $key => $value) {            
            $doctypeCollection[$key] = str_replace('<!DOCTYPE', '<!' . $this->getDoctypePrefixReplacement(), $value);
        }
        
        return $doctypeCollection;
    }
    
    abstract protected function getDoctypePrefixReplacement();   
    
}