<?php
require('pugsi.php');
$barang = query("SELECT * FROM barang");
$baji = query("SELECT * FROM pinjam");
$kembalis = query("SELECT * FROM kembali");
$tempat = query("SELECT*FROM tempat");
if (isset($_POST['tam'])) {
    if (tam($_POST) > 0) {
      echo "<script>
            document.location.href = 'index.php';
            alert('Data Berhasil Ditambahkan');  
            </script>";
    } else {
        echo "data gagal ditambahkan!";
    }
  }
  if (isset($_POST['ok'])) {
    if (ok($_POST) > 0) {
      echo "<script>
              alert('Data Berhasil Ditambahkan');
              document.location.href = 'index.php';
            </script>";
    } else {
        echo "data gagal ditambahkan!";
    }
  }
if (isset($_POST['hmp'])){
    if (hmp($_POST) > 0){
        echo "<script>
              alert('Data Berhasil Ditambahkan');
              document.location.href = 'index.php';
            </script>";
    } else {
        echo "data gagal ditambahkan!";
    }
}
if(isset($_POST['tpp'])){
    if (tpp($_POST) > 0){
        echo "<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "data gagal ditambahkan!";
    }
}
?>
<html>
    <head>
        <script src="1.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="2.css">
        <title>Home</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="awal">
            <div class="tab">
                <a class="txtds" style="background-color:aqua" onclick="ganti('home',this,'aqua')">Home</a>
                <a class="txtds"  onclick="ganti('pinjam',this,'red')">Meminjam</a>
                <a class="txtds"  onclick="ganti('kembali',this,'yellow')">Mengembalikan</a>
                <a class="txtds"  onclick="ganti('tambah',this,'green')">Menambahkan</a>
                <a class="txtds" onclick="ganti('tmpt',this,'orange')">Tempat</a>
                <a class="txtds" onclick="ganti('datas',this,'aqua')">Arsip</a>
            </div>
            <div class="isi">
                <section class="uh" id="home" style="background-color:aqua; ">
                    <br><h2 id="oke">SELAMAT DATANG</h2>
                    <h3 id="oke"> Di Peminjaman Barang</h3>
                </section>
                <section class="uh" id="pinjam" style="display: none;">
                    <br><b><form id="oke2"action="" method="POST">
                        <p>PINJAM BARANG</p>
                        
                        Nama Barang:
                        <select id="oke3" name="pilih" required>
                            <?php foreach ($barang as $b) : ?>		   
		                    <option><?= $b['nama'];?></option>
		                    <?php endforeach; ?>
                        </select><br>
                        Jumlah Barang: 
                        <input type="number" name="nn2" min="1" id="oke3" style="margin:0px; cursor:text" required>
                        <br><input id="oke3" type="submit" name="ok" value="Pinjam"required>
                    </form></b>
                </section>
                <section class="uh" id="kembali" style="display: none;">
                    <br><b><form id="oke2" action="" method="POST">
                        <p>PENGEMBALIAN BARANG</p>
                        Nama Barang:
                        <select id="oke3" name="p2" required>
                            <?php foreach ($baji as $b) : ?>		   
		                    <option><?= $b['nama']; ?></option >
		                    <?php endforeach; ?>
                        </select><br>
                        Tanggal Penggembalian:
                            <input  id="oke3" style="margin:0px;padding-right:1%; padding-left:0%; cursor:text"type="date" name="tgl" required>
                            <br><input id="oke3" type="submit" name="hmp" value="Kembalikan">
                    </form></b>
                </section>
                <section class="uh" id="tambah" style="display: none;"> 
                <br><b><form id="oke2"action="" method="POST" enctype="multipart/form-data">
                    <p>TAMBAH BARANG</p>
                        Nama Barang:
                            <input id="oke3" style="margin:0px; cursor:text" type="text" name="nama" required autofocus><br>
                        Tempat Barang:
                        <select id="oke3" name="nn" required>
                            <?php foreach ($tempat as $t) : ?>		   
		                    <option><?= $t['tempat']; ?></option>
		                    <?php endforeach; ?>
                        </select><br>
                        Jumlah Barang:
                            <input id="oke3" style="margin:0px; cursor:text" min="1" type="number" name="num" required> 
                            <br><input id="oke3" type="submit" name="tam" value="Tambahkan" required>
                    </form></b>
                </section>
                <section id="tmpt" class="uh" style="display: none;">
                    <br><br><form action="" method="POST" enctype="multipart/form-data" id="oke2">
                        <p>TEMPAT</p>
                        NamaTempat:
                        <input id="oke3" type="text" name="tmpp" style="margin:0px; cursor:text" required autofocus>
                        <br><input id="oke3" type="submit" name="tpp" value="Tambah">
                    </form><br>
                </section>
                <section id="datas" class="uh" style="display: none;">
                <br><br><p id="pp">DAFTAR BARANG :</p>
                    <table class="tabe">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah Barang</th>
                        </tr>
                        <?php foreach($barang as $b):?>
                        <tr>
                            <td><?= $b['id'];?></td>
                            <td><?= $b['nama'];?></td>
                            <td><?= $b['jml']?></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <br><br><p id="pp">PEMINJAMAN BARANG :</p>
                    <table class="tabe">
                        <tr>
                        <th>ID</th>
                        <th>NamaBarang</th>
                        <th>Jumlah Barang</th>
                        </tr>
                        <?php foreach($baji as $ba):?>
                            <tr>
                                <td><?= $ba['id'];?></td>
                                <td><?= $ba['nama'];?></td>
                                <td><?= $ba['jml']?></td>
                            </tr>
                        <?php endforeach?>
                    </table>
                    <br><br><p id="pp">PENGEMBALIAN BARANG :</p>
                    <table class="tabe">
                        <tr>
                            <th>ID</th>
                            <th>NamaBarang</th>
                            <th>TanggalPengembalian</th>
                        </tr>
                        <?php foreach($kembalis as $k):?>
                            <tr>
                                <td><?= $k['id'];?></td>
                                <td><?= $k['P'];?></td>
                                <td><?= $k['tgl'];?></td>
                            </tr>
                        <?php endforeach?>
                    </table>
                    <br><br><p id="pp">DAFTAR TEMPAT :</p>
                    <table class="tabe">
                        <tr>
                            <th>ID</th>
                            <th>TempatSimpan</th>
                        </tr>
                        <?php foreach($tempat as $t):?>
                        <tr>
                            <td><?= $t['id'];?></td>
                            <td><?= $t['tempat'];?></td>
                        </tr>
                        <?php endforeach?>
                    </table><br><br><br>
                </section>
            </div>
        </div>
        
    </body>
</html>