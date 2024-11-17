<?php

namespace MohammadAlavi\ObjectOrientedOpenAPI\Utilities;

use Illuminate\Support\Facades\File;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\SchemaComposition;

trait Generator
{
    /**
     * Saves the object as a JSON file.
     *
     * @param string|null $path path without trailing slash. If null, the file will be saved in the root directory.
     * @param string $name the name of the file
     */
    public function toJsonFile(string|null $path = null, string $name = 'openapi'): bool|int
    {
        return File::put(null !== $path && '' !== $path && '0' !== $path ? $path . sprintf('/%s.json', $name) : $name . '.json', $this->toJson());
    }

    public function toJson(
        $options = JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
    ): string {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * It should not be used directly.
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    abstract protected function toArray(): array;

    /**
     * Returns the object as an array.
     *
     * @throws \JsonException
     */
    public function asArray(): array
    {
        return json_decode($this->toJson(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function toObjectIfEmpty(
        Generatable|ReadonlyGenerator|array|null $generatable,
    ): Generatable|ReadonlyGenerator|\stdClass {
        if (empty($generatable) || $generatable->isEmpty()) {
            return new \stdClass();
        }

        return $generatable;
    }

    public function isEmpty(): bool
    {
        return empty($this->toArray());
    }

    public function toNullIfEmpty(): Generatable|SchemaComposition|ReadonlyGenerator|null
    {
        return $this->isEmpty() ? null : $this;
    }
}
