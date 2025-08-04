<?php

declare(strict_types=1);

namespace common\components\Shared;

abstract class AbstractCollection extends \ArrayObject
{
    abstract protected function getItemClass(): string;

    public function __construct(
        array|object $array = [],
        int $flags = 0,
        string $iteratorClass = \ArrayIterator::class,
    ) {
        foreach ($array as $item) {
            $this->checkItem($item);
        }

        parent::__construct($array, $flags, $iteratorClass);
    }

    public function offsetSet($index, $item): void
    {
        $this->checkItem($item);
        parent::offsetSet($index, $item);
    }

    private function checkItem(mixed $item): void {
        if (!is_a($item, $this->getItemClass(), true)) {
            throw new \InvalidArgumentException(
                sprintf("[Collection] item must be of type %s", $this->getItemClass())
            );
        }
    }
}
