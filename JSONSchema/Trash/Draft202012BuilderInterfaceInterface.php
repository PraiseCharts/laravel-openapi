<?php

namespace MohammadAlavi\ObjectOrientedJSONSchema\Trash;

use MohammadAlavi\ObjectOrientedJSONSchema\Contracts\Interface\Builder\Builder;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Methods\HasConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\Draft202012Constrained;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\TypeConstraints\IntegerConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\TypeConstraints\NumberConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\TypeConstraints\StringConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\TypeNarrower;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\ApplicatorConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\ContentConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\CoreConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\FormatAnnotationConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\MetaDataConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\UnevaluatedConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyConstraints\ValidationConstraint;
use MohammadAlavi\ObjectOrientedJSONSchema\Trash\JSONSchema\Narrowers\VocabularyNarrower;

interface Draft202012BuilderInterfaceInterface extends
    Draft202012Constrained,
    Narrowable,
    Builder,
    HasConstraint,
    TypeNarrower,
    StringConstraint,
    IntegerConstraint,
    NumberConstraint,
    VocabularyNarrower,
    ApplicatorConstraint,
    ContentConstraint,
    CoreConstraint,
    FormatAnnotationConstraint,
    MetaDataConstraint,
    UnevaluatedConstraint,
    ValidationConstraint
{
}
