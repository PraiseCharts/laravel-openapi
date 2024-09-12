<?php

namespace MohammadAlavi\ObjectOrientedOAS\Objects;

use MohammadAlavi\ObjectOrientedOAS\Utilities\Arr;

class Tag extends BaseObject implements \Stringable
{
    protected string|null $name = null;
    protected string|null $description = null;
    protected ExternalDocs|null $externalDocs = null;

    public function name(string|null $name): static
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    public function description(string|null $description): static
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    public function externalDocs(ExternalDocs|null $externalDocs): static
    {
        $instance = clone $this;

        $instance->externalDocs = $externalDocs;

        return $instance;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    protected function generate(): array
    {
        return Arr::filter([
            'name' => $this->name,
            'description' => $this->description,
            'externalDocs' => $this->externalDocs,
        ]);
    }
}
