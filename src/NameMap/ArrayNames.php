<?php
/*
 * This file is part of the Ra5k Dave library
 * (c) 2020 GitHub/ra5k
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ra5k\Dave\NameMap;


use Ra5k\Dave\NameMap;
use Traversable, ArrayIterator;


/**
 *
 *
 *
 */
final class ArrayNames implements NameMap
{
    /**
     * @var array
     */
    private $names;

    /**
     *
     * @param iterable $sequence
     * @return self
     */
    public static function fromKeys(iterable $sequence): self
    {
        $names = [];
        $offset = 0;
        $value = null;
        //
        foreach ($sequence as $key => $value) {
            if (is_string($key)) {
                $names[$key] = $offset;
            }
            $offset++;
        }
        return new self($names);
    }

    /**
     *
     * @param array $names
     */
    public function __construct(array $names)
    {
        $this->names = $names;
    }

    /**
     *
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->names);
    }

    /**
     * @param string $name
     * @return int
     */
    public function offset(string $name): int
    {
        return $this->names[$name] ?? -1;
    }


}
