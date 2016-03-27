<?php

namespace TM\Csv;

class Writer
{

    /**
     * @var Options
     */
    protected static $options = null;

    public static function writeString($rows, Options $options = null)
    {
        self::applyOptions($options);

        $handle = fopen('php://memory', 'w');
        $header = array_keys($rows[0]);

        self::writeLine($handle, $header);
        foreach($rows as $row)
        {
            self::writeLine($handle, $row);
        }

        rewind($handle);
        $contents = stream_get_contents($handle);

        fclose($handle);

        return $contents;
    }

    public static function write($filename, $rows, Options $options = null)
    {
        self::applyOptions($options);

        $content = self::writeString($rows, $options);
        file_put_contents($filename, $content);
    }

    protected static function writeLine($handle, $row)
    {
        return fputcsv(
            $handle,
            $row,
            self::$options->getDelimiter(),
            self::$options->getEnclosure()
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