<?php
require_once __DIR__ . '/../catatan.php';

$id = 3;
$catatanData = catatan::getById($id);

if ($catatanData) {
    $catatan = new catatan();
    $catatan->setJudul($catatanData['judul'] . ' (Diperbarui)')
            ->setIsi($catatanData['isi'] . ' (Diperbarui)');

    if ($catatan->update($id)) {
        echo "Catatan {$id} berhasil diperbarui";
    } else {
        echo "Gagal memperbarui catatan";
    }
}