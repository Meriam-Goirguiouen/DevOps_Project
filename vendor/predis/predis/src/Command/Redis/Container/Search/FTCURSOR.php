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

use Predis\Command\Argument\Search\CursorArguments;
use Predis\Command\Redis\Container\AbstractContainer;
use Predis\Response\Status;

/**
 * @method Status del(string $index, int $cursorId)
 * @method array  read(string $index, int $cursorId, ?CursorArguments $arguments = null)
 */
class FTCURSOR extends AbstractContainer
{
    public function getContainerCommandId(): string
    {
        return 'FTCURSOR';
    }
}
