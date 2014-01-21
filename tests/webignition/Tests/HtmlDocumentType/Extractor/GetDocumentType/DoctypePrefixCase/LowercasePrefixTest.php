<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\DoctypePrefixCase;

class LowercasePrefixTest extends DoctypePrefixCaseTest {
    
    protected function getDoctypePrefixReplacement() {
        return 'doctype';
    }
    
}