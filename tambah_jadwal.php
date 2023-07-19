<?php 

include 'koneksi.php';
session_start();
if( !isset($_SESSION['username']) ){
    echo '<script>alert("Silahkan login terlebih dahulu");</script>';
    echo '<script>window.location="login.php";</script>';
}
if (isset($_POST['simpan'])){
  $jam = $_POST['jam'];
  $sound = $_POST['sound'];
  $nama   = $_POST['nama'];
  $haritetap = $_POST['haritetap'];
  
  $query = mysqli_query($conn, "INSERT INTO jadwal(jam, sound, hari, nama) VALUES('$jam', '$sound', '$haritetap', '$nama')");
  if ($query) {
      header("location:index.php");
  } 
}
$ishari = $_GET['ishari'];

function isHariIni($value){
  global $hari;
  if($hari == $value){
    return "-- Hari ini --";
  }
}

function valuehari($value){
    if ($value == 1){
        echo "Senin";
    }elseif($value == 2){
        echo "Selasa";
    }elseif($value == 3){
        echo "Rabu";
    }elseif($value == 4){
        echo "Kamis";
    }elseif($value == 5){
        echo "Jumat";
    }elseif($value == 6){
        echo "Sabtu";
    }else{
        echo "Salah";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buat Jadwal Bel sekolah</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="color-scheme" content="light only" />
    <link rel="stylesheet" href="styling/buatJadwalStyling.css" />
    <link rel="canonical" href="index.html" />
    <link
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Raleway:ital,wght@0,600;0,900;1,600;1,900&amp;family=Source+Sans+Pro:ital,wght@0,300;1,300"
        rel="stylesheet" type="text/css" />

    <noscript>
        <style>
        body {
            overflow: auto !important;
        }

        body:after {
            display: none !important;
        }

        #main>.inner {
            opacity: 1 !important;
        }

        #main {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
            filter: none !important;
        }

        #main>.inner>section {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
            filter: none !important;
        }
        </style>
    </noscript>
</head>

<body class="is-loading">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <section id="home-section">
                    <div id="columns01" class="container default">
                        <div class="wrapper">
                            <div class="inner">
                                <h1 id="text04">Buat jadwal</h1>
                                <p class="text05">
                                    Silahkan isi form berikut untuk membuat jadwal baru
                                </p>
                            </div>
                        </div>
                    </div>
                    <form id="form01" method="post" action="tambah_jadwal.php">
                        <div class="inner">
                            <div class="field">
                                <input type="text" placeholder="<?= valuehari($ishari)?>" disabled="true" required />
                                <input type="hidden" name="haritetap" value="<?= $ishari?>" />
                            </div>
                            <div class="field">
                                <input type="text" name="nama" id="form01-name" placeholder="Nama Kegiatan"
                                    maxlength="16" required />
                            </div>
                            <div class="field">
                                <p for="form01-waktu" class="text05">Waktu</p>
                                <input type="time" name="jam" id="form01-waktu" placeholder="Waktu" style="width: 200px"
                                    required />
                            </div>
                            <div class="field">
                                <select name="sound" id="form01-sound" required>
                                    <option value="">&ndash; Pilih Sound &ndash;</option>
                                    <?php 
                                      $files = scandir("sounds");
                                      $n=1;
                                      foreach ($files as $namaFile) {
                                          if($namaFile == '.' || $namaFile == '..'){
                                              continue;
                                          }
                                          echo '<option value="'.$n.'">'.substr($namaFile,5, strlen($namaFile)-9).'</option>';
                                          $n++;
                                      }
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="actions">
                                <button type="cancel" onclick="window.location='index.php';return false;">Batal</button>
                                <button type="submit" name="simpan">Buat Jadwal</button>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="form01" />
                    </form>
                    <div id="columns02" class="container default">
                        <div class="wrapper">
                            <div class="inner">
                                <p id="text02">© Project TA. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="done-section">
                    <div id="columns03" class="container default">
                        <div class="wrapper">
                            <div class="inner">
                                <h2 id="text01">Berhasil dibuat</h2>
                                <p id="text03">
                                    Bel akan dibunyikan pada waktu yang telah ditentukan
                                </p>
                                <ul id="buttons01" class="buttons">
                                    <li><a href="#home" class="button n01">Back</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="styling/butJadwalJS.js"></script>
</body>

</html>