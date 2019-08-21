<?php

declare(strict_types=1);

namespace PTS\SyliusBlogPlugin;

use PTS\SyliusBlogPlugin\DependencyInjection\PTSSyliusBlogPluginExtension;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\ResourceBundleInterface;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

final class PTSSyliusBlogPlugin extends AbstractResourceBundle
{
    use SyliusPluginTrait;

    protected $mappingFormat = ResourceBundleInterface::MAPPING_YAML;

    /**
     * {@inheritdoc}
     */
    public function getSupportedDrivers(): array
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getModelNamespace(): ?string
    {
        return 'PTS\SyliusBlogPlugin\Entity';
    }

    public function getContainerExtension()
    {
        return new PTSSyliusBlogPluginExtension();
    }
}
