<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\RootElementCase;

class LowercaseTest extends RootElementCaseTest {   

    protected function getRootElementReplacement() {
        return 'html';
    }
    
}