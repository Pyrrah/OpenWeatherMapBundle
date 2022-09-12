<?php

namespace Pyrrah\OpenWeatherMapBundle\Templating\Helper;

use Pyrrah\OpenWeatherMapBundle\Services\Client;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Templating\Helper\Helper;

/**
 * Symfony Helper for OpenWeatherMap. Uses Bundle\OpenWeatherMapBundle\Services\Client.
 *
 * @author Pierre-Yves Dick <hello@pierreyvesdick.fr>
 */
class OpenWeatherMapHelper extends Helper implements OpenWeatherMapHelperInterface
{
    /**
     * @var Pyrrah\OpenWeatherMapBundle\Services\Client
     */
    protected $client;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * Constructor.
     *
     * @param Client $client
     * @param RouterInterface|null $router
     */
    public function __construct(Client $client, RouterInterface $router = null)
    {
        $this->client = $client;
        $this->router = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function getWeather($city)
    {
        return $this->client->getWeather($city);
    }

    /**
     * Name of this Helper.
     *
     * @return string
     */
    public function getName()
    {
        return 'openweathermap';
    }
}
