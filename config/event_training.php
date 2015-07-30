<?php
//include_once("class.php");
class EventTraining extends main{
	function et_id($et_id){return $et_id;}
	function qu_id($qu_id){return $qu_id;}
	function cat_id($cat_id){return $cat_id;}
	function pro_id($pro_id){return $pro_id;}
	function et_title($et_title){return $et_title;}
	function et_publishDate($et_publishDate){return $et_publishDate;}
	function et_des($et_des){return $et_des;}
	function br_id($br_id){return $br_id;}
	function et_address($et_address){return $et_address;}
	function et_startDate($et_startDate){return $et_startDate;}

	function et_endDate($et_endDate){return $et_endDate;}
	function et_status($et_status){return $et_status;}
	function et_tag($et_tag){return $et_tag;}
	function et_isDelete($et_isDelete){return $et_isDelete;}
	function et_deleteDate($et_deleteDate){return $et_deleteDate;}

	function event_training_process($opt,$id=""){
		if($opt=="insert"){
			$et_id="";
			$qu_id=$this->qu_id;
			$cat_id=$this->cat_id;
			$pro_id=$this->pro_id;
			$et_title=$this->et_title;
			$et_publishDate=$this->et_publishDate;
			$et_des=$this->et_des;
			$br_id=$this->br_id;

			$et_address=$this->et_address;
			$et_startDate=$this->et_startDate;
			$et_endDate=$this->et_endDate;
			
			$et_status=$this->et_status;
			$et_tag=$this->et_tag;
			$et_isDelete=$this->et_isDelete;
			$et_deleteDate=$this->et_deleteDate;
			
			$table=EVENT_TRAINING;
			$this->returnQuery("insert into $table values('$et_id','$qu_id','$cat_id','$pro_id','$et_title','$et_publishDate','$et_des','$br_id',
			'$et_address','$et_startDate','$et_endDate','$et_status','$et_tag','$et_isDelete','$et_deleteDate')");
		}
	}
}
$obj_event_training=new EventTraining();

?>