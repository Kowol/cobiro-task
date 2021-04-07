<?php

namespace Infrastructure\Provider;

use Shop\Provider\Model\Category;
use Shop\Provider\CategoryProviderInterface;

class JsonCategoryProvider implements CategoryProviderInterface
{
    public function provideCategories(string $resource = 'https://cobiro-com.s3-eu-west-1.amazonaws.com/categories.json'): array
    {
        // Use better client like guzzle, handle exceptions etc
        $categories = json_decode(file_get_contents($resource));

        // Use deserialize instead
        return array_map(function (array $data): Category {
            return new Category(
                $data['old'],
                $data['new'],
            );
        }, $categories['categories']);
    }
}
