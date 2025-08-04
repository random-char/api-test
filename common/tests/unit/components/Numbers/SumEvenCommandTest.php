<?php

declare(strict_types=1);

namespace common\tests\unit\Components\Numbers;

use Codeception\Test\Unit;
use common\components\Numbers\Application\SumEvenCommand\SumEvenCommand;
use common\components\Numbers\Application\SumEvenCommand\SumEvenCommandHandler;
use common\components\Numbers\Domain\ValueObject\Number;
use common\components\Numbers\Domain\ValueObject\NumbersCollection;

final class SumEvenCommandTest extends Unit
{
    /** @dataProvider numbersProvider */
    public function testSums(
        array $scalars,
        ?Number $expectedSum,
        ?string $expectedException,
    ): void {
        if (null !== $expectedException) {
            /** @var class-string $expectedExceptionx */
            $this->expectException($expectedException);
        }

        $command = new SumEvenCommand(
            NumbersCollection::fromScalarsArray($scalars),
        );
        $handler = new SumEvenCommandHandler();

        $calculatedSum = $handler($command);

        if (null !== $expectedSum) {
            $this->assertEquals($expectedSum, $calculatedSum);
        }
    }

    public function numbersProvider(): \Generator
    {
        yield 'all ints' => [
            'scalars' => [1, 2, 3, 4, 5, 6],
            'expectedSum' => new Number(12),
            'expectedException' => null,
        ];

        yield 'with negatives' => [
            'scalars' => [1, 2, 3, 4, 5, -6],
            'expectedSum' => new Number(0),
            'expectedException' => null,
        ];

        yield 'numeric types' => [
            'scalars' => ['1', 2.0, 3e0, "4.0", 5, 6.000],
            'expectedSum' => new Number(12),
            'expectedException' => null,
        ];

        yield 'invalid types' => [
            'scalars' => ['1wetwet'],
            'expectedSum' => null,
            'expectedException' => \InvalidArgumentException::class,
        ];
    }
}
