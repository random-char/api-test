<?php

declare(strict_types=1);

namespace common\components\Numbers\Application\SumEvenCommand;

use common\components\Numbers\Domain\ValueObject\Number;

final readonly class SumEvenCommandHandler
{
    public function __invoke(
        SumEvenCommand $command,
    ): Number {
        $sum = array_reduce(
            $command->numbers->getArrayCopy(),
            function ($sum, $number) {
                /** @var Number $number */
                if ($number->value % 2 === 0) {
                    $sum += $number->value;
                }

                return $sum;
            },
            0,
        );

        return new Number($sum);
    }
}
