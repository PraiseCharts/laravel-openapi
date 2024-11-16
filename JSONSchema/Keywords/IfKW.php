<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Keywords;

use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Builder\Builder;
use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Keyword;

final readonly class IfKW implements Keyword
{
    private function __construct(
        private Builder $builder,
    ) {
    }

    public static function create(Builder $builder): self
    {
        return new self($builder);
    }

    public static function name(): string
    {
        return 'if';
    }

    public function value(): Builder
    {
        return $this->builder;
    }
}