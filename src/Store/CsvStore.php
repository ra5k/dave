<?php
/*
 * This file is part of the Ra5k Dave library
 * (c) 2020 GitHub/ra5k
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ra5k\Dave\Store;


use Ra5k\Dave\{
    Vector
};
use SplFileInfo;


/**
 *
 *
 *
 */
final class CsvStore
{
    /**
     * @var SplFileInfo
     */
    private $file;

    /**
     * @var string
     */
    private $delimiter;

    /**
     * @var string
     */
    private $enclosure;

    /**
     * @var string
     */
    private $escape;

    /**
     *
     * @param string $file
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape
     */
    public function __construct(string $file, string $delimiter = ',', string $enclosure = '"', string $escape = '"')
    {
        $this->file      = new SplFileInfo($file);
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape    = $escape;
    }

    /**
     * @param string $filename
     * @return Vector
     */
    public function load(): Vector
    {
        $source = $this->file->open('r');
        $source->setCsvControl($this->delimiter, $this->enclosure, $this->escape);
    }

    /**
     *
     * @param Vector $data
     * @return void
     */
    public function save(Vector $data): void
    {
        $dest = $this->file->open('w');
        $dest->setCsvControl($this->delimiter, $this->enclosure, $this->escape);

    }

}
