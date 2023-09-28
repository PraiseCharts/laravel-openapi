<?php

namespace Vyuldashev\LaravelOpenApi\Builders;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use Vyuldashev\LaravelOpenApi\Builders\Components\CallbackBuilder;
use Vyuldashev\LaravelOpenApi\Builders\Components\RequestBodyBuilder;
use Vyuldashev\LaravelOpenApi\Builders\Components\ResponseBuilder;
use Vyuldashev\LaravelOpenApi\Builders\Components\SchemaBuilder;
use Vyuldashev\LaravelOpenApi\Builders\Components\SecuritySchemeBuilder;
use Vyuldashev\LaravelOpenApi\Generator;

class ComponentBuilder
{
    protected CallbackBuilder $callbacksBuilder;
    protected RequestBodyBuilder $requestBodiesBuilder;
    protected ResponseBuilder $responsesBuilder;
    protected SchemaBuilder $schemasBuilder;
    protected SecuritySchemeBuilder $securitySchemesBuilder;

    public function __construct(
        CallbackBuilder $callbacksBuilder,
        RequestBodyBuilder $requestBodiesBuilder,
        ResponseBuilder $responsesBuilder,
        SchemaBuilder $schemasBuilder,
        SecuritySchemeBuilder $securitySchemesBuilder
    ) {
        $this->callbacksBuilder = $callbacksBuilder;
        $this->requestBodiesBuilder = $requestBodiesBuilder;
        $this->responsesBuilder = $responsesBuilder;
        $this->schemasBuilder = $schemasBuilder;
        $this->securitySchemesBuilder = $securitySchemesBuilder;
    }

    public function build(
        string $collection = Generator::COLLECTION_DEFAULT,
        array $middlewares = []
    ): ?Components {
        $callbacks = $this->callbacksBuilder->build($collection);
        $requestBodies = $this->requestBodiesBuilder->build($collection);
        $responses = $this->responsesBuilder->build($collection);
        $schemas = $this->schemasBuilder->build($collection);
        $securitySchemes = $this->securitySchemesBuilder->build($collection);

        $components = Components::create();

        $hasAnyObjects = false;

        if (count($callbacks) > 0) {
            $hasAnyObjects = true;

            $components = $components->callbacks(...$callbacks);
        }

        if (count($requestBodies) > 0) {
            $hasAnyObjects = true;

            $components = $components->requestBodies(...$requestBodies);
        }

        if (count($responses) > 0) {
            $hasAnyObjects = true;
            $components = $components->responses(...$responses);
        }

        if (count($schemas) > 0) {
            $hasAnyObjects = true;
            $components = $components->schemas(...$schemas);
        }

        if (count($securitySchemes) > 0) {
            $hasAnyObjects = true;
            $components = $components->securitySchemes(...$securitySchemes);
        }

        if (!$hasAnyObjects) {
            return null;
        }

        foreach ($middlewares as $middleware) {
            app($middleware)->after($components);
        }

        return $components;
    }
}