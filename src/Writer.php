<?php

namespace WCKZ\CsvUtil;

class Writer
{

    protected $options = null;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function write($filename, $rows)
    {
        $handle = fopen($filename, 'w');
        $header = array_keys($rows[0]);

        $this->writeLine($handle, $header);
        foreach($rows as $row)
        {
            $this->writeLine($handle, $row);
        }

        fclose($handle);

        return $rows;
    }

    protected function writeLine($handle, $row)
    {
        return fputcsv(
            $handle,
            $row,
            $this->options->getDelimiter(),
            $this->options->getEnclosure()//,
   //         $this->options->getEscape()
        );
    }

}