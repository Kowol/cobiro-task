<?php

namespace Shop\Searcher;

use Shop\Provider\Model\ProductWithCategory;

interface ProductSearcherInterface
{
    /**
     * @param ProductWithCategory[] $products
     * @param int $minPrice
     * @return ProductWithCategory[]
     */
    public function filterProductsByPrice(array $products, int $minPrice): array;
}
