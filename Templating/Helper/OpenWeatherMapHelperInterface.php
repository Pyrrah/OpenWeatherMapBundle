<?php

namespace Pyrrah\OpenWeatherMapBundle\Templating\Helper;

interface OpenWeatherMapHelperInterface
{
    /**
     * Returns weather for a city given.
     *
     * @param string $city
     *
     * @return string
     */
    public function getWeather($city);
}
