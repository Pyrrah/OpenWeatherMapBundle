<?php

namespace Pyrrah\OpenWeatherMapBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Pyrrah\OpenWeatherMapBundle\Templating\Helper\OpenWeatherMapHelperInterface as OWMHelperInterface;

/**
 * @author Pierre-Yves Dick <hello@pierreyvesdick.fr>
 */
class OpenWeatherMapExtension extends AbstractExtension implements OWMHelperInterface
{
    /**
     * @var OpenWeatherMapHelperInterface
     */
    protected $baseHelper;

    /**
     * @param GravatarHelperInterface $helper
     */
    public function __construct(OWMHelperInterface $helper)
    {
        $this->baseHelper = $helper;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return array(
            new TwigFunction('openweathermap', array($this, 'getWeather')),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getWeather($city)
    {
        return $this->baseHelper->getWeather($city);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pyrrah_openweathermap';
    }
}
