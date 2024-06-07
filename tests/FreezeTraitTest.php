<?php

use PHPUnit\Framework\TestCase;
use Solodkiy\Freeze\FreezeTrait;

class FreezeTraitTest extends TestCase
{
    public function testFreeze(): void
    {
        $object = $this->createTestObject();
        $object->write();
        $object->freeze();
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/Object class@anonymous.* was frozen/');
        $object->write();
    }

    public function testFreeze2(): void
    {
        $object = $this->createTestObject();
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessageMatches('/Object class@anonymous.* is not frozen/');
        $object->assertFrozen();
    }

    public function testFreeze3(): void
    {
        $this->expectNotToPerformAssertions();

        $object = $this->createTestObject();
        $object->freeze();
        $object->assertFrozen();
    }

    private function createTestObject(): object
    {
        return new class {
            use FreezeTrait;

            public function write(): void
            {
                $this->assertNotFrozen();
            }
        };
    }
}