<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Formats;

// TODO: Refactor and improve how format can be extended.
// Currently, it is not as easy and intuitive as I like it to be
interface DefinedFormat
{
    public function value(): string;
}
