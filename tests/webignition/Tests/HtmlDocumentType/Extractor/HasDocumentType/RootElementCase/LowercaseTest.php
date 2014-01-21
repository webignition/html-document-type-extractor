<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\RootElementCase;

class LowercaseTest extends RootElementCaseTest {   

    protected function getRootElementReplacement() {
        return 'html';
    }
    
}