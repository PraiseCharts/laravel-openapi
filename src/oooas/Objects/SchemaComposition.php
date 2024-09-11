<?php

namespace MohammadAlavi\ObjectOrientedOAS\Objects;

use MohammadAlavi\ObjectOrientedOAS\Contracts\SchemaContract;
use MohammadAlavi\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property Schema[]|null $schemas
 */
abstract class SchemaComposition extends BaseObject implements SchemaContract
{
    /**
     * @var Schema[]|null
     */
    protected $schemas;

    /**
     * @param Schema[] $schema
     *
     * @return static
     */
    public function schemas(Schema ...$schema): self
    {
        $instance = clone $this;

        $instance->schemas = $schema !== [] ? $schema : null;

        return $instance;
    }

    protected function generate(): array
    {
        return Arr::filter([
            $this->compositionType() => $this->schemas,
        ]);
    }

    abstract protected function compositionType(): string;
}
