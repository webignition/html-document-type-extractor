<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\RootElementCase;

use webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\HasDocumentTypeTest;

abstract class RootElementCaseTest extends HasDocumentTypeTest {   
    
    protected function getUnderTestDoctypeCollection() {        
        $doctypeCollection = $this->doctypeList['default'];
        
        foreach ($doctypeCollection as $key => $value) {                                    
            $doctypeCollection[$key] = preg_replace('/<!doctype html/i', '<!DOCTYPE ' . $this->getRootElementReplacement(), $value);
        }
        
        return $doctypeCollection;
    }
    
    abstract protected function getRootElementReplacement();
    
}