<?php
    require_once '../actions/db_connect.php';
    session_start();
    if(!(isset($_SESSION['userId']))){
       header('location: http://localhost/clever/index.php');
    }
    else
    {
    $username = $_SESSION['userId'];

    require_once '../actions/db_connect.php';
    echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="School_Portal.php?q=1" class="log log1">'.$username.'</a>&nbsp;|&nbsp;<a href="logout.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
    }




 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Volunteer Login</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
 <link rel="stylesheet" href="css/popup.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>


  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->
<style>


.dropbtn {
    border-radius: 2px;
    color: black;
    padding: 12px;
    font-size: 14px;
    border: none;
    height:60%;
    border-radius: 2px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;

    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background-color: white;
}

.dropdown-content a:hover {background-color:  #bfff80;

}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #bfff80;}
</style>
</head>
<?php
require_once '../actions/db_connect.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Portal for School</span></div>
<div class="col-md-4 col-md-offset-2">


</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="School_Portal.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Create Exam<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="School_Portal.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Add Students</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="School_Portal.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Manage Exams</a></li>
		<li class="pull-right"> <a href="logout.php?q=School_Portal.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		</ul>

      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1)
{
?>
  <div class="bg1">
  <div class="row">

  <div class="col-md-7"></div>
  <div class="col-md-4 panel">
  <!-- sign in form begins -->
    <form class="form-horizontal" action="" method="POST">
  <fieldset>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="name"></label>
    <div class="col-md-12">
    <input type="date" name="date" placeholder="Exam date" class="form-control input-md" >

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="type"></label>
    <div class="col-md-12">
      <select id="type" name="type" placeholder="Exam type" class="form-control input-md" >
     <option value="Online MCQ">Online MCQ</option>
    <option value="Offline MCQ">Offline MCQ</option>
    <option value="Theory">Theory</option> </select>
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label" for="name"></label>
    <div class="col-md-12">
    <input type="text" id="myTime" name='start_time' class="form-control input-md" placeholder="Exam start time (ex. 15:00:00)">

    </div>
  </div>


  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-12 control-label title1" for="number"></label>
    <div class="col-md-12">
      <input type="number" class="form-control input-md" name="duration" step="0.5" placeholder="Duration in hours">

    </div>
  </div>


  <?php if(@$_GET['q7'])
  { echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
  <!-- Button -->
  <div class="form-group">
    <label class="col-md-12 control-label" for=""></label>
    <div class="col-md-12">
      <input type="submit" name='Create_Exam' class="sub" value="Create Exam" class="btn btn-primary"/>
    </div>
  </div>

  </fieldset>
  </form>

  </div><!--col-md-6 end-->
  </div></div>
  <!--container end-->

<?php
    if(isset($_POST['Create_Exam']))
    {

          $date = $_POST['date'];
          $type = $_POST['type'];
          $start_time = $_POST['start_time'];
          $duration = $_POST['duration'];
          $id = mt_rand(1,50000);

          $sql = "INSERT INTO Exam(id,date,username,type,start_time,duration) VALUES
          (".$id.",'".$date."','".$username."','".$type."','".$start_time."',".$duration.")";
          //$stmt->bind_param("ssssssi",$name,$email,$username,$password,$college,$address,$contact);
            $mainResult = $connect->query($sql);

            if($mainResult)
            {
              echo "<h4 style='text-align:center;'>Exam Created Successfully!!</h4>";

            }
            else
            {
                    echo $sql;
            }
    }

}

if(@$_GET['q']== 2)
{
  echo'  <HTML>

<HEAD>
<TITLE> Add or delete students </TITLE>
<link  rel="stylesheet" href="file/css/bootstrap.min.css"/>
<link  rel="stylesheet" href="file/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="file/css/main.css">
<link  rel="stylesheet" href="file/css/font.css">
<script src="file/js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="style.css">
<section class="hero-area" >


<script src="file/js/bootstrap.min.js"  type="text/javascript"></script>
<SCRIPT language="javascript">
function addRow(tableID) {

 var table = document.getElementById(tableID);
 var rowCount=0;
 if(table.rows.length!=0)
   rowCount = table.rows.length;
 var row = table.insertRow(rowCount);

 //var colCount = table.rows[0].cells.length;
 var colCount=3;
 for(var i=0; i<colCount; i++) {

   var newcell	= row.insertCell(i);

   newcell.innerHTML = table.rows[0].cells[i].innerHTML;
   //alert(newcell.childNodes);
   switch(newcell.childNodes[0].type) {
     case "text":
         newcell.childNodes[0].value = "";
         break;
     case "checkbox":
         newcell.childNodes[0].checked = false;
         break;
     /*case "text":
         newcell.childNodes[0].value = "";
         break;*/
   }
 }
}

function deleteRow(tableID) {
 try {
 var table = document.getElementById(tableID);
 var rowCount = table.rows.length;

 for(var i=0; i<rowCount; i++) {
   var row = table.rows[i];
   var chkbox = row.cells[0].childNodes[0];
   if(null != chkbox && true == chkbox.checked) {
     if(rowCount <= 0) {
       alert("no rows left.");
       break;
     }
     table.deleteRow(i);
     rowCount--;
     i--;
   }


 }
 }catch(e) {
   alert(e);
 }
}

</SCRIPT>
</HEAD>
<BODY>
<form action="" method="post">
<div>
<INPUT type="text" name="xmid" placeholder="Enter exam id" margin-left="100px"/>
<br>
<br>
<INPUT type="submit" value="Show students"name="abc" align="center" />
</div>

<TABLE  id="dataTable" width="800px" border="0"  style="margin-top:15px;margin-bottom:15px;">
<TR style="margin-top:15px;margin-bottom:15px;">

 <TD><INPUT type="text" name="txt1" placeholder="Enter roll no."/></TD>
 <TD><INPUT type="text" name="txt2" placeholder="Enter name"/></TD>
</TR>
</TABLE>



<div>
<INPUT type="submit" value="Add student" name="Add" onclick="addRow("dataTable")" />

</div>

</BODY>
</form>
</HTML>';

if (isset($_POST['Add'])) {
  $roll = $_POST['txt1'];
  $name = $_POST['txt2'];
  $id = $_POST['xmid'];

  $sql = "INSERT INTO Blind values($id,$roll,'$name','$username',0)";
  //$stmt->bind_param("ssssssi",$name,$email,$username,$password,$college,$address,$contact);
    $mainResult = $connect->query($sql);


}
if (isset($_POST['abc']))
  {
      $id = $_POST['xmid'];
    $c=1;
    $result = $connect->query("SELECT * FROM Blind where id=$id") or die('Error');
    echo'    <table class="table table-striped title1" id="dataTable" width="800px" border="0"  style="margin-top:15px;margin-bottom:15px;">'
    ;
    while($row = mysqli_fetch_array($result))
    {
      $id = $row['id'];
  //    $_POST[$id]=$id;
      $date = $row['roll'];
      $type = $row['name'];
      $start_time= $row['username'];


      echo '

      <tr><td>'.$c.'</td><td>'.$id.'</td><td>'.$date.'</td><td>'.$type.'</td><td>'.$start_time.'</td>
      </tr>
      ';
      // echo "Submit_$id";
      $c++;
    }
    echo "</table>";
  }
}

//ranking start
if(@$_GET['q']== 3)
{

  ?>


  <div class="panel"><div class="table-responsive">
  <form action="" method="post">
  <table class="table table-striped title1">
  <tr>

  <td><b>No.</b></td>
  <td><b>id</b></td>
  <td><b>Date</b></td>
  <td><b>Exam Type</b></td>
  <td><b>Start Time</b></td>
  <td><b>Duration</b></td>
  <td></td>
  </tr>

  <?php
  $c=1;
  $result = $connect->query("SELECT * FROM Exam where username='$username'") or die('Error');
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['id'];
//    $_POST[$id]=$id;
    $date = $row['date'];
    $type = $row['type'];
    $start_time= $row['start_time'];
    $duration= $row['duration'];

    echo '
    <tr><td>'.$c.'</td><td>'.$id.'</td><td>'.$date.'</td><td>'.$type.'</td><td>'.$start_time.'</td><td>'.$duration.'</td>
    <td><b><button type="submit" value='.$id.' name="Submit_'.$id.'" class="pull-right btn sub1" style="width:70%;margin:0px;background:#df3939"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></button></td></tr>';
    // echo "Submit_$id";
    $c++;
  }
  echo '</table></form></div></div>';

  // echo $_POST["Submit_".$id];
  // echo "Submit_".$id;

        // $id=$_POST[$id];
    $result = $connect->query("SELECT id FROM Exam where username='$username'");
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['id'];
        if(isset($_POST["Submit_".$id]))
        {
            $sql = " DELETE FROM Exam WHERE id=$id";
            //$stmt->bind_param("ssssssi",$name,$email,$username,$password,$college,$address,$contact);
            $mainResult = $connect->query($sql);

            if($mainResult)
            {
                echo "<h3 style='text-align:centre;'>Deleted<h3>";
            }
            else {
              echo $sql;
            }
            break;
        }
    }

}
?>



</div></div></div></div>


</body>
</html>

<?php require_once '../includes/footer.php' ?>
