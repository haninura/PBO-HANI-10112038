<?php
// Class induk: Tabungan
class Tabungan {
    // property private: hanya bisa diakses lewat method
    private $saldo;

    // constructor untuk set saldo awal
    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    // method public setor tunai
    public function setor($jumlah) {
        $this->saldo += $jumlah;
        echo "Setor Rp$jumlah berhasil!\n";
    }

    // method public tarik tunai
    public function tarik($jumlah) {
        if ($jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            echo "Tarik Rp$jumlah berhasil!\n";
        } else {
            echo "Saldo tidak cukup!\n";
        }
    }

    // method public cek saldo
    public function getSaldo() {
        return $this->saldo;
    }
}

// Class anak Siswa
class Siswa extends Tabungan {
    private $nama;

    public function __construct($nama, $saldoAwal) {
        parent::__construct($saldoAwal); // panggil constructor induk
        $this->nama = $nama;
    }

    public function tampilkanSaldo() {
        echo "Saldo milik {$this->nama}: Rp".$this->getSaldo()."\n";
    }

    public function getNama() {
        return $this->nama;
    }
}

// Array siswa
$siswa = [
    new Siswa("Siswa 1", 50000),
    new Siswa("Siswa 2", 75000),
    new Siswa("Siswa 3", 100000)
];

// tampilkan saldo awal dengan perulangan
echo "=== Saldo Awal Tabungan Sekolah ===\n";
foreach ($siswa as $s) {
    $s->tampilkanSaldo();
}

// interaksi dengan user via fgets
echo "\nPilih nomor siswa (1-3): ";
$pilih = trim(fgets(STDIN));

if ($pilih >= 1 && $pilih <= 3) {
    $s = $siswa[$pilih-1];
    echo "Halo, ".$s->getNama()."\n";
    echo "Pilih transaksi (1=Setor, 2=Tarik): ";
    $transaksi = trim(fgets(STDIN));

    echo "Masukkan jumlah: ";
    $jumlah = trim(fgets(STDIN));

    if ($transaksi == 1) {
        $s->setor($jumlah);
    } elseif ($transaksi == 2) {
        $s->tarik($jumlah);
    } else {
        echo "Pilihan transaksi tidak valid!\n";
    }

    // tampilkan saldo akhir semua siswa
echo "\n=== Saldo Akhir Tabungan Sekolah ===\n";
foreach ($siswa as $s) {
    $s->tampilkanSaldo();
}

}
?>
