<?php

/**
 * Implementation of a factory method
 *
 * This example shows a factory class / method for PDO objects, simplifying
 * the PDO object creation process using an array of configuration which
 * could be read from file
 *
 */

abstract class PDOFactory
{
    /**
     * A factory method for PDO objects, accepting a configuration array
     *
     * @param  array $config
     * @throws Exception
     * @return PDO
     */
    static public function factory(array $config)
    {
        $config = self::filterConfiguration($config);
        var_dump($config);
        if (! isset($config['adapter'])) {
            throw new Exception("No adapter provided in configuration object");
        }

        $adapter = strtolower($config['adapter']);
        unset($config['adapter']);

        switch($adapter) {
            case 'mysql':
            case 'ibm':
            case 'oci':
                $dsn = "$adapter:";
                break;

            case 'sqlite':
                // SQLite needs futher treatment
                $dsn = "$adapter:";
                if (isset($config['dbname'])) {
                    $dsn .= $config['dbname'];
                    unset($config['dbname']);
                }
                break;

            default:
                throw new Exception("Adapter of type $adapter is unknown");
        }

        $username = null;
        $password = null;

        if (isset($config['username'])) {
            $username = $config['username'];
            unset($config['username']);
        }

        if (isset($config['password'])) {
            $password = $config['password'];
            unset($config['password']);
        }

        foreach ($config as $key => $value) {
            $dsn .= $key . '=' . $value . ';';
        }

        rtrim($dsn, ';');

        return new PDO($dsn, $username, $password);
    }

    /**
     * Filter the configuration array, returning only relevant info
     *
     * @param  array $config
     * @return array
     */
    static protected function filterConfiguration(array $config)
    {
        foreach($config as $key => $value) {
            if (substr($key, 0, 3) == 'db.') {
                $config[substr($key, 3)] = $value;
            }
            unset($config[$key]);
        }

        return $config;
    }
}

// Now we can create PDO objects based on simple configuration files
$environment = getenv('APPLICATION_ENV') ?: 'production';
$config = parse_ini_file('config.ini', true);

if (isset($config[$environment])) {
    $config = $config[$environment];
} else {
    throw new Exception("Configuration file does not define settings for environment $environment");
}

$pdo = PDOFactory::factory($config);
