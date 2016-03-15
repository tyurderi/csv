<?php
/**
 * Created by PhpStorm.
 * User: tm-rm
 * Date: 15.03.16
 * Time: 10:07
 */

require_once __DIR__ . '/vendor/autoload.php';

$options = new WCKZ\CsvUtil\Options();
$writer  = new WCKZ\CsvUtil\Writer($options);

$writer->write('test.csv', array(
    array(
        'id'    => 1,
        'name'  => 'Hello World'
    ),
    array(
        'id'    => 2,
        'name'  => 'Bye World'
    )
));

$reader = new WCKZ\CsvUtil\Reader($options);
$csv    = $reader->read('test.csv');

var_dump($csv);

