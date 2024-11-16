<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema;

use MohammadAlavi\ObjectOrientedJSONSchema\Dialect\Draft202012;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Constant;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\DependentRequired\Dependency;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\DependentRequired\DependentRequired;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Enum;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MaxProperties;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MinProperties;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Required;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\AdditionalProperties;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Properties\Properties;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Properties\Property;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\AllOf;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\AnyOf;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\OneOf;
use MohammadAlavi\ObjectOrientedJSONSchema\Formats\DefinedFormat;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Items;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Anchor;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Comment;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Defs\Def;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Defs\Defs;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\DynamicAnchor;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\DynamicRef;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Id;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MaxContains;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MaxItems;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MinContains;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MinItems;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Ref;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Schema;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\UniqueItems;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Vocabulary\Vocab;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Vocabulary\Vocabulary;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Format;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\UnevaluatedItems;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\UnevaluatedProperties;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\ExclusiveMaximum;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\ExclusiveMinimum;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Maximum;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MaxLength;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Minimum;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MinLength;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\MultipleOf;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Pattern;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Type;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\DefaultValue;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Deprecated;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Description;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Examples;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\IsReadOnly;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\IsWriteOnly;
use MohammadAlavi\ObjectOrientedJSONSchema\Keywords\Title;

// TODO: this feels like an unnecessary abstraction. Can we just use the Draft202012 class directly?
final class Builder implements BuilderInterface
{
    private Anchor|null $anchor = null;
    private Comment|null $comment = null;
    private Defs|null $defs = null;
    private DynamicAnchor|null $dynamicAnchor = null;
    private DynamicRef|null $dynamicRef = null;
    private ExclusiveMaximum|null $exclusiveMaximum = null;
    private ExclusiveMinimum|null $exclusiveMinimum = null;
    private Format|null $format = null;
    private Id|null $id = null;
    private Maximum|null $maximum = null;
    private MaxLength|null $maxLength = null;
    private Minimum|null $minimum = null;
    private MinLength|null $minLength = null;
    private MultipleOf|null $multipleOf = null;
    private Pattern|null $pattern = null;
    private Ref|null $ref = null;
    private Schema|null $schema = null;
    private Type|null $type = null;
    private Vocabulary|null $vocabulary = null;
    private UnevaluatedItems|null $unevaluatedItems = null;
    private UnevaluatedProperties|null $unevaluatedProperties = null;
    private MaxContains|null $maxContains = null;
    private MinContains|null $minContains = null;
    private MaxItems|null $maxItems = null;
    private MinItems|null $minItems = null;
    private UniqueItems|null $uniqueItems = null;
    private Items|null $items = null;
    private AllOf|null $allOf = null;
    private AnyOf|null $anyOf = null;
    private OneOf|null $oneOf = null;
    private AdditionalProperties|null $additionalProperties = null;
    private Properties|null $properties = null;
    private DependentRequired|null $dependentRequired = null;
    private MaxProperties|null $maxProperties = null;
    private MinProperties|null $minProperties = null;
    private Required|null $required = null;
    private DefaultValue|null $defaultValue = null;
    private Deprecated|null $deprecated = null;
    private Description|null $description = null;
    private Examples|null $examples = null;
    private IsReadOnly|null $isReadOnly = null;
    private IsWriteOnly|null $isWriteOnly = null;
    private Title|null $title = null;
    private Constant|null $constant = null;
    private Enum|null $enum = null;

    public static function create(): static
    {
        return (new self())
            ->schema('http://json-schema.org/draft-2020-12/schema');
    }

    public function schema(string $uri): static
    {
        $clone = clone $this;

        $clone->schema = Draft202012::schema($uri);

        return $clone;
    }

    public function anchor(string $value): static
    {
        $clone = clone $this;

        $clone->anchor = Draft202012::anchor($value);

        return $clone;
    }

    public function comment(string $value): static
    {
        $clone = clone $this;

        $clone->comment = Draft202012::comment($value);

        return $clone;
    }

    public function defs(Def ...$def): static
    {
        $clone = clone $this;

        $clone->defs = Draft202012::defs(...$def);

        return $clone;
    }

