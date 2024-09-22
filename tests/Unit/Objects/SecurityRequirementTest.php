<?php

use MohammadAlavi\LaravelOpenApi\Objects\SecurityRequirement;
use Tests\Doubles\Stubs\SecuritySchemesFactories\ApiKeySecuritySchemeFactory;
use Tests\Doubles\Stubs\SecuritySchemesFactories\BearerSecuritySchemeFactory;
use Tests\Doubles\Stubs\SecuritySchemesFactories\JwtSecuritySchemeFactory;

describe('SecurityRequirement', function (): void {
    it('can set nested security schemes', function (): void {
        $securityRequirement = SecurityRequirement::create()
            ->nestedSecurityScheme(
                [
                    [
                        (new BearerSecuritySchemeFactory())->build(),
                        (new ApiKeySecuritySchemeFactory())->build(),
                    ],
                    (new JwtSecuritySchemeFactory())->build(),
                ],
            );

        expect($securityRequirement->toArray())->toBe([
            [
                'Bearer' => [],
                'ApiKey' => [],
            ],
            [
                'JWT' => [],
            ],
        ]);
    });
})->covers(SecurityRequirement::class);