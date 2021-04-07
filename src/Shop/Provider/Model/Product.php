<?php

namespace Shop\Provider\Model;

class Product
{
    public function __construct(
        public int $id,
        public string $title,
        public string $category,
        public int $price,
        public string $currency,
    ) {
    }
}
