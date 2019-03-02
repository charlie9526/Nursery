<?php

	class Redirect{

		public static function to($location = null,$state = null) {
	        if($location) {
	            if(is_numeric($location)) {
	                switch($location) {
	                    case 404:
	                        header('HTTP/1.0 404 Not Found');
	                        #include 'includes/errors/404.php';
	                        break;  
	                }
	            } else {
	            	switch($location){
	            		case "uploadFile":
	                    	header('HTTP/1.0 200 OK');
	                    	header('Location: ../teacher/teacher.php?state='. $state);
	                    	break;
	                    case "markAttendance":
	                    	header('HTTP/1.0 200 OK');
	                    	header('Location: ../markAttendance.php');
	                    	break;
	                    case "addHomeWork":
	                    	header('HTTP/1.0 200 OK');
	                    	header('Location: ../addHomework.php');
	                    	break;
	                    case "message":
	                    	header('HTTP/1.0 200 OK');
	                    	header('Location: ../newMessage.php');
	                    	break;
                        case "markAttendance5":
	                    	header('HTTP/1.0 200 OK');
	                    	header('Location: ../teacher_attendance.php');
	                    	break;
	                    case "unauthorized":
	                    	header('HTTP/1.0 200 OK');
	                    	header('Location:index.php');
	            	}
	            }
	            
	            exit();
	        }
    	}


	}
	//Redirect::to("uploadFile","00");
?>