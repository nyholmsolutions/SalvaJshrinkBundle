<?php

namespace Salva\JshrinkBundle\Twig\Extension;

use Salva\JshrinkBundle\Twig\TokenParser\JshrinkTokenParser;
use Twig_Extension;

/**
 * Jshrink
 */
class JshrinkExtension extends Twig_Extension
{
    protected $options;

    public function __construct($options = array())
    {
        $this->options = $options;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'jshrink_extension';
    }

    /**
     * {@inheritDoc}
     */
    public function getTokenParsers()
    {
        return array(
            new JshrinkTokenParser($this->options),
        );
    }
}
