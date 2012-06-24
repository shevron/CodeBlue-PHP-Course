<?php

/**
 * Example of a Singleton implementation
 *
 * This class encapsulate's PHP's session functionality in a single object
 */

class Session
{
    static private $instance = null;

    private $vars = array();

    /**
     * Get the session object instance
     *
     * @return Session
     */
    static public function getInstance()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * The Session constructor is private and cannot be called directly
     *
     */
    private function __construct()
    {
        session_start();
        $this->vars = $_SESSION;
    }

    /**
     * Session objects cannot be cloned
     *
     * @throws Exception
     */
    private function __clone()
    {
        throw new Exception("This object cannot be cloned");
    }

    /**
     * Get a session variable
     *
     * @param  string $var
     * @param  mixed $default
     * @return mixed
     */
    public function get($var, $default = null)
    {
        if (isset($this->vars[$var])) {
            return $this->vars[$var];
        } else {
            return $default;
        }
    }

    /**
     * Set a session variable
     *
     * @param  string $var
     * @param  mixed  $value
     * @return Session
     */
    public function set($var, $value)
    {
        $this->vars[$var] = $value;
        return $this;
    }

    /**
     * Regenerate the session ID
     *
     */
    public function regenerateId()
    {
        session_regenerate_id(true);
    }

    public function __get($var)
    {
        return $this->get($var);
    }

    public function __set($var, $value)
    {
        return $this->set($var, $value);
    }
}

$sessionA = Session::getInstance();
$sessionB = Session::getInstance();

// This should return TRUE - both are the same object instance
var_dump($sessionA === $sessionB);

// This will cause a FATAL error - the constructor is private
$sessionC = new Session();

// This will cause a FATAL error - __clone is private
$sessionC = clone $sessionA;

