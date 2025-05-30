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

namespace Predis\Command\Redis\TDigest;

use Predis\Command\Command as RedisCommand;

/**
 * @see https://redis.io/commands/tdigest.create/
 *
 * Allocates memory and initializes a new t-digest sketch.
 */
class TDIGESTCREATE extends RedisCommand
{
    public function getId()
    {
        return 'TDIGEST.CREATE';
    }

    public function setArguments(array $arguments)
    {
        if (!empty($arguments[1])) {
            $arguments[2] = $arguments[1];
            $arguments[1] = 'COMPRESSION';
        } elseif (array_key_exists(1, $arguments) && $arguments[1] < 1) {
            array_pop($arguments);
        }

        parent::setArguments($arguments);
    }
}
