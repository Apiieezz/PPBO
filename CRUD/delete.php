<?php
require_once __DIR__ . '/../catatan.php';
$id =3;
$hapus = catatan::delete($id);
if ($hapus) {
echo "Catatan {$id} berhasil dihapus";
} else {
echo "Gagal menghapus catatan";
}