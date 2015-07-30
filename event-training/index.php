<?php
	require_once '../config/class.php';
	require_once '../check/index.php';
	require_once '../include/header.php';
	require_once '../include/menu.php';	
    require_once '../config/course_detail.php';
    require_once '../config/course.php';
	require_once '../config/branch.php';
	require_once '../config/province.php';
	require_once '../config/event_training.php';

	if(isset($_POST['save_event'])){
		$obj_event_training->et_title=$_POST['et_title'];
		$obj_event_training->et_des=$_POST['et_des'];
		$obj_event_training->qu_id=$_POST['qu_id'];
		$obj_event_training->cat_id=$_POST['cat_id'];
		$obj_event_training->br_id=$_POST['br_id'];
		$obj_event_training->pro_id=$_POST['pro_id'];
		$obj_event_training->et_address=$_POST['et_address'];
		$obj_event_training->et_startDate=$_POST['et_startDate'];
		$obj_event_training->et_endDate=$_POST['et_endDate'];
		$obj_event_training->et_tag=$_POST['et_tag'];
		
		if($_POST['et_status']=='on'){
			$estaus=1;
		}else{
			$estaus=0;
		}
		$obj_event_training->et_status=$estaus;
		$datetime = date('Y-m-d h:i:s');
		$obj_event_training->et_publishDate=$datetime;
		$obj_event_training->et_deleteDate=1;
		$obj_event_training->et_isDelete=1;
		
		$obj_event_training->event_training_process("insert");
	}
    
