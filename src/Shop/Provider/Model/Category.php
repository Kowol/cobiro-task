<?php

namespace Shop\Provider\Model;

class Category
{
    public function __construct(
        public int $oldName,
        public int $newName,
    ) {
    }
}
