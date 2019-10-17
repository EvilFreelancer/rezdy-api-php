<?php

namespace Rezdy\Interfaces;

interface ProductInterface
{
    /**
     * Update product
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function update(): QueryInterface;

    /**
     * Delete product
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function delete(): QueryInterface;

    /**
     * Get product pickups
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function getPickups(): QueryInterface;

    /**
     * Add product image
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function createImage(): QueryInterface;

    /**
     * Remove product Image
     *
     * @param string $mediaId
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function getImage(string $mediaId): QueryInterface;
}
