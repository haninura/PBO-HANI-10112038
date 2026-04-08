<?php

// Parent Class
class Employee {
    protected $nama;
    protected $gaji;
    protected $lamaKerja;

    public function __construct($nama, $gaji, $lamaKerja) {
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->lamaKerja = $lamaKerja;
    }

    public function hitungGaji() {
        return $this->gaji;
    }

    public function getInfo() {
        return "Nama: {$this->nama}, <br>Gaji: {$this->hitungGaji()}";
    }
}

// class programmer 
class Programmer extends Employee {

    public function hitungGaji() {
        $bonus = 0;

        if ($this->lamaKerja < 1) {
            $bonus = 0;
        } elseif ($this->lamaKerja >= 1 && $this->lamaKerja <= 10) {
            $bonus = 0.01 * $this->lamaKerja * $this->gaji;
        } else {
            $bonus = 0.02 * $this->lamaKerja * $this->gaji;
        }

        return $this->gaji + $bonus;
    }
}

// Class Direktur
class Direktur extends Employee {

    public function hitungGaji() {
        $bonus = 0.5 * $this->lamaKerja * $this->gaji;
        $tunjangan = 0.1 * $this->lamaKerja * $this->gaji;

        return $this->gaji + $bonus + $tunjangan;
    }
}

// Class Pegawai Mingguan
class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stok;
    private $terjual;

    public function __construct($nama, $gaji, $lamaKerja, $hargaBarang, $stok, $terjual) {
        parent::__construct($nama, $gaji, $lamaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stok = $stok;
        $this->terjual = $terjual;
    }

    public function hitungGaji() {
        $persentase = $this->terjual / $this->stok;

        if ($persentase > 0.7) {
            $bonus = 0.10 * $this->hargaBarang * $this->terjual;
        } else {
            $bonus = 0.03 * $this->hargaBarang * $this->terjual;
        }

        return $this->gaji + $bonus;
    }
}

// ================== TEST ==================

$programmer = new Programmer("Hani", 5000000, 5);
$direktur = new Direktur("Dirja", 10000000, 12);
$pegawai = new PegawaiMingguan("Dirani", 3000000, 2, 50000, 100, 80);

echo "<h3>Programmer</h3>";
echo $programmer->getInfo();

echo "<h3>Direktur</h3>";
echo $direktur->getInfo();

echo "<h3>Pegawai Mingguan</h3>";
echo $pegawai->getInfo();

?>