    public function dynamicAnchor(string $value): static
    {
        $clone = clone $this;

        $clone->dynamicAnchor = Draft202012::dynamicAnchor($value);

        return $clone;
    }

    public function dynamicRef(string $uri): static
    {
        $clone = clone $this;

        $clone->dynamicRef = Draft202012::dynamicRef($uri);

        return $clone;
    }

    public function exclusiveMaximum(float $value): static
    {
        $clone = clone $this;

        $clone->exclusiveMaximum = Draft202012::exclusiveMaximum($value);

        return $clone;
    }

    public function exclusiveMinimum(float $value): static
    {
        $clone = clone $this;

        $clone->exclusiveMinimum = Draft202012::exclusiveMinimum($value);

        return $clone;
    }

    public function format(DefinedFormat $value): static
    {
        $clone = clone $this;

        $clone->format = Draft202012::format($value);

        return $clone;
    }

    public function id(string $uri): static
    {
        $clone = clone $this;

        $clone->id = Draft202012::id($uri);

        return $clone;
    }

    public function maximum(float $value): static
    {
        $clone = clone $this;

        $clone->maximum = Draft202012::maximum($value);

        return $clone;
    }

    public function maxLength(int $value): static
    {
        $clone = clone $this;

        $clone->maxLength = Draft202012::maxLength($value);

        return $clone;
    }

    public function minimum(float $value): static
    {
        $clone = clone $this;

        $clone->minimum = Draft202012::minimum($value);

        return $clone;
    }

    public function minLength(int $value): static
    {
        $clone = clone $this;

        $clone->minLength = Draft202012::minLength($value);

        return $clone;
    }

    public function multipleOf(float $value): static
    {
        $clone = clone $this;

        $clone->multipleOf = Draft202012::multipleOf($value);

        return $clone;
    }

    public function pattern(string $value): static
    {
        $clone = clone $this;

        $clone->pattern = Draft202012::pattern($value);

        return $clone;
    }

    /**
     * Set a static reference to another <a href="https://json-schema.org/learn/glossary#schema">schema</a>.
     * This is useful for avoiding code duplication and promoting modularity when describing complex data structures.
     *
     * @see https://www.learnjsonschema.com/2020-12/core/ref/
     * @see https://json-schema.org/understanding-json-schema/structuring
     */
    public function ref(string $uri): static
    {
        $clone = clone $this;

        $clone->ref = Draft202012::ref($uri);

        return $clone;
    }

    public function type(Type|string ...$type): static
    {
        $clone = clone $this;

        $clone->type = Draft202012::type(...$type);

        return $clone;
    }

    public function vocabulary(Vocab ...$vocab): static
    {
        $clone = clone $this;

        $clone->vocabulary = Draft202012::vocabulary(...$vocab);

        return $clone;
    }

    public function unevaluatedItems(BuilderInterface $schema): static
    {
        $clone = clone $this;

        $clone->unevaluatedItems = Draft202012::unevaluatedItems($schema);

        return $clone;
    }

    public function unevaluatedProperties(BuilderInterface $schema): static
    {
        $clone = clone $this;

        $clone->unevaluatedProperties = Draft202012::unevaluatedProperties($schema);

        return $clone;
    }

    public function maxContains(int $value): static
    {
        $clone = clone $this;

        $clone->maxContains = Draft202012::maxContains($value);

        return $clone;
    }

    public function minContains(int $value): static
    {
        $clone = clone $this;

        $clone->minContains = Draft202012::minContains($value);

        return $clone;
    }

    public function maxItems(int $value): static
    {
        $clone = clone $this;

        $clone->maxItems = Draft202012::maxItems($value);

        return $clone;
    }

    public function minItems(int $value): static
    {
        $clone = clone $this;

        $clone->minItems = Draft202012::minItems($value);

        return $clone;
    }

    public function uniqueItems(bool $value = true): static
    {
        $clone = clone $this;

        $clone->uniqueItems = Draft202012::uniqueItems($value);

        return $clone;
    }

