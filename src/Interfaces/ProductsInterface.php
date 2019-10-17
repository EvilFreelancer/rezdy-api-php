<?php

namespace Rezdy\Interfaces;

interface ProductsInterface
{
    /**
     * Create product
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function create(): QueryInterface;

    /**
     * Search products
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function search(): QueryInterface;

    /**
     * Search marketplace products
     *
     * @return \Rezdy\Interfaces\QueryInterface
     */
    public function searchMarketplace(): QueryInterface;
}
