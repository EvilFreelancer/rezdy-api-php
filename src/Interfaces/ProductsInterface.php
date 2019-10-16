<?php

namespace Rezdi\Interfaces;

interface ProductsInterface
{
    /**
     * Create product
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function create(): QueryInterface;

    /**
     * Search products
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function search(): QueryInterface;

    /**
     * Search marketplace products
     *
     * @return \Rezdi\Interfaces\QueryInterface
     */
    public function searchMarketplace(): QueryInterface;
}
