<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\DoctypePrefixCase;

class UppercasePrefixTest extends DoctypePrefixCaseTest {   
    
    protected function getDoctypePrefixReplacement() {
        return 'DOCTYPE';
    }
}