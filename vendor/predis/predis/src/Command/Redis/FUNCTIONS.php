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

use Predis\Command\Command as RedisCommand;
use Predis\Command\Strategy\StrategyResolverInterface;
use Predis\Command\Strategy\SubcommandStrategyResolver;

/**
 * @see https://redis.io/commands/?name=function
 *
 * Container command corresponds to any FUNCTION *.
 * Represents any FUNCTION command with subcommand as first argument.
 */
class FUNCTIONS extends RedisCommand
{
    /**
     * @var StrategyResolverInterface
     */
    private $strategyResolver;

    public function __construct()
    {
        $this->strategyResolver = new SubcommandStrategyResolver();
    }

    public function getId()
    {
        return 'FUNCTION';
    }

    public function setArguments(array $arguments)
    {
        $strategy = $this->strategyResolver->resolve('functions', strtolower($arguments[0]));
        $arguments = $strategy->processArguments($arguments);

        parent::setArguments($arguments);
        $this->filterArguments();
    }
}
