<?php

namespace TM\Csv;

class Options
{

    protected static $instance = null;

    protected $length    = 0;

    protected $delimiter = ',';

    protected $enclosure = '"';

    protected $escape    = '\\';

    public function __construct($length = 0, $delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        $this->length    = $length;
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape    = $escape;
    }

    public static function getInstance($length = 0, $delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        if(self::$instance === null)
        {
            self::$instance = new self($length, $delimiter, $enclosure, $escape);
        }

        return self::$instance;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getDelimiter()
    {
        return $this->delimiter;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function getEnclosure()
    {
        return $this->enclosure;
    }

    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;
    }

    public function getEscape()
    {
        return $this->escape;
    }

    public function setEscape($escape)
    {
        $this->escape = $escape;
    }

}