<?php

declare(strict_types=1);

namespace Shop\Provider;

use Shop\Provider\Model\ProductWithCategory;

interface CategorizedProductProviderInterface
{
    /**
     * @param string $productsResource
     * @param string $categoriesResource
     * @return ProductWithCategory[]
     */
    public function provide(string $productsResource, string $categoriesResource): array;
}
