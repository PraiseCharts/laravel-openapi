<?php

namespace MohammadAlavi\LaravelOpenApi\Factories;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Parameter;
use MohammadAlavi\LaravelOpenApi\Concerns\Referencable;

abstract class ParametersFactory
{
    use Referencable;

    /**
     * @return Parameter[]
     */
    abstract public function build(): array;
}
