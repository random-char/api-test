<?php

declare(strict_types=1);

namespace common\components\Numbers\Domain\ValueObject;

use common\components\Shared\AbstractCollection;

final class NumbersCollection extends AbstractCollection
{
    public function getItemClass(): string
    {
        return Number::class;
    }

    /**
     * @param []int|float $numbers
     * 
     * @throws \InvalidArgumentException
     */
    public static function fromScalarsArray(array $scalars): self
    {
        $numbers = [];
        foreach ($scalars as $scalar) {
            $numbers[] = new Number($scalar);
        }

        return new self($numbers);
    }
}
