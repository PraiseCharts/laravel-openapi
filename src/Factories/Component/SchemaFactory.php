<?php

namespace MohammadAlavi\LaravelOpenApi\Factories\Component;

use GoldSpecDigital\ObjectOrientedOAS\Contracts\SchemaContract;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AllOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\AnyOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Not;
use GoldSpecDigital\ObjectOrientedOAS\Objects\OneOf;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use MohammadAlavi\LaravelOpenApi\Concerns\Referencable;

abstract class SchemaFactory
{
    use Referencable;

    /**
     * @return AllOf|OneOf|AnyOf|Not|Schema
     */
    abstract public function build(): SchemaContract;
}