<?php

namespace Rezdy;

use ErrorException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Rezdy\Exceptions\EmptyResults;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    https://drteam.rocks
 * @license MIT
 * @package Rezdy
 */
trait HttpTrait
{
    /**
     * Initial state of some variables
     *
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Object of main config
     *
     * @var \Rezdy\Config
     */
    protected $config;

    /**
     * Request executor with timeout and repeat tries
     *
     * @param string $type   Request method
     * @param string $url    endpoint url
     * @param mixed  $params List of parameters
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     */
    private function repeatRequest($type, $url, $params): ?ResponseInterface
    {
        $type = strtoupper($type);

        for ($i = 1; $i < $this->config->get('tries'); $i++) {

            if ($params === null) {
                // Execute the request to server
                $result = $this->client->request($type, $this->config->get('base_uri') . $url);
            } else {
                // Execute the request to server
                $result = $this->client->request($type, $this->config->get('base_uri') . $url, [RequestOptions::FORM_PARAMS => $params->toArray()]);
            }

            // Check the code status
            $code   = $result->getStatusCode();
            $reason = $result->getReasonPhrase();

            // If success response from server
            if ($code === 200 || $code === 201) {
                return $result;
            }

            // If not "too many requests", then probably some bug on remote or our side
            if ($code !== 429) {
                throw new ErrorException($code . ' ' . $reason);
            }

            // Waiting in seconds
            sleep($this->config->get('seconds'));
        }

        // Return false if loop is done but no answer from server
        return null;
    }

    /**
     * Execute request and return response
     *
     * @return null|object Array with data or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     * @throws \Rezdy\Exceptions\EmptyResults
     */
    public function exec()
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params);
    }

    /**
     * Execute query and return RAW response from remote API
     *
     * @return null|\Psr\Http\Message\ResponseInterface RAW response or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     * @throws \Rezdy\Exceptions\EmptyResults
     */
    public function raw(): ?ResponseInterface
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params, true);
    }

    /**
     * Make the request and analyze the result
     *
     * @param string $type     Request method
     * @param string $endpoint Api request endpoint
     * @param mixed  $params   List of parameters
     * @param bool   $raw      Return data in raw format
     *
     * @return null|object|ResponseInterface Array with data, RAW response or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     * @throws \Rezdy\Exceptions\EmptyResults
     */
    private function doRequest($type, $endpoint, $params = null, bool $raw = false)
    {
        // Null by default
        $response = null;

        // Execute the request to server
        $result = $this->repeatRequest($type, $endpoint, $params);

        if (null === $result) {
            throw new EmptyResults('Empty results returned from Rezdy API');
        }

        // Return RAW result if required
        return $raw ? $result : json_decode($result->getBody(), false);
    }

}
