<?php

namespace Infrastructure\Provider;

use Shop\Provider\CategorizedProductProviderInterface;
use Shop\Provider\CategoryProviderInterface;
use Shop\Provider\Model\Category;
use Shop\Provider\Model\Product;
use Shop\Provider\Model\ProductWithCategory;
use Shop\Provider\ProductProviderInterface;

class JsonCategorizedProductProvider implements CategorizedProductProviderInterface
{
    public function __construct(
        private ProductProviderInterface $productProvider,
        private CategoryProviderInterface $categoryProvider,
    ) {
    }

    public function provide(string $productsResource, string $categoriesResource): array
    {
        $categories = $this->categoryProvider->provideCategories($categoriesResource);
        $products = $this->productProvider->provideProducts($productsResource);

        $categoriesIndexed = $this->indexCategories($categories);

        array_map(function (Product $product) use ($categoriesIndexed) : ProductWithCategory {
            $productCategory = $categoriesIndexed[$product->category];

            return new ProductWithCategory(
                $product,
                $productCategory
            );
        }, $products);
    }

    private function indexCategories(Category... $categories): array
    {
        $indexed = [];

        foreach ($categories as $category) {
            $indexed[$category->oldName] = $category;
        }

        return $indexed;
    }
}
