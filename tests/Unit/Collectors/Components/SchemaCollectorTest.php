<?php

use Illuminate\Support\Collection;
use MohammadAlavi\LaravelOpenApi\Collectors\CollectionLocator;
use MohammadAlavi\LaravelOpenApi\Collectors\Component\SchemaCollector;
use MohammadAlavi\ObjectOrientedOAS\Objects\Schema;

describe('SchemaCollector', function (): void {
    beforeEach(function () {
        $locator = new CollectionLocator([realpath(__DIR__ . '/../../../Doubles/Fakes/Collectable/Components/Schema')]);
        $this->collector = new SchemaCollector($locator);
    });

    it('can collect schema with default collection', function (): void {
        $result = $this->collector->collect();

        expect($result)->toBeInstanceOf(Collection::class)
            ->and($result->count())->toBe(1)
            ->and($result->first())->toBeInstanceOf(Schema::class);
    });

    it('can collect schema with specified collection', function (): void {
        $result = $this->collector->collect('test');

        expect($result)->toBeInstanceOf(Collection::class)
            ->and($result->count())->toBe(1)
            ->and($result->first())->toBeInstanceOf(Schema::class);
    });

    it('returns empty collection when no factories found', function (): void {
        $locator = new CollectionLocator([]);
        $collector = new SchemaCollector($locator);

        $result = $collector->collect();

        expect($result)->toBeInstanceOf(Collection::class)
            ->and($result->isEmpty())->toBeTrue();
    });
})->covers(SchemaCollector::class);
