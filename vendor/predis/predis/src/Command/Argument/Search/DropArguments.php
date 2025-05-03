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

namespace Predis\Command\Argument\Search;

use Predis\Command\Argument\ArrayableArgument;

class DropArguments implements ArrayableArgument
{
    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * Drop operation that, if set, deletes the actual document hashes.
     *
     * @return $this
     */
    public function dd(): self
    {
        $this->arguments[] = 'DD';

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->arguments;
    }
}
