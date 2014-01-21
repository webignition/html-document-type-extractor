<?php
namespace webignition\HtmlDocumentType;

/**
 * Extract the doctype from a HTML document
 */
class Extractor {
    
    const DOCUMENT_TYPE_STRING_WITH_MISSING_URI_ENDING = ' "">';    
    const DEFAULT_DOCTYPE = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">';    
    
    /**
     *
     * @var \DOMDocumentType
     */
    private $documentTypeObject = null;
    
    
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
     * @var \DOMDocument
     */
    private $sourceDom = null;
    
    /**
     * 
     * @param string $html
     */
    public function setHtml($html) {
        $this->sourceHtml = trim($html);
        $this->sourceDom = null;
        $this->documentTypeObject = null;
    }
    
    
    /**
     * 
     * @return \DOMDocument
     */
    private function getSourceDom() {
        if (is_null($this->sourceDom)) {
            $currentLibXmlUseInternalErrors = libxml_use_internal_errors();

            libxml_use_internal_errors(true);

            $this->sourceDom = new \DOMDocument();
            
            if ($this->sourceHtml != '') {
                $this->sourceDom->loadHTML($this->sourceHtml);
            }

            libxml_use_internal_errors($currentLibXmlUseInternalErrors);             
        }
        
        return $this->sourceDom;
    }
    
    
    /**
     * 
     * @return string
     */
    public function getDocumentTypeString() {
        if (is_null($this->documentTypeString)) {
            if (is_null($this->getSourceDom()->doctype)) {
                $this->documentTypeString = '';
            } else {
                $this->documentTypeString = $this->getSourceDom()->doctype->ownerDocument->saveXml($this->getSourceDom()->doctype);
            }         
            
            $this->setDoctypePrefixAndRootElementToCorrectCase();
            $this->removeSuperfluousMissingUriContent();
            
            if (!$this->hasDocumentType()) {
                $this->documentTypeString = '';
                $this->documentTypeObject = null;
                $this->sourceDom = null;
            }
        }
        
        return $this->documentTypeString;
    }
    
    
    private function removeSuperfluousMissingUriContent() {       
        if ($this->isMissingUriContent()) {
            $this->documentTypeString = preg_replace('/' . self::DOCUMENT_TYPE_STRING_WITH_MISSING_URI_ENDING . '$/i', '>', $this->documentTypeString);
        }
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function isMissingUriContent() {
        return substr($this->documentTypeString, strlen($this->documentTypeString) - strlen(self::DOCUMENT_TYPE_STRING_WITH_MISSING_URI_ENDING)) == self::DOCUMENT_TYPE_STRING_WITH_MISSING_URI_ENDING;
    }
    
    
    private function setDoctypePrefixAndRootElementToCorrectCase() {
        $this->documentTypeString = preg_replace('/^\<\!doctype html/i', '<!DOCTYPE html', $this->documentTypeString);
    }
    
    
    /**
     * 
     * @return boolean
     */
    public function hasDocumentType() {        
        if ($this->documentTypeString != '' && $this->documentTypeString != self::DEFAULT_DOCTYPE) {
            return true;
        }
        
        if ($this->sourceHtmlProbablyContainsDefaultDoctype()) {
            return true;
        }
        
        return false;
    }
    
    
    /**
     * 
     * @return boolean
     */
    private function sourceHtmlProbablyContainsDefaultDoctype() {
        $doctypeStartIndex = stripos($this->sourceHtml, '<!DOCTYPE');
        $htmlStartElementIndex = stripos($this->sourceHtml, 'html');
        
        if ($doctypeStartIndex === false) {
            return false;
        }
        
        if ($htmlStartElementIndex < $doctypeStartIndex) {
            return false;
        }
        
        return true;      
    }
    
}