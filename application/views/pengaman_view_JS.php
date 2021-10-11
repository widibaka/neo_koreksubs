<script>

$(document).ready(function() {

  setInterval(function() {
    let angka = parseInt($(".timer").html());
    if ( angka > 0 ) {
      $(".timer").html(angka-1);
    }else{ 
      window.location.href = '<?php echo base64_decode($this->input->get('redirect')) ?>';
    }
  }, 1000)

})

</script>