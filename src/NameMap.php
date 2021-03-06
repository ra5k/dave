<?php
/*
 * This file is part of the Ra5k Dave library
 * (c) 2020 GitHub/ra5k
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ra5k\Dave;


use IteratorAggregate;



/**
 *
 *
 */
interface NameMap extends IteratorAggregate
{

    /**
     * @param string $name
     * @return int
     */
    public function offset(string $name): int;

}
