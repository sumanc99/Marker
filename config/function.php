<?php

//form validating input
include("config/db_connect.php");
 function validating_input($data_input){
     global $conn;
    $data = trim($data_input);
    $data = stripslashes($data_input);
    $data = htmlspecialchars($data_input);
    $data = mysqli_real_escape_string($conn, $data_input);
    return $data;
 }

 //To logout user or admin
function logout($logout){
    if(isset($logout)){
        header("location:index.php");
        session_unset();
       
    }
   
}


//user first && lastname firstletters
function namelogo($username){
    global $conn;

  //for admin only
  $sql = "SELECT firstname, lastname FROM admin where username='{$username}'";
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result)>0){
    $user = mysqli_fetch_assoc($result);
   
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
  
  }else{
    // for users only
    $sql = "SELECT firstname, lastname FROM users where username='{$username}'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);
   
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
  }
 
  

 return $firstname[0].$lastname[0];
}
// admin and user fullname func
function fullname($username){
    global $conn;
  $sql = "SELECT firstname, lastname FROM admin where username='{$username}'";
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result)>0){
    $user = mysqli_fetch_assoc($result);
   
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
  
  }else{
    $sql = "SELECT firstname, lastname FROM users where username='{$username}'";
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_assoc($result);
   
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
  }
 
  

 return $firstname." ".$lastname;
}
//class population fun for a single subject
function class_unmark_num($class, $subject){
    global $conn;
    $ca = ['ca1','ca2','ca3'];
    $exam = 'exam';
  //  $sql = "SELECT name FROM {$_SESSION['class_letter']} WHERE $subject$ca[0] ='0' ";
$sql = "SELECT name FROM {$class} WHERE ( $subject$ca[0] ='0'  AND $subject$ca[1] ='0') AND ($subject$ca[2] ='0' AND $subject$exam ='0')";
    $sql_query = mysqli_query($conn, $sql);
    $number_unmark = mysqli_num_rows($sql_query);
   
    
 return $number_unmark;
}
// the function will check if the subject exist in the class or not
function subject_exist($class, $subject){
  global $conn;

  $ca = ['ca1'];
  $sql = "SELECT * FROM {$class} WHERE $subject$ca[0]='0' ";
  $sql_query = mysqli_query($conn, $sql);
  if($sql_query){
    $subject_status = mysqli_num_rows($sql_query);
  }else{
    $subject_status = 0;
  }
  
return  $subject_status;
}

