<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Trash\Descriptors;

use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Vocabularies\Applicator;
use MohammadAlavi\ObjectOrientedJSONSchema\Review\TypeAware;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Descriptor;
use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Keyword;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Vocabularies\MetaData;
use MohammadAlavi\ObjectOrientedOpenAPI\Utilities\Generatable;

final class ConstantDescriptor extends Generatable implements Keyword, Descriptor, TypeAware
{
    private mixed $value;

    // TODO: It would be cool if constants could accept Schema types
    public static function create($value): self
    {
        $instance = new self();
        $instance->value = $value;
        $instance->metaData = MetaData::create();
        $instance->applicator = Applicator::create();

        return $instance;
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function is(string $type): bool
    {
        return $type === self::name();
    }

    public static function name(): string
    {
        return 'const';
    }

    protected function toArray(): array
    {
        return [
            self::name() => $this->value,
            ...$this->metaData->jsonSerialize(),
            ...$this->applicator->jsonSerialize(),
        ];
    }
}