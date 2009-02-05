<?php
/**
 * A Span represents a range of time.
 *
 * @package Horde_Date
 */

/**
 * @package Horde_Date
 */
class Horde_Date_Span
{
    /**
     * @var Horde_Date
     */
    public $begin;

    /**
     * @var Horde_Date
     */
    public $end;

    public function __construct($begin, $end)
    {
        $this->begin = $begin;
        $this->end = $end;
    }

    /**
     * Return the width of this span in seconds
     */
    public function width()
    {
        return $this->end->timestamp() - $this->begin->timestamp();
    }

    /**
     * Add a number of seconds to this span, returning the new span
     */
    public function add($factor)
    {
        return new Horde_Date_Span($this->begin->add($factor), $this->end->add($factor));
    }

    /**
     * Subtract a number of seconds from this span, returning the new span.
     */
    public function sub($factor)
    {
        return new Horde_Date_Span($this->begin->sub($factor), $this->end->sub($factor));
    }

    public function __toString()
    {
        return '(' . $this->begin . '..' . $this->end . ')';
    }

}
