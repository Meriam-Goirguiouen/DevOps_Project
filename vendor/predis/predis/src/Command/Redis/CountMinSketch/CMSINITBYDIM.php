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

namespace Predis\Command\Redis\CountMinSketch;

use Predis\Command\Command as RedisCommand;

/**
 * @see https://redis.io/commands/cms.initbydim/
 *
 * Initializes a Count-Min Sketch to dimensions specified by user.
 */
class CMSINITBYDIM extends RedisCommand
{
    public function getId()
    {
        return 'CMS.INITBYDIM';
    }
}
