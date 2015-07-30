<?php
	require_once 'config/class.php';
    require_once 'config/university.php';
	require_once 'check/index.php';
	require_once 'include/header.php';
	require_once 'include/menu.php';
    // require_once 'university/pop-add.php';
    // require_once 'university/pop-edit.php';

    if(isset($_POST['AddUniversity'])){
		$ad_id=session_name('adm_userName');
		$obj_university->adm_id=$ad_id;
		$obj_university->uni_full_name=$_POST['uni_full_name'];
		$obj_university->uni_slogan=$_POST['uni_slogan'];
		$obj_university->uni_description=$_POST['uni_description'];
		$obj_university->uni_logo=1;
		$obj_university->uni_images=1;
		$obj_university->uni_images=1;
		$obj_university->us_type_id=$_POST['us_type_id'];
		$obj_university->uni_isPrivate=$_POST['uni_full_name'];
		$obj_university->uni_status=$_POST['uni_full_name'];
		$datetime = date('Y-m-d h:i:s');
		$obj_university->uni_addDate=$datetime;
		$obj_university->uni_description=$_POST['uni_full_name'];
	
		$obj_university->university_process("insert");
    }
?>

 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        University
                        <small>Management</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">University</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="row">
                        
                        <div class="col-md-10">
                            <!-- general form elements -->
                        	<div class="box box-primary">
                                <div class="box-header big-title">
                                    <h3 class="box-title">
                                    	<a href="#">Profile Information</a> | School Info
                                    	<button class="btn btn-success btn-sm">+ Add Branch</button>
                                    </h3>
                                    
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="?" method="post">
                                    <div class="box-header">
                                        <h4 class="box-subtitle">School Information</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name_uni">Agency/Institution Name*</label>
                                            <input type="text" class="form-control" id="name_uni" name="uni_full_name" placeholder="">
                                        </div><!-- /.form-group-->
                                        <div class="form-group">
                                            <label for="slogan">Slogan</label>
                                            <input type="text" class="form-control" id="slogan" name="uni_slogan" placeholder="">
                                        </div><!-- /.form-group-->
                                        <div class="form-group">
                                            <label for="profile">Profile *</label>
                                            <textarea class="form-control" rows="5" id="profile" name="uni_description" placeholder="Enter ..."></textarea>
                                            <p class="help-block">Description</p>
                                        </div><!-- /.form-group-->
                                        <div class="form-group">
                                            <label for="logo">Logo *</label>
                                            <input type="file" id="logo" name="uni_logo">
                                            <p class="help-block">File types allowed (.JPG, .JPEG, .GIF, .PNG).</p>
                                            <div class="row">
                                            	<div class="col-md-4"><div class="img-thum"></div></div>
                                            </div>
                                        </div><!-- /.form-group-->
                                        <div class="form-group">
                                            <label for="img">Images </label>
                                            <input type="file" id="img" name="uni_images">
                                            <p class="help-block">File types allowed (.JPG, .JPEG, .GIF, .PNG).</p>
                                        </div><!-- /.form-group-->
                                        <div class="form-group">
                                        	<div class="row">
                                                <div class="col-md-4"><div class="img-thum"></div></div>
                                                <div class="col-md-4"><div class="img-thum"></div></div>
                                                <div class="col-md-4"><div class="img-thum"></div></div>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                        	<div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Institute Status *</label>
                                                        <select class="form-control" id="status" name="uni_status">
                                                            <option>Public</option>
                                                            <option>Private</option>
                                                            <option>Public &amp; Private</option>
                                                        </select>
                                                 </div><!-- /.form-group-->
                                            </div>
                                        </div><!-- /.row-->
                                        
                                        <div class="row">
                                        	<div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="type">Institute Type *</label>
                                                    <select class="form-control" id="type" name="us_type_id">
                                                        <option>University/College</option>
                                                        <option>Institute</option>
                                                        <option>Center</option>
                                                        <option>Organization</option>
                                                    </select>
                                                </div><!-- /.form-group-->
                                            </div>
                                        </div><!-- /.row-->
                                        
                                    
                                    	<div class="form-group">
                                            <label for="">Working Hour</label>
                                            <input type="text" class="form-control" id="" placeholder="8:00 am to 5:00 pm Monday to Saturday">
                                        </div>
                                        <div class="form-group">
                                            <label for="add">Address</label>
                                            <input type="text" class="form-control" id="add" name="br_address" placeholder="#8B, Str.112, Sangkat Depo III, Khan Toul Kork, Phnom Penh, Cambodia.">
                                        </div><!-- /.form-group-->
                                        <div class="row">
                                        	<div class="form-group col-md-4">
                                                <label for="pro">Province *</label>
                                                <select class="form-control" id="pro" name="pro_id">
                                                    <option>Phnom Penh</option>
                                                    <option>Kampong Cham</option>
                                                    <option>Kampong Thom</option>
                                                </select>                                            
                                            </div><!-- /.form-group-->
                                        </div>
                                        <div class="row">
                                        	<div class="form-group col-md-6">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="br_phone" placeholder="012 123 456">
                                            </div><!-- /.form-group-->
                                        </div>                                        
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="email">Email *</label>
                                                <input type="email" class="form-control" id="email" name="br_email" placeholder="info@mystudyguide.info">
                                            </div><!-- /.form-group-->
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="website">Website</label>
                                                <input type="email" class="form-control" id="website" name="br_website" placeholder="www.mystudygude.info">
                                            </div><!-- /.form-group-->
                                        </div>                                        
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="map">Google Map</label>
                                                <input type="text" class="form-control" id="map" name="br_google_map" placeholder="">
                                                 <p class="help-block">Drag red point to your location.</p>
                                            </div><!-- /.form-group-->
                                        </div>
                                    </div><!-- /.box-body -->
                                    
                                    <div class="box-header">
                                    	<h5 class="box-subtitle">Programs &amp; Degree</h5>
                                    </div>
                                    <div class="box-body">
                                    	<div class="row">
                                        	<div class="col-md-4">
                                            	<div class="form-group">
                                                    <label for="">Program Name</label>
                                                    <input type="email" class="form-control" id="" placeholder="Accountant &amp; Finance">
                                                </div>
                                            </div><!-- /.col-md-4 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <label for="">Certificate</label>
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <label for="">Associate</label>
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <label for="">Bachelor</label>
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <label for="">Master</label>
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <label for="">PHD</label><br>
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <a href="#"><span class="glyphicon glyphicon-remove color-red" aria-hidden="true"></span></a>
                                                </div>
                                            </div><!-- /.col-md-1 -->                                            
                                        </div><!-- /.row-->
                                        
                                    	<div class="row">
                                        	<div class="col-md-4">
                                            	<div class="form-group">
                                                    <input type="email" class="form-control" id="" placeholder="Enter a course name ...">
                                                </div>
                                            </div><!-- /.col-md-4 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <input type="checkbox" class="minimal" id="">
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                            <div class="col-md-1">
                                            	<div class="form-group text-center">
                                                    <button class="btn btn-success btn-sm">Add More</button>
                                                </div>
                                            </div><!-- /.col-md-1 -->
                                            
                                        </div><!-- /.row-->
                                    </div><!-- /.box-body-->
                                    
                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" name="save_uni" value="Save">
                                        <button type="submit" class="btn btn-default">Cancel</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!-- /.col-md-6 -->
                        
                    </div>
					<div class="row">
                        <div class="col-lg-10">
                            <div class="box">
                                <div class="col-sm-6 box-header">
                                    <h3 class="box-title">All Universities</h3>
                                </div><!-- /.box-header -->
                                <div class="col-sm-6 search-form" style="margin:5px 0;">
                                        <form action="#" class="text-right">
                                            <div class="input-group">
                                                <input type="text" onkeyup="search_me(this.value,'UNIVERSITY','responseTable')" class="form-control input-sm" placeholder="Search">
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
                                                <th class="alc">Logo</th>
                                                <th class="alc">Status</th>
                                                <th class="alc">Feature</th>
                                                <th class="alc">Branch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                            if ($page <= 0) $page = 1;
                                             
                                            $per_page = 10; // Set how many records do you want to display per page.
                                             
                                            $startpoint = ($page * $per_page) - $per_page;
                                             
                                            $statement = QUERY_BRANCH_ADMIN; // Change `records` according to your table name.
                                              
                                            $results = $obj_main->returnQuery("SELECT b.*,
                                                (SELECT u.uni_logo FROM ".UNIVERSITY." u where u.uni_id=b.uni_id) as `uni_logo`,
                                                (SELECT p.pro_name FROM ".PROVINCE." p where p.pro_id=b.pro_id) as `pro_id`,
                                                (SELECT au.adm_email FROM adm_user au INNER JOIN university u WHERE u.adm_id=au.adm_id and b.uni_id=u.uni_id) as `adm_email`  
                                             FROM {$statement} LIMIT {$startpoint} , {$per_page}");
                                            
                                            if (mysqli_num_rows($results) != 0) {
                                                $n=1;
                                                // displaying records.
                                                while ($row = mysqli_fetch_array($results)) {
                                                    ?>
                                                    <tr class="odd">
                                                        <td><?php echo $n?></td>
                                                        <td><?php echo $row['br_name'];?></td>
                                                        <td><?php echo $row['pro_id'];?></td>
                                                        <td><?php echo $row['adm_email'];?></td>
                                                        <td class="alc"><?php echo ($row['uni_logo']!=""?"<img src='".WEB_DIR."img/university/".$row['uni_logo']."' height='20px'>":"")?></td>
                                                        <td class="alc">
                                                            <a href="#" onclick="update(<?php echo $row['br_id']?>,'br_status',<?php echo ($row['br_status']==1?"0":"1")?>,'UNIVERSITY','responseTable')">
                                                                <i class="fa fa<?php echo ($row['br_status']==1?"-check":"");?>-square-o"></i>
                                                            </a>
                                                        </td>
                                                        <td class="alc">
                                                        <a href="#" onclick="update(<?php echo $row['br_id']?>,'br_isFeature',<?php echo ($row['br_isFeature']==1?"0":"1")?>,'UNIVERSITY','responseTable')">
                                                            <i class="fa fa-fw fa-star<?php echo ($row['br_isFeature']==1?"":"-o");?>"></i>
                                                        </a>
                                                        </td>
                                                        <td class='alc'>
                                                            <a href="#" onclick="update(<?php echo $row['br_id']?>,'br_isHeadOffice',<?php echo ($row['br_isHeadOffice']==1?"0":"1")?>,'UNIVERSITY','responseTable')">
                                                            <i class="fa fa-fw fa-star<?php echo ($row['br_isHeadOffice']==1?"":"-o");?>"></i><?php echo ($row['br_isHeadOffice']==1?"Head office":" Branch");?>
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

<?php require_once 'include/footer.php';?>

        