<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;

    // Constructor
    public function __construct($nama, $golongan, $jamLembur){
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
    }

    // Method gaji pokok
    public function getGajiPokok(){
        switch($this->golongan){
            case "Ib": return 1250000;
            case "Ic": return 1300000;
            case "Id": return 1350000;
            case "IIa": return 2000000;
            case "IIb": return 2100000;
            case "IIc": return 2200000;
            case "IId": return 2300000;
            case "IIIa": return 2400000;
            case "IIIb": return 2500000;
            case "IIIc": return 2600000;
            case "IIId": return 2700000;
            case "IVa": return 2800000;
            case "IVb": return 2900000;
            case "IVc": return 3000000;
            case "IVd": return 3100000;
            default: return 0;
        }
    }

    // Hitung total gaji
    public function hitungTotalGaji(){
        $gajiPokok = $this->getGajiPokok();
        $lembur = $this->jamLembur * 15000;

        return $gajiPokok + $lembur;
    }

    // Destructor
    public function __destruct(){
        // otomatis dipanggil saat objek selesai
    }
}

// Data awal
$data = [
    new Karyawan("Winny","IIb",30),
    new Karyawan("Stendy","IIIc",32),
    new Karyawan("Alfred","IVb",30)
];

function tampilkanData($data){
    echo "\n===== DATA GAJI KARYAWAN =====\n";
    echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";

    $no = 1;
    foreach($data as $k){
        echo $no++ ." | ".$k->nama." | ".$k->golongan." | ".$k->jamLembur." | Rp".number_format($k->hitungTotalGaji(),0,",",".")."\n";
    }
}

// MENU
do {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";

    $pilih = trim(fgets(STDIN));

    switch($pilih){

        case 1:
            tampilkanData($data);
        break;

        case 2:
            echo "Nama: ";
            $nama = trim(fgets(STDIN));

            echo "Golongan: ";
            $gol = trim(fgets(STDIN));

            echo "Jam Lembur: ";
            $jam = trim(fgets(STDIN));

            $data[] = new Karyawan($nama,$gol,$jam);
            echo "Data berhasil ditambah!\n";
        break;

        case 3:
            tampilkanData($data);
            echo "Pilih nomor yang diupdate: ";
            $i = trim(fgets(STDIN)) - 1;

            echo "Nama baru: ";
            $data[$i]->nama = trim(fgets(STDIN));

            echo "Golongan baru: ";
            $data[$i]->golongan = trim(fgets(STDIN));

            echo "Jam lembur baru: ";
            $data[$i]->jamLembur = trim(fgets(STDIN));

            echo "Data berhasil diupdate!\n";
        break;

        case 4:
            tampilkanData($data);
            echo "Pilih nomor yang dihapus: ";
            $i = trim(fgets(STDIN)) - 1;

            unset($data[$i]);
            $data = array_values($data);

            echo "Data berhasil dihapus!\n";
        break;

        case 5:
            echo "Keluar program...\n";
        break;

        default:
            echo "Pilihan tidak valid!\n";
    }

} while($pilih != 5);

?>