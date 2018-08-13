<?php
class Online extends CI_Controller{
	public function assets(){
		$data['bootstrap']=$this->config->item("bootstrap");
		$data['base_url']=$this->config->item("base_url");
		$data['image']=$this->config->item("image");
		$data['jquery']=$this->config->item("jquery");
		$data['bootstrap_js']=$this->config->item("bootstrap_js");
		$data['css']=$this->config->item("css");
		$data['scripts']=$this->config->item("scripts");
		return $data;
	}
	public function index(){
		$data['assets']=$this->assets();
		$data['msg']="";
		$this->load->view('index.php',$data);
	}
	public function login_student(){
		$this->load->model("operations");
		$studentNo=$this->input->post("studentNo");
		$password=$this->input->post("password");

		$val_student=$this->operations->login_student($studentNo,$password);
			if($val_student){
				foreach($val_student as $r){
					$this->student($r->student_No,$r->stud_uname);
				}
			}else{
$data['msg']="<div class='row alert alert-danger'>Incorrect Student Number Or Password. please try again</div>";
$data['assets']=$this->assets();
$this->load->view("index.php",$data);
			}


	}
	public function login(){
		$this->load->model("operations");
		$email=$this->input->post("email");
		$password=$this->input->post("password");
			//validate lecturer nd admin
		$val_admin=$this->operations->login_admin($email,$password);
			//returned admin id from DB
		if($val_admin){
			foreach($val_admin as $r){
				$this->admin($r->admin_id,$r->admin_uname);
			}
		}else{
				$val_lec=$this->operations->login_lecturer($email,$password);
				if($val_lec){
					foreach($val_lec as $r){
						$this->lecturer($r->lec_ID,$r->lec_uname);
					}
				}else{
		$data['msg']="<div class='row alert alert-danger'>Incorrect Email Or Password. please try again</div>";
		$data['assets']=$this->assets();
		$this->load->view("index.php",$data);
				}

		}//end if



	}//end login
	public function admin($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$this->load->view("admin.php",$data);
	}//end admin
	public function lecturer($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
	}//end lecturer
	public function student($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['cw']=$this->operations->cw($id);
		$data['ass']=$this->operations->ass($id);
		$data['hand']=$this->operations->hand($id);
		$data['res_cw_s']=$this->operations->res_cw_s($id);
		$data['res_ass_a']=$this->operations->res_ass_s($id);
		$this->load->view("student",$data);
	}//end student
	public function stud_submit($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['cw']=$this->operations->cw($id);
		$data['ass']=$this->operations->ass($id);
		$this->load->view("student-submit",$data);
	}
	public function view_all($id,$name){
		$this->load->model("operations");
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->all_studs();
		$data['lecs']=$this->operations->all_lecs();
		$data['assets']=$this->assets();
		$this->load->view("admin-view-all",$data);
	}
	public function registerLecturer($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['depts']=$this->operations->depts();
		$this->load->view("reg-Lec",$data);
	}//end registerStudent
	public function registerStudent($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['courses']=$this->operations->courses();
		$this->load->view("reg-Stud",$data);
	}//end registerLecturer
	public function registerAdmin($id,$name){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$this->load->view("reg-Admin",$data);
	}//end registerAdmin
	public function regAdmin($id,$name){
		$this->load->model("operations");
			$package=array($this->input->post('username'),$this->input->post('email'),$this->input->post('password'));
			$boolean=$this->operations->regAdmin($package);
			if($boolean){
			$data['assets']=$this->assets();
			$data['id']=$id;
			$data['uname']=$name;
			$data['msg']="<div class='row alert alert-success'><center><i>Registered Successfully</i></center></div>";
			$this->load->view("reg-Admin",$data);
			}else{
			$data['assets']=$this->assets();
			$data['id']=$id;
			$data['uname']=$name;
			$data['msg']="<div class='row alert alert-danger'><center><i>An Error Occured. Administrator Not Added</i></center></div>";
			$this->load->view("reg-Admin",$data);
			}
	}//end regAdmin
	public function regLec($id,$name){
		$this->load->model('operations');
		$photoname=trim($_FILES['photo']['name']);
		$photodata=$_FILES['photo']['tmp_name'];
		$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/img/Lecturers/';
		$url="http://localhost/FinalYearProject/assets/img/Lecturers/".$photoname;
		move_uploaded_file($photodata,$storage.$photoname);
		$package=array($this->input->post("names"),$this->input->post("username"),$this->input->post("email"),$this->input->post("password"),$this->input->post("bio"),$this->input->post("department"),$id,$url);
		$boolean=$this->operations->registerLecturer($package);
		if($boolean){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['depts']=$this->operations->depts();
		$data['msg']="<div class='row alert alert-success'><center><i>Registered Successfully</i></center></div>";
		$this->load->view("reg-Lec",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['depts']=$this->operations->depts();
		$data['msg']="<div class='row alert alert-danger'><center><i>Registered Failed</i></center></div>";
		$this->load->view("reg-Lec",$data);
		}
	}//end regLec
	public function regStud($id,$name){
		$this->load->model('operations');
		$photoname=trim($_FILES['photo']['name']);
		$photodata=$_FILES['photo']['tmp_name'];
		$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/img/Students/';
		$url="http://localhost/FinalYearProject/assets/img/Students/".$photoname;
		move_uploaded_file($photodata,$storage.$photoname);
		$package=array($this->input->post("names"),$this->input->post("username"),$this->input->post("email"),$this->input->post("password"),$this->input->post("stdno"),$this->input->post("course"),$id,$url);
		$boolean=$this->operations->registerStudent($package);
		if($boolean){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['courses']=$this->operations->courses();
		$data['msg']="<div class='row alert alert-success'><center><i>Registered Successfully</i></center></div>";
		$this->load->view("reg-Stud",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['courses']=$this->operations->courses();
		$data['msg']="<div class='row alert alert-danger'><center><i>Registered Failed</i></center></div>";
		$this->load->view("reg-Stud",$data);
		}
	}//end regStud
	public function registerCourse($id,$name){
		$this->load->model("operations");
		$package=array($this->input->post('course_name'),$this->input->post('code'),$this->input->post('years'),$this->input->post('department'));
		$boolean=$this->operations->regCourse($package);
		if($boolean){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-success'><center><i>Course Added Successfully</i></center></div>";
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error Not Occured, Course Not Added.</i></center></div>";
		$this->load->view("admin",$data);
		}
	}//end registerCourse
	public function registerDepartment($id,$name){
		$this->load->model("operations");
		$package=array($this->input->post("dept_name"),$this->input->post("fac"));
		$boolean=$this->operations->regDepartment($package);
		if($boolean){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-success'><center><i>Department Added Successfully</i></center></div>";
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error Not Occured, Department Not Added.</i></center></div>";
		$this->load->view("admin",$data);
		}
	}//end registerDepartment
	public function registerFaculty($id,$name){
		$this->load->model("operations");
		$package=array($this->input->post("fac_name"));
		$boolean=$this->operations->regFaculty($package);
		if($boolean){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['msg']="<div class='row alert alert-success'><center><i>Faculty Added Successfully</i></center></div>";
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error Not Occured, Faculty Not Added.</i></center></div>";
		$this->load->view("admin",$data);
		}
	}//end registerFaculty
	public function addCourseunit($id,$name){
		$this->load->model("operations");
$package=array($this->input->post("title"),$this->input->post("course"),$this->input->post("lecturer"),$this->input->post("unit_code"),$this->input->post("unit_year"),$this->input->post("semester"));
$this->load->model("operations");
$add=$this->operations->addCourseunit($package);
if($add){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['msg']="<div class='row alert alert-success'><center><i>Courseunit Added Successfully</i></center></div>";
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['courses']=$this->operations->courses();
		$data['lecturers']=$this->operations->lecturers();
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error Not Occured, Courseunit Not Added.</i></center></div>";
		$this->load->view("admin",$data);
		}
	}//end addCourseunit
	public function regCoursework($id,$name){
	$this->load->model("operations");

$filename=trim(addslashes($_FILES['doc']['name']));
$_file=str_replace(' ','_',$filename);

$file=$_FILES['doc']['tmp_name'];

$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/coursework/';
move_uploaded_file($file,$storage.$_file);
$path="http://localhost/FinalYearProject/assets/documents/coursework/".$_file;
$package=array($this->input->post("title"),$this->input->post("unit"),$path,$this->input->post("deadline"),$this->input->post("lec_ID"));
$bool=$this->operations->regCoursework($package);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Coursework Published successfully</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Coursework Not published</i></center></div>";
		$this->load->view("lecturer",$data);
		}
	}//end regCoursework
	public function regAssignment($id,$name){
$this->load->model("operations");

$filename=trim(addslashes($_FILES['doc']['name']));
$_file=str_replace(' ','_',$filename);
$file=$_FILES['doc']['tmp_name'];

$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/assignments/';
move_uploaded_file($file,$storage.$_file);
$path="http://localhost/FinalYearProject/assets/documents/assignments/".$_file;

$package=array($this->input->post('title'),
	$this->input->post('unit'),
	$this->input->post('deadline'),
	$path,
	$id);

$bool=$this->operations->regAssignment($package);
if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Assignment Published successfully</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Assignment Not published</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
	}
}
public function regHandout($id,$name){
$this->load->model("operations");

$filename=trim(addslashes($_FILES['doc']['name']));
$_file=str_replace(' ','_',$filename);
$file=$_FILES['doc']['tmp_name'];

$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/handouts/';
move_uploaded_file($file,$storage.$_file);
$path="http://localhost/FinalYearProject/assets/documents/handouts/".$_file;

$package=array(
$this->input->post('title'),
$this->input->post('unit'),$path,$id);

$bool=$this->operations->regHandout($package);
if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Handout Published successfully</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Handout Not published</i></center></div>";
		$this->load->view("lecturer",$data);
	}
}
	public function deletecw($id,$name,$work_ID){
		$this->load->model("operations");
		$bool=$this->operations->deletecw($id,$work_ID);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Coursework Deleted</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Coursework Not deleted</i></center></div>";
		$this->load->view("lecturer",$data);
		}

	}//end editcw
	public function deleteass($id,$name,$ass_ID){
				$this->load->model("operations");
		$bool=$this->operations->deleteass($id,$ass_ID);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Assignment Deleted</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Assignment Not deleted</i></center></div>";
		$this->load->view("lecturer",$data);
		}
	}//end deleteass
	public function deletehand($id,$name,$hand_ID){
		$this->load->model("operations");
		$bool=$this->operations->deletehand($id,$hand_ID);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Handout Deleted</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Handout Not deleted</i></center></div>";
		$this->load->view("lecturer",$data);
		}
	}//end deletehand
	public function edit_cw($id,$name,$work_ID){
$this->load->model("operations");
$filename=trim(addslashes($_FILES['edit_doc']['name']));
$_file=str_replace(' ','_',$filename);
$file=$_FILES['edit_doc']['tmp_name'];

$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/coursework/';
move_uploaded_file($file,$storage.$_file);
$path="http://localhost/FinalYearProject/assets/documents/coursework/".$_file;

		$package=array(
$this->input->post("edit_title"),
$this->input->post("edit_unit"),
$this->input->post("edit_deadline"),
$path,
$id
		);
		$bool=$this->operations->edit_cw($package,$work_ID);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Coursework Edited successfully</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Coursework Not Edited</i></center></div>";
		$this->load->view("lecturer",$data);
		}
	}
	public function edit_ass($id,$name,$ass_ID){
$this->load->model("operations");
$filename=trim(addslashes($_FILES['edit_doc']['name']));
$_file=str_replace(' ','_',$filename);
$file=$_FILES['edit_doc']['tmp_name'];

$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/assignments/';
move_uploaded_file($file,$storage.$_file);
$path="http://localhost/FinalYearProject/assets/documents/assignments/".$_file;

		$package=array(
$this->input->post("edit_title"),
$this->input->post("edit_unit"),
$this->input->post("edit_deadline"),
$path,
$id
		);
		$bool=$this->operations->edit_ass($package,$ass_ID);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Assignment Edited successfully</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Assignment Not Edited</i></center></div>";
		$this->load->view("lecturer",$data);
		}
	}
		public function edit_hand($id,$name,$hand_ID){
$this->load->model("operations");
$filename=trim(addslashes($_FILES['edit_doc']['name']));
$_file=str_replace(' ','_',$filename);
$file=$_FILES['edit_doc']['tmp_name'];

$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/handouts/';
move_uploaded_file($file,$storage.$_file);
$path="http://localhost/FinalYearProject/assets/documents/handouts/".$_file;
		$package=array(
$this->input->post("edit_title"),$path,$id,$this->input->post("edit_unit")
		);
		$bool=$this->operations->edit_hand($package,$hand_ID);
		if($bool){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['msg']="<div class='row alert alert-success'><center><i>Handout Edited successfully</i></center></div>";
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$this->load->view("lecturer",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$data['coursework']=$this->operations->coursework($id);
		$data['assignments']=$this->operations->assignments($id);
		$data['handouts']=$this->operations->handouts($id);
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error occured. Handout Not Edited</i></center></div>";
		$this->load->view("lecturer",$data);
		}
	}
	public function lec_view_stud($id,$name){
		$this->load->model('operations');
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="";
		$this->load->view("lec_view_stud",$data);
	}
	public function lec_view_submission($id,$name){
		$this->load->model('operations');
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="";
		$data['coursework']=$this->operations->coursework_dets($id);
		$data['assignment']=$this->operations->assignment_dets($id);
		$data['cw_sub']=$this->operations->cw_sub($id);
		$data['disp_studs']=$this->operations->disp_studs($id);
		$data['ass_sub']=$this->operations->ass_sub($id);
		$this->load->view("lec_view_submission",$data);
	}

	public function lec_profile($id,$name){
		$this->load->model('operations');
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="";
		$this->load->view("lec_profile",$data);
	}
	public function edit_lec_pwd($id,$name){
			$this->load->model('operations');
		if($this->input->post("password")!=$this->input->post("cpassword")){

		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-danger'><center>Password Mismatch. please try again</center></div>";
		$this->load->view("lec_profile",$data);
		}else{
			$pwd=$this->input->post("cpassword");
$bool=$this->operations->update_pwd($pwd,$id);
if(true){
			$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-success'><center>Password changed successfully</center></div>";
		$this->load->view("lec_profile",$data);
	}else{
				$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-danger'><center>An error occured. password not changed</center></div>";
		$this->load->view("lec_profile",$data);
		}
	}
}
public function edit_stud_pwd($id,$name){
	$this->load->model('operations');
if($this->input->post("password")!=$this->input->post("cpassword")){
$data['assets']=$this->assets();
$data['id']=$id;
$data['uname']=$name;
$data['studs']=$this->operations->studs($id);
$data['profile_student']=$this->operations->profile_student($id);
$data['msg']="<div class='row alert alert-danger'><center>Password Mismatch. please try again</center></div>";
$this->load->view("stud-profile",$data);
}else{
	$pwd=$this->input->post("cpassword");
$bool=$this->operations->update_pwd_stud($pwd,$id);
if($bool){
	$data['assets']=$this->assets();
$data['id']=$id;
$data['uname']=$name;
$data['studs']=$this->operations->studs($id);
$data['profile_student']=$this->operations->profile_student($id);
$data['msg']="<div class='row alert alert-success'><center>Password changed successfully</center></div>";
$this->load->view("stud-profile",$data);
}else{
		$data['assets']=$this->assets();
$data['id']=$id;
$data['uname']=$name;
$data['studs']=$this->operations->studs($id);
$data['profile_student']=$this->operations->profile_student($id);
$data['msg']="<div class='row alert alert-danger'><center>An error occured. password not changed</center></div>";
$this->load->view("stud-profile",$data);
}
}
}
	public function post_score($id,$name){
		$this->load->model("operations");
		$package=array(
$this->input->post("mark_cw"),
$this->input->post("student_No"),
$this->input->post("work_ID"),$id
		);
		$bool=$this->operations->post_score($package);
		if($bool){
			$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-success'><center>Coursework Score(Marks) posted successfully</center></div>";
		$data['coursework']=$this->operations->coursework_dets($id);
		$data['assignment']=$this->operations->assignment_dets($id);
		$data['cw_sub']=$this->operations->cw_sub($id);
		$data['disp_studs']=$this->operations->disp_studs($id);
		$data['ass_sub']=$this->operations->ass_sub($id);
		$this->load->view("lec_view_submission",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-danger'><center>Coursework Score(Marks) Not posted</center></div>";
		$data['coursework']=$this->operations->coursework_dets($id);
		$data['assignment']=$this->operations->assignment_dets($id);
		$data['cw_sub']=$this->operations->cw_sub($id);
		$data['disp_studs']=$this->operations->disp_studs($id);
		$data['ass_sub']=$this->operations->ass_sub($id);
		$this->load->view("lec_view_submission",$data);
		}
	}
	public function post_score_ass($id,$name){
	$this->load->model("operations");
		$package=array(
$this->input->post("mark_ass"),
$this->input->post("student_No"),
$this->input->post("ass_ID"),$id
		);
		$bool=$this->operations->post_score_ass($package);
		if($bool){
			$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-success'><center>Assignment Score(Marks) posted successfully</center></div>";
		$data['coursework']=$this->operations->coursework_dets($id);
		$data['assignment']=$this->operations->assignment_dets($id);
		$data['cw_sub']=$this->operations->cw_sub($id);
		$data['disp_studs']=$this->operations->disp_studs($id);
		$data['ass_sub']=$this->operations->ass_sub($id);
		$this->load->view("lec_view_submission",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['studs']=$this->operations->studs($id);
		$data['profile']=$this->operations->profile($id);
		$data['msg']="<div class='row alert alert-danger'><center>Assignments Score(Marks) Not posted</center></div>";
		$data['coursework']=$this->operations->coursework_dets($id);
		$data['assignment']=$this->operations->assignment_dets($id);
		$data['cw_sub']=$this->operations->cw_sub($id);
		$data['disp_studs']=$this->operations->disp_studs($id);
		$data['ass_sub']=$this->operations->ass_sub($id);
		$this->load->view("lec_view_submission",$data);
		}
	}
	public function cw_submit_s($id,$uname){
		$this->load->model("operations");
			$pname=trim(addslashes($_FILES['doc']['name']));
			$p_name=str_replace(' ','_',$pname);
			$data=$_FILES['doc']['tmp_name'];
			$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/submission_coursework/';
			$url="http://localhost/FinalYearProject/assets/documents/submission_coursework/".$p_name;
			move_uploaded_file($data,$storage.$p_name);
			$package=array($this->input->post("work_ID"),$this->input->post("lec_ID"),$url,$id,$this->input->post('unit_ID'));
			$check=$this->operations->cw_submit_s($package);
			if($check){
				$view['assets']=$this->assets();
				$view['id']=$id;
				$view['uname']=$uname;
				$view['cw']=$this->operations->cw($id);
				$view['ass']=$this->operations->ass($id);
				$view['msg']="<div class='row alert alert-success'><center><span> Coursework Uploaded successfully</span></center></div>";
				$this->load->view("student-submit",$view);
			}
			else{
				$view['assets']=$this->assets();
				$view['id']=$id;
				$view['uname']=$uname;
				$view['msg']="<div class='row alert alert-danger'><span > Coursework Not Uploaded</span></div>";
				$view['cw']=$this->operations->cw($id);
				$view['ass']=$this->operations->ass($id);
				$this->load->view("student-submit",$view);
			}

	}
	public function ass_submit_s($id,$uname){
		$this->load->model("operations");
			$pname=trim(addslashes($_FILES['doc']['name']));
			$p_name = str_replace(' ', '_',$pname);
			$data=$_FILES['doc']['tmp_name'];
			$storage=$_SERVER['DOCUMENT_ROOT'].'/FinalYearProject/assets/documents/submission_assignment/';
			$url="http://localhost/FinalYearProject/assets/documents/submission_assignment/".$p_name;
			move_uploaded_file($data,$storage.$p_name);
			$package=array($this->input->post("assignment_ID"),$this->input->post("lec_ID_ass"),$url,$id,$this->input->post("unit_ID"));
			$check=$this->operations->ass_submit_s($package);
			if($check){
				$view['assets']=$this->assets();
				$view['id']=$id;
				$view['uname']=$uname;
				$view['cw']=$this->operations->cw($id);
				$view['ass']=$this->operations->ass($id);
				$view['msg']="<div class='row alert alert-success'><center><span > Assignment Uploaded successfully</span></center></div>";
				$this->load->view("student-submit",$view);
			}
			else{
				$view['assets']=$this->assets();
				$view['id']=$id;
				$view['uname']=$uname;
				$view['msg']="<div class='row alert alert-success'><span > Coursework Uploaded successfully</span></div>";
				$view['cw']=$this->operations->cw($id);
				$view['ass']=$this->operations->ass($id);
				$this->load->view("student-submit",$view);
			}

	}
	public function stud_profile($id,$name){
		$this->load->model("operations");
		$data['id']=$id;
		$data['uname']=$name;
		$data['assets']=$this->assets();
		$data['profile_student']=$this->operations->profile_student($id);
		$this->load->view("stud-profile",$data);
	}
	public function logout(){
		$this->index();
	}
}
?>
