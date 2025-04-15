<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sistem Pemesanan Tiket Pesawat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background: linear-gradient(to right, #f44336, #ffa726, #ffeb3b);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .main-card {
      background-color: #fff;
      border-radius: 15px;
      display: flex;
      max-width: 1000px;
      width: 100%;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .form-side {
      flex: 1;
      padding: 40px;
    }

    .image-side {
      flex: 1;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .image-side img {
      max-width: 100%;
      height: auto;
    }

    .form-side h2 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
    }
    
  </style>
</head>
<body>

<div class="main-card">
  <div class="form-side">
    <h2>Sistem Pemesanan Tiket Pesawat</h2>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama Maskapai</label>
        <input type="text" class="form-control" name="maskapai" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Bandara Asal</label>
        <select class="form-select" name="asal" required>
          <?php
            $bandara_asal = [
                "Soekarno Hatta" => 65000,
                "Husein Sastranegara" => 50000,
                "Abdul Rachman Saleh" => 40000,
                "Juanda" => 30000
            ];            
            foreach ($bandara_asal as $nama => $pajak) {
              echo "<option value='$nama'>$nama</option>";
            }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Bandara Tujuan</label>
        <select class="form-select" name="tujuan" required>
          <?php
            $bandara_tujuan = [
              "Ngurah Rai" => 85000,
              "Hasanuddin" => 70000,
              "Inanwatan" => 90000,
              "Sultan Iskandar Muda" => 60000
            ];
            foreach ($bandara_tujuan as $nama => $pajak) {
              echo "<option value='$nama'>$nama</option>";
            }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga Tiket</label>
        <input type="number" class="form-control" name="harga" required>
      </div>

      <button type="submit" class="btn btn-warning w-100">Pesan Tiket</button>
    </form>
  </div>

  <div class="image-side">
    <img src="1.jpg" alt="Pesawat">
  </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $maskapai = $_POST['maskapai'];
  $asal = $_POST['asal'];
  $tujuan = $_POST['tujuan'];
  $harga = (int)$_POST['harga'];

  $pajak_asal = $bandara_asal[$asal];
  $pajak_tujuan = $bandara_tujuan[$tujuan];
  $total_pajak = $pajak_asal + $pajak_tujuan;
  $total_harga = $harga + $total_pajak;
  $tanggal = date("d-m-Y");

  echo "
  <div class='container mt-4'>
    <div class='card shadow'>
      <div class='card-header bg-success text-white'>Detail Pemesanan</div>
      <div class='card-body'>
        <p><strong>Nomor:</strong> " . rand(100000,999999) . "</p>
        <p><strong>Tanggal:</strong> $tanggal</p>
        <p><strong>Maskapai:</strong> $maskapai</p>
        <p><strong>Asal Penerbangan:</strong> $asal</p>
        <p><strong>Tujuan Penerbangan:</strong> $tujuan</p>
        <p><strong>Harga Tiket:</strong> Rp. " . number_format($harga, 0, ',', '.') . "</p>
        <p><strong>Pajak:</strong> Rp. " . number_format($total_pajak, 0, ',', '.') . "</p>
        <p><strong>Total Harga Tiket:</strong> <strong>Rp. " . number_format($total_harga, 0, ',', '.') . "</strong></p>
      </div>
    </div>
  </div>";
}
?>

</body>
</html>