?>

 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Event and Training
                        <small>Management</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Event and Training</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="row">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Evennt&amp;Traning</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="?" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
											<label for="event_traning">Evennt&amp;Traning title</label>
                                            <input type="text" class="form-control" id="event_traning" name="et_title" placeholder="Evennt&amp;Traning title">
											<label for="sl_des">Description</label>
                                            <textarea type="text" class="form-control" rows="3" id="course_description" name="et_des" placeholder="Scholarship description"> </textarea>
											<div class="row">
                                                <div class="col-xs-4">
													<label for="Qualification">Qualification</label>
													<select class="form-control" name="qu_id" id="Qualification">
														<option>Please select</option>
														<?php
                                                        $get_qualificationLevel = $obj_main->returnQuery("select qu_id,qu_name from ".QUALIFICATION_LEVEL. " where qu_status=1");
                                                        while($myquali=mysqli_fetch_array($get_qualificationLevel)){
                                                        ?>
                                                            <option value="<?php echo $myquali['qu_id']?>"><?php echo $myquali['qu_name']?></option>
                                                        <?php
                                                        }
                                                        ?>   
													</select>
												</div>
												<div class="col-xs-4">
													<label for="Category">Category</label>
                                                    <select class="form-control" name="cat_id" id="Category">
                                                        <option>Please select</option>
                                                        <?php
                                                        $getCategory = $obj_main->returnQuery("select cat_id,cat_name from ".CATEGORY. " where cat_status=1");
                                                        while($myCat=mysqli_fetch_array($getCategory)){
                                                        ?>
                                                            <option value="<?php echo $myCat['cat_id']?>"><?php echo $myCat['cat_name']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
												</div>
												<div class="col-xs-4">
													<label for="Brand">Brand</label>
                                                    <select class="form-control" name="br_id" id="Brand">
                                                        <option>Please select</option>
                                                        <?php
                                                        $obj_branch = $obj_main->returnQuery("select br_id,br_name from ".BRANCH. " where br_status=1");
                                                        while($myBrand=mysqli_fetch_array($obj_branch)){
                                                        ?>
                                                            <option value="<?php echo $myBrand['br_id']?>"><?php echo $myBrand['br_name']?></option>
                                                        <?php
                                                        }
                                                        ?>                                                  
                                                    </select>
												</div>
												<div class="col-xs-4">
													<label for="province">Province</label>
													<select class="form-control" name="pro_id" id="province">
														<option>Please select</option>
                                                        <?php
                                                        $obj_province = $obj_main->returnQuery("select pro_id,pro_name from ".PROVINCE. " where pro_status=1");
                                                        while($myprovince=mysqli_fetch_array($obj_province)){
                                                        ?>
                                                            <option value="<?php echo $myprovince['pro_id']?>"><?php echo $myprovince['pro_name']?></option>
                                                        <?php
                                                        }
                                                        ?>   
													</select>
												</div>
											</div>
											<label for="Address">Address</label>
											<textarea type="text" class="form-control" rows="3" id="Address" name="et_address" placeholder="Address"></textarea>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <label for="Start Date">Start Date </label>
                                                    <input type="text" class="form-control" placeholder="" name="et_startDate" id="Start Date">
                                                </div>
                                                <div class="col-xs-4">
                                                    <label for="EndDate">EndDate</label>
                                                    <input type="text" class="form-control" placeholder="" name="et_endDate" id="EndDate">
                                                </div>                                          
                                            </div>                                      
                                            <label for="tage">tag</label>
                                            <input type="text" class="form-control" id="tage" placeholder="" name="et_tag">
                                            <div class="checkbox">
                                                <label for="status"><input type="checkbox" name="et_status"  id=""/>&nbsp;status</label>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer tac">
                                        <input type="submit" class="btn btn-primary" name="save_event" value="Save">
                                        <button type="reset" class="btn btn-group-lg">Cancel</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                    </div>
					<div class="row">
                        <div class="col-lg-10">
                            <div class="box">
                                <div class="col-sm-6 box-header">
                                    <h3 class="box-title">All Events and Trainings</h3>
                                </div><!-- /.box-header -->
								
                                <div class="col-sm-6 search-form" style="margin:5px 0;">
                                    <form action="#" class="text-right">
                                        <div class="input-group">
                                            <input type="text" onkeyup="search_sub(this.value,'EVENT_TRAINING','responseTable')" class="form-control input-sm" placeholder="Search">
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
                                                <th>Event-Training</th>
                                                <th>Level</th>
                                                <th>Branch</th>
                                                <th>Category</th>
                                                <th>Location</th>
                                                <th>Start Date</th>
                                                <th>Close Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                            if ($page <= 0) $page = 1;
                                             
                                            $per_page = 10; // Set how many records do you want to display per page.
                                             
                                            $startpoint = ($page * $per_page) - $per_page;
                                             
                                            $statement = QUERY_EVENT_TRAINING_ADMIN; // Change `records` according to your table name.
                                               
                                            $results = $obj_main->returnQuery("SELECT et.*,q.*,b.*,c.*,p.*
                                                FROM {$statement} 
                                                INNER JOIN qualification_level q ON q.qu_id = et.qu_id
                                                INNER JOIN branch b ON b.br_id = et.br_id 
                                                INNER JOIN category c ON c.cat_id = et.cat_id
                                                INNER JOIN province p ON p.pro_id = et.pro_id
                                                LIMIT {$startpoint} , {$per_page}");

                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['et_title'];?></td>
                                                        <td><?php echo $row['qu_name'];?></td>
                                                        <td><?php echo $row['br_name'];?></td>
                                                        <td><?php echo $row['cat_name'];?></td>
                                                        <td><?php echo $row['pro_name'];?></td>
                                                        <td><?php echo $row['et_startDate'];?></td>
                                                        <td><?php echo $row['et_endDate'];?></td>
                                                        <td class="alc">
                                                            <a href="#" onclick="update_sub(<?php echo $row['et_id']?>,'et_status',<?php echo ($row['et_status']==1?"0":"1")?>,'EVENT_TRAINING','responseTable')">
                                                                <i class="fa fa<?php echo ($row['et_status']==1?"-check":"");?>-square-o"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php
                                                    $n++; 
                                                }
                                              
                                            } else {
                                                 echo "<tr><td colspan='9' class='text-center'>No records are found.</td></tr>";
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

        