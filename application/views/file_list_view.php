
<div class="bd-cheatsheet container-fluid">
  <section id="content">

    <article class="my-3" id="typography">

      <div style="opacity: 0;" class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        
      </div>
      
      <div>
        

        
        <?php if ( $this->session->flashdata("msg") ): ?>
          <?php 
            $xpl = explode("#", $this->session->flashdata("msg"));
          ?>
          <div class="alert alert-<?php echo $xpl[0] ?>"><?php echo $xpl[1] ?></div>
        <?php endif ?>

        <img class="shadow bd-placeholder-img bd-placeholder-img-lg img-fluid" role="img" src="<?php echo base_url() . 'assets/banner.jpg' ?>">


        <hr>
            
        <div class="m-0 p-0">
          <h3 class="m-0 p-0 mb-3">Koleksi Terbaru</h3>
          <div class="col-12 text-center d-flex justify-content-center" style="flex-wrap: wrap;">
          <?php foreach ($anime_terbaru as $key => $ani): ?>
            <div class="me-2 mb-4">
              <a href="<?php echo base_url() . 'judul/?anime_id=' . $ani['id'] ?>" title="<?php echo $ani['titles'] ?>">
                <img style="max-height: 250px;" class="shadow " src="<?php echo $ani['poster'] ?>" alt="">
                <div class="progress" style="border-radius: 0%;">
                  <div class="progress-bar" role="progressbar" style="width: <?php echo $ani['episode_digarap']/( empty($ani['total_episode']) ? 5 : $ani['total_episode'] )*100 ?>%; background-color:#688cf3!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <?php echo $ani['episode_digarap'] ?> / <?php echo ( empty($ani['total_episode']) ? "?" : $ani['total_episode'] ) ?>
                  </div>
                </div>
              </a>
              
              <?php if ( !empty($this->session->userdata('email')) ): ?>
                <a href="<?php echo base_url() . 'tambah_file/proses/' . $ani['id'] ?>" >[+Episode]</a>
              <?php endif ?>
            </div>
          <?php endforeach ?>
          </div>
          
        </div>

        <hr>      


        <!-- /////////////// -->
        <?php $this->load->view('templates/file.php') ?>
        <!-- /////////////// -->

        <!-- disqus -->
        <div class="container" id="disqus_thread"></div>
        <script>
            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://koreksubs-1.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

  </section>

</div>

        