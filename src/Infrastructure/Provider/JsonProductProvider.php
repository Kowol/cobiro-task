<?php

namespace Infrastructure\Provider;

use Shop\Provider\Model\Product;
use Shop\Provider\ProductProviderInterface;

class JsonProductProvider implements ProductProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function provideProducts(string $resource = 'https://cobiro-com.s3-eu-west-1.amazonaws.com/products.json'): array
    {
        // Use better client like guzzle, handle exceptions etc
        $categories = json_decode(file_get_contents($resource));

        // Use deserialize instead
        return array_map(function (array $data): Product {

            [$price, $currency] = explode(' ', $data['price']);

            return new Product(
                $data['id'],
                $data['title'],
                $data['category'],
                (int) $price,
                $currency,
            );
        }, $categories['products']);
    }
}
