<?php

use Hazadam\Phosphor\TwigParser\ComponentTokenParser;
use Hazadam\Phosphor\TwigParser\MaskTokenParser;
use Hazadam\Phosphor\TwigParser\PropsTokenParser as PropsTokenParserAlias;
use Hazadam\PhosphorBundle\DependencyInjection\Compiler\TokenParserPass;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container) {
    $services = $container->services();
    $services
        ->set('phosphor.twig.token_parser.props', PropsTokenParserAlias::class)
        ->private()
        ->tag(TokenParserPass::TAG)
    ;
    $services
        ->set('phosphor.twig.token_parser.mask', MaskTokenParser::class)
        ->private()
        ->tag(TokenParserPass::TAG)
    ;
    $services
        ->set('phosphor.twig.token_parser.component', ComponentTokenParser::class)
        ->private()
        ->tag(TokenParserPass::TAG)
    ;
};
