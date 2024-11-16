<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Keywords;

use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Keyword;

final readonly class Enum implements Keyword
{
    private function __construct(
        private array $values,
    ) {
    }

    // TODO: It would be cool if enums could accept Constant or/and Schema types
    public static function create(...$value): self
    {
        return new self($value);
    }

    public static function name(): string
    {
        return 'enum';
    }

    public function value(): array
    {
        return $this->values;
    }
}