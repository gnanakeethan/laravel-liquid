<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 21.3.2019 г.
 * Time: 17:35 ч.
 */

namespace Liquid\Filters;

use Iterator;
use Liquid\Context;

class Multy
{
    /**
     * @var Context
     */
    protected $context;

    public function __construct(Context $context = null)
    {
        $this->context = $context;
    }

    /**
     * Return the size of an array or of an string
     *
     * @param mixed $input
     *
     * @return int
     */
    public function size($input)
    {
        return $this->context->getSize($input);
    }

    /**
     * @param array|Iterator|string $input
     * @param int $offset
     * @param int $length
     *
     * @return array|Iterator|string
     */
    public function slice($input, $offset, $length = null)
    {
        if ($input instanceof Iterator) {
            $input = iterator_to_array($input);
        }
        if (is_array($input)) {
            $input = array_slice($input, $offset, $length);
        } elseif (is_string($input)) {
            $input = $length === null
                ? substr($input, $offset)
                : substr($input, $offset, $length);
        }

        return $input;
    }


}