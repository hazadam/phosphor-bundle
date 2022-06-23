<?php

namespace Hazadam\PhosphorBundle\Tests;

use Hazadam\Phosphor\TwigParser\ComponentTokenParser;
use Hazadam\Phosphor\TwigParser\MaskTokenParser;
use Hazadam\Phosphor\TwigParser\PropsTokenParser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Twig\Environment;

final class BundleTest extends WebTestCase
{
    public function testTwigExtensionsRegistration(): void
    {
        $kernel = self::createKernel();
        $kernel->boot();

        /** @var Environment $twig */
        $twig = $kernel->getContainer()->get('public.twig');
        $extensions = $twig->getTokenParsers();

        $this->assertArrayHasKey('vue', $extensions, 'Vue token parser is not registered');
        $this->assertArrayHasKey('mask', $extensions, 'Mask token parser is not registered');
        $this->assertArrayHasKey('props', $extensions, 'Props extension is not registered');

        $this->assertInstanceOf(ComponentTokenParser::class, $extensions['vue']);
        $this->assertInstanceOf(MaskTokenParser::class, $extensions['mask']);
        $this->assertInstanceOf(PropsTokenParser::class, $extensions['props']);
    }
}
