<?php

namespace MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\Examples\Scopes;

use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\OAuth\Scope;
use MohammadAlavi\ObjectOrientedOpenAPI\Schema\Objects\Security\OAuth\ScopeFactory;

final readonly class OrderShippingAddressScope extends ScopeFactory
{
    public function build(): Scope
    {
        return Scope::create('order:shipping:address', 'Information about where to deliver orders.');
    }
}
