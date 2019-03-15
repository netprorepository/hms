<div class="form-group col-md-12">
                  <label>State</label>
                  <?php
                      echo $this->Form->control('state_id', 
                      ['class'=>'form-control select2', 'label'=>false, 'options'=>$states]
                      );
                  ?>
              </div>
