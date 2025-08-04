<?php

declare(strict_types=1);

namespace common\components\Numbers\Domain\ValueObject;

//not final, can be extended into PositiveNumber etc
readonly class Number implements \JsonSerializable
{
    public int|float $value;

    public function __construct(mixed $value) {
        if (!$this->validate($value)) {
            throw new \InvalidArgumentException('[Number] Invalid value');
        }

        $this->value = is_string($value) ? (float) $value : $value;
    }

    public function validate(mixed $value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }

        return true;
    }

    function jsonSerialize(): float
    {
        return $this->value;
    }
}
