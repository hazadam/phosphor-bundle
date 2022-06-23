<?php

namespace Hazadam\PhosphorBundle;

use Hazadam\PhosphorBundle\DependencyInjection\Compiler\TokenParserPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class PhosphorBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new TokenParserPass());
    }
}
