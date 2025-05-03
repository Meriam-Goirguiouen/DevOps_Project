<?php

/*
 * This file is part of the Predis package.
 *
 * (c) 2009-2020 Daniele Alessandri
<<<<<<< HEAD
 * (c) 2021-2024 Till Krüss
=======
 * (c) 2021-2025 Till Krüss
>>>>>>> main
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Command\Redis\AbstractCommand;

use Predis\Command\Command as RedisCommand;
use Predis\Command\Traits\Keys;

abstract class BZPOPBase extends RedisCommand
{
    use Keys {
        Keys::setArguments as setKeys;
    }

    protected static $keysArgumentPositionOffset = 0;

    abstract public function getId(): string;

    public function setArguments(array $arguments)
    {
        $this->setKeys($arguments, false);
    }

    public function parseResponse($data)
    {
        $key = array_shift($data);

        if (null === $key) {
            return [$key];
        }

        return array_combine([$key], [[$data[0] => $data[1]]]);
    }
}
