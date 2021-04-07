<?php

declare(strict_types=1);

namespace Shop\Provider;

use Shop\Provider\Model\Category;

interface CategoryProviderInterface
{
    /**
     * @param string $resource
     * @return Category[]
     */
    public function provideCategories(string $resource): array;
}
