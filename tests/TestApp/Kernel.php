<?php

namespace Hazadam\PhosphorBundle\Tests\TestApp;

use Hazadam\PhosphorBundle\PhosphorBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel as SymfonyKernel;

class Kernel extends SymfonyKernel
{
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__.'/framework.php');
    }

    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new PhosphorBundle();
        yield new TwigBundle();
    }
}
