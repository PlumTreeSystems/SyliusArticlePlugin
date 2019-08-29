<?php

declare(strict_types=1);

namespace PTS\SyliusArticlePlugin\DependencyInjection;

use PTS\SyliusArticlePlugin\Form\Type\ArticleType;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('pts_sylius_article_plugin');
        if (\method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('pts_sylius_article_plugin');
        }

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end()
        ;

//        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }
}


//    /**
//     * @param ArrayNodeDefinition $node
//     */
//    private function addResourcesSection(ArrayNodeDefinition $node)
//    {
//        $node
//            ->children()
//                ->arrayNode('resources')
//                    ->addDefaultsIfNotSet()
//                    ->children()
//                        ->arrayNode('article')
//                            ->addDefaultsIfNotSet()
//                            ->children()
//                                ->variableNode('options')->end()
//                                ->arrayNode('classes')
//                                    ->addDefaultsIfNotSet()
//                                    ->children()
//                                        ->scalarNode('model')->defaultValue(\PTS\SyliusArticlePlugin\Entity\Article::class)->cannotBeEmpty()->end()
//                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
//                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
//                                        ->scalarNode('form')->defaultValue(ArticleType::class)->cannotBeEmpty()->end()
//                                    ->end()
//                                ->end()
//                            ->end()
//                        ->end()
//                        ->arrayNode('category')
//                            ->addDefaultsIfNotSet()
//                            ->children()
//                                ->variableNode('options')->end()
//                                ->arrayNode('classes')
//                                    ->addDefaultsIfNotSet()
//                                    ->children()
//                                        ->scalarNode('model')->defaultValue(\PTS\SyliusArticlePlugin\Entity\Category::class)->cannotBeEmpty()->end()
//                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
//                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
//                                    ->end()
//                                ->end()
//                            ->end()
//                        ->end()
//                    ->end()
//                ->end()
//            ->end()
//        ->end()
//        ;
//    }
