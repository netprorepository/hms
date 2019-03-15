
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<section class="content-header">
    <h1>
    Manage Beds
    </h1>
</section>
<!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Bed List</a></li>
              <li><a href="#timeline" data-toggle="tab">Add Bed</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Doctors</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Bed Number</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $count = 0;
                            foreach ($beds as $bed):
                            $count++;
                        ?>

                            <tr>
                            <td><?=$count?></td>
                            <td><?php echo $bed->bed_number?></td>
                            <td><?php echo $bed->type;?></td>
                            <td align="center">
                                <a href="beds/edit/<?=$bed->id?>" class="ic">
                                    <i class="fa fa-edit edit"></i>
                                </a>
                                <?= 
                                    $this->Form->postLink(__(''), 
                                        ['action' => 'delete', $bed->id, $bed->bed_number], 
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $bed->id),'class'=>'fa fa-trash trash ic']
                                    ) 
                                ?>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Bed Number</th>
                            <th>Type</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <!--form class="form-horizontal"-->
                <?php
                    echo $this->Form->create(null, ['class'=>'form-horizontal',
                        'url' => ['controller' => 'Beds', 'action' => 'add']
                    ]);
                ?>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Bed Number</label>
                    <div class="col-sm-6">
                        <?php
                            echo $this->Form->control('bed_number', 
                            ['class'=>'form-control', 'type'=>'text','label'=>false]
                            );
                        ?>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-6">
                        <?php
                            $type = ['select'=>'select','ward'=>'Ward', 'cabin'=>'Cabin', 'icu'=>'Icu', 'other'=>'Other'];
                            echo $this->Form->control('type', 
                            ['class'=>'form-control', 'type'=>'select','label'=>false, 'options'=>$type]
                            );
                        ?>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-6">
                        <?php
                            echo $this->Form->control('description', 
                            ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                            );
                        ?>
                     </div>
                     <?php
                        echo $this->Form->control('nurse_id', 
                        ['class'=>'form-control pull-right', 'type'=>'hidden','label'=>false, 'value'=>$userdata['id']]
                        );
                    ?>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
