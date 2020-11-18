<?php
/*
 * This file is part of the Ra5k Dave library
 * (c) 2020 GitHub/ra5k
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ra5k\Dave\Vector;


use Ra5k\Dave\{
    Vector,
    NameMap
};
use Ds;
use Traversable;
use Stringable;     // PHP 8

/**
 *
 *
 *
 */
final class DsVector implements Vector
{
    /**
     * @var Ds\Vector
     */
    private $vector;

    /**
     * @var NameMap
     */
    private $names;

    /**
     * @var string
     */
    private $type;

    /**
     *
     * @param iterable $values
     * @param string $type
     * @param NameMap $names
     */
    public function __construct(iterable $values, string $type = '', NameMap $names = null)
    {
        $this->vector = new Ds\Vector($values);
        $this->type = $type;
        $this->names = $names ?? NameMap\ArrayNames::fromKeys($values);
    }

    /**
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        foreach ($this->vector as $index => $value) {
            yield $index => $this->cast($value);
        }
    }

    public function offsetExists($key): bool
    {
        return isset($this->index($key));
    }

    public function offsetGet($key)
    {
        return $this->cast($this->vector[$this->index($key)]);
    }

    public function offsetSet($key, $value): void
    {
        $this->vector[$this->index($key, true)] = $this->cast($value, true);
    }

    public function offsetUnset($key): void
    {
        unset($this->vector[$this->index($key)]);
    }

    public function count(): int
    {
        return $this->vector->count();
    }

    public function contains(...$value): bool
    {
        return $this->vector->contains(...$value);
    }

    public function filter(callable $callback): Vector
    {
        $filtered = new Ds\Vector();
        foreach ($this->getIterator() as $index => $value) {
            if ($callback($value, $index, $this)) {
                $filtered->push($value);
            }
        }
        return new self($filtered);
    }

    public function first()
    {
        return $this->cast($this->vector->first());
    }

    public function get($index)
    {
        return $this->cast($this->vector->get($index));
    }

    public function isEmpty(): bool
    {
        return $this->vector->isEmpty();
    }

    public function join(string $glue = ''): string
    {
        return $this->vector->join($glue);
    }

    public function last()
    {
        return $this->cast($this->vector->last());
    }

    public function map(callable $callback): Vector
    {
        $trans = new Ds\Vector();
        $trans->allocate($this->vector->count());
        foreach ($this->getIterator() as $index => $value) {
            $trans->push($callback($value, $index, $this));
        }
        return $trans;
    }

    public function merged(iterable $values): Vector
    {
        return new self($this->vector->merge($values));
    }

    public function names(): NameMap
    {
        return $this->names;
    }

    public function pop()
    {
        return $this->cast($this->vector->pop());
    }

    public function push($element): void
    {
        $this->vector->push($this->cast($element));
    }

    public function reduce(callable $callback, $initial = null)
    {
        return $this->vector->reduce($callback, $initial);
    }

    public function remove($index): void
    {
        $this->vector->remove($index);
    }

    public function reversed(): Vector
    {
        return new self($this->vector->reversed());
    }

    public function set($key, $value): void
    {
        $this->vector->set($this->index($key, true), $this->cast($value, true));
    }

    public function slice(int $index, int $length = null): Vector
    {
        return new self($this->vector->slice($index, $length));
    }

    public function sorted(callable $comparator = null): Vector
    {
        return new self($this->vector->sorted($comparator));
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->vector->toArray();
    }

    /**
     * @param string|int $key
     * @return int
     */
    private function index($key, bool $create = false): int
    {
        if (!is_int($key)) {
            $key = $this->names->offset($key);
        }
        return $key;
    }


    private function cast($input, bool $update = false)
    {
        // int(bool $value) := (int) $value
        // string(int|float $value) := (string) $value
        // vector($scalar) := new ConstVector($scalar)
        // vector($iterable) := new self($iterable)

        return $input;
    }

    /**
     * @param Vector $value
     * @return string
     */
    private function typeOf($value): string
    {
        $type = 'unknown';
        if (is_object($value)) {
            if ($value instanceof Vector) {
                $type = 'vector';
            } else {
                $type = get_class($value);
            }
        } else {
            $type = gettype($type);
        }
        return $type;
    }

}
