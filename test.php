<?php
/**
 * Created by PhpStorm.
 * User: tm-rm
 * Date: 15.03.16
 * Time: 10:07
 */

require_once __DIR__ . '/vendor/autoload.php';

TM\Csv\Options::getInstance(0, ';');
$writer  = new TM\Csv\Writer();

$csv = $writer->writeString(array(
    array(
        'id'    => 1,
        'name'  => 'Hello World'
    ),
    array(
        'id'    => 2,
        'name'  => 'Bye World'
    )
));

$reader = new TM\Csv\Reader();
$csv    = $reader->readString($csv);

var_dump($csv);

