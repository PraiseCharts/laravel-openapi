<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Trash\Descriptors;

use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Vocabularies\Applicator;
use MohammadAlavi\ObjectOrientedJSONSchema\Review\TypeAware;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Descriptor;
use MohammadAlavi\ObjectOrientedJSONSchema\Formats\StringFormat;
use MohammadAlavi\ObjectOrientedJSONSchema\Review\HasTypeTrait;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Format;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MaxLength;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MinLength;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Pattern;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Type;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\Vocabularies\MetaData;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\ExtensibleObject;
use MohammadAlavi\ObjectOrientedOpenAPI\Utilities\Arr;

final class StringDescriptor extends ExtensibleObject implements Descriptor, TypeAware
{
    use HasTypeTrait;

    private MaxLength|null $maxLength = null;
    private MinLength|null $minLength = null;
    private Pattern|null $pattern = null;
    private Format|null $format = null;

    public function format(StringFormat $format): self
    {
        $clone = clone $this;

        $clone->format = Format::create($format);

        return $clone;
    }

    public static function create(): self
    {
        $instance = new self();
        $instance->type = Type::string();
        $instance->metaData = MetaData::create();
        $instance->applicator = Applicator::create();

        return $instance;
    }

    public function maxLength(int $value): self
    {
        $clone = clone $this;

        $clone->maxLength = MaxLength::create($value);

        return $clone;
    }

    public function minLength(int $value): self
    {
        $clone = clone $this;

        $clone->minLength = MinLength::create($value);

        return $clone;
    }

    public function pattern(string $value): self
    {
        $clone = clone $this;

        $clone->pattern = Pattern::create($value);

        return $clone;
    }

    protected function toArray(): array
    {
        $assertions = [];
        if ($this->maxLength) {
            $assertions[MaxLength::name()] = $this->maxLength->value();
        }
        if ($this->minLength) {
            $assertions[MinLength::name()] = $this->minLength->value();
        }
        if ($this->pattern) {
            $assertions[Pattern::name()] = $this->pattern->value();
        }

        $annotations = [];
        if ($this->format) {
            $annotations[$this->format::name()] = $this->format->value();
        }

        return Arr::filter([
            $this->type::name() => $this->type->value(),
            ...$assertions,
            ...$annotations,
            ...$this->metaData->jsonSerialize(),
            ...$this->applicator->jsonSerialize(),
        ]);
    }
}