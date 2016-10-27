<?php

namespace Potherca\TestWorkshop;

use Ropbot\WordWrapInterface;

class WordWrapper implements WordWrapInterface
{
    /** @var null|int */
    private $limit;

    public function __construct($limit = null)
    {
        if ($limit !== null && is_int($limit) === false) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Given limit should be of typ "%s" type "%s" given.',
                    'integer',
                    gettype($limit)
                )
            );
        }
        $this->limit = $limit;
    }

    public function wrap($input)
    {
        if ($this->limit > 0) {
            if ($input > $this->limit) {
                $output = null;
            } else {
                $pieces = explode(' ', $input);
                $output = implode("\n", $pieces);
            }
        } else {
            $output = $input;
        }

        return $output;
    }
}
