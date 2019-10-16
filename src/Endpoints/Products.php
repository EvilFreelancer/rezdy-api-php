<?php

namespace Rezdi\Endpoints;

use Rezdi\Client;
use Rezdi\Interfaces\ProductInterface;
use Rezdi\Interfaces\ProductsInterface;
use Rezdi\Interfaces\QueryInterface;

class Products extends Client implements ProductInterface, ProductsInterface
{
    /**
     * Get product
     *
     * @param int $productCode
     *
     * @return QueryInterface
     */
    public function __invoke(string $productCode): ProductInterface
    {
        $this->productCode = $productCode;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products/' . $productCode;

        return $this;
    }

    /**
     * Create product
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function create(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/products';

        return $this;
    }

    /**
     * Update product
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function update(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/products/' . $this->productCode;

        return $this;
    }

    /**
     * Delete product
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function delete(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/products/' . $this->productCode;

        return $this;
    }

    /**
     * Search products
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function search(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products';

        return $this;
    }

    /**
     * Search marketplace products
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function searchMarketplace(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products/marketplace';

        return $this;
    }

    /**
     * Get product pickups
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function getPickups(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products/' . $this->productCode . '/pickups';

        return $this;
    }

    /**
     * Add product image
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function createImage(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/products/' . $this->productCode . '/images';

        return $this;
    }

    /**
     * Remove product Image
     *
     * @param string $mediaId
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function getImage(string $mediaId): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/products/' . $this->productCode . '/images/' . $mediaId;

        return $this;
    }

}
