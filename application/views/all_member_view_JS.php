
<script type="text/javascript">


    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({ 

            "processing": false, 
            "serverSide": false, 
            "order": [], 
            

            "language": {
                "url": "<?php echo base_url()?>assets/datatables/languages/Indonesian.json",
            },
            
            // "columnDefs": [
            // { 
            //     "targets": [ 0 ], 
            //     "orderable": false, 
            // },
            // ],

        });

    });

</script>