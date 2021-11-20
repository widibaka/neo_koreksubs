<div class="bd-cheatsheet container-fluid bg-body">
  <section id="content">
    <h2 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3"></h2>

    <article class="my-3" id="typography">

      <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        
      </div>

      <div>
        <div class="container">
            <div class="col-12 d-flex justify-content-center">
              <img src="<?php echo base_url() ?>assets/emblem_256.png" alt="" style="width: 190px">
            </div>
            <div class="col-12 d-flex justify-content-center">
              <div class="col-sm-12 col-md-6 my-3">
                <table class="table table-striped table-bordered">
                  <tr>
                    <th>Nama File</th>
                    <td><?php echo $main_data['nama_file'] ?></td>
                  </tr>
                  <tr>
                    <th>Size</th>
                    <td><?php echo $main_data['size'] ?></td>
                  </tr>
                </table>
                
                <!-- <h1>Dialihkan dalam <span class="timer">5</span></h1> -->

              </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
              <div class="col-sm-12 col-md-6 my-1">
                <a href="<?php echo $link ?>" class="btn btn-lg btn-success w-100 mb-5 text-white">
                  <i class="bi bi-download"></i> Lanjut Download
                </a>
                <a target="_blank" href="https://trakteer.id/widi-baka-l1w5w/tip" class="btn btn-danger w-100 mb-2 text-white">
                  <i class="bi bi-piggy-bank"></i> Donasi Trakteer
                </a>
                <a href="<?php echo base_url() ?>judul/?anime_id=<?php echo $main_data['anime_id'] ?>" class="btn  w-100 mb-2">
                  Buka Episode Lainnya
                </a>
                <small class="text-muted">
                  <i>Note: Saya tahu ini adalah kegiatan illegal, tapi yah mau gimana lagi... Tanpa uang semua tidak bisa berjalan.</i> <i class="bi bi-emoji-frown"> Jangan lupa nonton di media streaming resmi netflix, nonton di <a href="https://www.youtube.com/channel/UCxxnxya_32jcKj4yN1_kD7A">Muse Indonesia</a> atau beli DVD dan Bluray asli untuk mendukung para animator.</i>
                </small>
              </div>
            </div>
            
        </div>
      </div>
  </section>

</div>
