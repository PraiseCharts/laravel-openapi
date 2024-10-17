<?php

use MohammadAlavi\ObjectOrientedOpenAPI\Utilities\Generatable;
use Tests\oooas\Doubles\Fakes\GeneratableFake;

describe(class_basename(Generatable::class), function (): void {
    it('can be json serializable', function (): void {
        expect(Generatable::class)->toImplement(JsonSerializable::class);

        $object = new GeneratableFake();

        $result = $object->asArray();

        expect($result)->toBe([]);
    });
})->covers(Generatable::class);