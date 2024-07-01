<?php
    session_start();

    require 'koneksi.php';

    if (isset($_SESSION['id'])) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $res = $connection->prepare($sql);
        $res->execute([$_SESSION['id']]);
        $data = $res->fetch();

        $namaUser = $data['nama'];
        $alamatUser = $data['alamat'];
        $telpUser = $data['telp'];
        $provinsiUser = $data['provinsi'];
        $genderUser = $data['jenis'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding-top: 40px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }
        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }
        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }
        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }
        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }
        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }
        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }
        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }
        .account-settings .about p {
            font-size: 0.825rem;
        }
        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body style="height: 100vh;">
    <div class="container">
        <div class="row gutters justify-content-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Profile</h6>
                            </div>
                            <form action="update-profile.php" method="post" class="w-100">
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" <?php if ($namaUser != null) { echo 'value="'.$namaUser.'"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" <?php if ($alamatUser != null) { echo 'value="'.$alamatUser.'"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="telp">Nomor Telepon</label>
                                            <input name="telp" type="text" class="form-control" id="telp" placeholder="Masukkan Nomor Telepon" <?php if ($telpUser != null) { echo 'value="'.$telpUser.'"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="provinsi">Provinsi</label>
                                            <input name="provinsi" type="text" class="form-control" id="provinsi" placeholder="Masukkan Provinsi" <?php if ($provinsiUser != null) { echo 'value="'.$provinsiUser.'"'; } ?>>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="pria" value="pria" <?php if ($genderUser == 'pria') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="pria">
                                                    Pria
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="wanita" value="wanita" <?php if ($genderUser == 'wanita') { echo 'checked'; } ?>>
                                                <label class="form-check-label" for="wanita">
                                                    Wanita
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-secondary"><a href="index.php" style="text-decoration: none ; color: black">Cancel</a></button>
                                            <button name="update" type="submit" name="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>