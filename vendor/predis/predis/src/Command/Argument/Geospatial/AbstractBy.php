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

namespace Predis\Command\Argument\Geospatial;

use UnexpectedValueException;

abstract class AbstractBy implements ByInterface
{
    /**
     * @var string[]
     */
    private static $unitEnum = ['m', 'km', 'ft', 'mi'];

    /**
     * @var string
     */
    protected $unit;

    /**
     * {@inheritDoc}
     */
    abstract public function toArray(): array;

    /**
     * @param  string $unit
     * @return void
     */
    protected function setUnit(string $unit): void
    {
        if (!in_array($unit, self::$unitEnum, true)) {
            throw new UnexpectedValueException('Wrong value given for unit');
        }

        $this->unit = $unit;
    }
}
