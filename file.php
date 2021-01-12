$sql = "SELECT name FROM {$_SESSION['class_letter']} WHERE ( engca1 ='0' AND engca2 ='0') AND (engca3 ='0' AND engexam ='0')";
$sql_query = mysqli_query($conn, $sql);

$num = mysqli_num_rows($sql_query);

echo $num;

// $class_prefix = ['a','b','c','d','e'];
// $class_num = [4,5,6];
// $table =" ";
// if(isset($_POST['submit2'])){

// for($n = 0; $n < count($class_num); $n++){

//    for($i = 0; $i < count($class_prefix); $i++){

//        // sql to create table
//      $sql = "CREATE TABLE primary$class_num[$n]$class_prefix[$i] (
//     name VARCHAR(20)  PRIMARY KEY,
//     engca1 INT(2) NOT NULL,
//     engca2 INT(2) NOT NULL,
//     engca3 INT(2) NOT NULL,
//     engexam INT(3) NOT NULL,

//     mathca1 INT(2) NOT NULL,
//     mathca2 INT(2) NOT NULL,
//     mathca3 INT(2) NOT NULL,
//     mathexam INT(3) NOT NULL,

//     helca1 INT(2) NOT NULL,
//     helca2 INT(2) NOT NULL,
//     helca3 INT(2) NOT NULL,
//     helexam INT(3) NOT NULL,

//     socialca1 INT(2) NOT NULL,
//     socialca2 INT(2) NOT NULL,
//     socialca3 INT(2) NOT NULL,
//     socialexam INT(3) NOT NULL,

//     agricca1 INT(2) NOT NULL,
//     agricca2 INT(2) NOT NULL,
//     agricca3 INT(2) NOT NULL,
//     agricexam INT(3) NOT NULL,
   
//     civicca1 INT(2) NOT NULL,
//     civicca2 INT(2) NOT NULL,
//     civicca3 INT(2) NOT NULL,
//     civicexam INT(3) NOT NULL,

//     hauca1 INT(2) NOT NULL,
//     hauca2 INT(2) NOT NULL,
//     hauca3 INT(2) NOT NULL,
//     hauexam INT(3) NOT NULL,

//     basicca1 INT(2) NOT NULL,
//     basicca2 INT(2) NOT NULL,
//     basicca3 INT(2) NOT NULL,
//     basicexam INT(3) NOT NULL,

//     artca1 INT(2) NOT NULL,
//     artca2 INT(2) NOT NULL,
//     artca3 INT(2) NOT NULL,
//     artexam INT(3) NOT NULL,

//     relca1 INT(2) NOT NULL,
//     relca2 INT(2) NOT NULL,
//     relca3 INT(2) NOT NULL,
//     relexam INT(3) NOT NULL,

//     compca1 INT(2) NOT NULL,
//     compca2 INT(2) NOT NULL,
//     compca3 INT(2) NOT NULL,
//     compexam INT(3) NOT NULL,

//     homeca1 INT(2) NOT NULL,
//     homeca2 INT(2) NOT NULL,
//     homeca3 INT(2) NOT NULL,
//     homeexam INT(3) NOT NULL
//     )";
    
//     if (mysqli_query($conn, $sql)) {
//         $table = "Table primary$class_num[0]$class_prefix[0] created successfully";
//     } else {
//         echo "Error creating table: " . mysqli_error($conn);
//     }

//  }
// }
    
// }



<div class='result'>

<h3>result</h3>
<table align='center' border='1px' class='table_report'>
  <tr>
      <th>s/n</th>
      <th>subject</th>
      <th>cA</th>
      <th>exams</th>
      <th>total</th>
      <th>grade</th>
      <th>subject position</th>
      <th>class avg</th>
      <th>remark</th>
  </tr>
  <tr>
      <td class='subject'>s/n</td>
      <td>subject</td>
      <td>cA</td>
      <td>exams</td>
      <td>total</td>
      <td>grade</td>
      <td>subject position</td>
      <td>class avg</td>
      <td>remark</td>
  </tr>
</table>

</div>
<div class='infor_report'>

<table align='center' border='1px' class="">
  <tr>
      <th>grade description</th>
   
  </tr>
  <tr>
      <td>5 = a, distinction </td>
  </tr>
  <tr>
      <td>4 = b, merit </td>
  </tr>
  <tr>
      <td>3 = c, credit </td>
  </tr>
  <tr>
      <td>2 = d, pass </td>
      
  </tr>
  <tr>
      <td>1 = f, fail </td>
  </tr>
</table>

<table align='center' border='1px' class=''>
  <tr>
      <th>affective domain</th>
      <th>rating</th>
   
  </tr>
  <tr>
      <td>honesty </td>
      <td> </td>
  </tr>
  <tr>
      <td>honesty </td>
      <td> </td>
  </tr>
  <tr>
      <td>honesty </td>
      <td> </td>
  </tr>
  <tr>
      <td>honesty </td>
      <td> </td>
  </tr>
  <tr>
      <td>honesty </td>
      <td> </td>
  </tr>
</table>

<table align='center' border='1px' class=''>
  <tr>
      <th>psychomotor</th>
      <th>rating</th>
  </tr>
  <tr>
      <td>games</td>
      <td></td>
  </tr>
  <tr>
      <td>games</td>
      <td></td>
  </tr>
  <tr>
      <td>games</td>
      <td></td>
  </tr>
  <tr>
      <td>games</td>
      <td></td>
  </tr>
  <tr>
      <td>games</td>
      <td></td>
  </tr>
</table>

</div>
