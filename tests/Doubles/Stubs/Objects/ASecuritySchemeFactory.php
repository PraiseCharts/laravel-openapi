<?php

namespace Tests\Doubles\Stubs\Objects;

use MohammadAlavi\LaravelOpenApi\Factories\Component\SecuritySchemeFactory;
use MohammadAlavi\ObjectOrientedOAS\Objects\SecurityScheme;

class ASecuritySchemeFactory extends SecuritySchemeFactory
{
    public function build(): SecurityScheme
    {
        return SecurityScheme::create('ASecurityScheme');
    }
}