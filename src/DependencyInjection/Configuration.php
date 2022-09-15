<?php

namespace Pyrrah\OpenWeatherMapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('pyrrah_openweathermap');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC for symfony/config < 4.2
            $rootNode = $treeBuilder->root('pyrrah_openweathermap');
        }

        $rootNode
            ->children()
                ->scalarNode('appid')->defaultValue('your_appid')->info('Unique API key given by OpenWeatherMap')->end()
                ->scalarNode('api_url')->defaultValue('https://api.openweathermap.org/data/2.5/')->info('URL API of OpenWeatherMap')->end()
                ->scalarNode('units')->defaultValue('metric')->info('Unit of measure: standard/metric/imperial')->end()
                ->scalarNode('lang')->defaultValue('en')->info('Display language')->end()
            ->end();

        return $treeBuilder;
    }
}
