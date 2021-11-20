<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Download Anime">
    <meta name="author" content="Koresubs">
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
  <body class="bg-light">
    
<header class="bd-header bg-dark py-3 d-flex align-items-stretch border-bottom border-dark">
  <div class="container-fluid d-flex align-items-center">
    <a class="text-white" href="<?php echo base_url() ?>">
      <h1 class="d-flex align-items-center fs-4 mb-0">
        Neo KorekSubs <span class="d-none d-sm-block"> - Anime Takarir Indonesia</span>
      </h1>
    </a>
    

    <?php if ( !empty($this->session->userdata('email')) ): ?>
      <a href="<?php echo base_url() . 'auth/logout' ?>" class="ms-auto link-light text-white" hreflang="ar"><?php echo $this->session->userdata('name') ?> - Logout</a>
    <?php else: ?>
      <a href="<?php echo base_url() . 'auth/login' ?>" class="ms-auto link-light text-white" hreflang="ar">Login</a>
    <?php endif ?>


  </div>
</header>
<aside class="bd-aside sticky-xl-top text-muted align-self-start mb-3 mb-xl-5 px-2"
  style="
    background-image: url('<?php echo base_url('assets/bg.png'); ?>');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: left bottom;
  "
  >
  <h2 class="h6 pt-4 pb-3 mb-4 border-bottom">Menu</h2>
  <nav class="small" id="toc">
    <ul class="list-unstyled">
      <?php if (!empty( $this->session->userdata('id_user')) ): ?>
      <li class="my-2">
        <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#member-collapse" aria-controls="member-collapse" style="font-size:1.5rem;">Kelola Akun</button>
        <ul class="list-unstyled ps-3 collapse" id="member-collapse">
          <li><a class="d-inline-flex align-items-center rounded" href="<?php echo base_url() . 'tambah_file' ?>">Tambah Anime</a></li>
          <li><a class="d-inline-flex align-items-center rounded" href="<?php echo base_url() . 'auth/logout' ?>">Logout</a></li>
        </ul>
      </li>
      <?php endif ?>
      <li class="my-2">
        <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#koleksi-collapse" aria-controls="koleksi-collapse" style="font-size:1.5rem;">Koleksi</button>
        <ul class="list-unstyled ps-3 collapse" id="koleksi-collapse">
          <li><a class="d-inline-flex align-items-center rounded" href="<?php echo base_url() . 'koleksi' ?>">Koleksi Anime</a></li>
        </ul>
      </li>
      <li class="my-2">
        <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#tools-collapse" aria-controls="tools-collapse" style="font-size:1.5rem;">Tools Berfaedah</button>
        <ul class="list-unstyled ps-3 collapse" id="tools-collapse">
          <li><a target="_blank" class="d-inline-flex align-items-center rounded" href="https://www.livechart.me/fall-2021/tv">LiveChart</a></li>
          <li><a target="_blank" class="d-inline-flex align-items-center rounded" href="https://taiga.moe/">Taiga Anime Tracking</a></li>
          <li><a target="_blank" class="d-inline-flex align-items-center rounded" href="https://www.youtube.com/channel/UCxxnxya_32jcKj4yN1_kD7A">Muse Indonesia</a></li>
        </ul>
      </li>
      <li class="my-2" style="margin-left: -5px;">
        <a href="<?php echo base_url() . 'member/' ?>"class="btn d-inline-flex align-items-center"  style="font-size:1.5rem;">Semua Member</a>
      </li>
    </ul>
  </nav>
</aside>

