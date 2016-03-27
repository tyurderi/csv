<?php

namespace TM\Csv;

class Reader
{

    protected $options = null;

    public function __construct(Options $options = null)
    {
        if($options === null)
        {
            $options = Options::getInstance();
        }

        $this->options = $options;
    }

    public function readString($string)
    {
        $handle = fopen('php://memory', 'r+');
        fwrite($handle, $string);
        rewind($handle);

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

    public function read($filename)
    {
        $string = file_get_contents($filename);

        return $this->readString($string);
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