    public function items(BuilderInterface $schema): static
    {
        $clone = clone $this;

        $clone->items = Draft202012::items($schema);

        return $clone;
    }

    public function allOf(BuilderInterface ...$schema): static
    {
        $clone = clone $this;

        $clone->allOf = Draft202012::allOf(...$schema);

        return $clone;
    }

    public function anyOf(BuilderInterface ...$schema): static
    {
        $clone = clone $this;

        $clone->anyOf = Draft202012::anyOf(...$schema);

        return $clone;
    }

    public function oneOf(BuilderInterface ...$schema): static
    {
        $clone = clone $this;

        $clone->oneOf = Draft202012::oneOf(...$schema);

        return $clone;
    }

    public function additionalProperties(BuilderInterface|bool $schema): static
    {
        $clone = clone $this;

        $clone->additionalProperties = Draft202012::additionalProperties($schema);

        return $clone;
    }

    public function properties(Property ...$property): static
    {
        $clone = clone $this;

        $clone->properties = Draft202012::properties(...$property);

        return $clone;
    }

    public function dependentRequired(Dependency ...$dependency): static
    {
        $clone = clone $this;

        $clone->dependentRequired = Draft202012::dependentRequired(...$dependency);

        return $clone;
    }

    public function maxProperties(int $value): static
    {
        $clone = clone $this;

        $clone->maxProperties = Draft202012::maxProperties($value);

        return $clone;
    }

    public function minProperties(int $value): static
    {
        $clone = clone $this;

        $clone->minProperties = Draft202012::minProperties($value);

        return $clone;
    }

    public function required(string ...$property): static
    {
        $clone = clone $this;

        $clone->required = Draft202012::required(...$property);

        return $clone;
    }

    public function default(mixed $value): static
    {
        $clone = clone $this;

        $clone->defaultValue = Draft202012::default($value);

        return $clone;
    }

    public function deprecated(bool $value): static
    {
        $clone = clone $this;

        $clone->deprecated = Draft202012::deprecated($value);

        return $clone;
    }

    public function description(string $value): static
    {
        $clone = clone $this;

        $clone->description = Draft202012::description($value);

        return $clone;
    }

    public function examples(mixed ...$example): static
    {
        $clone = clone $this;

        $clone->examples = Draft202012::examples(...$example);

        return $clone;
    }

    public function readOnly(bool $value): static
    {
        $clone = clone $this;

        $clone->isReadOnly = Draft202012::readOnly($value);

        return $clone;
    }

    public function writeOnly(bool $value): static
    {
        $clone = clone $this;

        $clone->isWriteOnly = Draft202012::writeOnly($value);

        return $clone;
    }

    public function title(string $value): static
    {
        $clone = clone $this;

        $clone->title = Draft202012::title($value);

        return $clone;
    }

    public function const(mixed $value): static
    {
        $clone = clone $this;

        $clone->constant = Draft202012::const($value);

        return $clone;
    }

    public function enum(...$value): static
    {
        $clone = clone $this;

        $clone->enum = Draft202012::enum(...$value);

        return $clone;
    }