//class population function and namelist
function stud_marking_list($class, $subject){
  global $conn;

  $ca = ['ca1','ca2','ca3'];
  $exam = 'exam';
  //selector for datalist
  $sql = "SELECT name FROM {$_SESSION['class_letter']} WHERE ( $subject$ca[0] ='0'  AND $subject$ca[1] ='0') AND ($subject$ca[2] ='0' AND $subject$exam ='0')";
  $result = mysqli_query($conn, $sql);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//func that update student score
function score_update($class, $subject,$score1,$score2,$score3, $score4, $name){
  global $conn;

  $ca = ['ca1','ca2','ca3'];
  $exam = 'exam';
  $sql = "UPDATE {$class} SET $subject$ca[0] = '$score1', $subject$ca[1] = '$score2', $subject$ca[2] = '$score3', $subject$exam = '$score4' WHERE name ='$name' ";
  return mysqli_query($conn, $sql);
}

//function that validate student name before making
function validate_studentname_bofore_making($class, $subject, $name){
  global $conn;

  $ca = ['ca1','ca2','ca3'];
  $exam = 'exam';
  $stud_sql = "SELECT name FROM {$class} WHERE  (name='$name' AND $subject$ca[0] = '0') AND  ($subject$ca[1]='0' AND $subject$ca[2] = '0') ";

   return mysqli_query($conn, $stud_sql);
}


// function studentlist($class, $subject){
//     global $conn;
//     $sql =  "SELECT * FROM {$class} WHERE {$subject} = '0' ";
//     $sql_query = mysqli_query($conn, $sql);
//     $number_of_studentlist = mysqli_num_rows($sql_query);

//      $students = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);

//  return $students;
// }

//fullsubject_name fun
function fullsubject_name($short_subjectname){
   global $subjects;
//subject name holder
 $subjects = ["eng"=>"English", 
 "math"=>"Mathematics", "hel"=>"Health Education", 
 "social"=>"Social Studies", "agric"=>"agricultural science", 
 "art"=>"art", "comp"=>"computer studies", "basic"=>"basic science", 
 "hau"=>"hausa", "civic"=>"civic education","rel"=>"religion", "home"=>"home economics", 
 "phe"=>"physical health education"
];
 $result = $subjects[$short_subjectname];
 
 return $result;
}

//make subject in use for that user
function subjectpicked($class , $subject, $username){
    global $conn;
    //query to make subject in use
    $sql_update = "UPDATE users SET status='marking', class = '{$class}', subject = '{$subject}' WHERE username = '{$username}' ";
    
    return $sql_query_update = mysqli_query($conn, $sql_update);
}

//validate if user have subject in action
function user_status_on_making($username){
    global $conn;
    $user_checker = "SELECT * FROM users WHERE username = '{$username}' and status = 'marking'";

    $user_checker_query = mysqli_query($conn, $user_checker);

    $answer = mysqli_num_rows($user_checker_query);

   return $answer;
}

//user subject making status like which subject is he/she making
function user_subject_making($username, $subject){
    
    global $conn;
    $user_checker = "SELECT * FROM users WHERE username = '{$username}' and subject = '{$subject}'";

    $user_checker_query = mysqli_query($conn, $user_checker);

    $answer = mysqli_num_rows($user_checker_query);

    return $answer;
}

//function use to drop subject for a user when making
function drop($username){

  global $conn;
  //query to drop subject
  $sql_update = "UPDATE users SET status=' ', class = ' ', subject = ' ' WHERE username = '{$username}' ";
  
  return $sql_query_update = mysqli_query($conn, $sql_update);
}

//function that return the list of staff in marker
function staffs(){
global $conn;
  $sql = "SELECT firstname, lastname FROM users  ";

  $sql_query = mysqli_query($conn, $sql);
   
  return $result = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);
}

// function check_if_not_admin_then_out($admin){
//   global $conn;

//  $sql = "SELECT * FROM admin WHERE username = '{$admin}'";
//  $sql_query = mysqli_query($conn, $sql);
//  if(mysqli_num_rows($sql_query)<1){
//    header("location: index.php");
//  }else{}
 
 
// }

// function check_if_not_user_then_out($user){
//   global $conn;

//   $sql = "SELECT * FROM users WHERE username = '{$user}'";
//   $sql_query = mysqli_query($conn, $sql);
//   if(mysqli_num_rows($sql_query)<1){
//     header("location: index.php");
//     session_destroy();
//   }else{}
  
// }

//function for registering students
function reg_stud($name, $class){
  global $conn;

  $sql = "INSERT INTO {$class}(name) VALUES('$name')";
  $sql_query =  mysqli_query($conn, $sql);

  return $sql_query;
}

//number of students in class
function num_class_stud($class){
  global $conn;
  global $num;

  $num =0;
  $class_suffix = ['A', 'B', 'C', 'D', 'E'];

  for($i =0; $i < count($class_suffix); $i++){
    $sql = "SELECT name FROM $class$class_suffix[$i]";

    $sql_query = mysqli_query($conn, $sql);

   $num += mysqli_num_rows($sql_query);
  }
 

  return $num;
}

//names of student in a class
function student_names($class){
 global $conn;
  $sql = "SELECT name FROM {$class} ";
  $sql_query = mysqli_query($conn, $sql);

  return mysqli_fetch_all($sql_query, MYSQLI_ASSOC);
}
//function that help user to continue marking
function continue_marking($username){
 global $conn;

 $sql = "SELECT * FROM users WHERE username='{$username}' AND status='marking'";
 $sql_query = mysqli_query($conn, $sql);

 return $sql_query;

}
//checking if user is admin or not
function admin_checker($username){
  global $conn;
  $sql = "SELECT * FROM admin WHERE username='{$username}'";
  $sql_query = mysqli_query($conn, $sql);
  return mysqli_num_rows($sql_query);
}
?>