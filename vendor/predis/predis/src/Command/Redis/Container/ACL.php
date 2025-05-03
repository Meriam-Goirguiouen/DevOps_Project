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

namespace Predis\Command\Redis\Container;

use Predis\Response\Status;

/**
<<<<<<< HEAD
=======
 * @method array  cat(string $category = null)
>>>>>>> main
 * @method Status dryRun(string $username, string $command, ...$arguments)
 * @method array  getUser(string $username)
 * @method Status setUser(string $username, string ...$rules)
 */
class ACL extends AbstractContainer
{
    public function getContainerCommandId(): string
    {
        return 'acl';
    }
}
