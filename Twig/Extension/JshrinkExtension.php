<?php

namespace Salva\JshrinkBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\Container;
use Salva\JshrinkBundle\Twig\TokenParser\JshrinkTokenParser;
use Twig_Extension;

/**
 * Jshrink
 */
class JshrinkExtension extends Twig_Extension
{
    protected $container;
    protected $disableOnDebug;

    public function __construct(Container $container = null, $disableOnDebug = null)
    {
        $this->container = $container;
        $this->disableOnDebug = $disableOnDebug;
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
            new JshrinkTokenParser($this->container, $this->disableOnDebug),
        );
    }
}
