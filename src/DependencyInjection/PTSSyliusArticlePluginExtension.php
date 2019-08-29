<?php

declare(strict_types=1);

namespace PTS\SyliusArticlePlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class PTSSyliusArticlePluginExtension extends AbstractResourceExtension
{
    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

//        $this->registerResources('pts_sylius_article_plugin', $config['driver'], $config['resources'], $container);
        $this->registerResources('pts_sylius_article_plugin', $config['driver'], [], $container);

//        $configFiles = [
//            'services.yml',
//        ];
//
//        foreach ($configFiles as $configFile) {
//            $loader->load($configFile);
//        }
        $loader->load('services.yaml');
    }
}
