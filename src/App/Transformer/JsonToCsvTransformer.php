<?php

namespace App\Transformer;

use Shop\Provider\Model\ProductWithCategory;

class JsonToCsvTransformer // interface
{
    public function transform(ProductWithCategory ...$products)
    {
        // Use some better package for transforming
        $handler = fopen('php://output', 'w');
        fputcsv($handler, ['ID', 'Title', 'Category', 'Price']);

        foreach ($products as $product) {
//            fputcsv($handler, )
        }
    }
}
