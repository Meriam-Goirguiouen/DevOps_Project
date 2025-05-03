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

namespace Predis\Command\Traits;

use Predis\Command\Command;

/**
 * @mixin Command
 */
trait Replace
{
    public function setArguments(array $arguments)
    {
        $replace = array_pop($arguments);

        if (is_bool($replace) && $replace) {
            $arguments[] = 'REPLACE';
        } elseif (!is_bool($replace)) {
            $arguments[] = $replace;
        }

        parent::setArguments($arguments);
    }
}
