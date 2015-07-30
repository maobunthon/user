<?php
$datetime = date('Y-m-d h:i:s');
	require_once '../config/class.php';
	require_once '../check/index.php';
	require_once '../include/header.php';
	require_once '../include/menu.php';
    require_once '../config/course_detail.php';
    require_once '../config/course.php';
	require_once '../config/branch.php';

    if(isset($_POST['save_course'])){
		
        $obj_courseDetail->co_name=$_POST['co_name'];
		
        $obj_courseDetail->cat_id=$_POST['cat_id'];
        $obj_courseDetail->br_id=$_POST['br_id'];
        $obj_courseDetail->qu_id=$_POST['qu_id'];

        $obj_courseDetail->co_des=$_POST['co_des'];
        $obj_courseDetail->fee=$_POST['fee'];
        $obj_courseDetail->co_requirement=$_POST['co_requirement'];
        $obj_courseDetail->co_duration=$_POST['co_duration'];
        $obj_courseDetail->co_startDate=$_POST['co_startDate'];
		if($_POST['co_status']=='on'){
			$staus=1;
		}else{
			$staus=0;
		}
        $obj_courseDetail->co_status=$staus;

        $obj_courseDetail->co_endDate=$_POST['co_endDate'];
        $obj_courseDetail->co_closeDate=$_POST['co_closeDate'];
        $obj_courseDetail->co_tag=$_POST['co_tag'];

        $obj_courseDetail->course_detail_process("insert");

    }
	if(isset($_GET['action'])){
		if($_GET['action']=="edit"){
			$edit=mysqli_fetch_array($obj_main->returnQuery("select * from ".COURSE_DETAIL." where co_id='".$_GET['cid']."'"));
			
			//echo $edit['co_name'];
		}
	}

?>

 			<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Course Detial
                        <small>Management</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Course</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row" style="display:;">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Course</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="?" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="course_name">Course title</label>
											<input type="text" class="form-control" name="store_id" value="<?php echo $edit['co_id']?>" >
                                            <input type="text" class="form-control" id="course_name" name="co_name" placeholder="course name">
                                            <label for="course_description">Description</label>
                                            <textarea type="text" class="form-control" rows="3" id="course_description" name="co_des" placeholder="course name"> </textarea>
										
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <label for="course_qualification">Qualification</label>
                                                    <select class="form-control" name="qu_id">
                                                        <option>Please select</option>
                                                        <?php
                                                        $getQualification = $obj_main->returnQuery("select qu_id,qu_name from ".QUALIFICATION_LEVEL. " where qu_status=1");
                                                        
                                                        while($myCat=mysqli_fetch_array($getQualification)){
                                                        ?>
                                                            <option 
															<?php 
															if($myCat['qu_id']== $edit['qu_id']){
																echo " selected";
															}else{ }
															?> value="<?php echo $myCat['qu_id']?>"><?php echo $myCat['qu_name']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    <label for="course_category">Category</label>
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
                                                    <label for="course_fee">Fee</label>
                                                    <input type="text" id="course_fee" name="fee" class="form-control" value="<?php echo $edit['fee']?>" placeholder="">
                                                </div>                                          
                                            </div>
                                            <label for="course_requirement">Requirement</label>
                                            <textarea class="form-control" id="course_requirement" rows="3" name="co_requirement"></textarea>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <label for="course_name">Duration</label>
                                                    <input type="text" class="form-control" name="co_duration" placeholder="">
                                                </div>
                                                <div class="col-xs-4">
                                                    <label for="course_name">Start Date </label>
                                                    <input type="text" class="form-control" placeholder="" name="co_startDate">
                                                </div>
                                                <div class="col-xs-4">
                                                    <label for="course_name">Closed Date</label>
                                                    <input type="text" class="form-control" placeholder="" name="co_closeDate">
                                                </div>
												<div class="col-xs-4">
                                                    <label for="co_endDate">End Date</label>
                                                    <input type="text" class="form-control" placeholder="" name="co_endDate">
                                                </div>                                          
                                            </div>                                      
                                            <label for="course_name">tag</label>
                                            <input type="text" class="form-control" id="tag" placeholder="" name="co_tag">
                                            <div class="checkbox">
                                                <label for=""><input type="checkbox" name="co_status" />status</label>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer tac">
                                        <input type="submit" class="btn btn-primary" name="save_course" value="Save">
                                        <button type="reset" class="btn btn-group-lg">Cancel</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
						
                    </div>   <!-- /.row -->

                    <div class="row">
                        <div class="col-xs-10">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">All Course</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width:350px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
								
                                    <table class="table table-bordered table-hover">
                                        <colgroup>
                                        <col style="width:30px;">
                                        <col style="width:50px;">
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        </colgroup>
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
                                             
                                            $statement = QUERY_COURSE_DETAIL_ADMIN; // Change `records` according to your table name.
                                               
                                            $results = $obj_main->returnQuery("SELECT cd.*,ca.*,q.*,b.*,
                                                (SELECT p.pro_name from province p where p.pro_id=b.pro_id) as `pro_name`
                                                FROM {$statement} 
                                                INNER JOIN qualification_level q ON q.qu_id = cd.qu_id 
                                                INNER JOIN branch b ON b.br_id=cd.br_id
                                                INNER JOIN category ca ON ca.cat_id=cd.cat_id LIMIT {$startpoint} , {$per_page}");

                                            
                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['co_name'];?></td>
                                                        <td><?php echo $row['qu_name'];?></td>
                                                        <td><?php echo $row['br_name'];?></td>
                                                        <td><?php echo $row['cat_name'];?></td>
                                                        <td><?php echo $row['pro_name'];?></td>
                                                        <td><?php echo $row['co_startDate'];?></td>
                                                        <td><?php echo $row['co_closeDate'];?></td>
                                                        <td class="alc">
                                                            <a href="#" onclick="update_sub(<?php echo $row['co_id']?>,'co_status',<?php echo ($row['co_status']==1?"0":"1")?>,'COURSE_DETAIL','responseTable')">
                                                                <i class="fa fa<?php echo ($row['co_status']==1?"-check":"");?>-square-o"></i>
                                                            </a>
															<a href="?action=edit&cid=<?php echo $row['co_id']?>">
                                                                <i class="fa fa-edit"></i>
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
									<!-- COMPOSE MESSAGE MODAL -->
									<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
												</div>
												<form action="#" method="post">
													<div class="modal-body">
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon">TO:</span>
																<input name="email_to" type="email" class="form-control" placeholder="Email TO">
															</div>
														</div>
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon">CC:</span>
																<input name="email_to" type="email" class="form-control" placeholder="Email CC">
															</div>
														</div>
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon">BCC:</span>
																<input name="email_to" type="email" class="form-control" placeholder="Email BCC">
															</div>
														</div>
														<div class="form-group">
															<textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
														</div>
														<div class="form-group">
															<div class="btn btn-success btn-file">
																<i class="fa fa-paperclip"></i> Attachment
																<input type="file" name="attachment"/>
															</div>
															<p class="help-block">Max. 32MB</p>
														</div>
							
													</div>
													<div class="modal-footer clearfix">
							
														<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
							
														<button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Send Message</button>
													</div>
												</form>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								</div>    
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

<?php require_once '../include/footer.php';?>

        