<?php

namespace Tests\Doubles\Stubs\Tags;

use MohammadAlavi\LaravelOpenApi\Factories\TagFactory;
use MohammadAlavi\ObjectOrientedOAS\Objects\Tag;

class TagEmptyStringName extends TagFactory
{
    public function build(): Tag
    {
        return Tag::create()
            ->name('')
            ->description('Post Tag');
    }
}