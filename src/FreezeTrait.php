<?php

namespace Solodkiy\Freeze;

use RuntimeException;

trait FreezeTrait
{
    private bool $frozen = false;

    public function freeze(): void
    {
        $this->frozen = true;
    }

    protected function assertNotFrozen(): void
    {
        if ($this->frozen) {
            throw new RuntimeException('Object ' . get_class($this) . ' was frozen');
        }
    }

    public function assertFrozen(): void
    {
        if (!$this->frozen) {
            throw new RuntimeException('Object ' . get_class($this) . ' is not frozen');
        }
    }
}
