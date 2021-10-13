
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

        <img class="shadow bd-placeholder-img bd-placeholder-img-lg img-fluid" role="img" src="<?php echo base_url() . 'assets/banner.jpg' ?>">


        <hr>
            
        <div class="m-0 p-0">
          <h3 class="m-0 p-0 mb-3">Koleksi Terbaru</h3>
          <div class="col-12 text-center">
          <?php foreach ($anime_terbaru as $key => $ani): ?>
            <a class="me-2" href="<?php echo base_url() . 'judul/?anime_id=' . $ani['id'] ?>" title="<?php echo $ani['titles'] ?>">
              <img class="shadow mb-4" src="<?php echo $ani['poster'] ?>" alt="">
            </a>
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

        