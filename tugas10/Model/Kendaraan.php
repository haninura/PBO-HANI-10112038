<?php
class Kendaraan {
    private $Merek, $JumlahRoda, $Harga, $Warna, $BhnBakar;

    public function __construct($merek, $jumlahroda, $harga, $warna, $bahanbakar){
        $this->Merek = $merek;
        $this->JumlahRoda = $jumlahroda;
        $this->Harga = $harga;
        $this->Warna = $warna;
        $this->BhnBakar = $bahanbakar;
    }

    // Getter
    public function getMerek(){ return $this->Merek; }
    public function getJumlahRoda(){ return $this->JumlahRoda; }
    public function getHarga(){ return $this->Harga; }
    public function getWarna(){ return $this->Warna; }
    public function getBhnBakar(){ return $this->BhnBakar; }
}
