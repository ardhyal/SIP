<div class="content">
    <div class="row">
        <div class="col-md-6">
            <?php 
                $data = $this->session->flashdata('golongan');
                if (isset($data)){ ?>
                  <div class="alert alert-info fade in">
                      <a href="#" class="close" data-dismiss="alert">&times;</a>
                      <strong>Warning!</strong> <?php echo $this->session->userdata('golongan') ?>
                 </div>
            <?php } ?>
            <div class="box"> 
            <div class="box-header with-border">
                <h3 class="box-title">Add Golongan</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <?php echo form_open('dataform/create/golongan'); ?>      
              <div class="box-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="inputgolongan" class="col-sm-2 control-label">Golongan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputgolongan" name="golongan" placeholder="Enter Golongan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </div>
            <?php echo form_close(); ?>
          </div>
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Table Golongan</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Golongan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($golongan as $q): ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $q->nm_golongan ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('article/view/'); ?>"
                        <button type="button" class="btn btn-success btn-xs">View</button></a>
                      <a href="<?php echo site_url('article/update/'); ?>"
                        <button type="button" class="btn btn-info btn-xs">Update</button></a>
                      <a href="<?php echo site_url('article/delete/'); ?>"
                      <button type="button" class="btn btn-danger btn-xs">Delete</button></a>
                    </div>
                  </td>
                </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <tr>
                  <th colspan="2"><h6>*update on <b><?php echo date('M d, Y '); ?></b></h6></th>
                  <th><a href="<?php echo site_url('dataform/export') ?>"<button type="button" class="btn btn-danger">Export All</button></a></th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
            <?php 
            $data = $this->session->flashdata('jabatan');
                if (isset($data)){ ?>
                <div class="alert alert-info fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Warning!</strong> <?php echo $this->session->userdata('jabatan') ?>
                </div>
            <?php } ?>
            <div class="box"> 
            <div class="box-header with-border">
                <h3 class="box-title">Add Jabatan</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <?php echo form_open('dataform/create/jabatan'); ?>
              <div class="box-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label for="inputgolongan" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputjabatan" name="jabatan" placeholder="Enter Jabatan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </div>
            <?php echo form_close(); ?>
          </div>
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Table Jabatan</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="tbl_jabatan">
                <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php $no = 1; foreach($jabatan as $q):?>
                <div class="modal"  id="vmodal_jabatan_<?php echo $q->id_jabatan?>" tabindex="-1" role="dialog" aria-labelledby="ardhyal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="modal"  id="vmodal_jabatan_<?php echo $q->id_jabatan?>" tabindex="-1" role="dialog" aria-labelledby="ardhyal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal"  id="umodal_jabatan_<?php echo $q->id_jabatan?>" tabindex="-1" role="dialog" aria-labelledby="ardhyal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title">Update data jabatan</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('dataform/update/jabatan/'.$q->id_jabatan)?>
                                <div class="form-horizontal">
                                <div class="form-group">
                                  <label for="inputgolongan" class="col-sm-2 control-label">Jabatan</label>
                                  <div class="col-sm-10">
                                      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $q->id_jabatan ?>">
                                      <input type="text" class="form-control" id="inputjabatan" name="jabatan" value="<?php echo $q->nm_jabatan ?>">
                                  </div>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">                
                                   <button type="submit" class="btn btn-primary">Save changes</button></a>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <td><input type="checkbox" name="checkid[]" value="<?php $q->id_jabatan ?>"></td>
                  <td><?php echo $no ?></td>
                  <td><?php echo $q->nm_jabatan ?></td>
                  <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#vmodal_jabatan_<?php echo $q->id_jabatan?>">View</button>
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#umodal_jabatan_<?php echo $q->id_jabatan?>">Update</button>
                      <a href="<?php echo site_url('dataform/delete/jabatan/'.$q->id_jabatan); ?>"
                      <button type="button" class="btn btn-danger btn-xs">Delete</button></a>
                    </div>
                  </td>
                </tr>
                    <?php $no++;endforeach;?>
                </tbody>
                <tfoot>
                <tr>
                  <th colspan="3"><h6>*update on <b><?php echo date('M d, Y '); ?></b></h6></th>
                  <th><button type="submit" id="del" class="btn btn-danger">Delete All</button></th>
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
    </div>
</div>  

