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

namespace Predis\Command\Redis;

use Predis\Command\Command as RedisCommand;
use Predis\Command\Traits\Keys;

/**
 * @see https://redis.io/commands/fcall/
 *
 * Invoke a function.
 */
class FCALL extends RedisCommand
{
    use Keys;

    protected static $keysArgumentPositionOffset = 1;

    public function getId()
    {
        return 'FCALL';
    }
}
