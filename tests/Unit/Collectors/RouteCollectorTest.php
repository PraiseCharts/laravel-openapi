<?php

use Illuminate\Support\Facades\Route;
use MohammadAlavi\LaravelOpenApi\Objects\RouteInfo;
use MohammadAlavi\LaravelOpenApi\Services\RouteCollector;
use Pest\Expectation;
use Tests\Doubles\Stubs\CollectibleClass;
use Tests\Doubles\Stubs\Collectors\ControllerWithoutOperationStub;
use Tests\Doubles\Stubs\Collectors\ControllerWithoutPathItemStub;
use Tests\Doubles\Stubs\Collectors\ControllerWithPathItemAndOperationStub;

describe(class_basename(RouteCollector::class), function (): void {
    it('can collect all routes', function (): void {
        Route::get('/has-both-pathItem-and-operation', ControllerWithPathItemAndOperationStub::class);
        Route::post('/has-both-pathItem-and-operation', ControllerWithPathItemAndOperationStub::class);
        Route::get('/has-no-path-item', ControllerWithoutPathItemStub::class);
        Route::put('/has-both-pathItem-and-operation', ControllerWithPathItemAndOperationStub::class);
        Route::patch('/has-both-pathItem-and-operation', ControllerWithPathItemAndOperationStub::class);
        Route::get('/has-no-operation', ControllerWithoutOperationStub::class);
        Route::delete('/has-both-pathItem-and-operation', ControllerWithPathItemAndOperationStub::class);
        /** @var RouteCollector $routeCollector */
        $routeCollector = app(RouteCollector::class);

        $routes = $routeCollector->all();

        expect($routes)->toHaveCount(5)
            ->and($routes)
            ->each(
                fn (Expectation $expectation): Expectation => $expectation->toBeInstanceOf(RouteInfo::class),
            );
    });

    it('can filter routes by collection', function (): void {
        Route::get('/default-collection', ControllerWithPathItemAndOperationStub::class);
        Route::get('/test-collection', CollectibleClass::class);
        Route::put('/default-collection', ControllerWithPathItemAndOperationStub::class);
        Route::patch('/default-collection', ControllerWithPathItemAndOperationStub::class);
        Route::delete('/default-collection', ControllerWithPathItemAndOperationStub::class);
        /** @var RouteCollector $routeCollector */
        $routeCollector = app(RouteCollector::class);

        $routes = $routeCollector->whereInCollection('TestCollection');

        expect($routes)->toHaveCount(1)
            ->and($routes)
            ->each(
                fn (Expectation $expectation): Expectation => $expectation->toBeInstanceOf(RouteInfo::class),
            );
    });
})->covers(RouteCollector::class);
