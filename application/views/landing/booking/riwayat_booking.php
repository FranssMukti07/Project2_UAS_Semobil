<!-- header -->
<header class="sticky-top">
    <!-- header inner -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="#banner" class="page-scroll">
                                    <img src="<?= base_url('assets/assets_landing/') ?>images/cars.png" alt="#" width="25%" height="25%">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navbar -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark" id="mainNav">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="<?= base_url('landing/') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('booking/') ?>">Booking Car</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('booking/riwayat') ?>">History</a>
                                </li>
                                <!-- Jika sudah login munculkan button logout, jika belum munculkan button login -->
                                <?php if (!$this->session->userdata('username')) : ?>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info" href="<?= base_url('auth') ?>">Login</a>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-danger" href="<?= base_url('auth/logout') ?>">Logout</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header inner -->
<!-- end header -->
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>Riwayat Booking</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Buat Tabel Kendaraan -->
<div class="container">
    <?php
    $sewa = $this->db->get_where('sewa', ['users_id' => $this->session->userdata('id')])->result();

    $count = count($sewa);
    ?>
    <!-- <h1><?= print_r($array); ?></h1> -->
    <!-- Jika tidak ada, tampilkan pesan -->
    <?php if (empty($sewa_hasil)) : ?>
        <div class="row mt-3" style="border: 3px solid green;">
            <div class="col-md-12 p-3">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-column mx-auto">
                        <h6 class="display-4">Tidak Ada Riwayat Booking</h6>
                        <p class="mx-auto" style="font-size: 20px;">Silahkan Booking Terlebih Dahulu</p>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif (!empty($sewa_hasil)) : ?>
        <?php for ($x = 0; $x < $count; $x++) : ?>
            <?php 
            $y = 0;
            $array = [$sewa_hasil];
            
            $mobil = $this->db->get_where('mobil', ['id' => $array[$y][$x]->mobil_id])->result();
            $array_mobil = [$mobil];

            $merk = $this->db->get_where('merk', ['id' => $array_mobil[$y][$y]->merk_id])->result();
            $array_merk = [$merk];
            ?>
            <div class="row mt-3" style="border: 3px solid green;">
                <div class="col-md-12 p-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <img src="<?= base_url('assets/assets_landing/images/' . $array_mobil[$y][$y]->foto) ?>" alt="" width="350">
                            <h1 class="mt-3"><?= $array_merk[$y][$y]->nama . ' ' . $array_merk[$y][$y]->produk ?></h1>
                        </div>
                        <div class="d-flex flex-column text-right my-auto">
                            <p style="margin-bottom: 5px;">Mulai : <b><?= $array[$y][$x]->tanggal_mulai ?></b></p>
                            <p style="margin-bottom: 5px;">Kembali : <b><?= $array[$y][$x]->tanggal_akhir ?></b></p>
                            <p style="margin-bottom: 5px;">Tujuan : <b><?= $array[$y][$x]->tujuan ?></b></p>
                            <p style="margin-bottom: 5px;">No. KTP : <b><?= $array[$y][$x]->noktp ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    <?php endif; ?>
</div>