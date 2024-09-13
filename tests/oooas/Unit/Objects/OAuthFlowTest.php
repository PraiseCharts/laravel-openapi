<?php

namespace Tests\oooas\Unit\Objects;

use MohammadAlavi\ObjectOrientedOAS\Exceptions\InvalidArgumentException;
use MohammadAlavi\ObjectOrientedOAS\Objects\OAuthFlow;

describe('OAuthFlow', function (): void {
    it('can be created with no parameters', function (): void {
        $oauthFlow = OAuthFlow::create();

        expect($oauthFlow->toArray())->toBeEmpty();
    });

    it('can be created with all parameters', function (array $scopes): void {
        $oauthFlow = OAuthFlow::create()
            ->flow(OAuthFlow::FLOW_AUTHORIZATION_CODE)
            ->authorizationUrl('https://api.example.com/oauth/authorization')
            ->tokenUrl('https://api.example.com/oauth/token')
            ->refreshUrl('https://api.example.com/oauth/token')
            ->scopes($scopes);

        expect($oauthFlow->toArray())->toEqual([
            'authorizationUrl' => 'https://api.example.com/oauth/authorization',
            'tokenUrl' => 'https://api.example.com/oauth/token',
            'refreshUrl' => 'https://api.example.com/oauth/token',
            'scopes' => $scopes,
        ]);
    })->with([
        'with scopes' => [['read:user' => 'Read the user profile']],
        'explicit no scope' => [[]],
    ]);

    it('can be created with no scope', function (): void {
        $oauthFlow = OAuthFlow::create()->scopes(null);

        expect($oauthFlow->toArray())->toBeEmpty();
    });

    it('throws an exception when scopes is not an [string => string] array', function (array $scopes): void {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Each scope must have a string key and a string value.');

        OAuthFlow::create()->scopes($scopes);
    })->with([
        'no string key' => [[1 => 'read:user']],
        'no string value' => [['read:user' => 1]],
    ]);

    it('can be created with all combinations', function (string $flow, string $expectedFlow): void {
        $oauthFlow = OAuthFlow::create()->flow($flow);

        expect($oauthFlow->flow)->toBe($expectedFlow);
    })->with([
        'implicit' => ['implicit', OAuthFlow::FLOW_IMPLICIT],
        'password' => ['password', OAuthFlow::FLOW_PASSWORD],
        'clientCredentials' => ['clientCredentials', OAuthFlow::FLOW_CLIENT_CREDENTIALS],
        'authorizationCode' => ['authorizationCode', OAuthFlow::FLOW_AUTHORIZATION_CODE],
    ]);
})->covers(OAuthFlow::class);
