<?php
//include_once("class.php");
class CourseDetail extends main{
	function co_id($co_id){return $co_id;}
	function co_name($co_name){return $co_name;}
	function cat_id($cat_id){return $cat_id;}
	function br_id($br_id){return $br_id;}
	// function qu_id($qu_id){return $qu_id;}
	function co_des($co_des){return $co_des;}
	function fee($fee){return $fee;}
	function co_requirement($co_requirement){return $co_requirement;}
	function co_duration($co_duration){return $co_duration;}
	function co_startDate($co_startDate){return $co_startDate;}
	function co_status($co_status){return $co_status;}
	function co_endDate($co_endDate){return $co_endDate;}
	function co_closeDate($co_closeDate){return $co_closeDate;}
	function co_tag($co_tag){return $co_tag;}
	
	function course_detail_process($opt,$id=""){
		if($opt=="insert"){
			$co_id="";
			$co_name=$this->co_name;
			$cat_id=$this->cat_id;
			$br_id=$this->br_id;
			// $qu_id=$this->qu_id;

			$co_des=$this->co_des;
			$fee=$this->fee;
			$co_requirement=$this->co_requirement;
			$co_duration=$this->co_duration;
			$co_startDate=$this->co_startDate;

			$co_status=$this->co_status;

			$co_endDate=$this->co_endDate;
			$co_closeDate=$this->co_closeDate;
			$co_tag=$this->co_tag;

			$table=COURSE_DETAIL;
			$this->returnQuery("insert into $table values('$co_id','$co_name','$cat_id','$br_id',
				'$co_des','fee','co_requirement','co_duration','$co_startDate',
				'$co_status','$co_endDate','$co_closeDate','$co_tag')");
		}
		elseif($opt=="update"){
			$co_id="";
			$co_name=$this->co_name;
			$cat_id=$this->cat_id;
			$br_id=$this->br_id;
			// $qu_id=$this->qu_id;

			$co_des=$this->co_des;
			$fee=$this->fee;
			$co_requirement=$this->co_requirement;
			$co_duration=$this->co_duration;
			$co_startDate=$this->co_startDate;

			$co_status=$this->co_status;

			$co_endDate=$this->co_endDate;
			$co_closeDate=$this->co_closeDate;
			$co_tag=$this->co_tag;

			$table=COURSE_DETAIL;
			$this->returnQuery("update $table set co_name='$co_name',cat_id='$cat_id',br_id='$br_id',
			co_des='$co_des',fee='fee',co_requirement='co_requirement',co_duration='co_duration',
				co_startDate='$co_startDate', co_status='$co_status',co_endDate='$co_endDate',co_closeDate='$co_closeDate',co_tag='$co_tag' where co_id=$id");
			
		}
	}
}
$obj_courseDetail = new CourseDetail();

?>