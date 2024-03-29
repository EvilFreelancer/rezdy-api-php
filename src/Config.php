<?php

namespace Rezdy;

use ErrorException;

class Config
{
    /**
     * List of allowed parameters
     */
    public const ALLOWED = [
        'api_key',
        'proxy',
        'base_uri',
        'user_agent',
        'timeout',
        'tries',
        'seconds',
        'debug',
        'track_redirects'
    ];

    /**
     * List of minimal required parameters
     */
    public const REQUIRED = [
        'user_agent',
        'base_uri',
        'timeout',
        'api_key',
    ];

    /**
     * List of configured parameters
     *
     * @var array
     */
    private $_parameters;

    /**
     * Config constructor.
     *
     * @param array $parameters List of parameters which can be set on object creation stage
     *
     * @throws \ErrorException
     */
    public function __construct(array $parameters = [])
    {
        // Set default parameters of client
        $this->_parameters = [
            // Errors must be disabled by default, because we need to get error codes
            // @link http://docs.guzzlephp.org/en/stable/request-options.html#http-errors
            'http_errors'     => false,

            // Wrapper settings
            'tries'           => 2,  // Count of tries
            'seconds'         => 10, // Waiting time per each try

            // Optional parameters
            'debug'           => false,
            'track_redirects' => false,

            // Main parameters
            'timeout'         => 20,
            'user_agent'      => 'Rezdy PHP Client',
            'base_uri'        => 'https://api.rezdy.com/v1'
        ];

        // Overwrite parameters by client input
        foreach ($parameters as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Magic setter parameter by name
     *
     * @param string               $name  Name of parameter
     * @param string|bool|int|null $value Value of parameter
     *
     * @throws \ErrorException
     */
    public function __set(string $name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Check if parameter if available
     *
     * @param string $name Name of parameter
     *
     * @return bool
     */
    public function __isset($name): bool
    {
        return isset($this->_parameters[$name]);
    }

    /**
     * Get parameter via magic call
     *
     * @param string $name Name of parameter
     *
     * @return bool|int|string|null
     * @throws ErrorException
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * Remove parameter from array
     *
     * @param string $name Name of parameter
     */
    public function __unset($name)
    {
        unset($this->_parameters[$name]);
    }

    /**
     * Set parameter by name
     *
     * @param string               $name  Name of parameter
     * @param string|bool|int|null $value Value of parameter
     *
     * @return $this
     * @throws ErrorException
     */
    public function set(string $name, $value): self
    {
        if (!in_array($name, self::ALLOWED, false)) {
            throw new ErrorException("Parameter \"$name\" is not in available list [" . implode(',', self::ALLOWED) . ']');
        }

        // Add parameters into array
        $this->_parameters[$name] = $value;
        return $this;
    }

    /**
     * Get available parameter by name
     *
     * @param string $name Name of parameter
     *
     * @return bool|int|string|null
     * @throws ErrorException
     */
    public function get(string $name)
    {
        if (!isset($this->_parameters[$name])) {
            throw new ErrorException("Parameter \"$name\" is not in set");
        }

        return $this->_parameters[$name];
    }

    /**
     * Get all available parameters
     *
     * @return array
     */
    public function all(): array
    {
        return $this->_parameters;
    }

    /**
     * Return all ready for Guzzle parameters
     *
     * @return array
     * @throws ErrorException
     */
    public function guzzle(): array
    {
        $options = [
            // 'base_uri'        => $this->get('base_uri'), // By some reasons base_uri option is not work anymore
            'timeout'         => $this->get('timeout'),
            'track_redirects' => $this->get('track_redirects'),
            'debug'           => $this->get('debug'),
            'headers'         => [
                'User-Agent' => $this->get('user_agent'),
                'apiKey'     => $this->get('api_key'),
            ]
        ];

        // Proxy is optional
        if (isset($this->proxy)) {
            $options['proxy'] = $this->proxy;
        }

        return $options;
    }
}