    public function jsonSerialize(): array
    {
        $keywords = [];
        if ($this->ref) {
            $keywords[$this->ref::name()] = $this->ref->value();
        }
        if ($this->defs) {
            $keywords[$this->defs::name()] = $this->defs->value();
        }
        if ($this->schema) {
            $keywords[$this->schema::name()] = $this->schema->value();
        }
        if ($this->id) {
            $keywords[$this->id::name()] = $this->id->value();
        }
        if ($this->comment) {
            $keywords[$this->comment::name()] = $this->comment->value();
        }
        if ($this->anchor) {
            $keywords[$this->anchor::name()] = $this->anchor->value();
        }
        if ($this->dynamicAnchor) {
            $keywords[$this->dynamicAnchor::name()] = $this->dynamicAnchor->value();
        }
        if ($this->dynamicRef) {
            $keywords[$this->dynamicRef::name()] = $this->dynamicRef->value();
        }
        if ($this->vocabulary) {
            $keywords[$this->vocabulary::name()] = $this->vocabulary->value();
        }
        if ($this->unevaluatedItems) {
            $keywords[$this->unevaluatedItems::name()] = $this->unevaluatedItems->value();
        }
        if ($this->unevaluatedProperties) {
            $keywords[$this->unevaluatedProperties::name()] = $this->unevaluatedProperties->value();
        }
        if ($this->format) {
            $keywords[$this->format::name()] = $this->format->value();
        }
        if ($this->maxLength) {
            $keywords[$this->maxLength::name()] = $this->maxLength->value();
        }
        if ($this->minLength) {
            $keywords[$this->minLength::name()] = $this->minLength->value();
        }
        if ($this->pattern) {
            $keywords[$this->pattern::name()] = $this->pattern->value();
        }
        if ($this->type) {
            $keywords[$this->type::name()] = $this->type->value();
        }
        if ($this->exclusiveMaximum) {
            $keywords[$this->exclusiveMaximum::name()] = $this->exclusiveMaximum->value();
        }
        if ($this->exclusiveMinimum) {
            $keywords[$this->exclusiveMinimum::name()] = $this->exclusiveMinimum->value();
        }
        if ($this->maximum) {
            $keywords[$this->maximum::name()] = $this->maximum->value();
        }
        if ($this->minimum) {
            $keywords[$this->minimum::name()] = $this->minimum->value();
        }
        if ($this->multipleOf) {
            $keywords[$this->multipleOf::name()] = $this->multipleOf->value();
        }
        if ($this->maxContains) {
            $keywords[$this->maxContains::name()] = $this->maxContains->value();
        }
        if ($this->minContains) {
            $keywords[$this->minContains::name()] = $this->minContains->value();
        }
        if ($this->maxItems) {
            $keywords[$this->maxItems::name()] = $this->maxItems->value();
        }
        if ($this->minItems) {
            $keywords[$this->minItems::name()] = $this->minItems->value();
        }
        if ($this->uniqueItems) {
            $keywords[$this->uniqueItems::name()] = $this->uniqueItems->value();
        }
        if ($this->items) {
            $keywords[$this->items::name()] = $this->items->value();
        }
        if ($this->allOf) {
            $keywords[$this->allOf::name()] = $this->allOf->value();
        }
        if ($this->anyOf) {
            $keywords[$this->anyOf::name()] = $this->anyOf->value();
        }
        if ($this->oneOf) {
            $keywords[$this->oneOf::name()] = $this->oneOf->value();
        }
        if ($this->additionalProperties) {
            $keywords[$this->additionalProperties::name()] = $this->additionalProperties->value();
        }
        if ($this->properties) {
            $keywords[$this->properties::name()] = $this->properties->value();
        }
        if ($this->dependentRequired) {
            $keywords[$this->dependentRequired::name()] = $this->dependentRequired->value();
        }
        if ($this->maxProperties) {
            $keywords[$this->maxProperties::name()] = $this->maxProperties->value();
        }
        if ($this->minProperties) {
            $keywords[$this->minProperties::name()] = $this->minProperties->value();
        }
        if ($this->required) {
            $keywords[$this->required::name()] = $this->required->value();
        }
        if ($this->defaultValue) {
            $keywords[$this->defaultValue::name()] = $this->defaultValue->value();
        }
        if ($this->deprecated) {
            $keywords[$this->deprecated::name()] = $this->deprecated->value();
        }
        if ($this->description) {
            $keywords[$this->description::name()] = $this->description->value();
        }
        if ($this->examples) {
            $keywords[$this->examples::name()] = $this->examples->value();
        }
        if ($this->isReadOnly) {
            $keywords[$this->isReadOnly::name()] = $this->isReadOnly->value();
        }
        if ($this->isWriteOnly) {
            $keywords[$this->isWriteOnly::name()] = $this->isWriteOnly->value();
        }
        if ($this->title) {
            $keywords[$this->title::name()] = $this->title->value();
        }
        if ($this->constant) {
            $keywords[$this->constant::name()] = $this->constant->value();
        }
        if ($this->enum) {
            $keywords[$this->enum::name()] = $this->enum->value();
        }

        return $keywords;
    }
}