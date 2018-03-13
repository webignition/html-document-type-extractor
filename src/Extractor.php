<?php

namespace webignition\HtmlDocumentType;

/**
 * Extract the doctype from a HTML document
 */
class Extractor
{
    /**
     * @var string
     */
    private $documentTypeString = null;

    /**
     * @param string $html
     */
    public function setHtml($html)
    {
        $this->documentTypeString = $this->extractDocumentType($html);
    }

    /**
     * @return string
     */
    public function getDocumentTypeString()
    {
        return $this->documentTypeString;
    }

    private function extractDocumentType($html)
    {
        $sourceHtml = trim($html);
        $lowercaseSourceHtml = strtolower($sourceHtml);

        $documentTypeString = '';
        $doctypeMarkerPosition = strpos($lowercaseSourceHtml, '<!doctype ');

        if (false === $doctypeMarkerPosition) {
            return $documentTypeString;
        }

        $htmlMarkerPosition = strpos($lowercaseSourceHtml, '<html');

        if ($htmlMarkerPosition > $doctypeMarkerPosition || $htmlMarkerPosition === false) {
            $nextClosingBracketPosition = strpos($lowercaseSourceHtml, '>', $doctypeMarkerPosition);
            $documentTypeString = substr(
                $sourceHtml,
                $doctypeMarkerPosition,
                $nextClosingBracketPosition - $doctypeMarkerPosition + 1
            );
        }

        // Normalise doctype prefix and root element
        $documentTypeString = preg_replace('/^\<\!doctype html/i', '<!DOCTYPE html', $documentTypeString);

        // Normalise public and system keywords
        $documentTypeString = preg_replace('/\spublic\s/i', ' PUBLIC ', $documentTypeString);
        $documentTypeString = preg_replace('/\system\s/i', ' SYSTEM ', $documentTypeString);

        // Normalise whitespace
        $documentTypeString = preg_replace('/\s+/', ' ', $documentTypeString);
        $documentTypeString = preg_replace('/ >$/', '>', $documentTypeString);

        return $documentTypeString;
    }

    /**
     * @return bool
     */
    public function hasDocumentType()
    {
        return $this->documentTypeString != '';
    }
}
