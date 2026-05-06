<?php
require_once "../Controller/KendaraanController.php";

$controller = new KendaraanController();
$data = $controller->getData();

echo "<h2>Data Kendaraan</h2>";
echo "<table border='1' cellpadding='6'>";
echo "<tr>
<th>No</th>
<th>Merek</th>
<th>Jumlah Roda</th>
<th>Harga</th>
<th>Warna</th>
<th>Bahan Bakar</th>
</tr>";

$no = 1;
foreach($data as $kendaraan){
    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$kendaraan->getMerek()."</td>";
    echo "<td>".$kendaraan->getJumlahRoda()."</td>";
    echo "<td>".$kendaraan->getHarga()."</td>";
    echo "<td>".$kendaraan->getWarna()."</td>";
    echo "<td>".$kendaraan->getBhnBakar()."</td>";
    echo "</tr>";
}
echo "</table>";
