<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\DoctypePrefixCase;

class UppercasePrefixTest extends DoctypePrefixCaseTest {   
    
    protected function getDoctypePrefixReplacement() {
        return 'DOCTYPE';
    }
}