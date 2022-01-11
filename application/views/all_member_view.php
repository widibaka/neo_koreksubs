
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

        <p> 
          <a href="<?php echo base_url(); ?>">Home</a> / 
          <a href="<?php echo base_url('member/'); ?>">Member</a>
        </p>
    <!-- /////////////// -->
        <div class="w-100">

            <h3>Member</h3>
            <br />

            <p>Halaman ini berisi semua member yang mengisi konten di website ini. Jika Anda mau mengisi konten di sini, tinggal login memakai akun google saja. Selanjutnya Anda pasti tahu sendiri caranya.</p>
        
            <table id="table" class="table table-hover table-striped w-100" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Nama Member</th>
                      <th>Jumlah File</th>
                      <th>Waktu Daftar</th>
                    </tr>
                </thead>
                    <?php foreach ($members as $key => $member): ?>
                      <tr>
                        <td>
                          <a href="<?php echo base_url('member/file_by_user?id_user=') . $member['id_user'] ?>"><?php echo $member['name'] ?></a>
                        </td>
                        <td>
                          <?php echo $member['jumlah_file'] ?>
                        </td>
                        <td>
                          <?php echo $member['waktu_daftar'] ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                <tbody>
                </tbody>
            </table>
        </div>
    <!-- /////////////// -->
  </section>

</div>
