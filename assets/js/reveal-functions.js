 function facultyFunc(){
		document.getElementById("faculty").style.display="block";
		document.getElementById("dept").style.display="none";
		document.getElementById("course").style.display="none";	
		document.getElementById("unit").style.display="none";
	}
	function deptFunc(){
		document.getElementById("faculty").style.display="none";
		document.getElementById("dept").style.display="block";
		document.getElementById("course").style.display="none";	
		document.getElementById("unit").style.display="none";	
	}
	function courseFunc(){
		document.getElementById("faculty").style.display="none";
		document.getElementById("dept").style.display="none";
		document.getElementById("course").style.display="block";	
		document.getElementById("unit").style.display="none";
	}
	function courseunitFunc(){
		document.getElementById("faculty").style.display="none";
		document.getElementById("dept").style.display="none";
		document.getElementById("course").style.display="none";
		document.getElementById("unit").style.display="block";
	}