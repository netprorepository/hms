<section class="content">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">New Invoice</h3>
        </div>
    <?= $this->Form->create($invoice) ?>
    <fieldset>
        <br />
        <?php $paystatus = ['Paid'=>'Paid','Unpaid'=>'Unpaid'];
         echo '<div class="col-md-6">';
            echo $this->Form->control('patient_id', ['options' => $patients,'class'=>'form-control' ,'required']);
            echo '</div>';
            
            echo '<div class="col-md-6">';
            echo $this->Form->control('title',['label'=>'Title','class'=>'form-control' ,'required']);
            echo '</div>';
            
             echo '<div class="col-md-12">';
            echo $this->Form->control('description',['label'=>'Description','class'=>'form-control' ,'required','type'=>'textarea']);
           echo '</div>';
             echo '<div class="col-md-6">';
            echo $this->Form->control('amount',['label'=>'Amount(N)','class'=>'form-control' ,'required']);
            echo '</div>';
           // echo $this->Form->control('created_date');
             echo '<div class="col-md-6">';
            echo $this->Form->control('status',['label'=>'Status','class'=>'form-control' ,'required','disabled',
                'options'=>$paystatus]);
           // echo $this->Form->control('user_id', ['options' => $users]);
            echo '</div>';
        ?>
    </fieldset>
            <br /> <br />
            <div class="col-md-12">
    <?= $this->Form->button('Submit',['class'=>'btn btn-primary pull-right']) ?>
                </div><br /> <br />
            
             <br /> <br />
    <?= $this->Form->end() ?>
  </div>
        <!-- /.box -->
    </div>
    </div>
</section>  