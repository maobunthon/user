<?php
	require_once '../config/class.php';
	require_once '../check/index.php';
	require_once '../include/header.php';
	require_once '../include/menu.php';
	require_once '../config/scholarship.php';
	require_once '../config/course.php';
	require_once '../config/branch.php'; 
	require_once '../config/country.php';
	require_once '../config/qualification_level.php';   
	
	if(isset($_POST['save_scholarship'])){
		$obj_scholarship->sl_title=$_POST['sl_title'];
		echo $_POST['sl_title'];
		$obj_scholarship->br_id=$_POST['br_id'];
		$obj_scholarship->cont_id=$_POST['cont_id'];
		$obj_scholarship->sl_studyIn=$_POST['sl_studyIn'];
		$obj_scholarship->sl_des=$_POST['sl_des'];
		$obj_scholarship->qu_id=$_POST['qu_id'];
		$obj_scholarship->cat_id=$_POST['cat_id'];
		$obj_scholarship->sl_sponsor=$_POST['sl_sponsor'];
		$obj_scholarship->sl_requirement=$_POST['sl_requirement'];
		$obj_scholarship->sl_duration=$_POST['sl_duration'];
		
		$datetime = date('Y-m-d h:i:s');
		$obj_scholarship->sl_addDate=$datetime;
		
		$obj_scholarship->sl_startDate=$_POST['sl_startDate'];
		$obj_scholarship->sl_expiredDate=$_POST['sl_expiredDate'];
		$obj_scholarship->sl_tag=$_POST['sl_tag'];
		if($_POST['sl_status']=='on'){
			$staus=1;
		}else{
			$staus=0;
		}
		$obj_scholarship->sl_status=$staus;
		$obj_scholarship->sl_isDelete=1;
		$obj_scholarship->sl_deleteDate=1;
		$obj_scholarship->sl_note=1;
		
		$obj_scholarship->scholarship_process("insert");
	}
?>

 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Scholarship
                        <small>Management</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Scholarship</li>
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
                                    <h3 class="box-title">Scholarship</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="?" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
											<label for="sl_title">Scholarship title</label>
                                            <input type="text" class="form-control" id="course_name" name="sl_title" placeholder="Scholarship title">
											<div class="row">
                                                <div class="col-xs-4">
													<label for="course_category">Brand</label>
                                                    <select class="form-control" name="br_id">
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
													<label for="cont_id">Contry</label>
													<select class="form-control" name="cont_id">
														<option>Please select</option>
                                                        <?php
                                                        $obj_country = $obj_main->returnQuery("select cont_id,cont_name from ".COUNTRY. " where cont_status=1");
                                                        while($mycountry=mysqli_fetch_array($obj_country)){
                                                        ?>
                                                            <option value="<?php echo $mycountry['cont_id']?>"><?php echo $mycountry['cont_name']?></option>
                                                        <?php
                                                        }
                                                        ?>   
													</select>
												</div>
											</div>
											<label for="sl_studyIn">Address</label>
											<textarea type="text" class="form-control" rows="3" id="sl_studyIn" name="sl_studyIn" placeholder="Address"></textarea>													
											
											<label for="sl_des">Description</label>
                                            <textarea type="text" class="form-control" rows="3" id="course_description" name="sl_des" placeholder="Scholarship description"> </textarea>
											<div class="row">
                                                <div class="col-xs-4">
													<label for="qu_id">Qualification</label>
													<select class="form-control" name="qu_id">
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
													<label for="cat_id">Category</label>
                                                    <select class="form-control" name="cat_id">
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
													<label for="sl_sponsor">Sponsor fee</label>
													<input type="text" class="form-control" id="sl_sponsor" name="sl_sponsor" placeholder="Sponsor fee">
												</div>
											</div>
											<label for="sl_requirement">Requirement</label>
                                            <textarea class="form-control" id="sl_requirement" rows="3" name="sl_requirement"></textarea>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <label for="sl_duration">Duration</label>
                                                    <input type="text" class="form-control" name="sl_duration" placeholder="">
                                                </div>
                                                <div class="col-xs-4">
                                                    <label for="sl_startDate">Start Date </label>
                                                    <input type="text" class="form-control" placeholder="" name="sl_startDate">
                                                </div>
                                                <div class="col-xs-4">
                                                    <label for="sl_expiredDate">ExpiredDate</label>
                                                    <input type="text" class="form-control" placeholder="" name="sl_expiredDate">
                                                </div>                                          
                                            </div>                                      
                                            <label for="sl_tage">tag</label>
                                            <input type="text" class="form-control" id="tag" placeholder="" name="sl_tag">
                                            <div class="checkbox">
                                                <label for=""><input type="checkbox" name="sl_status" />&nbsp;status</label>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer tac">
                                        <input type="submit" class="btn btn-primary" name="save_scholarship" value="Save">
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
                                    <h3 class="box-title">All Scholarships</h3>
                                </div><!-- /.box-header -->
                                <div class="col-sm-6 search-form" style="margin:5px 0;">
                                    <form action="#" class="text-right">
                                        <div class="input-group">
                                            <input type="text" onkeyup="search_sub(this.value,'SCHOLARSHIP','responseTable')" class="form-control input-sm" placeholder="Search">
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
                                                <th>Course</th>
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
                                             
                                            $statement = QUERY_SCHOLARSHIP_ADMIN; // Change `records` according to your table name.
                                               
                                            $results = $obj_main->returnQuery("SELECT s.*,q.*,b.*,c.*,cont.*
                                                FROM {$statement} 
                                                INNER JOIN qualification_level q ON q.qu_id = s.qu_id
                                                INNER JOIN branch b ON b.br_id = s.br_id 
                                                INNER JOIN category c ON c.cat_id = s.cat_id
                                                INNER JOIN country cont ON cont.cont_id = s.cont_id
                                                LIMIT {$startpoint} , {$per_page}");

                                            
                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['sl_title'];?></td>
                                                        <td><?php echo $row['qu_name'];?></td>
                                                        <td><?php echo $row['br_name'];?></td>
                                                        <td><?php echo $row['cat_name'];?></td>
                                                        <td><?php echo $row['cont_name'];?></td>
                                                        <td><?php echo $row['sl_startDate'];?></td>
                                                        <td><?php echo $row['sl_expiredDate'];?></td>
                                                        <td class="alc">
                                                            <a href="#" onclick="update_sub(<?php echo $row['sl_id']?>,'sl_status',<?php echo ($row['sl_status']==1?"0":"1")?>,'SCHOLARSHIP','responseTable')">
                                                                <i class="fa fa<?php echo ($row['sl_status']==1?"-check":"");?>-square-o"></i>
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

        