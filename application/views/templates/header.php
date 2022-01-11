<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Download Anime">
    <meta name="author" content="Koreksubs">
    <title>Neo KorekSubs · Anime Takarir Indonesia</title>


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- BS icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/emblem_256.png" sizes="180x180">
<link rel="icon" href="<?php echo base_url() ?>assets/emblem_256.png" sizes="32x32" type="image/png">
<link rel="icon" href="<?php echo base_url() ?>assets/emblem_256.png">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      a:visited {
        color: #a328e7;
      }
      a {
        text-decoration: none;
      }

      .list-unstyled{
        font-size: 1.5rem;
      }
    </style>

    

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/bootstrap5/')?>cheatsheet.css" rel="stylesheet">
  </head>
  <body class="bg-light"style="
    background-image: url('<?php echo base_url('assets/Untitled-1.png'); ?>');
    background-size: auto 120%;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
  ">

  <nav class="navbar navbar-expand-lg navbar-light bg-light mt-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url() ?>">Neo KorekSubs</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pengguna
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a href="<?php echo base_url() . 'member/' ?>" class="dropdown-item">Semua Member</a></li>
              <?php if ( !empty($this->session->userdata('email')) ): ?>
                <li><a href="<?php echo base_url() . 'auth/logout' ?>" class="dropdown-item"><?php echo $this->session->userdata('name') ?> - Logout</a></li>
              <?php else: ?>
                <li><a href="<?php echo base_url() . 'auth/login' ?>" class="dropdown-item">Login</a></li>
              <?php endif ?>
            </ul>
          </li>

          <?php if (!empty( $this->session->userdata('id_user')) ): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kelola
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?php echo base_url() . 'tambah_file' ?>">Tambah Anime</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url() . 'auth/logout' ?>">Logout</a></li>
            </ul>
          </li>
          <?php endif ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Koleksi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="<?php echo base_url() . 'koleksi' ?>">Koleksi Anime</a></li>
              <li><a class="dropdown-item" href="https://github.com/widibaka/Riwayat-Subtitle-Ass">Subtitles / Takarir saja</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Website Teman
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a target="_blank" class="dropdown-item" href="https://pendekarsubs.us/">PendekarSubs</a></li>
              <li><a target="_blank" class="dropdown-item" href="https://caramel.web.id/">CaramelSubs</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tools Berfaedah
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a target="_blank" class="dropdown-item" href="https://www.livechart.me/">LiveChart</a></li>
              <li><a target="_blank" class="dropdown-item" href="https://taiga.moe/">Taiga Anime Tracking</a></li>
              <li><a target="_blank" class="dropdown-item" href="https://www.youtube.com/channel/UCxxnxya_32jcKj4yN1_kD7A">Muse Indonesia</a></li>
            </ul>
          </li>


        </ul>
      </div>
    </div>
  </nav>

