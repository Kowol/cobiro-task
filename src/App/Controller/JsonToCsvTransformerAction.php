<?php

namespace App\Controller;

use App\CategorizedProductsProvider;

class JsonToCsvTransformerAction // todo use some adr abstract
{
    // use request from framework
    public function __invoke(/* Request */ $request, CategorizedProductsProvider $categorizedProductsProvider)
    {
        // Get request input
        $productsEndpoint = 'https://cobiro-com.s3-eu-west-1.amazonaws.com/products.json';
        $categoriesEndpoint = 'https://cobiro-com.s3-eu-west-1.amazonaws.com/categories.json';

        $categorizedProducts = $categorizedProductsProvider->provide($productsEndpoint, $categoriesEndpoint);
        // ->transform
        // return binary csv to download


    }
}
