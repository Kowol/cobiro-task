<?php

declare(strict_types=1);

namespace Shop\Provider;

use Shop\Provider\Model\Product;

interface ProductProviderInterface
{
    /**
     * @param string $resource
     * @return Product[]
     */
    public function provideProducts(string $resource): array;
}
