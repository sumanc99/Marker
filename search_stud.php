<?php

session_start();
//db connection
include("config/db_connect.php");
//function page
include("config/function.php");
//use to logout if username and password are empty
include("config/page_logout.php");

//check if user is admin or not
$admin = admin_checker($_SESSION['username']);

//name of classes holder
$classes = ["Primary1", "Primary2", "Primary3", "Primary4", "Primary5", "Primary6"];

$class_suffix = ['A', 'B', 'C', 'D', 'E'];

$student_name = [];
$student_class = [];
$not_found_in_class = [];
$sms = "";
$class = $_SESSION['class'];
if(isset($_POST['submit'])){
    $name = validating_input($_POST['name']);
  if(empty($name) || $name==' '){
    $sms = "<h6 class=red-text>provide student name to search</h6>";
  }else{
        for($i=0; $i<count($class_suffix); $i++){
      
          $sql = "SELECT name FROM $class$class_suffix[$i] WHERE name ='$name'";
          $sql_query = mysqli_query($conn, $sql);
          $result = mysqli_fetch_assoc($sql_query);

          if(mysqli_num_rows($sql_query)>0){
              array_push($student_name, $result['name']);
               $class_stud = $class.$class_suffix[$i];
              array_push($student_class,  $class_stud );
          }
          else{
            
              array_push($not_found_in_class, $class_suffix[$i]);
            // $sms = "<h5 class=green-text>student is only found in the result above</h5>";  
          }
      
      }
      if(count($class_suffix)==count($not_found_in_class)){
        $sms = "<h6 class=red-text>student Not found</h6>";
      }else{
        $sms = "<h6 class=green-text>student is only found in the result above</h6>";
      }
  }
 
}




?>
<html lang="en">

<?php include("templates/header.php");?>
<h1></h1>
<div class="row">
<?php if(count($student_name)<1):?>

      <div class='col s12 m6 l4 offset-l4'>
        <div class='card'>
            <div class='card-content'>
                <p class='center'><img src='img/pic.png'> </i></p>
               
            </div>
        </div>
      </div>
<?php else:?>

<?php for($i=0; $i<count($student_name); $i++){?>

  <?php
      echo "

      <div class='col s12 m6 l4 offset-l4'>
          <div class='card'>
              <div class='card-content'>
                  <p class='center'><img src='img/pic.png'> </i></p>
                  <p class='flow-text center'>Student: {$student_name[$i]}</p>
                  <p class='flow-text center'>class: {$student_class[$i]}</p>
              </div>
          </div>
        </div>
      
      ";
  ?>

<?php }?>

<?php endif;?>
     
</div>


<section class="section">

<div class="center" style="margin-top:-40px;">
<?php echo $sms;?> 
</div>

<div class="container row">
 
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="col l6 offset-l3" method="POST">
    
    <div class="container">

         <input   name="name" placeholder="provide name" value=""/>

    <div class="right">
    <input type="submit" name="submit" value="Search" class="btn" > 
    <?php if($admin > 0):?>
    <a href="search_class_picker.php" class="btn" style="margin-left:20px;">Back</a>
    <?php else:?>
      <a href="userpanel.php" class="btn" style="margin-left:20px;">Back</a>
    <?php endif;?>
   
    </div>
    
    </div>

    </form>
    
 </div>
 <div class="center">
 


 <h5 class="center orange-text">Type studentname above to search</h5> 
</section>


  


<?php include("templates/footer.php");?>

</html>

