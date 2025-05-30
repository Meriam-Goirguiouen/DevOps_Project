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

namespace Predis\Cluster\Hash;

use Predis\NotSupportedException;

/**
 * Hash generator implementing the CRC-CCITT-16 algorithm used by redis-cluster.
 *
 * @deprecated 2.1.2
 */
class PhpiredisCRC16 implements HashGeneratorInterface
{
    public function __construct()
    {
        if (!function_exists('phpiredis_utils_crc16')) {
            // @codeCoverageIgnoreStart
            throw new NotSupportedException(
                'This hash generator requires a compatible version of ext-phpiredis'
            );
            // @codeCoverageIgnoreEnd
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hash($value)
    {
        return phpiredis_utils_crc16($value);
    }
}
