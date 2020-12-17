
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


          <!-- TO DO List -->
          <div class="box box-danger">
            <div class="box-header">
            <h1>Transaction</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Tgl</th>
                <th>Coa</th>
                <th>Debit</th>
                <th>Credit</th>
                </tr>
                </thead>
                <tbody>
  <?php
    $no=0+1;
    foreach($dt_jurnal->result() as $dp)
    {
  ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo ($dp->tgl); ?></td>
    <td><?php echo ($dp->coa); ?> - <?php echo ($dp->nama); ?></td>
    <td><?php echo number_format(($dp->debit),2); ?></td>
    <td><?php echo number_format(($dp->credit),2); ?></td>

    </tr>
   <?php
      $no++;
    }
   ?>
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
  $(document).ready(function() {
  var table =  $('#example1').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        select: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
        'pageLength',

          
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
           
           // 'colvis'
        ]
       // columnDefs: [
         //   { responsivePriority: 1, targets: 0 },
           // { responsivePriority: 2, targets: -2 }
        //]
    } );
    
} );
</script>