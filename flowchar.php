<?php
session_start(); // menyimpan data agar tidak hilang saat hitung lagi

//class//
class Toko{

    //property//
    public $nama;
    public $kartuMember;
    public $totalBelanja;
    public $diskon;
    public $totalBayar;

    //CONSTRUCTOR//
    function __construct($nama,$member,$belanja){

        $this->nama = $nama;
        $this->kartuMember = $member;
        $this->totalBelanja = intval($belanja);

    }

 //method hitung diskon yang member//
function hitungDiskon(){
    $belanja = intval($this->totalBelanja);
    if($this->kartuMember == "Ya"){
        if($belanja >= 500000){
            $this->diskon = 50000;
        }
        elseif($belanja >= 100000){
            $this->diskon = 15000;
        }
        else{
            $this->diskon = 0;
        }

    }else{

        if($belanja >= 100000){
            $this->diskon = 5000;
        }else{
            $this->diskon = 0;
        }

    }

}

    //method hitung totalbayar// 
    function hitungTotal(){
        $this->totalBayar = $this->totalBelanja - $this->diskon;
    }
}

//session array//
if(!isset($_SESSION['data'])){
    $_SESSION['data'] = [];
}

//reset data//
if(isset($_POST['reset'])){
    $_SESSION['data'] = [];
}

//proses input// 
if(isset($_POST['hitung'])){
    $nama = $_POST['nama']; //variabel
    $member = $_POST['member']; //variabel
    $belanja = $_POST['belanja']; //variabel

    //objek//
    $data = new Toko($nama,$member,$belanja);

    //method yg dipanggil//
    $data->hitungDiskon();
    $data->hitungTotal();

    //simpan ke session//
    $_SESSION['data'][] = $data;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Program Belanja OOP</title>
    </head>
<body>

<h2>Program Perhitungan Belanja</h2>

<form method="post">

Nama Pembeli :
<input type="text" name="nama" required>

<br><br>

Kartu Member :
<select name="member">
<option value="Ya">Ya</option>
<option value="Tidak">Tidak</option>
</select>

<br><br>

Total Belanja :
<input type="number" name="belanja" required>

<br><br>

<button type="submit" name="hitung">Hitung</button>
<button type="submit" name="reset" formnovalidate>Reset</button>

</form>

<br>

<h3>Data Pembeli</h3>

<table border="1" cellpadding="10" style="border-color:pink;">

<tr style="background-color:#ffe6f0;">
<th>No</th>
<th>Nama</th>
<th>Member</th>
<th>Total Belanja</th>
<th>Diskon</th>
<th>Total Bayar</th>
</tr>

<?php
$no = 1;

//perulangan//
foreach($_SESSION['data'] as $d){
?>

<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d->nama; ?></td>
<td><?php echo $d->kartuMember; ?></td>
<td><?php echo $d->totalBelanja; ?></td>
<td><?php echo $d->diskon; ?></td>
<td><?php echo $d->totalBayar; ?></td>
</tr>

<?php } ?>
</table>
</body>
</html>
