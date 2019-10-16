<?php

namespace Rezdi\Interfaces;

interface ProductInterface
{
    /**
     * Update product
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function update(): QueryInterface;

    /**
     * Delete product
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function delete(): QueryInterface;

    /**
     * Get product pickups
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function getPickups(): QueryInterface;

    /**
     * Add product image
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function createImage(): QueryInterface;

    /**
     * Remove product Image
     *
     * @param string $mediaId
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function getImage(string $mediaId): QueryInterface;
}
