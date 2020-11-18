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

/**
 *
 *
 *
 */
class ConstVector
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @var int
     */
    private $length;

    /**
     * @param mixed $value
     * @param int $length
     */
    public function __construct(mixed $value, int $length)
    {
        $this->value  = $value;
        $this->length = $length;
    }


}
