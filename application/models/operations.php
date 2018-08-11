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
		//$data['lec_ID']="";
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
		//$data['course_ID']="";
		$data['course_title']=$array[0];
		$data['course_code']=$array[1];
		$data['course_yrs']=$array[2];
		$data['dept_ID']=$array[3];
		return ($this->db->insert("courses",$data))? true:false;
	}//end regCourse
	public function regDepartment($array){
		$this->load->database();
		//$data['dept_ID']="";
		$data['fac_ID']=$array[1];
		$data['dept_name']=$array[0];
		return ($this->db->insert("departments",$data))? true:false;
	}//end regDepartment
	public function regFaculty($array){
		$this->load->database();
		//$data['fac_ID']="";
		$data['fac_name']=$array[0];
		return ($this->db->insert("faculty",$data))? true:false;
	}//end regFaculty
	public function regAdmin($array){
		$this->load->database();
		//$data['admin_id']="";
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
	public function lecturers(){
		$this->load->database();
		$query=$this->db->select("*")->from("lecturers")->get()->result();
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
	public function coursework($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM coursework WHERE lec_ID='$id' ORDER BY work_ID DESC")->result();
		return $query;
	}//end coursework
		public function assignments($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM assignment WHERE lec_ID='$id' ORDER BY assignment_ID DESC")->result();
		return $query;
	}//end coursework
		public function handouts($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM handouts WHERE lec_ID='$id' ORDER BY handout_ID DESC ")->result();
		return $query;
	}//end coursework
	public function addCourseunit($array){
		$this->load->database();
		//$data['unit_ID']="";
		$data['unit_title']=$array[0];
		$data['course_ID']=$array[1];
		$data['lec_ID']=$array[2];
		$data['unit_code']=$array[3];
		$data['unit_year']=$array[4];
		$data['unit_semester']=$array[5];
		return ($this->db->insert("courseunit",$data))? true:false;
	}//adcourseunit
	public function regCoursework($array){
		$this->load->database();
		// $data['work_ID']="";
		$data['work_title']=$array[0];
		$data['lec_ID']=$array[4];
		$data['unit_ID']=$array[1];
		$data['work_document']=$array[2];
		$data['work_deadline']=$array[3];
		return ($this->db->insert("coursework",$data))? true:false;
	}
	public function regAssignment($array){
		$this->load->database();

		$data['unit_ID']=$array[1];
		$data['lec_ID']=$array[4];
		$data['assignment_document']=$array[3];
		$data['assignment_deadline']=$array[2];
		$data['assignment_title']=$array[0];
		return ($this->db->insert("assignment",$data))? true:false;
	}//end regAssignment
	public function regHandout($array){
		$this->load->database();
		//$data['handout_ID']="";
		$data['handout_title']=$array[0];
		$data['handout_date']=date("Y-m-d H:i:s");
		$data['handout_doc']=$array[2];
		$data['lec_ID']=$array[3];
		$data['unit_ID']=$array[1];
		return ($this->db->insert("handouts",$data))? true:false;
	}//end regHandout
	public function deletecw($id,$work_ID){
		$this->load->database();
	$query=$this->db->query("DELETE  FROM coursework WHERE lec_ID='$id' AND work_ID='$work_ID' ");
		return ($this->db->affected_rows() > 0)? true:false;
	}//end deletecw
	public function deleteass($id,$ass_ID){
		$this->load->database();
	$query=$this->db->query("DELETE  FROM assignment WHERE lec_ID='$id' AND assignment_ID='$ass_ID' ");
		return ($this->db->affected_rows() > 0)? true:false;
	}//end deletecw
	public function deletehand($id,$hand_ID){
		$this->load->database();
	$query=$this->db->query("DELETE  FROM handouts WHERE lec_ID='$id' AND handout_ID='$hand_ID' ");
		return ($this->db->affected_rows() > 0)? true:false;
	}//end deletecw
	public function edit_cw($array,$work_ID){
		$this->load->database();
		$query=$this->db->query("UPDATE coursework SET
		work_title='$array[0]',
		lec_ID='$array[4]',
		unit_ID='$array[1]',
		work_document='$array[3]',
		work_deadline='$array[2]'
		WHERE work_ID='$work_ID'
			");
		return ($this->db->affected_rows() == 1)? true:false;
	}
	public function edit_ass($array,$ass_ID){
		$this->load->database();
		$query=$this->db->query("UPDATE assignment SET
		unit_ID='$array[1]',
		lec_ID='$array[4]',
		assignment_document='$array[3]',
		assignment_deadline='$array[2]',
		assignment_title='$array[0]'
		WHERE assignment_ID='$ass_ID'
			");
		return ($this->db->affected_rows() == 1)? true:false;
	}
	public function edit_hand($array,$hand_ID){
		$this->load->database();
		$dt=date('Y-m-d H:i:s');
		$query=$this->db->query("UPDATE handouts SET
		handout_title='$array[0]',
		handout_date='$dt',
		handout_doc='$array[1]',
		lec_ID='$array[2]',
		unit_ID='$array[3]'
		WHERE handout_ID='$hand_ID'
			");
		return ($this->db->affected_rows() == 1)? true:false;
	}
	public function studs($id){
		$this->load->database();
$query=$this->db->query("
SELECT * FROM students INNER JOIN courses ON students.course_ID=courses.course_ID
INNER JOIN departments ON courses.dept_ID=departments.dept_ID
INNER JOIN lecturers ON lecturers.dept_ID=departments.dept_ID
WHERE lecturers.lec_ID='$id'
	")->result();
	return $query;
	}
	public function coursework_dets($id){
		$this->load->database();
		$query=$this->db->select("*")->from("coursework")->where("lec_ID",$id)->get()->result();
		return $query;
	}
	public function assignment_dets($id){
				$this->load->database();
		$query=$this->db->select("*")->from("assignment")->where("lec_ID",$id)->get()->result();
		return $query;
	}
	public function update_pwd($pwd,$id){
		$this->load->database();
		$query=$this->db->query("UPDATE lecturers SET lec_password='$pwd' WHERE lec_ID='$id' ");
		return ($this->db->affected_rows()==1)? true:false;
	}
	public function cw_sub($id){
		$this->load->database();
		$query=$this->db->query("
			SELECT * FROM submission_coursework INNER JOIN students ON submission_coursework.student_No=students.student_No
			INNER JOIN lecturers ON lecturers.lec_ID=submission_coursework.lec_ID
			INNER JOIN coursework ON coursework.work_ID=submission_coursework.work_ID
			INNER JOIN courseunit ON courseunit.unit_ID=submission_coursework.unit_ID
			WHERE lecturers.lec_ID='$id' ");

		return $query->result();
	}
	public function disp_studs($id){
		$this->load->database();
		//$query=$this->db->query("SELECT * FROM results_coursework INNER JOIN submission_coursework ON results_coursework.student_No=submission_coursework.student_No WHERE results_coursework.lec_ID='$id' ")->result();
$query=$this->db->query("SELECT * FROM results_coursework  ")->result();
		return $query;
	}
	public function ass_sub($id){
		$this->load->database();
		$query=$this->db->query("
			SELECT * FROM submission_assignment INNER JOIN students ON submission_assignment.student_No=students.student_No
			INNER JOIN lecturers ON lecturers.lec_ID=submission_assignment.lec_ID
			INNER JOIN assignment ON assignment.assignment_ID=submission_assignment.assignment_ID
			INNER JOIN courseunit ON courseunit.unit_ID=submission_assignment.unit_ID
			WHERE lecturers.lec_ID='$id' ");

		return $query->result();
	}
	public function post_score($array){
		$this->load->database();
		$data['work_ID']=$array[2];
		$data['rescw_mark']=$array[0];
		$data['lec_ID']=$array[3];
		$data['student_No']=$array[1];
	return ($this->db->insert("results_coursework",$data))? true:false;
	}
	public function post_score_ass($array){
		$this->load->database();
		$data['assignment_ID']=$array[2];
		$data['lec_ID']=$array[3];
		$data['student_No']=$array[1];
		$data['resa_mark']=$array[0];
	return ($this->db->insert("results_assignments",$data))? true:false;
	}
	public function cw($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM students INNER JOIN courses ON courses.course_ID=students.course_ID INNER JOIN courseunit on courseunit.course_ID=courses.course_ID INNER JOIN coursework ON coursework.unit_ID=courseunit.unit_ID WHERE students.student_No='$id'  ")->result();
		return $query;
	}
	public function ass($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM students INNER JOIN courses ON courses.course_ID=students.course_ID INNER JOIN courseunit on courseunit.course_ID=courses.course_ID INNER JOIN assignment ON assignment.unit_ID=courseunit.unit_ID WHERE students.student_No='$id'  ")->result();
		return $query;
	}
	public function hand($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM students INNER JOIN courses ON courses.course_ID=students.course_ID INNER JOIN courseunit on courseunit.course_ID=courses.course_ID INNER JOIN handouts ON handouts.unit_ID=courseunit.unit_ID WHERE students.student_No='$id'  ")->result();
		return $query;
	}
	public function res_cw_s($id){
		$this->load->database();
		$query=$this->db->query("SELECT * FROM results_coursework INNER JOIN coursework ON results_coursework.work_ID=coursework.work_ID WHERE results_coursework.student_No='$id' ")->result();
		return $query;
	}
	public function res_ass_s($id){
			$query=$this->db->query("SELECT * FROM results_assignments INNER JOIN assignment ON results_assignments.assignment_ID=assignment.assignment_ID WHERE results_assignments.student_No='$id' ")->result();
		return $query;
	}
		public function cw_submit_s($array){
		$this->load->database();
		$data['work_ID']=$array[0];
		$data['subcw_doc']=$array[2];
		$data['lec_ID']=$array[1];
		$data['unit_ID']=$array[4];
		$data['student_No']=$array[3];
		return ($this->db->insert("submission_coursework",$data))? true:false;
	}
	public function ass_submit_s($array){
		$this->load->database();
		$data['assignment_ID']=$array[0];
		$data['subass_doc']=trim($array[2]);
		$data['lec_ID']=$array[1];
		$data['student_No']=$array[3];
		$data['unit_ID']=$array[4];
		return ($this->db->insert("submission_assignment",$data))? true:false;
	}
	public function profile_student($id){
		$this->load->database();
$query=$this->db->query("SELECT * FROM students INNER JOIN courses ON courses.course_ID=students.course_ID INNER JOIN departments ON departments.dept_ID=courses.dept_ID WHERE students.student_No='$id' ")->result();
		return $query;
	}
	public function update_pwd_stud($pwd,$id){
		$this->load->database();
		$query=$this->db->query("UPDATE students SET stud_password='$pwd' WHERE student_No='$id' ");
		return ($this->db->affected_rows() == 1)? true:false;
	}
}
?>
