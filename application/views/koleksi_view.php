
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


    <!-- /////////////// -->
        <div class="w-100">

            <h3>Koleksi</h3>
            <br />
        
            <div class="table-responsive">
              <table id="table" class="table table-hover table-striped w-100" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                      <?php foreach ($thead as $key => $th): ?>
                          <th data_key="<?php echo $th ?>"><?php echo strtoupper(str_replace('_', ' ', $th)) ?></th>
                      <?php endforeach ?>
                      </tr>
                  </thead>
                      <?php foreach ($data_anime as $key => $content): ?>
                        <tr>
                          <td>
                            <a href="<?php echo base_url() . 'judul/?anime_id=' . $content['id']; ?>">
                              <img src="<?php echo $content['poster'] ?>" alt="">
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo base_url() . 'judul/?anime_id=' . $content['id']; ?>">
                              <?php echo $content['titles'] ?>
                            </a>
                          </td>
                          <td><?php echo $content['showType'] ?></td>
                          <td><a target="_blank" href="<?php echo 'https://kitsu.io/anime/'.$content['id'] ?>"><?php echo $content['id'] ?></a></td>
                        </tr>
                      <?php endforeach ?>
                  <tbody>
                  </tbody>
              </table>
            </div>
        </div>
    <!-- /////////////// -->
  </section>

</div>
