<?php

namespace MohammadAlavi\ObjectOrientedOAS\Objects;

use MohammadAlavi\ObjectOrientedOAS\Contracts\SchemaContract;
use MohammadAlavi\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property Schema[]|null $schemas
 * @property Response[]|null $responses
 * @property Parameter[]|null $parameters
 * @property Example[]|null $examples
 * @property RequestBody[]|null $requestBodies
 * @property Header[]|null $headers
 * @property SecurityScheme[]|null $securitySchemes
 * @property Link[]|null $links
 */
class Components extends BaseObject
{
    /**
     * @var Schema[]|null
     */
    protected $schemas;

    /**
     * @var Response[]|null
     */
    protected $responses;

    /**
     * @var Parameter[]|null
     */
    protected $parameters;

    /**
     * @var Example[]|null
     */
    protected $examples;

    /**
     * @var RequestBody[]|null
     */
    protected $requestBodies;

    /**
     * @var Header[]|null
     */
    protected $headers;

    /**
     * @var SecurityScheme[]|null
     */
    protected $securitySchemes;

    /**
     * @var Link[]|null
     */
    protected $links;

    /**
     * @var PathItem[]|null
     */
    protected $callbacks;

    /**
     * @param SchemaContract[] $schemaContract
     *
     * @return static
     */
    public function schemas(SchemaContract ...$schemaContract): self
    {
        $instance = clone $this;

        $instance->schemas = [] !== $schemaContract ? $schemaContract : null;

        return $instance;
    }

    /**
     * @param Response[] $response
     *
     * @return static
     */
    public function responses(Response ...$response): self
    {
        $instance = clone $this;

        $instance->responses = [] !== $response ? $response : null;

        return $instance;
    }

    /**
     * @param Parameter[] $parameter
     *
     * @return static
     */
    public function parameters(Parameter ...$parameter): self
    {
        $instance = clone $this;

        $instance->parameters = [] !== $parameter ? $parameter : null;

        return $instance;
    }

    /**
     * @param Example[] $example
     *
     * @return static
     */
    public function examples(Example ...$example): self
    {
        $instance = clone $this;

        $instance->examples = [] !== $example ? $example : null;

        return $instance;
    }

    /**
     * @param RequestBody[] $requestBody
     *
     * @return static
     */
    public function requestBodies(RequestBody ...$requestBody): self
    {
        $instance = clone $this;

        $instance->requestBodies = [] !== $requestBody ? $requestBody : null;

        return $instance;
    }

    /**
     * @param Header[] $header
     *
     * @return static
     */
    public function headers(Header ...$header): self
    {
        $instance = clone $this;

        $instance->headers = [] !== $header ? $header : null;

        return $instance;
    }

    /**
     * @param SecurityScheme[] $securityScheme
     *
     * @return static
     */
    public function securitySchemes(SecurityScheme ...$securityScheme): self
    {
        $instance = clone $this;

        $instance->securitySchemes = [] !== $securityScheme ? $securityScheme : null;

        return $instance;
    }

    /**
     * @param Link[] $link
     *
     * @return static
     */
    public function links(Link ...$link): self
    {
        $instance = clone $this;

        $instance->links = [] !== $link ? $link : null;

        return $instance;
    }

    /**
     * @param PathItem[] $pathItem
     *
     * @return static
     */
    public function callbacks(PathItem ...$pathItem): self
    {
        $instance = clone $this;

        $instance->callbacks = [] !== $pathItem ? $pathItem : null;

        return $instance;
    }

    protected function generate(): array
    {
        $schemas = [];
        foreach ($this->schemas ?? [] as $schema) {
            $schemas[$schema->objectId] = $schema;
        }

        $responses = [];
        foreach ($this->responses ?? [] as $response) {
            $responses[$response->objectId] = $response;
        }

        $parameters = [];
        foreach ($this->parameters ?? [] as $parameter) {
            $parameters[$parameter->objectId] = $parameter;
        }

        $examples = [];
        foreach ($this->examples ?? [] as $example) {
            $examples[$example->objectId] = $example;
        }

        $requestBodies = [];
        foreach ($this->requestBodies ?? [] as $requestBodie) {
            $requestBodies[$requestBodie->objectId] = $requestBodie;
        }

        $headers = [];
        foreach ($this->headers ?? [] as $header) {
            $headers[$header->objectId] = $header;
        }

        $securitySchemes = [];
        foreach ($this->securitySchemes ?? [] as $securityScheme) {
            $securitySchemes[$securityScheme->objectId] = $securityScheme;
        }

        $links = [];
        foreach ($this->links ?? [] as $link) {
            $links[$link->objectId] = $link;
        }

        $callbacks = [];
        foreach ($this->callbacks ?? [] as $callback) {
            $callbacks[$callback->objectId][$callback->route] = $callback;
        }

        return Arr::filter([
            'schemas' => [] !== $schemas ? $schemas : null,
            'responses' => [] !== $responses ? $responses : null,
            'parameters' => [] !== $parameters ? $parameters : null,
            'examples' => [] !== $examples ? $examples : null,
            'requestBodies' => [] !== $requestBodies ? $requestBodies : null,
            'headers' => [] !== $headers ? $headers : null,
            'securitySchemes' => [] !== $securitySchemes ? $securitySchemes : null,
            'links' => [] !== $links ? $links : null,
            'callbacks' => [] !== $callbacks ? $callbacks : null,
        ]);
    }
}
