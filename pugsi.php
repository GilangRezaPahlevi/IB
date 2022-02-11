<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'tugas');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function tam($data){
    $conn = koneksi();
    $nama = htmlspecialchars($data['nama']);
    $jml = htmlspecialchars($data['num']);
    $tmt = htmlspecialchars($data['nn']);
  
    $query =  "INSERT INTO barang VALUES
            (NULL, '$nama','$tmt','$jml');";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}
function ok($data){
 $conn = koneksi();
 $pilih = htmlspecialchars($data['pilih']);
 $nn2 = htmlspecialchars($data['nn2']);

 $selSto =mysqli_query($conn, "SELECT * FROM barang WHERE nama = '$pilih'");
    $sto    =mysqli_fetch_array($selSto);
    $stok    =$sto['jml'];
  $sisa    =$stok-$nn2;
  if ($stok < $nn2) {
    ?>
    <script language="JavaScript">
        alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
        document.location='./';
    </script>
    <?php
}
//proses    
else{
    $insert =mysqli_query($conn, "INSERT INTO pinjam VALUES (NULL ,'$pilih','$nn2')");
        if($insert){
            //update stok
            $upstok= mysqli_query($conn, "UPDATE barang SET jml='$sisa' WHERE nama ='$pilih'");
            ?>
            <script language="JavaScript">
                alert('Good! Input transaksi pengeluaran barang berhasil ...');
                document.location='./';
            </script>
            <?php
        }
      }
}
function hmp($data){
    $conn = koneksi();
    $p2 = htmlspecialchars($data['p2']);
    $tgl = htmlspecialchars($data['tgl']);

    $jml1 =mysqli_query($conn, "SELECT * FROM barang WHERE nama = '$p2'");
    $jml2 =mysqli_query($conn, "SELECT * FROM pinjam WHERE nama = '$p2'");
    $sto    =mysqli_fetch_array($jml1);
    $sto2    =mysqli_fetch_array($jml2);
    $stok    =$sto['jml'];
    $stok1    =$sto2['jml'];
    $sisa    =$stok+$stok1;
   
    $insert =mysqli_query($conn, "INSERT INTO kembali VALUES (NULL,'$p2','$tgl')");
        if($insert){
            //update stok
            $upstok= mysqli_query($conn, "UPDATE barang SET jml='$sisa' WHERE nama ='$p2'");
            $upp = mysqli_query($conn, "DELETE FROM pinjam WHERE nama = '$p2'");
            ?>
            <script language="JavaScript">
                alert('Good! Input transaksi pengeluaran barang berhasil ...');
                document.location='./';
            </script>
            <?php
        }

}
function tpp($data){
$conn = koneksi();
$tmpp = htmlspecialchars($data['tmpp']);
$query = "INSERT INTO tempat VALUES (NULL,'$tmpp');";
mysqli_query($conn,$query) or die (mysqli_error($conn));
echo mysqli_error($conn);
return mysqli_affected_rows($conn);
}