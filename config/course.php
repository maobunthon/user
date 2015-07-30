<?php
class Course extends main{
	function co_id($co_id){return $co_id;}
	function co_name($co_name){return $co_name;}

	function course_process($opt,$id=""){
		if($opt=="insert"){
			$co_name = $this->co_name;
			$table=COURSE;
			return $this->returnQueryWithId("insert into $table values('','$co_name')");
		}
	}
}
$obj_course = new Course();
?>