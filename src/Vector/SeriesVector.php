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
class SeriesVector
{
    /**
     * @var int|float
     */
    private $start;

    /**
     * @var int|float
     */
    private $stop;

    /**
     * @var int|float
     */
    private $step;

    /**
     * @param int|float $start
     * @param int|float $stop
     * @param int|float $step
     */
    public function __construct($start, $stop, $step = 1)
    {
        $this->start = $start;
        $this->stop  = $stop;
        $this->step  = $step;
    }


}
