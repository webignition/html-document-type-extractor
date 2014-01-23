<?php
namespace webignition\HtmlDocumentType;

/**
 * Extract the doctype from a HTML document
 */
class Extractor {
    
    //const DOCUMENT_TYPE_STRING_WITH_MISSING_URI_ENDING = ' "">';    
    //const DEFAULT_DOCTYPE = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">';    
    
    
    /**
     *
     * @var string
     */
    private $documentTypeString = null;    
    
    
    /**
     *
     * @var string
     */
    private $sourceHtml = '';
    
    
    /**
     *
     * @var string
     */
    private $lowercaseSourceHtml = '';
    
    /**
     * 
     * @param string $html
     */
    public function setHtml($html) {
        $this->sourceHtml = trim($html);
        $this->lowercaseSourceHtml = strtolower($this->sourceHtml);
    }
    
    
    /**
     * 
     * @return string
     */
    public function getDocumentTypeString() {
        if (is_null($this->documentTypeString)) {
  
            $doctypeMarkerPosition = strpos($this->lowercaseSourceHtml, '<!doctype ');
            
            if ($doctypeMarkerPosition === false) {
                $this->documentTypeString = '';
            } else {
                $htmlMarkerPosition = strpos($this->lowercaseSourceHtml, '<html');
                
                if ($htmlMarkerPosition > $doctypeMarkerPosition || $htmlMarkerPosition === false) {
                    $nextClosingBracketPosition = strpos($this->lowercaseSourceHtml, '>', $doctypeMarkerPosition);                    
                    $this->documentTypeString = substr($this->sourceHtml, $doctypeMarkerPosition, $nextClosingBracketPosition - $doctypeMarkerPosition + 1);strpos($this->lowercaseSourceHtml, '<!doctype ');                    
                } elseif ($doctypeMarkerPosition < $doctypeMarkerPosition) {
                    $this->documentTypeString = '';
                }
            }

            $this->setDoctypePrefixAndRootElementToCorrectCase();
            $this->normalisePublicAndSystemKeywords();
            $this->normaliseWhitespace();
        }
        
        return $this->documentTypeString;
    }
    
    
    private function setDoctypePrefixAndRootElementToCorrectCase() {
        $this->documentTypeString = preg_replace('/^\<\!doctype html/i', '<!DOCTYPE html', $this->documentTypeString);
    }
    
    private function normalisePublicAndSystemKeywords() {
        $this->documentTypeString = preg_replace('/\spublic\s/i', ' PUBLIC ', $this->documentTypeString);
        $this->documentTypeString = preg_replace('/\system\s/i', ' SYSTEM ', $this->documentTypeString);
    }
    
    
    private function normaliseWhitespace() {
        $this->documentTypeString = preg_replace('/\s+/', ' ', $this->documentTypeString);    
    }
    
    
    /**
     * 
     * @return boolean
     */
    public function hasDocumentType() {        
        return $this->getDocumentTypeString() != '';
    }
    
}