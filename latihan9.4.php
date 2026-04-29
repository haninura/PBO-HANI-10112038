<?php
//akses properties
class Kendaraan
{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar;
    var $harga;
    var $merek;
    var $tahunPembuatan;

    // setter & getter merek
    function setMerek($x){
        $this->merek = $x;
    }

    function getMerek(){
        return $this->merek;
    }

    // setter & getter harga
    function setHarga($y){
        $this->harga = $y;
    }

    function getHarga(){
        return $this->harga;
    }
}

// instansiasi objek
$kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Yamaha Mio');
$kendaraan1->setHarga(10000000);

// output
echo "Merek : ".$kendaraan1->getMerek()."<br />";
echo "Harga : Rp ".$kendaraan1->getHarga();
?>
