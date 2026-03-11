<?php

class KeranjangBuah {
    // Properti untuk menyimpan data
    private $daftarBuah;

    // Constructor untuk mengisi data saat objek dibuat
    public function __construct($arrayBuah) {
        $this->daftarBuah = $arrayBuah;
    }

    // Method untuk menampilkan semua buah
    public function tampilkanBuah() {
        foreach($this->daftarBuah as $b) {
            echo $b . "<br>";
        }
    }
}

// Cara Penggunaan:
$data = ["Apel", "Jeruk", "Mangga"];
$myOrder = new KeranjangBuah($data);
$myOrder->tampilkanBuah();

?>