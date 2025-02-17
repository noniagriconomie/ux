<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\UX\LiveComponent\Tests\Fixture\Component;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\Tests\Fixture\Entity\Entity1;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
#[AsLiveComponent('component1')]
final class Component1
{
    #[LiveProp]
    public ?Entity1 $prop1;

    #[LiveProp]
    public \DateTimeInterface $prop2;

    #[LiveProp(writable: true)]
    public $prop3;

    public $prop4;

    #[LiveAction]
    public function method1()
    {
    }

    public function method2()
    {
    }
}
