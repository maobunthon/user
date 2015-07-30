<?php
	require_once '../config/class.php';
	require_once '../check/index.php';
	require_once '../include/header.php';
	require_once '../include/menu.php';
	require_once '../config/promotion.php';
	require_once '../config/branch.php';

	if(isset($_POST['save_promotion'])){
		$obj_promotion->promo_name=$_POST['promo_name'];
		$obj_promotion->promo_des=$_POST['promo_des'];
		$obj_promotion->br_id=$_POST['br_id'];		
		$obj_promotion->promo_expiredDate=$_POST['promo_expiredDate'];
		$obj_promotion->promo_image='1.jpg';
		if(isset($_POST['promo_status'])=='on'){
			$staus=1;
		}else{
			$staus=0;
		}
		$obj_promotion->promo_status=$staus;
		$datetime = date('Y-m-d h:i:s');
		$obj_promotion->promo_addDate=$datetime;
		$obj_promotion->promo_isDelete='1';
		$obj_promotion->promo_deleteDate='1';		
		
		$obj_promotion->promotion_process("insert");
	}
    
?>

 			<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Promotion
                        <small>Management</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Promotion</li>
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
                                    <h3 class="box-title">Promotion</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="?" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
											<label for="Promotion">Promotion title</label>
                                            <input type="text" class="form-control" id="Promotion" name="promo_name" placeholder="Promotion title">
											<label for="des">Description</label>
                                            <textarea type="text" class="form-control" rows="3" id="des" name="promo_des" placeholder="Scholarship description"> </textarea>
											<div class="row">
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
                                                    <label for="expiredDate">ExpiredDate</label>
                                                    <input type="text" class="form-control" placeholder="" name="promo_expiredDate" id="expiredDate">
                                                </div>                                          
                                            </div>
											<label for="sl_des">Image</label>
											<input type="file" name="files[]" multiple />
											<div class="checkbox">
                                                <label for=""><input type="checkbox" name="promo_status" />&nbsp;status</label>
                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer tac">
                                        <input type="submit" class="btn btn-primary" name="save_promotion" value="Save">
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
                                    <h3 class="box-title">All Pormotions</h3>
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
                                <div class="box-body table-responsive" id="responseTable"  style="display:;">
                                    <!-- <table id="example2" class="table table-bordered table-hover"> -->
                                    
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>N<sup>o</sup></th>
                                                <th>Promotion</th>
												<th>Brand</th>
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
                                             
                                            $statement = QUERY_PROMOTION_ADMIN; // Change `records` according to your table name.
                                               
                                            $results = $obj_main->returnQuery("SELECT pr.*,b.*
                                                FROM {$statement} 
                                                INNER JOIN branch b ON b.br_id = pr.br_id 
                                                LIMIT {$startpoint} , {$per_page}");

                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['promo_name'];?></td>		
														<td><?php echo $row['br_name'];?></td>												
                                                        <td><?php echo $row['promo_addDate'];?></td>
                                                        <td><?php echo $row['promo_expiredDate'];?></td>
                                                        <td class="alc">
                                                            <a href="#" onclick="update_sub(<?php echo $row['promo_id']?>,'promo_status',<?php echo ($row['promo_status']==1?"0":"1")?>,'EVENT_TRAINING','responseTable')">
                                                                <i class="fa fa<?php echo ($row['promo_status']==1?"-check":"");?>-square-o"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php
                                                    $n++; 
                                                }
                                              
                                            } else {
                                                 echo "<tr><td colspan='5' class='text-center'>No records are found.</td></tr>";
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

        