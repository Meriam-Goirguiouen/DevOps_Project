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

namespace Predis\Command\Argument\Search\SchemaFields;

class VectorField extends AbstractField
{
    /**
     * @var array
     */
    protected $fieldArguments = [];

    /**
     * @param string $fieldName
     * @param string $algorithm
     * @param array  $attributeNameValueDictionary
     * @param string $alias
     */
    public function __construct(
        string $fieldName,
        string $algorithm,
        array $attributeNameValueDictionary,
        string $alias = ''
    ) {
        $this->setCommonOptions('VECTOR', $fieldName, $alias);

        array_push($this->fieldArguments, $algorithm, count($attributeNameValueDictionary));
        $this->fieldArguments = array_merge($this->fieldArguments, $attributeNameValueDictionary);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return $this->fieldArguments;
    }
}
