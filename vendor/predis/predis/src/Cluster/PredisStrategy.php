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

namespace Predis\Cluster;

use Predis\Cluster\Distributor\DistributorInterface;
use Predis\Cluster\Distributor\HashRing;

/**
 * Default cluster strategy used by Predis to handle client-side sharding.
 */
class PredisStrategy extends ClusterStrategy
{
    protected $distributor;

    /**
     * @param DistributorInterface|null $distributor Optional distributor instance.
     */
    public function __construct(?DistributorInterface $distributor = null)
    {
        parent::__construct();

        $this->distributor = $distributor ?: new HashRing();
    }

    /**
     * {@inheritdoc}
     */
    public function getSlotByKey($key)
    {
        $key = $this->extractKeyTag($key);
        $hash = $this->distributor->hash($key);

        return $this->distributor->getSlot($hash);
    }

    /**
     * {@inheritdoc}
     */
    protected function checkSameSlotForKeys(array $keys)
    {
        if (!$count = count($keys)) {
            return false;
        }

        $currentKey = $this->extractKeyTag($keys[0]);

        for ($i = 1; $i < $count; ++$i) {
            $nextKey = $this->extractKeyTag($keys[$i]);

            if ($currentKey !== $nextKey) {
                return false;
            }

            $currentKey = $nextKey;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getDistributor()
    {
        return $this->distributor;
    }
}
