<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
    $container->parameters()->set('kernel.secret', 'phosphor');
    $container->services()->alias('public.twig', 'twig')->public();
};
