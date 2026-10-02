<?php

abstract class MenuBakso
{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getHargaDasar()
    {
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();

    abstract public function getJenis();
}

class BaksoBiasa extends MenuBakso
{
    private $butir;

    public function __construct($id, $nama, $hargaDasar, $butir)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->butir = $butir;
    }

    public function hitungTotal()
    {
        return $this->hargaDasar * $this->butir;
    }

    public function getJenis()
    {
        return "Bakso Biasa";
    }

    public function cetakDetail()
    {
        return $this->butir . " butir";
    }
}

class BaksoJumbo extends MenuBakso
{
    private $isi;

    public function __construct($id, $nama, $hargaDasar, $isi)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->isi = $isi;
    }

    public function hitungTotal()
    {
        return $this->hargaDasar + (3000 * $this->isi);
    }

    public function getJenis()
    {
        return "Bakso Jumbo";
    }

    public function cetakDetail()
    {
        return $this->isi . " isi";
    }
}

class MieAyam extends MenuBakso
{
    private $porsi;

    public function __construct($id, $nama, $hargaDasar, $porsi)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->porsi = $porsi;
    }

    public function hitungTotal()
    {
        $total = $this->hargaDasar * $this->porsi;

        if ($total > 50000) {
            $total = $total - ($total * 0.10);
        }

        return $total;
    }

    public function getJenis()
    {
        return "Mie Ayam";
    }

    public function cetakDetail()
    {
        return $this->porsi . " porsi";
    }
}

$menu1 = new BaksoBiasa(1, "Hafizh", 5000, 8);
$menu2 = new BaksoJumbo(2, "Adli", 20000, 5);
$menu3 = new MieAyam(3, "Raihan", 15000, 4);
$menu4 = new BaksoBiasa(4, "Rasya", 5000, 10);
$menu5 = new MieAyam(5, "Atong", 18000, 4);

$daftarMenu = [
    $menu1,
    $menu2,
    $menu3,
    $menu4,
    $menu5
];

$totalKeseluruhan = 0;

echo "===============================================================<br>";
echo " No | ID | Nama           | Jenis        | Harga Dasar | Total<br>";
echo "===============================================================<br>";

$no = 1;

foreach ($daftarMenu as $menu) {

    echo $no . "  | ";
    echo $menu->getId() . "  | ";
    echo $menu->getNama() . "  | ";
    echo $menu->getJenis() . " | ";
    echo "Rp" . number_format($menu->getHargaDasar(), 0, ',', '.') . " | ";
    echo "Rp" . number_format($menu->hitungTotal(), 0, ',', '.');
    echo "<br>";

    $totalKeseluruhan += $menu->hitungTotal();

    $no++;
}

echo "===============================================================<br>";
echo "Total Keseluruhan: Rp" .
    number_format($totalKeseluruhan, 0, ',', '.') . "<br>";

?>