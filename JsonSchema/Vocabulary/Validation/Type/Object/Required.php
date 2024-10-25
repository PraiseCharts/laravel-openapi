<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Vocabulary\Validation\Type\Object;

use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\SchemaProperty;
use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Vocabulary\Validation;

final readonly class Required implements SchemaProperty, Validation
{
    private function __construct(
        private array $properties,
    ) {
    }

    public static function create(string ...$property): self
    {
        return new self($property);
    }

    public static function keyword(): string
    {
        return 'required';
    }

    public function value(): array
    {
        return $this->properties;
    }
}
