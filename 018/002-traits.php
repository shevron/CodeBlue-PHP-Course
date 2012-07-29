<?php

use Zend\Config\Config;

/**
 * PHP 5.4 Traits
 */

trait Configurable
{
    /**
     * Configuration object
     *
     * @var Zend\Config\Config
     */
    protected $config = null;

    /**
     * Set the configuration object
     *
     * @var Zend\Config\Config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * Get the configuration object, or create an empty one if not set
     *
     * @return Zend\Config\Config
     */
    public function getConfig()
    {
        if (! $this->config) {
            $this->config = new Config();
        }

        return $this->config;
    }
}

class HttpClient
{
    use Configurable;

    public function get($url)
    {
        $keepAlive = $this->getConfig()->get('keepalive');
        // ...
    }
}

class DatabaseConnection
{
    use Configurable;

    public function query($sql)
    {
        $dbHostname = $this->getConfig()->get('hostname');
        // ...
    }
}

// We can now use Configurable methods on both class objects
$client = new HttpClient();
$client->setConfig($config);
