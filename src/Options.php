<?php

namespace WCKZ\CsvUtil;

class Options
{

    protected $length = 0;

    protected $delimiter = ',';

    protected $enclosure = '"';

    protected $escape = '\\';

    public function __construct($length = 0, $delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        $this->length    = $length;
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape    = $escape;
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