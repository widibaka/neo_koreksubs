
<div class="bd-cheatsheet container-fluid">
  <section id="content">

    <article class="my-3" id="typography">

      <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        
      </div>

      <div>
        <h3>Cari Judul Anime</h3>

        <form action="" method="get">
          <input class="form-control form-control-lg w-100" type="text" placeholder="Shingeki no Bahamut ..." name="q" required value="<?php echo $this->input->get('q') ?>" />
          <button class="btn btn-lg btn-primary w-100 mt-3" type="submit">Cari</button>
        </form>

        
    <!-- /////////////// -->
        <div class="w-100 table-responsive">
          <?php if ( !empty($data_anime) ): ?>
            <h3>Anime Kitsu</h3>
            <br />
        
            <table class="table table-striped">
              <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Poster</th>
                <th scope="col">Judul</th>
                <th scope="col">Rilis</th>
                <th scope="col">Tipe</th>
                <th scope="col">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data_anime['data'] as $key => $v): ?>
                <tr>
                  <td><?php echo $v['id'] ?></td>
                  <td><img src="<?php echo $v['attributes']['posterImage']['tiny'] ?>" alt="">
                  </td>
                  <td><?php foreach ($v['attributes']['titles'] as $key => $title) {
                    echo $title .  ' / ';
                  } ?></td>
                  <td><?php echo $v['attributes']['startDate'] ?></td>
                  <td><?php echo $v['attributes']['subtype'] ?></td>
                  <td><a href="<?php echo base_url() . 'tambah_file/proses/' . $v['id'] ?>" class="btn btn-primary">Proses</a></td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
          <?php endif ?>
            
        </div>
    <!-- /////////////// -->
  </section>

</div>
