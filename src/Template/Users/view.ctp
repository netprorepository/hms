<?php 
  $userdata = $this->request->getSession()->read('usersinfo');
  $userrole = $this->request->getSession()->read('usersroles');
?>
<section class="content-header">
    <h1>
    User Profile
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="../listdoctor">Staff</a></li>
    <li class="active">Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
        <div class="box-body box-profile">
            <?php if(!empty($userdata['passport'])){  echo 
                          $this->Html->image($userdata['passport'], ['class'=>'img-circle', 'alt'=>'User Image',
                              'style'=>'width:128px;height:128px;']);}
                          else{echo $this->Html->image('woddi_logo.PNG', ['style'=>'height: 128px; width: 120px',
                              'class'=>'img-circle']);}
                          ?>
<!--            <img class="profile-user-img img-responsive img-circle"
                 src="../../dist/img/user4-128x128.jpg" alt="User profile picture">-->

            <h3 class="profile-username text-center">
                <?= $this->Html->link($user->fname.' '.$user->lname, ['controller' => 'Users', 'action' => 'edit',$user->id],
    ['title'=>'update profile']) ?></h3>

            <p class="text-muted text-center"><?=$user->role->role_name?></p>

            <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?=$user->username?></a>
            </li>
            <li class="list-group-item">
                <b>Phone</b> <a class="pull-right"><?=$user->phone?></a>
            </li>
            <li class="list-group-item">
                <b>Department</b> <a class="pull-right"><?=$user->department->name?></a>
            </li>
            </ul>

            <!--a href="#" class="btn btn-primary btn-block"><b>Follow</b></a-->
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i>Profile</strong>

            <p class="text-muted">
                <?=$user->profile?>
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted"><?=$user->state->name?>, <?=$user->country->name?></p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Keys</strong>

            <p>
                <?= $this->Html->link(__('Change Password'), ['action' => 'changepassword']) ?>
<!--            <span class="label label-danger">Doctor</span>-->
            </p>

            <hr>

        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <!--li class="active"><a href="#activity" data-toggle="tab">Activity</a></li-->
            <li class="active"><a href="#timeline" data-toggle="tab">Logs</a></li>
            <!--li><a href="#settings" data-toggle="tab">Settings</a></li-->
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <?php
                    foreach($user->logs as $log): 
                ?>
                <li class="time-label">
                    <span class="
                    <?php 
                        if($log->type == "Delete"){
                            echo "bg-red";
                        }elseif($log->type == "Add"){
                            echo "bg-green";
                        }elseif($log->type == "Edit"){
                            echo "bg-yellow";
                        }elseif($log->type == "Email"){
                            echo "bg-aqua";
                        }else{
                            echo "bg-blue";
                        }
                    ?>
                    ">
                        <?php 
                            $date = date("d M, Y",strtotime($log->timestamp));
                            echo $date;
                        ?>
                    </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="
                        <?php 
                            if($log->type == "Delete"){
                                echo "fa fa-trash bg-red";
                            }elseif($log->type == "Add"){
                                echo "fa fa-plus bg-green";
                            }elseif($log->type == "Edit"){
                                echo "fa fa-edit bg-yellow";
                            }elseif($log->type == "Email"){
                                echo "fa fa-envelope bg-aqua";
                            }else{
                                echo "fa fa-comment bg-blue";
                            }
                        ?>
                    "></i>

                    <div class="timeline-item">
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 
                            <?php 
                                $datet = date("D M d, Y H:m A",strtotime($log->timestamp));
                                echo $datet;
                            ?>
                        </span>

                        <h3 class="timeline-header"><a href=""><?=$log->title?></a></h3>

                        <div class="timeline-body">
                            <?=$log->description?>
                        </div>
                        <div class="timeline-footer">
                        </div>
                    </div>
                </li>
                <?php 
                    endforeach;
                ?>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
            </div>
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
