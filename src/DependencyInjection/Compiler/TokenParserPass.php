<?php

namespace Hazadam\PhosphorBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class TokenParserPass implements CompilerPassInterface
{
    public const TAG = 'phosphor.twig.token_parser';

    public function process(ContainerBuilder $container): void
    {
        $tokenParsers = array_keys($container->findTaggedServiceIds(self::TAG));
        $twigDefinition = $container->getDefinition('twig');
        array_walk($tokenParsers, function (string $parserId) use ($twigDefinition): void {
            $twigDefinition->addMethodCall('addTokenParser', [new Reference($parserId)]);
        });
    }
}
