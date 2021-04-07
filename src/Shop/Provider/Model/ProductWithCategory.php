<?php

namespace Shop\Provider\Model;

class ProductWithCategory
{
    public function __construct(
        public Product $product,
        public Category $category,
    ) {

    }
}
