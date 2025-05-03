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

namespace Predis\Command\Strategy\ContainerCommands\Functions;

use Predis\Command\Strategy\SubcommandStrategyInterface;

class LoadStrategy implements SubcommandStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function processArguments(array $arguments): array
    {
        if (count($arguments) <= 2) {
            return $arguments;
        }

        $processedArguments = [$arguments[0]];
        $replace = array_pop($arguments);

        if (is_bool($replace) && $replace) {
            $processedArguments[] = 'REPLACE';
        } elseif (!is_bool($replace)) {
            $processedArguments[] = $replace;
        }

        $processedArguments[] = $arguments[1];

        return $processedArguments;
    }
}
