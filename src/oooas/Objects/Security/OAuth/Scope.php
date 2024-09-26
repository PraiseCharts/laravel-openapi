<?php

namespace MohammadAlavi\LaravelOpenApi\oooas\Objects\Security\OAuth;

use MohammadAlavi\ObjectOrientedOAS\Utilities\Arr;

final readonly class Scope
{
    private function __construct(
        public string $name,
        public string $description,
    ) {
    }

    public static function create(string $name, string $description): static
    {
        return new self($name, $description);
    }

    public function toArray(): array
    {
        return Arr::filter([
            $this->name => $this->description,
        ]);
    }
}