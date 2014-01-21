<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType\DoctypePrefixCase;

class MixedCasePrefixTest extends DoctypePrefixCaseTest {   
    
    protected function getDoctypePrefixReplacement() {
        return 'DocTYpe';
    }
    
}