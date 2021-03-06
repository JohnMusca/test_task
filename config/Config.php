<?php

namespace Config;

use Libs\Interfaces\SingletonInterface;

class Config implements SingletonInterface
{   
    /**
    * @var string Username.
    */
    private static $username = '';
    
    /**
     * @var string Password.
     */
    private static $password = '';
    
    /**
     * @var string DB_url.
     */
    private static $api_key = '11c965bd582f1a12acefcc4cf8bd365a-us13';
    
    /**
     * @var Config The current running instance of the object.
     */
    private static $instance;
    
    private function __construct()
    {
        
    }
    
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) 
        {
            static::$instance = new static();
        }
        
        return static::$instance;
    }
    
    /**
     * Private clone method to prevent cloning of the instance of the *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    
    }
    
    /**
     * Private unserialize method to prevent unserializing of the *Singleton* instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    
    }
    
    /**
     * Magic method, get.
     * 
     * @param string $name The name of the private variable to access.$this
     * 
     * @return Mixed The value of the variable accessed or false.
     */
    public function __get($name)
    {
        return (isset(SELF::$$name) ? SELF::$$name : false);
    }
}