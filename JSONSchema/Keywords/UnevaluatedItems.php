<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Keywords;

use MohammadAlavi\ObjectOrientedJSONSchema\BuilderInterface;
use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Keyword;

final readonly class UnevaluatedItems implements Keyword
{
    private function __construct(
        private BuilderInterface $schema,
    ) {
    }

    public static function create(BuilderInterface $schema): self
    {
        return new self($schema);
    }

    public static function name(): string
    {
        return 'unevaluatedItems';
    }

    public function value(): BuilderInterface
    {
        return $this->schema;
    }
}
