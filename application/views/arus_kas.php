
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">


<div class="box box-danger">
            
            <div class="box-header">
              <h1>Transaction</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
       

  <form method="post" id="form-filter" >

<div class="form-group">
   <!--  <label class="col-sm-2 control-label">Tanggal </label> -->
    <div class="col-sm-2">
      <input type="text" class="form-control tglbe" required id="mulai" autocomplete="off">
    </div>
    <div class="col-sm-2">
      <input type="text" class="form-control tglbe" required id="selesai" autocomplete="off">
    </div>
    <div class="col-sm-6">
       <select name="kdcoa" id="kdcoa" required class="select2 " style="width: 100%;">
           <option value="">--pilih--</option>
                    <?php
                  foreach($dt_coa->result_array() as $sp)
                  {
                  ?>
                  <option value="<?php echo $sp['kdcoa']; ?>"><?php echo $sp['coa']; ?> - <?php echo$sp['nama']; ?></option>
                <?php
                  }
                  ?>
            </select>

      
</div>
<div class="form-group">
   
      <a type="button" id="btn-filter" class="btn btn-success btn-sm btn-flat"><i class="fa fa-search"></i></a>
<a type="button" id="btn-reset" class="btn btn-success btn-sm btn-flat"><i class="fa fa-refresh"></i></a>


</div>
</form>

        </div>
            
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

          <!-- TO DO List -->
          <div class="box box-danger">

            <div class="box-header">
              <h1>Transaction</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dtbuku_besar" class="display nowrap table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                <th>tgl</th>
                <th>kode</th>
                <th>debit</th>
                <th>credit</th>
                <th>saldo</th>
                
                
                </tr>
                </thead>
                <tbody>

  </tbody>
                
              </table>
        </div>
            
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->


        </section>

      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#dtbuku_besar').DataTable({ 
  
    "searching": false,
        dom: 'Bfrtip',
        select: true,
         "paging": false,
         "scrollX": true,
         buttons: [
        'pageLength',

            
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            
           // 'colvis'
        ],
        // "pagingType": "full_numbers",
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('home/nothing')?>",
            "type": "POST",
            "data": function ( data ) {
                data.mulai = $('#mulai').val();
                data.selesai = $('#selesai').val();
                data.kdcoa = $('#kdcoa').val();
                // console.log(data);
              
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [0,1,2,3,4], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.url( "<?php echo site_url('home/dt_json')?>" ).load();
    });
    $('#btn-reset').click(function(){ //button reset event click
        table.ajax.url( "<?php echo site_url('home/nothing')?>" ).load();
    });

   
 
});
</script>
</script>