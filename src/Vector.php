<?php
/*
 * This file is part of the Ra5k Dave library
 * (c) 2020 GitHub/ra5k
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ra5k\Dave;


use IteratorAggregate,
    ArrayAccess,
    Countable;


/**
 *
 *
 */
interface Vector extends ArrayAccess, Countable, IteratorAggregate
{

    /**
     * @return NameMap
     */
    public function names(): NameMap;

    /**
     * @return string
     */
    public function type(): string;

    /**
     * @param string|int $index
     * @return mixed
     * @immutable
     */
    public function get($index);

    /**
     * @param string|int $index
     * @param mixed $value
     * @return void
     */
    public function set($index, $value): void;

    /**
     * @param string|int $index
     * @return void
     */
    public function remove($index): void;

    /**
     * @param mixed ...$value
     * @return bool
     * @immutable
     */
    public function contains(...$value): bool;

    /**
     * @return mixed
     */
    public function first();

    /**
     * @return mixed
     */
    public function last();

    /**
     * @param mixed $element
     */
    public function push($element): void;

    /**
     * @return mixed
     */
    public function pop();

    /**
     *
     * @param int $index
     * @param int $length
     * @return self
     * @immutable
     */
    public function slice(int $index, int $length = null): self;

    /**
     * @param callable $callback
     * @immutable
     */
    public function map(callable $callback): self;

    /**
     * @param callable $callback
     * @immutable
     */
    public function filter(callable $callback): self;

    /**
     * @param callable $callback
     * @param mixed $initial
     * @return mixed
     * @immutable
     */
    public function reduce(callable $callback, $initial = null);

    /**
     * @param callable $comparator
     * @return self
     * @immutable
     */
    public function sorted(callable $comparator = null): self;

    /**
     * @return self
     * @immutable
     */
    public function reversed(): self;

    /**
     * @param iterable $values
     * @return self
     * @immutable
     */
    public function merged(iterable $values): self;

    /**
     * @param string $glue
     * @return string
     */
    public function join(string $glue = ''): string;

    /**
     * @return bool
     * @immutable
     */
    public function isEmpty(): bool;

    /**
     * @return array
     */
    public function toArray(): array;
}
