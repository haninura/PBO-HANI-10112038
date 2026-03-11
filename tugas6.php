<?php
class BangunRuang {

    public $jenis;
    public $sisi;
    public $jari;
    public $tinggi;

    function __construct($jenis, $sisi, $jari, $tinggi){
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jari = $jari;
        $this->tinggi = $tinggi;
    }

    function hitungVolume(){

        switch($this->jenis){

            case "Bola":
                return (4/3) * pi() * pow($this->jari,3);
            break;

            case "Kerucut":
                return (1/3) * pi() * pow($this->jari,2) * $this->tinggi;
            break;

            case "Limas Segi Empat":
                return (1/3) * pow($this->sisi,2) * $this->tinggi;
            break;

            case "Kubus":
                return pow($this->sisi,3);
            break;

            case "Tabung":
                return pi() * pow($this->jari,2) * $this->tinggi;
            break;

        }
    }
}

$data = [
    ["Bola",0,7,0],
    ["Kerucut",0,14,10],
    ["Limas Segi Empat",8,0,24],
    ["Kubus",30,0,0],
    ["Tabung",0,7,10]
];
?>

<!DOCTYPE html>
<html>
<head>
<title>Volume Bangun Ruang</title>
<style>
table{
border-collapse: collapse;
width: 70%;
}

th{
background: pink;
color: black;
padding:8px;
}

td{
padding:7px;
text-align:center;
border:1px solid black;
}
</style>
</head>

<body>

<h3>Tabel Volume Bangun Ruang</h3>

<table border="1">
<tr>
<th>Jenis Bangun Ruang</th>
<th>Sisi</th>
<th>Jari-jari</th>
<th>Tinggi</th>
<th>Volume</th>
</tr>

<?php
foreach($data as $d){

$obj = new BangunRuang($d[0],$d[1],$d[2],$d[3]);
$volume = $obj->hitungVolume();

echo "<tr>
<td>$d[0]</td>
<td>$d[1]</td>
<td>$d[2]</td>
<td>$d[3]</td>
<td>$volume</td>
</tr>";

}
?>

</table>

</body>
</html>