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

/**
 * @deprecated As of Redis version 6.2.0, this command is regarded as deprecated.
 *
 * It can be replaced by GEOSEARCH and GEOSEARCHSTORE with the FROMMEMBER arguments
 * when migrating or writing new code.
 *
 * @see http://redis.io/commands/georadiusbymember
 */
class GEORADIUSBYMEMBER extends GEORADIUS
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'GEORADIUSBYMEMBER';
    }
}
