<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Keywords;

use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Keyword;
use MohammadAlavi\ObjectOrientedJSONSchema\Formats\DefinedFormat;

// TODO: Improve how formats are implemented and also used by the end user
// Current usage is awkward and not user friendly
// Also try not to use Enum if possible
final readonly class Format implements Keyword
{
    private function __construct(
        private DefinedFormat $definedFormat,
    ) {
    }

    public static function create(DefinedFormat $definedFormat): self
    {
        return new self($definedFormat);
    }

    public static function name(): string
    {
        return 'format';
    }

    public function value(): string
    {
        return $this->definedFormat->value();
    }
}