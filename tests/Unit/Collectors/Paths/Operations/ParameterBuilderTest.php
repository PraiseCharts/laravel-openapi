<?php

use Illuminate\Support\Facades\Route;
use MohammadAlavi\LaravelOpenApi\Attributes\Parameters as ParameterAttribute;
use MohammadAlavi\LaravelOpenApi\Builders\Paths\Operation\ParametersBuilder;
use MohammadAlavi\LaravelOpenApi\Objects\RouteInformation;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Parameter;
use Tests\Doubles\Stubs\Attributes\ParameterFactory;
use Tests\Doubles\Stubs\Collectors\Paths\Operations\TestController;

describe('ParameterBuilder', function (): void {
    it('can be created', function (): void {
        $routeInformation = RouteInformation::createFromRoute(
            Route::get('/example', static fn (): string => 'example'),
        );
        $routeInformation->actionAttributes = collect([
            new ParameterAttribute(ParameterFactory::class),
        ]);
        $builder = new ParametersBuilder();

        $result = $builder->build($routeInformation);

        expect($result)->toHaveCount(3)
            ->and($result[0])->toBeInstanceOf(Parameter::class)
            ->and($result[1])->toBeInstanceOf(Parameter::class)
            ->and($result[2])->toBeInstanceOf(Parameter::class);
    });

    it('can automatically create parameters from url params', function (): void {
        $routeInformation = RouteInformation::createFromRoute(
            Route::get('/example/{id}', static fn (): string => 'example'),
        );
        $routeInformation->actionAttributes = collect();

        $builder = new ParametersBuilder();

        $result = $builder->build($routeInformation);

        expect($result)->toHaveCount(1)
            ->and($result[0])->toBeInstanceOf(Parameter::class)
            ->and($result[0]->name)->toBe('id')
            ->and($result[0]->required)->toBeTrue();
    });

    it('can guess parameter name if it is type hinted in controller method', function (): void {
        $routeInformation = RouteInformation::createFromRoute(
            Route::get('/example/{id}/{unHinted}/{unknown}', [TestController::class, 'actionWithTypeHintedParams']),
        );
        $routeInformation->actionAttributes = collect();

        $parameterBuilder = new ParametersBuilder();

        $result = $parameterBuilder->build($routeInformation);

        /** @var Parameter $typeHintedParam */
        $typeHintedParam = $result[0];
        expect($result)->toHaveCount(2)
            ->and($typeHintedParam)->toBeInstanceOf(Parameter::class)
            ->and($typeHintedParam->name)->toBe('id')
            ->and($typeHintedParam->required)->toBeTrue()
            ->and($typeHintedParam->schema->type)->toBe('integer');
    });
})->covers(ParametersBuilder::class);
