<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<?php if (!empty($description)){?>
<meta name="description" content="<?php echo $description ?>">
<?php }else{ ?>
<meta name="keywords" content="<?php echo preg_replace('/[^a-z0-9A-Z]/i', " ", $_SERVER['PATH_INFO'])." Cari Kata Berdasarkan Kamus Besar Bahasa Indonesia" ?>">
    <?php } ?>
<?php if (!empty($keywords)){?>
<meta name="keywords" content="<?php echo $keywords ?>">
<?php }else{ ?>
<meta name="keywords" content="<?php echo preg_replace('/[^a-z0-9A-Z]/i', " ", $_SERVER['PATH_INFO'])." Cari Kata Berdasarkan Kamus Besar Bahasa Indonesia" ?>">
    <?php } ?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title><?php echo empty($title) ? preg_replace('/[^a-z0-9A-Z]/i', " ", $_SERVER['PATH_INFO'])." Cari Kata Berdasarkan Kamus Besar Bahasa Indonesia":$title ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/mdb.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/style.min.css" rel="stylesheet">
<style type="text/css">
.result{
background: white;
padding: 1rem;
color: #555;
text-align: left;
}
@media(max-width: 768px){
.jumbotext{font-size: 1rem}
}

.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
color: #aaa;
opacity: 1; /* Firefox */
}

.form-control:-ms-input-placeholder { /* Internet Explorer 10-11 */
color: #aaa;
}

.form-control::-ms-input-placeholder { /* Microsoft Edge */
color: #aaa;
}
</style>
</head>

<body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="<?php echo base_url() ?>" >
                    <strong class="blue-text">Cari Kata</strong>
                </a>
                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav mr-auto top-menu">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="<?php echo base_url() ?>">Halaman Depan
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url() ?>tentang-kami" >Tentang Cari Kata</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url() ?>kebijakan-privasi" >Kebijakan Privasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url() ?>hubungi-kami" >Hubungi Kami</a>
                        </li>
                                                
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/Carikataid-208119610074921" target="_blank" rel="nofollow" class="nav-link waves-effect" >
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/carikataid" target="_blank" rel="nofollow" class="nav-link waves-effect" >
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">

