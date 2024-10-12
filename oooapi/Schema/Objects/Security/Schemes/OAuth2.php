<?php

namespace MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\Schemes;

use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\Enums\SecuritySchemeType;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\OAuth\Flows;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\OAuth\Scope;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\OAuth\Scopes;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\SecurityScheme;
use MohammadAlavi\ObjectOrientedOpenAPI\Utilities\Arr;

final readonly class OAuth2 extends SecurityScheme
{
    private function __construct(
        private Flows $flows,
        string|null $description,
    ) {
        parent::__construct(SecuritySchemeType::OAUTH2, $description);
    }

    public static function create(Flows $flows, string|null $description = null): self
    {
        return new self($flows, $description);
    }

    public function containsAllScopes(Scope ...$scope): bool
    {
        return $this->scopes()->containsAll(...$scope);
    }

    /**
     * Get all scopes from all flows combined
     */
    public function scopes(): Scopes
    {
        return $this->flows->scopes();
    }

    protected function toArray(): array
    {
        return Arr::filter([
            'type' => $this->type,
            'description' => $this->description,
            'flows' => $this->flows,
        ]);
    }
}
