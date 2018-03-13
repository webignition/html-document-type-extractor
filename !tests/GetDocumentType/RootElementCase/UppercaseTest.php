<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\RootElementCase;

class UppercaseTest extends RootElementCaseTest {   
      
    protected function getRootElementReplacement() {
        return 'HTML';
    }
    
}