<?php

namespace TM\Csv;

class Reader
{

    /**
     * @var Options
     */
    protected static $options = null;

    public static function readString($string, Options $options = null)
    {
        self::applyOptions($options);

        $handle = fopen('php://memory', 'r+');
        fwrite($handle, $string);
        rewind($handle);

        $header = self::readLine($handle);

        $rows   = array();
        while($row = self::readLine($handle))
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

    public static function read($filename, Options $options = null)
    {
        $string = file_get_contents($filename);

        return self::readString($string, $options);
    }

    protected static function readLine($handle)
    {
        return fgetcsv(
            $handle,
            self::$options->getLength(),
            self::$options->getDelimiter(),
            self::$options->getEnclosure(),
            self::$options->getEscape()
        );
    }

    protected static function applyOptions(Options $options = null)
    {
        if($options !== null)
        {
            self::$options = $options;
        }
        else
        {
            self::$options = Options::getInstance();
        }
    }

}