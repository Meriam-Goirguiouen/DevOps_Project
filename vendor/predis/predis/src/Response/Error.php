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

namespace Predis\Response;

/**
 * Represents an error returned by Redis (-ERR responses) during the execution
 * of a command on the server.
 */
class Error implements ErrorInterface
{
    private $message;

    /**
     * @param string $message Error message returned by Redis
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorType()
    {
        [$errorType] = explode(' ', $this->getMessage(), 2);

        return $errorType;
    }

    /**
     * Converts the object to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getMessage();
    }
}
