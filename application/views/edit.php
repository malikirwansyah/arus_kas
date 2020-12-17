
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <a title="view Data"  href="<?php echo base_url(); ?>adminb3/agama/" class='btn btn-success btn-sm btn-flat'> <i class='fa fa-eye'></i> View Data</a> 
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">


          <!-- TO DO List -->
          <div class="box box-danger">
           
            <!-- /.box-header -->
            <div class="box-body">

<form method="post" action="<?php echo base_url(); ?>home/edit" class="form-horizontal">
   <input type="hidden" class="form-control" name="transactionId" value="<?php echo $edit->transactionId?>">
   <div class="form-group">
    <label class="col-sm-2 control-label">Product </label>
    <div class="col-sm-4">
       <select name="productId" required class="select2 " style="width: 100%;">
           <option value="<?php echo $edit->productId?>"><?php echo $edit->productName?> @ <?php echo number_format($edit->productPrice); ?></option>
                    <?php
                  foreach($dt_product->result_array() as $sp)
                  {
                  ?>
                  <option value="<?php echo $sp['productId']; ?>"><?php echo $sp['productName']; ?> @ <?php echo number_format($sp['productPrice']); ?></option>
                <?php
                  }
                  ?>
            </select>
    </div>
    <label class="col-sm-2 control-label">qty</label>
    <div class="col-sm-4">
      <input required type="number" class="form-control" value="<?php echo $edit->transactionQty?>"" name="transactionQty">
    </div>
  </div>

  

  <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                  <button type="submit" class="btn btn-danger" name="submit"> <i class="fa fa-plus"></i>  Save
                  </button>
                </div>
              </div>
</form>
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

 