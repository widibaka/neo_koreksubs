<script>

$("#tambah_link").click(function(){
  let content = `<div class="row mt-3">
                  <div class="col-4">
                    <input type="text" class="form-control mb-2 nama_link" placeholder="Nama link ..." required oninput="update_links()">
                  </div>
                  <div class="col-8">
                    <textarea class="form-control link"  placeholder="Link ..." required oninput="update_links()"></textarea>
                  </div>
                </div>`;
  $(".links-input-group").append(content);
})

$("#kurangi_link").click(function(){
  $(".links-input-group .row").last().remove();
});

function update_links() {
  setTimeout(function(){
    let semua_links = '';
    $(".nama_link").each(function(){
      semua_links += $(this).val() + '#pembatas2#' + $(this).parent().parent().find("textarea").val() + '#pembatas1#';
    });
    
    $("textarea[name='links']").val(semua_links);
  }, 100);
}

</script>