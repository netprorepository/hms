
<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
 <section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Medicine</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->Form->create($medicine) ?>
            <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Medicine name</label>
                <?php
                    echo $this->Form->control('name', 
                    ['class'=>'form-control', 'label'=>false]
                    );
                ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Medicine category</label>
                <?php
                    echo $this->Form->control('category_id', 
                    ['class'=>'form-control', 'label'=>false, 'type'=>'select', 'options'=>$category]
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
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <?php
                    echo $this->Form->control('price', 
                    ['class'=>'form-control', 'label'=>false]
                    );
                ?>
            </div> 
            <div class="form-group">
                <label for="exampleInputEmail1">Manufacturing company</label>
                <?php
                    echo $this->Form->control('manufacturing_company', 
                    ['class'=>'form-control', 'label'=>false]
                    );
                ?>
            </div> 
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <?php
                    echo $this->Form->control('status', 
                    ['class'=>'form-control', 'label'=>false]
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
