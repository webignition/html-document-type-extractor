<?php

namespace webignition\Tests\HtmlDocumentType\Extractor\GetDocumentType;

use webignition\Tests\HtmlDocumentType\Extractor\BaseTest;

class NoDoctypeTest extends BaseTest {

    public function testDocumentWithNoDoctypeWithDefaultDoctypeInMarkupHasEmptyDoctype() {
        $this->getExtractor()->setHtml($this->getFixture('no-doctype-with-default-doctype-in-markup.html'));
        $this->assertEquals('', $this->getExtractor()->getDocumentTypeString());
    }
}