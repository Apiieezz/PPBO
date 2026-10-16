<?php
require_once __DIR__ . '/../catatan.php';
$detail = catatan::getById(4);
if ($detail) {
echo "Judul: " . $detail['judul'] . PHP_EOL;
echo "Isi: " . $detail['isi'] . PHP_EOL;
} else {
echo "Catatan tidak ditemukan.";
}