<?php

namespace Rezdi\Endpoints;

use Rezdi\Client;

class Products extends Client
{
    /**
     * Get product
     *
     * @param int $productCode
     *
     * @return $this
     */
    public function __invoke(string $productCode)
    {
        $this->productCode = $productCode;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products/' . $productCode;

        return $this;
    }

    // Create product
    public function create()
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/products';

        return $this;
    }

    // Update product
    public function update()
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/products/' . $this->productCode;

        return $this;
    }

    // Delete product
    public function delete()
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/products/' . $this->productCode;

        return $this;
    }

    /**
     * Search products
     *
     * @return $this
     */
    public function search(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products';

        return $this;
    }

    // Search marketplace products
    public function searchMarketplace()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products/marketplace';

        return $this;
    }

    // Get product pickups
    public function getPickups()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/products/' . $this->productCode . '/pickups';

        return $this;
    }

    // Add product image
    public function getImages()
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/products/' . $this->productCode . '/images';

        return $this;
    }

    // Remove product Image
    public function getImage(string $mediaId)
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/products/' . $this->productCode . '/images/' . $mediaId;

        return $this;
    }

}
