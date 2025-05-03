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

namespace Predis\Command\Redis\Container\Search;

use Predis\Command\Redis\Container\AbstractContainer;
use Predis\Response\Status;

/**
 * @method array  get(string $option)
 * @method array  help(string $option)
 * @method Status set(string $option, $value)
 */
class FTCONFIG extends AbstractContainer
{
    public function getContainerCommandId(): string
    {
        return 'FTCONFIG';
    }
}
