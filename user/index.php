<?php
	require_once '../config/class.php';
    require_once '../config/university.php';
	require_once '../check/index.php';
	require_once '../include/header.php';
	require_once '../include/menu.php';
	require_once '../config/adm_user.php';

	if(isset($_POST['save_pro'])){
		$obj_admUser->adm_email=$_POST['adm_email'];
		$obj_admUser->adm_pass=md5($_POST['adm_pass']);
		$obj_admUser->adm_fullName=$_POST['adm_fullName'];
		$obj_admUser->adm_gender=$_POST['adm_gender'];
		$obj_admUser->adm_dob=$_POST['adm_dob'];
		$obj_admUser->adm_address=$_POST['adm_address'];
		$obj_admUser->adm_phone=$_POST['adm_phone'];
		$obj_admUser->adm_status=1;
		$obj_admUser->adm_activate=0;
		$datetime = date('Y-m-d h:i:s');
		$obj_admUser->adm_dateTime=$datetime;

		$obj_admUser->adm_user_process("insert");
	}
    
?>

 			<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        User
                        <small>Management</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">User</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="row">
                   	  <div class="col-md-10">
                            <!-- general form elements -->
                        	<div class="box box-primary">
                                <div class="box-header big-title">
                                    <h3 class="box-title">Profile Information</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="?" method="post">
                                    <div class="box-header">
                                        <h4 class="box-subtitle">Account Credential</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="adm_email" placeholder="Enter email">
                                        </div><!-- /.form-group-->
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="adm_pass" placeholder="Password">
                                        </div><!-- /.form-group-->
                                    </div><!-- /.box-body -->
                                    
                                    <div class="box-header">
                                    	<h5 class="box-subtitle">Account Information</h5>
                                    </div>
                                    <div class="box-body">
                                    	<div class="form-group">
                                            <label for="name">Full Name *</label>
                                            <input type="text" class="form-control" id="name" name="adm_fullName" placeholder="full name">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Gender *</label>
                                                <select class="form-control" name="adm_gender">
                                                    <option>Female</option>
                                                    <option>Male</option>
                                                </select>
                                            </div><!-- /.form-group-->
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="date">Date of Birth</label>
                                                <input type="text" class="form-control" id="date" name="adm_dob" placeholder="yyyy-mmm-dd">
                                            </div><!-- /.form-group-->
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="adm_address" placeholder="Address">
                                        </div><!-- /.form-group-->
                                        <div class="row">
                                        	<div class="form-group col-md-6">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="adm_phone" placeholder="Phone">
                                            </div><!-- /.form-group-->
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" name="save_pro" value="Save">
                                        <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!-- /.col-md-6 -->                        
                    </div>
					<div class="row" style="display:none;">
                        <div class="col-lg-10">
                            <div class="box">
                                <div class="col-sm-6 box-header">
                                    <h3 class="box-title">All users</h3>
                                </div><!-- /.box-header -->
                                <div class="col-sm-6 search-form" style="margin:5px 0;">
                                    <form action="#" class="text-right">
                                        <div class="input-group">
                                            <input type="text" onkeyup="search_sub(this.value,'ADMIN_USER','responseTable')" class="form-control input-sm" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button"  class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                                <div class="box-body table-responsive" id="responseTable">
                                    <!-- <table id="example2" class="table table-bordered table-hover"> -->
                                    
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>N<sup>o</sup></th>
                                                <th>Full Name</th>
                                                <th>Location</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Admin at</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                            if ($page <= 0) $page = 1;
                                             
                                            $per_page = 10; // Set how many records do you want to display per page.
                                             
                                            $startpoint = ($page * $per_page) - $per_page;
                                             
                                            $statement = QUERY_USER_ADMIN; // Change `records` according to your table name.
                                              
                                            $results = $obj_main->returnQuery("SELECT au.*,u.*  
                                             FROM {$statement} inner join ".UNIVERSITY." u on u.adm_id=au.adm_id LIMIT {$startpoint} , {$per_page}");
                                            
                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['adm_fullName'];?></td>
                                                        <td><?php echo $row['adm_address'];?></td>
                                                        <td><?php echo $row['adm_email'];?></td>
                                                        <td><?php echo $row['adm_phone'];?></td>
                                                        <td><?php echo $row['uni_full_name'];?></td>
                                                        <td class="alc">
                                                            <a href="#" onclick="update_sub(<?php echo $row['adm_id']?>,'adm_status',<?php echo ($row['adm_status']==1?"0":"1")?>,'ADMIN_USER','responseTable')">
                                                                <i class="fa fa<?php echo ($row['adm_status']==1?"-check":"");?>-square-o"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php
                                                    $n++; 
                                                }
                                              
                                            } else {
                                                 echo "<tr><td colspan='6' class='text-center'>No records are found.</td></tr>";
                                            }
                                             
                                             // displaying paginaiton.
                                            //echo $obj_main->pagination($statement,$per_page,$page,$url='?');
                                            
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div></div>
                                            <div class="dataTables_paginate paging_bootstrap">
                                                <?php
                                                // displaying paginaiton.
                                                echo $obj_main->pagination($statement,$per_page,$page,$url='?');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div class="col-lg-2">
                            <!--<div class="nav-tabs-custom">-->
                            <div class="nav-tabs-custom">
                                <!-- compose message btn -->
                                <!-- <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-plus"></i> Add New University</a> -->
                                
                            </div>
                            <div class="nav-tabs-custom">
                                
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

<?php require_once '../include/footer.php';?>

        