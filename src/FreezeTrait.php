<?php

namespace Solodkiy\Freeze;

trait FreezeTrait
{
    /**
     * @var bool
     */
    private $frozen = false;

    public function freeze()
    {
        $this->frozen = true;
    }

    protected function assertNotFrozen()
    {
        if ($this->frozen) {
            throw new \RuntimeException('Object '.get_class($this).' was frozen');
        }
    }

    public function assertFrozen()
    {
        if (!$this->frozen) {
            throw new \RuntimeException('Object '.get_class($this).' is not frozen');
        }
    }

}
