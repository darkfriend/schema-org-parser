<?php

namespace Darkfriend\SchemaOrgParser;

use DOMDocument;
use DOMXPath;

class MicrodataDOMDocument extends DOMDocument
{
    public DOMXPath $xpath;

    /**
     * Get top-level items of the document.
     *
     * @see https://www.w3.org/TR/2018/WD-microdata-20180426/#dfn-top-level-microdata-item
     *
     * @return \DOMNodeList<MicrodataDOMElement> List of top level items as elements
     */
    public function getItems(): \DOMNodeList
    {
        return $this->xpath->query('//*[@itemscope and not(@itemprop)]');
    }

    /**
     * Also assigns $xpath with DOMXPath of freshly loaded DOMDocument.
     * @param $source
     * @param $options
     * @return DOMDocument|bool
     */
    public function loadHTML($source, $options = 0)
    {
        $return = parent::loadHTML($source, $options);

        $this->xpath = new DOMXPath($this);

        return $return;
    }

    /**
     * Also assigns $xpath with DOMXPath of freshly loaded DOMDocument.
     * @param $filename
     * @param $options
     * @return DOMDocument|bool
     */
    public function loadHTMLFile($filename, $options = 0)
    {
        $return = parent::loadHTMLFile($filename, $options);

        $this->xpath = new DOMXPath($this);

        return $return;
    }
}
