
<div class="bd-cheatsheet container-fluid">
  <section id="content">

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
           echo (!empty($judul['en_jp'])) ? $judul['en_jp'] : $judul['en'] ?></a> / 
          <a href="<?php echo base_url('episode/?anime_id=' . $data_anime['data']['id'] . '&episode='.$this->input->get('episode')); ?>">Episode <?php echo $this->input->get('episode') ?></a>
        </p>
        <h3><?php 
                foreach ($data_anime['data']['attributes']['titles'] as $key => $judul) {
                    echo $judul . ' / ';
                }
         ?></h3>
         <div class="row">
            <div class="col-6 text-end">
              <h3 class=" text-right">Episode <?php echo $this->input->get('episode') ?></h3>
              <div class="p-1">
                <p>
                  <strong>Awal rilis:</strong> <?php echo $data_anime['data']['attributes']['startDate'] ?><br>
                  <strong>Rating Guide:</strong> <?php echo $data_anime['data']['attributes']['ageRatingGuide'] ?><br>
                  <strong>Status:</strong> <?php echo $data_anime['data']['attributes']['status'] ?><br>
                  <strong>Tipe:</strong> <?php echo $data_anime['data']['attributes']['subtype'] ?><br>
                  <strong>Buka detail anime:</strong> <a target="_blank" href="<?php echo 'https://kitsu.io/anime/' . $data_anime['data']['id'] ?>">kitsu.io</a>
                </p>
              </div>
            </div>
            
            <div class="col-6">
              <img class="rounded shadow img-responsive" src="<?php echo $data_anime['data']['attributes']['posterImage']['medium'] ?>" alt="Poster" style="max-height: 200px;">
            </div>
         </div>
         
        <!-- <div class="d-flex justify-content-center">
            <div>
                <img class="rounded shadow img-responsive" src="<?php echo $data_anime['data']['attributes']['posterImage']['large'] ?>" alt="Poster" style="max-height: 400px;">
            </div>
            <div class="p-5">
                <?php echo $data_anime['data']['attributes']['synopsis'] ?>
                <br>
                <br>
                <p>
                  Tahun rilis: <?php echo $data_anime['data']['attributes']['startDate'] ?>
                </p>
                <p>
                  Rating Guide: <?php echo $data_anime['data']['attributes']['ageRatingGuide'] ?>
                </p>
                <p>
                  Status: <?php echo $data_anime['data']['attributes']['status'] ?>
                </p>
                <p>
                  Tipe: <?php echo $data_anime['data']['attributes']['subtype'] ?>
                </p>
                <p>
                  Buka detail anime: <a target="_blank" href="<?php echo 'https://kitsu.io/anime/' . $data_anime['data']['id'] ?>">kitsu.io</a>
                </p>
            </div>
        </div> -->
        <!-- /////////////// -->
        <?php $this->load->view('templates/file.php') ?>
        <!-- /////////////// -->
  </section>

</div>
