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
	public function login(){
		$this->load->model("operations");

		$studentNo="";
		$email="";
		$password="";
	if( !empty($email=$this->input->post("email")) && !empty($password=$this->input->post("password")) ){
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
		$data['msg']="Incorrect Email and Password";
		$data['assets']=$this->assets();
		$this->load->view("index.php",$data);			
				}	

		}//end if

	}else if( !empty($studentNo=$this->input->post("studentNo")) && !empty($password=$this->input->post("password")) || !empty($email=$this->input->post("email")) ){
			//validate student
		$val_student=$this->operations->login_student($studentNo,$password);
			if($val_student){
				foreach($val_student as $r){
					$this->student($r->student_No,$r->stud_uname);
				}	
			}else{
$data['msg']="Incorrect Student Number Or Password";
$data['assets']=$this->assets();
$this->load->view("index.php",$data);			
			}
		}

	}//end login
	public function admin($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$this->load->view("admin",$data);
	}//end admin
	public function lecturer($id,$name){
		$this->load->model("operations");
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['profile']=$this->operations->profile($id);
		$data['units']=$this->operations->units();
		$this->load->view("lecturer",$data);
	}//end lecturer
	public function student($id,$name){
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$this->load->view("student",$data);
	}//end student
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
		$photoname=$_FILES['photo']['name'];
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
		$photoname=$_FILES['photo']['name'];
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
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
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
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-success'><center><i>Department Added Successfully</i></center></div>";
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
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
		$data['msg']="<div class='row alert alert-success'><center><i>Faculty Added Successfully</i></center></div>";
		$this->load->view("admin",$data);
		}else{
		$data['assets']=$this->assets();
		$data['id']=$id;
		$data['uname']=$name;
		$data['counters']=$this->operations->counters();
		$data['depts']=$this->operations->depts();
		$data['fac']=$this->operations->fac();
		$data['msg']="<div class='row alert alert-danger'><center><i>An Error Not Occured, Faculty Not Added.</i></center></div>";
		$this->load->view("admin",$data);	
		}
	}//end registerFaculty
	public function logout(){
		$this->index();
	}
}
?>