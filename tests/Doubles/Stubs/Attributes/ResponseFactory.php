<?php

namespace Tests\Doubles\Stubs\Attributes;

use MohammadAlavi\LaravelOpenApi\Factories\Component\ResponseFactory as AbstractFactory;
use MohammadAlavi\ObjectOrientedOAS\Objects\Response;

class ResponseFactory extends AbstractFactory
{
    public function build(): Response
    {
        return Response::create();
    }
}