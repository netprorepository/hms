


<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?= $this->Form->create($category) ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category name</label>
                   <?php
                        echo $this->Form->control('category_name', 
                        ['class'=>'form-control', 'label'=>false]
                        );
                   ?>
                </div>
                <div class="form-group">
                  <label>Description</label>
                   <?php
                        echo $this->Form->control('description', 
                        ['class'=>'form-control', 'type'=>'textarea','label'=>false]
                        );
                   ?>
                </div>       
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            <?= $this->Form->end() ?>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>   
