<div class="bd-cheatsheet p-0">
    <article>

      <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
        
      </div>

      <div>
        <footer class="footer mt-auto p-4">
          <div class="container text-center">
            <span class="text-muted">KorekSubs 2021</span>
          </div>
        </footer>
        
        
      </div>
      
    </article>
</div>

<script id="dsq-count-scr" src="//koreksubs-1.disqus.com/count.js" async></script>

</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<!-- <script src="<?php echo base_url()?>assets/bootstrap5/cheatsheet.js"></script> -->

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  function show_links(id_element) {
    $("#"+id_element).toggle(400);
  }

  $(document).ajaxStart(function(){
      $.LoadingOverlay("show");
  });
  $(document).ajaxStop(function(){
      $.LoadingOverlay("hide");
  });
  // Now try to make a few Ajax calls, a LoadingOverlay will be shown until the last call is completed!

  


  // Loader for button
  function show_loader(element, caption="Loading...") {
    element.addClass('disabled');
    let captionAsli = element.html();
    element.attr('captionAsli', captionAsli);
    element.html('<img class="mr-2" src="<?php echo base_url() ?>assets/loader.gif"> ' + caption);
  }

  function hide_loader(element) {
    element.removeClass('disabled');
    let captionAsli = element.attr('captionAsli');
    element.html(captionAsli);
  }

  $("form").submit(function(event) {
    show_loader( $(this).find('button[type="submit"]') );
  });

  
</script>


</html>