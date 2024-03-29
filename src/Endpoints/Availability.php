<?php

namespace Rezdy\Endpoints;

use Rezdy\Client;
use Rezdy\Interfaces\AvailabilityInterface;
use Rezdy\Interfaces\QueryInterface;

class Availability extends Client implements AvailabilityInterface
{
    /**
     * Create availability
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function create(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/availability';

        return $this;
    }

    /**
     * Update availability
     *
     * @param string $sessionId
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function update(string $sessionId): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/availability/' . $sessionId;

        return $this;
    }

    /**
     * Delete availability
     *
     * @param string $sessionId
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function delete(string $sessionId): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/availability/' . $sessionId;

        return $this;
    }

    /**
     * Search availability
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function search(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/availability';

        return $this;
    }

    /**
     * Create availability batch
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function createBatch(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/availability/batch';

        return $this;
    }

    /**
     * Update availability starting at
     *
     * @param string $productCode
     * @param string $startTimeLocal
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function updateStartingAt(string $productCode, string $startTimeLocal): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/availability/product/' . $productCode . '/startTimeLocal/' . $startTimeLocal;

        return $this;
    }

    /**
     * Delete availability starting at
     *
     * @param string $productCode
     * @param string $startTimeLocal
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function deleteStartingAt(string $productCode, string $startTimeLocal): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/availability/product/' . $productCode . '/startTimeLocal/' . $startTimeLocal;

        return $this;
    }

}
