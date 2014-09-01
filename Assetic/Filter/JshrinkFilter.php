<?php

namespace Salva\JshrinkBundle\Assetic\Filter;

use Assetic\Filter\FilterInterface;
use Assetic\Asset\AssetInterface;
use JShrink\Minifier;

class JshrinkFilter implements FilterInterface
{
    protected $options;
    
    public function __construct(array $options = array())
    {
        $this->options = $options;
    }
    
    public function filterLoad(AssetInterface $asset)
    {
        
    }
    
    public function filterDump(AssetInterface $asset)
    {
        if(isset($this->options['disable']) && $this->options['disable'] === true) {
            $asset->setContent($asset->getContent());
        }
        else {
            $asset->setContent(Minifier::minify($asset->getContent(), $this->options));
        }
    }
}