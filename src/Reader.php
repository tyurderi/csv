<?php

namespace WCKZ\CsvUtil;

class Reader
{

    protected $options = null;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function read($filename)
    {
        $handle = fopen($filename, 'r');
        $header = $this->readLine($handle);

        $rows   = array();
        while($row = $this->readLine($handle))
        {
            $rowItem = array();
            foreach($row as $i => $value)
            {
                $rowItem[$header[$i]] = $value;
            }

            $rows[] = $rowItem;
        }

        fclose($handle);

        return $rows;
    }

    protected function readLine($handle)
    {
        return fgetcsv(
            $handle,
            $this->options->getLength(),
            $this->options->getDelimiter(),
            $this->options->getEnclosure(),
            $this->options->getEscape()
        );
    }

}