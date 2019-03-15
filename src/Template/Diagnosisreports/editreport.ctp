 <section class="content">
     <?php $userrole = $this->request->getSession()->read('usersroles');?>
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
         <?= $this->Flash->render() ?>
        <div class="box-header with-border">
            <h3 class="box-title">Update Diagnosis Request</h3>
        </div>
    <?= $this->Form->create($diagnosisreport,['type'=>'file']) ?>
            <fieldset> 
<!--        <legend><?= __('Add Diagnosisreport') ?></legend>-->
        <?php $report_types = ['Xray'=>'Xray','Blood Text'=>'Blood Test','CT-Scan'=>'CT-Scan'];
        $document_types = ['Image'=>'Image','Docx'=>'Docx','Excell Sheet'=>'Excel Sheet'];
        echo '<div class="col-md-4">';
            echo $this->Form->control('diagnosistype_id',['label'=>'Diagnosis/Report Type','options'=>$diagnostictypes,'required','class'=>'form-control']);
          echo '</div>';
            if($userrole['id'] == 5){
             echo '<div class="col-md-2">';
            echo $this->Form->control('document_type',['label'=>'Document Type','options'=>$document_types,'class'=>'form-control']);
            echo '</div>';
             echo '<div class="col-md-4">';
            echo $this->Form->control('file_name',['label'=>'Upload File','type'=>'file','class'=>'form-control']);
          //  echo $this->Form->control('prescription_id', ['options' => $prescriptions]);
            
           echo '</div>';
           
           echo '<div class="col-md-2">';
           $status = ['Done'=>'Done','Undone'=>'Undone'];
            echo $this->Form->control('status',['label'=>'Status','options'=>$status ,'class'=>'form-control']);
        echo '</div>';
           
            echo '<div class="col-md-12">';
            echo $this->Form->control('report',['label'=>'Report','type'=>'textarea','class'=>'form-control']);
        echo '</div>';
           
            }
             echo '<div class="col-md-12">';
            echo $this->Form->control('description',['label'=>'Description','type'=>'textarea','class'=>'form-control','required','readonly']);
        echo '</div>';
            //  echo $this->Form->control('created_date');
           // echo $this->Form->control('laboratorist_id', ['options' => $laboratorists]);
        ?>
    </fieldset>
    <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        <?= $this->Form->end() ?>
        </div>
        <!-- /.box -->
    </div>
    </div>
</section>   
