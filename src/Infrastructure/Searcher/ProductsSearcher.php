<?php

namespace Infrastructure\Searcher;

use Shop\Searcher\ProductSearcherInterface;
use Shop\Provider\Model\ProductWithCategory;

class ProductsSearcher implements ProductSearcherInterface
{
    public function filterProductsByPrice(array $products, int $minPrice): array
    {
        array_filter($products, fn (ProductWithCategory $productWithCategory) => $productWithCategory->product->price > $minPrice);
    }
}
