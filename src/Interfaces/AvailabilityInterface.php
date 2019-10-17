<?php

namespace Rezdy\Interfaces;

interface AvailabilityInterface
{
    /**
     * Create availability
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function create(): QueryInterface;

    /**
     * Update availability
     *
     * @param string $sessionId
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function update(string $sessionId): QueryInterface;

    /**
     * Delete availability
     *
     * @param string $sessionId
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function delete(string $sessionId): QueryInterface;

    /**
     * Search availability
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function search(): QueryInterface;

    /**
     * Create availability batch
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function createBatch(): QueryInterface;

    /**
     * Update availability starting at
     *
     * @param string $productCode
     * @param string $startTimeLocal
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function updateStartingAt(string $productCode, string $startTimeLocal): QueryInterface;

    /**
     * Delete availability starting at
     *
     * @param string $productCode
     * @param string $startTimeLocal
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function deleteStartingAt(string $productCode, string $startTimeLocal): QueryInterface;
}
