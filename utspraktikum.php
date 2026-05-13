<?php
//ini class mahasiswa
class Mahasiswa {
    public $nama;
    public $nilai;

    // Constructor
    public function __construct($nama, $nilai) {
        $this->nama = $nama;
        $this->nilai = $nilai;
    }

    // Method untuk menentukan grade
    public function hitungGrade() {
        if ($this->nilai >= 85) {
            return "A";
        } elseif ($this->nilai >= 70) {
            return "B";
        } elseif ($this->nilai >= 60) {
            return "C";
        } else {
            return "D";
        }
    }

}

// data awal 3 mahasiswa
$dataNilai = [
    new Mahasiswa("Hani", 90),
    new Mahasiswa("Dirja", 75),
    new Mahasiswa("Dirani", 58)
];

// Fungsi tampil data
function tampilkanData($dataNilai) {
    echo "\nTampilan Data Nilai\n";
    echo "No | Nama | Nilai | Grade\n";

    //perulangan 
    foreach ($dataNilai as $i => $mhs) {
        echo ($i + 1) . " | " .
             $mhs->nama . " | " .
             $mhs->nilai . " | " .
             $mhs->hitungGrade() . "\n";
    }
}

// Menu utama
do {
    echo "\n===== MENU NILAI =====\n";
    echo "1. Tampilkan Data Nilai\n";
    echo "2. Tambah Data\n";
    echo "3. Update Nilai\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";

    $pilihan = trim(fgets(STDIN));
    //fgets(STDIN): Berfungsi untuk membaca apa pun yang kamu ketik di keyboard (Terminal)

    switch ($pilihan) {
        case 1:
            tampilkanData($dataNilai);
            break;

        case 2:
            echo "Masukkan nama: ";
            $nama = trim(fgets(STDIN));

            echo "Masukkan nilai: ";
            $nilai = trim(fgets(STDIN));

            $dataNilai[] = new Mahasiswa($nama, $nilai);
            echo "Data berhasil ditambahkan.\n";
            break;

        case 3:
            tampilkanData($dataNilai);

            echo "Pilih nomor mahasiswa: ";
            $nomor = trim(fgets(STDIN)) - 1;

            if (isset($dataNilai[$nomor])) {
                echo "Masukkan nilai baru: ";
                $nilaiBaru = trim(fgets(STDIN));
                $dataNilai[$nomor]->nilai = $nilaiBaru;
                echo "Nilai berhasil diperbarui.\n";
            } else {
                echo "Nomor tidak valid.\n";
            }
            break;

        case 4:
            tampilkanData($dataNilai);

            echo "Pilih nomor mahasiswa: ";
            $nomor = trim(fgets(STDIN)) - 1;

            if (isset($dataNilai[$nomor])) {
                unset($dataNilai[$nomor]);
                $dataNilai = array_values($dataNilai); 
                echo "Data berhasil dihapus.\n";
            } else {
                echo "Nomor tidak valid.\n";
            }
            break;

        case 5:
            echo "Program selesai.\n";
            break;

        default:
            echo "Menu tidak tersedia.\n";
    }

} while ($pilihan != 5);

?>