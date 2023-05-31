<?php

$jsonData = file_get_contents('../json/json1.json');
$data = json_decode($jsonData, true);
// var_dump($data);
$summaryProjectX = 0;
$summaryProjectY = 0;
$summaryProjectZ = 0;
// $projectX = [];
foreach ($data['kabupaten'] as $key => $value) {
  // var_dump($value);
  $summaryProjectY = 0;
  foreach ($value['kecamatan'] as $keyKecamatan => $kecamatan) {
    // var_dump($kecamatan);
    $summaryProjectZ = 0;
    foreach ($kecamatan['desa'] as $desa) {
      // var_dump($desa);
      $summaryProjectZ += $desa['nilai-project'];
    }
    $data['kabupaten'][$key]['kecamatan'][$keyKecamatan]['nilai-project'] = $summaryProjectZ;
    $summaryProjectY +=  $data['kabupaten'][$key]['kecamatan'][$keyKecamatan]['nilai-project'];
    $data['kabupaten'][$key]['nilai-project'] = $summaryProjectY;

    // $summaryProjectX += $data['kabupaten'][$key]['nilai-project'];
    // $data['nilai-project'] = $summaryProjectX;
    // $data['kabupaten'][$key]['nilai-project'] = $summaryProjectX;
    // $data['kabupaten'][$key] = $summaryProjectX;
  }
  $summaryProjectX += $data['kabupaten'][$key]['nilai-project'];
  $data['nilai-project'] = $summaryProjectX;
  // $data['kabupaten'][$key]
}

var_dump($data);
echo "x= $summaryProjectX\n";
foreach ($data['kabupaten'] as $kabupaten) {
  echo "y= " . $kabupaten['nilai-project'] . "\n";
  foreach ($kabupaten['kecamatan'] as $kecamatan) {
    echo "z= " . $kecamatan['nilai-project'] . "\n";
  }
}

echo "Desa dengan nilai project di atas 300 sebagai berikut :\n";
foreach ($data['kabupaten'] as $kabupaten) {
  foreach ($kabupaten['kecamatan'] as $kecamatan) {
    foreach ($kecamatan['desa'] as $desa) {
      if ($desa['nilai-project'] > 300) {
        echo "Nama desa: " . $desa['nama'] . "\n";
      }
    }
  }
}

foreach ($data['kabupaten'] as $kabupaten) {
  if ($kabupaten['nama'] == 'kab2') {
    echo "Total nilai project kab2= " . $kabupaten['nilai-project'];
  }
}
