<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://36.80.34.52/services/requestlpp",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('tglbayar1' => date('d/m/Y', strtotime('-1 day', strtotime(date('Y-m-d')))),'tglbayar2' => date('d/m/Y', strtotime('-1 day', strtotime(date('Y-m-d'))))),
  CURLOPT_HTTPHEADER => array(
    "Authorization: 87296F05428EB4992B538710E3BBA70E",
  ),
));

$response = curl_exec($curl);

$response = json_decode($response,true);

curl_close($curl);
?>
<table>
  <tr>
    <th>No</th>
    <th>NOSAMBUNG</th>
<th>NAMA</th>
<th>BULAN</th>
<th>DENDA_RP</th>
<th>TAGIHAN_RP</th>
<th>TGL_BAYAR</th>
  </tr>

<?php
$i = 1;
foreach ($response['rekening_air'] as $key ) {
   echo "<tr>";
   echo "<td>".$i++."</td>";
   echo "<td>".$key['NOSAMBUNG']."</td>";
echo "<td>".$key['NAMA']."</td>";
echo "<td>".$key['BULAN']."</td>";
echo "<td>".$key['DENDA_RP']."</td>";
echo "<td>".$key['TAGIHAN_RP']."</td>";
echo "<td>".$key['TGL_BAYAR']."</td>";
   echo "</tr>";
}

echo "<br>";
echo "<b> Tanggal Trx : ";
echo date('d/m/Y', strtotime('-1 day', strtotime(date('Y-m-d'))))."</b>";
echo "<br>";
echo "<br>";
// print_r($response['rekening_air']);
?>
</table>
