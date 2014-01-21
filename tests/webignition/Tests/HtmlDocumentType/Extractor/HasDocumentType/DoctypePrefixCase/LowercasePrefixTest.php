<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\DoctypePrefixCase;

class LowercasePrefixTest extends DoctypePrefixCaseTest {
    
    protected function getDoctypePrefixReplacement() {
        return 'doctype';
    }
    
}