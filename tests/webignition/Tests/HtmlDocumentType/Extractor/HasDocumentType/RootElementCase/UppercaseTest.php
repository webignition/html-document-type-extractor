<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\RootElementCase;

class UppercaseTest extends RootElementCaseTest {   
      
    protected function getRootElementReplacement() {
        return 'HTML';
    }
    
}