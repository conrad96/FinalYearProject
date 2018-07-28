<?php 
class Operations extends CI_Model{
	public function index(){
		$this->load->database();
	}
	public function login_admin($email,$pwd){
		$this->load->database();
	$query=$this->db->query("
		SELECT admin_id,admin_uname 
		FROM administrator 
		WHERE admin_email='$email' 
		AND admin_password='$pwd' ");
	$row=$query->result();
	return (!empty($row))? $row:false;
	}
	public function login_lecturer($email,$pwd){
		$this->load->database();
	$query=$this->db->query("
		SELECT lec_ID,lec_uname 
		FROM lecturers 
		WHERE lec_email='$email' 
		AND lec_password='$pwd' ");
	$row=$query->result();
	return (!empty($row))? $row:false;		
	}
	public function login_student($studentNo,$pwd){
		$this->load->database();
	$query=$this->db->query("
		SELECT student_No,stud_uname 
		FROM students 
		WHERE student_No='$studentNo' 
		AND stud_password='$pwd' ");
	$row=$query->result();
	return (!empty($row))? $row:false;		
	}
	public function registerLecturer($array){
		$this->load->database();
		$data['lec_ID']="";
		$data['lec_photo']=$array[7];
		$data['lec_names']=$array[0];
		$data['lec_uname']=$array[1];
		$data['lec_email']=$array[2];
		$data['lec_password']=$array[3];
		$data['lec_bio']=$array[4];
		$data['dept_ID']=$array[5];
		$data['admin_ID']=$array[6];
		return ($this->db->insert("lecturers",$data))? true:false;
	}//end registerLecturer
	public function registerStudent($array){
		$this->load->database();
		$data['student_No']=$array[4];
		$data['stud_uname']=$array[1];
		$data['stud_names']=$array[0];
		$data['stud_email']=$array[2];
		$data['stud_password']=$array[3];
		$data['admin_ID']=$array[6];
		$data['course_ID']=$array[5];
		$data['stud_photo']=$array[7];
		return ($this->db->insert("students",$data))? true:false;
	}//end registerLecturer
	public function regCourse($array){
		$this->load->database();
		$data['course_ID']="";
		$data['course_title']=$array[0];
		$data['course_code']=$array[1];
		$data['course_yrs']=$array[2];
		$data['dept_ID']=$array[3];
		return ($this->db->insert("courses",$data))? true:false;
	}//end regCourse
	public function regDepartment($array){
		$this->load->database();
		$data['dept_ID']="";
		$data['fac_ID']=$array[1];
		$data['dept_name']=$array[0];
		return ($this->db->insert("departments",$data))? true:false;
	}//end regDepartment
	public function regFaculty($array){
		$this->load->database();
		$data['fac_ID']="";
		$data['fac_name']=$array[0];
		return ($this->db->insert("faculty",$data))? true:false;
	}//end regFaculty
	public function regAdmin($array){
		$this->load->database();
		$data['admin_id']="";
		$data['admin_uname']=$array[0];
		$data['admin_email']=$array[1];
		$data['admin_password']=$array[2];
		return ($this->db->insert("administrator",$data))? true:false;
	}
	public function counters(){
		$this->load->database();
		$fac=$this->db->query("SELECT * FROM faculty")->num_rows();
		$course=$this->db->query("SELECT * FROM courses")->num_rows();
		$dept=$this->db->query("SELECT * FROM departments")->num_rows();
		$lecturers=$this->db->query("SELECT * FROM lecturers")->num_rows();
		$students=$this->db->query("SELECT * FROM students")->num_rows();
		$administrator=$this->db->query("SELECT * FROM administrator")->num_rows();
		$units=$this->db->query("SELECT * FROM courseunit")->num_rows();
		$works=$this->db->query("SELECT * FROM coursework")->num_rows();
		$ass=$this->db->query("SELECT * FROM assignment")->num_rows();
		return array($fac,$course,$dept,$lecturers,$students,$administrator,$units,$works,$ass);
	}
	public function courses(){
		$this->load->database();
		$query=$this->db->select("*")->from("courses")->get()->result();
		return $query;
	}//end courses
	public function depts(){
		$this->load->database();
		$query=$this->db->select("*")->from("departments")->get()->result();
		return $query;
	}//end departments
	public function fac(){
		$this->load->database();
		$query=$this->db->select("*")->from("faculty")->get()->result();
		return $query;
	}//end fac
	public function profile($id){
		$this->load->database();
		//$query=$this->db->select("*")->from("lecturers")->where("lec_ID",$id)->result();
		$query=$this->db->query("SELECT * FROM lecturers WHERE lec_ID=$id ");
		return $query->result();
	}//end profile
	public function units(){
		$this->load->database();
		$query=$this->db->select("*")->from("courseunit")->get()->result();
		return $query;
	}//end units

}
?>