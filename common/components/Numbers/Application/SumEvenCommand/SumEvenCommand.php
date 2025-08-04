<?php

namespace common\components\Numbers\Application\SumEvenCommand;

use common\components\Numbers\Domain\ValueObject\NumbersCollection;

final readonly class SumEvenCommand
{
    public function __construct(
        public NumbersCollection $numbers,
    ) {
    }
}
