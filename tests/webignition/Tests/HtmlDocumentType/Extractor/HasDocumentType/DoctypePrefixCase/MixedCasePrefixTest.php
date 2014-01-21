<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\HasDocumentType\DoctypePrefixCase;

class MixedCasePrefixTest extends DoctypePrefixCaseTest {   
    
    protected function getDoctypePrefixReplacement() {
        return 'DocTYpe';
    }
    
}