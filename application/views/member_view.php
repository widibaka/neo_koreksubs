
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
          <a href="<?php echo base_url('member/'); ?>">Member</a> / 
          <a href="<?php echo base_url('member/file_by_user?id_user=') . $member['id_user']; ?>"><?php echo $member['name'] ?></a>
        </p>
         <div class="row">
            <div class="col-sm-12 col-md-6">
              <h3 class=""><?php echo $member['name'] ?></h3>
              <div class="p-1">
                <p>
                  Di sini adalah semua file yang dipos oleh <?php echo $member['name'] ?>.
                  <br>
                  <br>
                  Semua orang bisa posting anime di sini dengan cara login lewat google di pojok kanan atas situ lho.
                </p>
                <p>
                  <strong>Total klik: </strong> <?php echo $total_click ?>
                </p>
              </div>
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
