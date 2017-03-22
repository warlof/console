<?php
/**
 * User: Warlof Tutsimo <loic.leuilliot@gmail.com>
 * Date: 19/03/2017
 * Time: 14:32
 */

namespace Seat\Console\Readers;


abstract class AbstractReader
{
    protected $file;
    protected $error;
    protected $success;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->error = 0;
        $this->success = 0;
    }

    /**
     * @return int The total of success in the process
     */
    public function getSuccess() : int
    {
        return $this->success;
    }

    /**
     * @return int The total of error in the process
     */
    public function getError() : int
    {
        return $this->error;
    }

    /**
     * @return int The total of processed item
     */
    public function getTotal() : int
    {
        return $this->success + $this->error;
    }

    /**
     * Parse the yaml file
     * @return void
     */
    public abstract function parse();

    /**
     * Allow to check the structure of an item from the collection
     *
     * @param mixed $item The item from which the structure must be checked
     * @return bool True if the structure has been successfully checked
     */
    protected abstract function checkItemStructure($item) : bool;
}