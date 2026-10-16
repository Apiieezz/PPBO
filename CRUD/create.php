<?php
require_once '../Catatan.php';
$c = new Catatan();
$hasil = $c->setJudul("Tong")
->setIsi("Jualan Che Heun Tiaw")
->save();
echo $hasil ? "Berhasil disimpan" : "Gagal";