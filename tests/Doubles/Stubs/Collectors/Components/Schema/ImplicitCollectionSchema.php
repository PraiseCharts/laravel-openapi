<?php

namespace Tests\Doubles\Stubs\Collectors\Components\Schema;

use MohammadAlavi\LaravelOpenApi\Contracts\Abstract\Factories\Components\ReusableSchemaFactory;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Descriptor;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Properties\Property;
use MohammadAlavi\ObjectOrientedJSONSchema\Review\Schema;

class ImplicitCollectionSchema extends ReusableSchemaFactory
{
    public function build(): Descriptor
    {
        return Schema::object()
            ->properties(
                Property::create(
                    'id',
                    Schema::integer(),
                ),
            );
    }
}
