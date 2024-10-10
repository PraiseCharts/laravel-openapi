<?php

namespace MohammadAlavi\LaravelOpenApi\Contracts\Interface\Factories\Components;

use MohammadAlavi\LaravelOpenApi\Collections\Parameters;
use MohammadAlavi\LaravelOpenApi\Contracts\Interface\Factories\ComponentFactory;

interface ParametersFactory extends ComponentFactory
{
    public function build(): Parameters;
}
