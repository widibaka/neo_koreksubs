<div class="bd-cheatsheet container-fluid bg-body">
  <section id="content">
    <h2 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3"></h2>

    <article class="my-3" id="typography">

      <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        
      </div>

      <div>
        

        
        <?php if ( $this->session->flashdata("msg") ): ?>
          <?php 
            $xpl = explode("#", $this->session->flashdata("msg"));
          ?>
          <div class="alert alert-<?php echo $xpl[0] ?>"><?php echo $xpl[1] ?></div>
        <?php endif ?>



        <p> 
          <a href="<?php echo base_url(); ?>">Home</a> / 
          <a href="<?php echo base_url('judul/?anime_id=' . $data_anime['data']['id']); ?>"><?php
           $judul = $data_anime['data']['attributes']['titles'];
           echo (!empty($judul['en_jp'])) ? $judul['en_jp'] : $judul['en'] ?></a>
        </p>
        <h3><?php 
                foreach ($data_anime['data']['attributes']['titles'] as $key => $judul) {
                    echo $judul . ' / ';
                }
         ?></h3>
        <div class="row">
            <div class="col-sm-12 col-md-4 mb-4">
                <img class="rounded shadow img-responsive w-100" src="<?php echo $data_anime['data']['attributes']['posterImage']['large'] ?>" alt="Poster">
            </div>
            <div class="px-4 col-sm-12 col-md-8">
                <?php 
                
                  $text = $data_anime['data']['attributes']['synopsis'];
                  // $terjemahan = $this->GoogleApi->terjemah('en','id',$text);
                  // echo $terjemahan;

                  $terjemah = $this->SinopsisModel->get_sinopsis( $data_anime['data']['id'] );

                  if ( $terjemah ) {
                    echo $terjemah;
                  } else {
                    echo $text;
                  }
                  

                  
                
                ?>
                <br>
                <hr>
                <p>
                  <strong> Trailer Youtube: </strong>
                  <?php if (!empty($data_anime['data']['attributes']['youtubeVideoId'])): ?>
                    <a class="btn btn-danger btn-sm" data-fancybox href="https://www.youtube.com/watch?v=<?php echo $data_anime['data']['attributes']['youtubeVideoId'] ?>&amp;autoplay=0&amp;rel=0&amp;controls=0&amp;showinfo=0">
                        <i class="bi bi-play-btn-fill"></i> Play Now 
                    </a>
                  <?php else: ?>
                    <i>Tidak ada trailer</i>
                  <?php endif ?>
                  
                </p>
                <p>
                  <strong>Rata-rata Rating:</strong> <strong><?php echo $data_anime['data']['attributes']['averageRating'] ?></strong>
                </p>
                <p>
                  <strong>Tahun rilis:</strong> <?php echo $data_anime['data']['attributes']['startDate'] ?>
                </p>
                <p>
                  <strong>Rating Guide:</strong> <?php echo $data_anime['data']['attributes']['ageRatingGuide'] ?>
                </p>
                <p>
                  <strong>Status:</strong> <?php echo ($data_anime['data']['attributes']['status']=='current') ? 'ON GOING' : strtoupper($data_anime['data']['attributes']['status']) ?>
                </p>
                <p>
                  <strong>Tipe:</strong> <?php echo $data_anime['data']['attributes']['subtype'] ?>
                </p>
                <p>
                  <strong>Jumlah Episode:</strong> <?php echo $data_anime['data']['attributes']['episodeCount'] ?>
                </p>
                <p>
                  <strong>Buka detail anime:</strong> <a target="_blank" href="<?php echo 'https://kitsu.io/anime/' . $data_anime['data']['id'] ?>">kitsu.io</a>
                </p>
            </div>
        </div>
        <!-- /////////////// -->
        <?php $this->load->view('templates/file.php') ?>
        <!-- /////////////// -->
  </section>

</div>
