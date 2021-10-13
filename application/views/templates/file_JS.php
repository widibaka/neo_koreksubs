<script>
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({ 

            "processing": false, 
            "serverSide": true, 
            "order": [], 
            
            "ajax": {
                "type": "POST",
                "url": "<?php echo base_url( $url_data_tables )?>",
                "data": {
                    <?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>',
                },
            },

            "language": {
                "url": "<?php echo base_url()?>assets/datatables/languages/Indonesian.json",
            },
            "drawCallback": function(settings) {
               // hide column
               $(".hide_parent_of_this").parent().hide();
            }
            
            // "columnDefs": [
            // { 
            //     "targets": [ 0 ], 
            //     "orderable": false, 
            // },
            // ],

        });

    });
</script>