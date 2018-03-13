<?php

namespace webignition\Tests\HtmlDocumentType\Helper;

class HtmlDocumentFactory
{
    const TEMPLATE_DEFAULT = "{{ DOCTYPE }}\n\n<html><head><title></title></head></html>";
    const TEMPLATE_DOCTYPE_IN_HTML_BODY = '<html><head><title></title></head><body>{{ DOCTYPE }}</body></html>';
    const TEMPLATE_KEY_DEFAULT = 'default';
    const TEMPLATE_KEY_DOCTYPE_IN_HTML_BODY = 'doctype-in-html-body';

    /**
     * @var array
     */
    private static $templates = [
        self::TEMPLATE_KEY_DEFAULT => self::TEMPLATE_DEFAULT,
        self::TEMPLATE_KEY_DOCTYPE_IN_HTML_BODY => self::TEMPLATE_DOCTYPE_IN_HTML_BODY,
    ];

    /**
     * @param string $doctypeString
     * @param string $templateKey
     *
     * @return string
     */
    public static function create($doctypeString, $templateKey = self::TEMPLATE_KEY_DEFAULT)
    {
        return trim(str_replace('{{ DOCTYPE }}', $doctypeString, self::$templates[$templateKey]));
    }
}
