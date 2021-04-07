<?php

namespace App;

use Shop\Provider\CategorizedProductProviderInterface;
use Shop\Provider\Model\ProductWithCategory;
use Shop\Searcher\ProductSearcherInterface;

class CategorizedProductsProvider
{
    public function __construct(
        private CategorizedProductProviderInterface $categorizedProductProvider,
        private ProductSearcherInterface $searcher,
        private int $minPrice = 100
    ) {

    }

    /**
     * @return ProductWithCategory[]
     */
    public function provide(string $productsResource, string $categoriesResource): array
    {
        $categorizedProducts = $this->categorizedProductProvider->provide($productsResource, $categoriesResource);
        return $this->searcher->filterProductsByPrice($categorizedProducts, $this->minPrice);
    }
}
