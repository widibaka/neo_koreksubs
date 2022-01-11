
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



        <h3><?php 
                foreach ($data_anime['data']['attributes']['titles'] as $key => $judul) {
                    echo $judul . ' / ';
                }
         ?></h3>
        <div class="row">
            <div class="col-sm-12 col-md-4 mb-4">
                <img class="rounded shadow img-responsive w-100" src="<?php echo $data_anime['data']['attributes']['posterImage']['large'] ?>" alt="Poster">
            </div>
            <div class="px-5 col-sm-12 col-md-8">
                <?php 
                  $text = $data_anime['data']['attributes']['synopsis'];
                  $terjemah = $this->SinopsisModel->get_sinopsis( $data_anime['data']['id'] );

                  // if ( $terjemah ) {
                  //   echo $terjemah;
                  // } else {
                  //   echo $text;
                  // }

                  echo $text;
                  
                ?>
                <br>
                <br>
                <hr>
                <button class="btn btn-primary btn-sm" onclick="$('#form_terjemah').toggle(300)">Edit Terjemahan</button>
                <div class="col-12 mt-4" id="form_terjemah" style="display: none;">
                  Terjemah Indonesia: <br>
                  <?php echo form_open( base_url("tambah_file/submit_sinopsis/") ) ?>
                    <input type="hidden" name="anime_id" value="<?php echo $data_anime['data']['id'] ?>">
                    <textarea class="form-control" name="sinopsis" id="" cols="30" rows="10"><?php echo $terjemah ?></textarea>
                    <button class="btn btn-primary btn-sm mt-2" type="submit">Simpan</button>
                  </form>
                </div>
                <hr>

                <br>
                <br>
                <p>
                  Trailer Youtube: 
                  <?php if (!empty($data_anime['data']['attributes']['youtubeVideoId'])): ?>
                    <a class="btn btn-danger btn-sm" data-fancybox href="https://www.youtube.com/watch?v=<?php echo $data_anime['data']['attributes']['youtubeVideoId'] ?>&amp;autoplay=0&amp;rel=0&amp;controls=0&amp;showinfo=0">
                        <i class="bi bi-play-btn-fill"></i> Play Now 
                    </a>
                  <?php else: ?>
                    <i>Tidak ada trailer</i>
                  <?php endif ?>
                  
                </p>
                <p>
                  Rata-rata Rating: <strong><?php echo $data_anime['data']['attributes']['averageRating'] ?></strong>
                </p>
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
                  Jumlah Episode: <?php echo (empty($data_anime['data']['attributes']['episodeCount'])) ? '<strong class="text-danger">Belum diketahui</strong>' : $data_anime['data']['attributes']['episodeCount'] ?>
                </p>
                <p>
                  Buka detail anime: <a target="_blank" href="<?php echo 'https://kitsu.io/anime/' . $data_anime['data']['id'] ?>">kitsu.io</a>
                </p>
            </div>
        </div>
        <!-- /////////////// -->
        <hr>
        <div>
          <div class="bd-example container">
          <?php echo form_open() ?>
            <input type="hidden" name="title" value="<?php 
                foreach ($data_anime['data']['attributes']['titles'] as $key => $judul) {
                  if ( $key != 'ja_jp' ) {
                    echo '(' . $judul . ') ';
                  }
                }
            ?>">
            <input type="hidden" name="musim" value="<?php 
                function convertDateToSeason($angkaBulan, $angkaTanggal)
                {
                  // buat menjadi integer
                  (int)$angkaBulan;
                  (int)$angkaTanggal;

                  if ( ($angkaBulan == 12 OR 1 <= $angkaBulan AND $angkaBulan <= 2) AND $angkaTanggal >= 1 ) { // Winter dimulai 1 December sampai akhir februari
                    return 'Kuartal 1 (Winter)';
                  }
                  if ( (3 <= $angkaBulan AND $angkaBulan <= 5) AND $angkaTanggal >= 1 ) {
                    return 'Kuartal 2 (Spring)';
                  }
                  if ( (6 <= $angkaBulan AND $angkaBulan <= 8) AND $angkaTanggal >= 1 ) {
                    return 'Kuartal 3 (Summer)';
                  }
                  if ( (9 <= $angkaBulan AND $angkaBulan <= 11) AND $angkaTanggal >= 1 ) {
                    return 'Kuartal 4 (Fall)';
                  }
                }
                $startDate = explode('-', $data_anime['data']['attributes']['startDate']);

                echo $startDate[0] . ' ' . convertDateToSeason($startDate[1], $startDate[2]);
            ?>"> 
            <div class="mb-3">
              <label for="nama_file" class="form-label">Nama File</label>
              <input type="text" class="form-control" name="nama_file" placeholder="[PendekarSubs] 86 - Eighty-Six - 04 [720p].mkv ...">
              <div id="nama_fileHelp" class="form-text">Nama file yang anda masukkan. Jangan lupa tambahkan [Batch] jika file Anda adalah rentengan.</div>
            </div>
            <div class="mb-3">
              <label for="nama_file" class="form-label">Links</label>
              <div class="links-input-group">
                <div class="row">
                  <div class="col-4">
                    <input type="text" class="form-control mb-2 nama_link" placeholder="Nama link ..." required oninput="update_links()">
                  </div>
                  <div class="col-8">
                    <textarea class="form-control link" placeholder="Link ..." required oninput="update_links()"></textarea>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-danger mt-2" id="kurangi_link" onclick="update_links()"><i class="bi bi-minus"></i> Kurangi link</button>
                <button type="button" class="btn btn-primary mt-2" id="tambah_link"><i class="bi bi-plus"></i> Tambah Link Lagi</button>
              </div>
            </div>
            <div class="mb-3">
              <textarea class="form-control" name="links" type="hidden" style="display: none" required></textarea>
            </div>

            <input type="hidden" name="anime_id" value="<?php echo $data_anime['data']['id']; ?>" required />
            
            <div class="mb-3">
              <label for="nama_file" class="form-label">Episode</label>
              <select class="form-control" name="episode" required>
                <?php $jum_episode = $data_anime['data']['attributes']['episodeCount']; ?>

                <?php if ( empty( (int)$jum_episode ) ): ?>
                  <?php for ($i=1; $i <= 26; $i++) : ?> 
                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT);  ?>" ><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                <?php else: ?>
                  <?php for ($i=1; $i <= (int)$jum_episode; $i++) : ?> 
                    <option value="<?php echo str_pad($i, strlen($jum_episode), '0', STR_PAD_LEFT);  ?>" ><?php echo str_pad($i, strlen($jum_episode), '0', STR_PAD_LEFT); ?></option>
                  <?php endfor; ?>
                <?php endif ?>

                

                <option value="Batch">Batch</option>
                
              </select>
              <div id="nama_fileHelp" class="form-text">Pilih Batch jika file-nya lebih dari satu.
                <?php if ( empty( (int)$jum_episode ) ): ?>
                  <font class="text-danger">Jumlah episode dari anime ini belum diketahui.</font>
                <?php endif ?>
              </div>
            </div>

            <div class="mb-3">
              <label for="nama_file" class="form-label">Website</label>
              <input type="text" class="form-control" name="website" placeholder="" required value="#">
            </div>

            <div class="mb-3">
              <label for="size" class="form-label">Size</label>
              <input type="text" class="form-control" name="size" placeholder="" required value="0 MB">
            </div>

            <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>" required />

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
        <!-- /////////////// -->
  </section>

</div>
