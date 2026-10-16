<?php
require_once __DIR__ . '/../catatan.php';

$data = catatan::getAll();

foreach ($data as $item) {
    echo $item['id'] . ". " . $item['judul'] . " - " . $item['isi'];
    echo PHP_EOL;
}