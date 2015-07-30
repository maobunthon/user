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
		$obj_scholarship->co_name=$_POST['co_name'];
		
		 $obj_course->course_process("insert");
		 
	}
?>

 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Course
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
											<label for="course_name">Scholarship title</label>
                                            <input type="text" class="form-control" id="course_name" name="co_name" placeholder="Scholarship title">											
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
                                <div class="box-body table-responsive">
								
                                    <table class="table table-bordered table-hover">
                                        <colgroup>
                                        <col style="width:50px;">
                                        <col>
                                        <col style="width:50px;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>N<sup>o</sup></th>
                                                <th>Course</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                            if ($page <= 0) $page = 1;
                                             
                                            $per_page = 10; // Set how many records do you want to display per page.
                                             
                                            $startpoint = ($page * $per_page) - $per_page;
                                             
                                            $statement = QUERY_COURSE_ADMIN; // Change `records` according to your table name.
                                               
                                            $results = $obj_main->returnQuery("SELECT co_name from {$statement}".COURSE."LIMIT {$startpoint} , {$per_page}");

                                            
                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['co_name'];?></td>
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
                                                 echo "<tr><td colspan='3' class='text-center'>No records are found.</td></tr>";
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

        