<?php

namespace WCKZ\CsvUtil;

class Writer
{

    protected $options = null;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function writeString($rows)
    {
        $handle = fopen('php://memory', 'w');
        $header = array_keys($rows[0]);

        $this->writeLine($handle, $header);
        foreach($rows as $row)
        {
            $this->writeLine($handle, $row);
        }

        rewind($handle);
        $contents = stream_get_contents($handle);

        fclose($handle);

        return $contents;
    }

    public function write($filename, $rows)
    {
        $content = $this->writeString($rows);
        file_put_contents($filename, $content);
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