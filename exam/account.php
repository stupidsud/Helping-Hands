<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Volunteer Login</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" /> -->
<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script> -->


	
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
<span class="logo">Portal for Volunteer</span></div>
<div class="col-md-4 col-md-offset-2">
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
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$username.'</a>&nbsp;|&nbsp;<a href="logout.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}

?>


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
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Booked exams</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Edit Contact No</a></li>
		<li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		</ul>


    <!--  IMPORTANT 1 : for HOME    2: BOOKED EXAMS 3 : Edit contact No. -->
            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter tag ">

<!-- -->

<div class="dropdown">
  <button class="dropbtn">Sort by</button>
  <div class="dropdown-content">
    <a href="#"> By City</a>
    <a href="#">By Date</a>

  </div>
</div>


        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1)
{

echo  '<div class="panel"><div class="table-responsive">
<form method="post" data-ajax="false">
<table class="table table-striped title1">
<tr>
<td>
  <b>No.</b>
</td>
<td>
  <b>Exam_id</b>
</td>
  <td>
    <b>Date</b>
  </td>
  <td>
    <b>School Name</b>
  </td>
  <td><b>Duration</b></td>


<td><b>Exam Type</b></td>
<td><b>Start Time</b></td>
<td></td>
</tr>';

$c=1;


$result = $connect->query("SELECT * FROM Exam ORDER BY date DESC") or die('Error');

while($row = mysqli_fetch_array($result))
{
	$date = $row['date'];
  $type = $row['type'];
	$start_time= $row['start_time'];
  $duration= $row['duration'];
  $id = $row['id'];
  $q=$connect->query("SELECT name FROM School where username='".$row['username']."'");
  $row2=$q->fetch_assoc();
  $name=$row2['name'];

  $sql = "SELECT username FROM Pair where username='$username' and id=$id";
  $p=$connect->query($sql);
  $row2=$p->fetch_assoc();

    if(mysqli_num_rows($p)==0)
    {
    	echo '<tr><td>'.$c.'</td><td>'.$id.'</td><td>'.$date.'</td><td>'.$name.'</td><td>'.$duration.'</td><td>'.$type.'</td><td>'.$start_time.'</td>
      <td><b><button type="submit" name="Book_'.$id.'"  class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>BOOK</b></span></a></b></button></td></tr>';

    }
    else
    {
      echo '<tr><td>'.$c.'</td><td>'.$id.'</td><td>'.$date.'</td><td>'.$name.'</td><td>'.$duration.'</td><td>'.$type.'</td><td>'.$start_time.'</td></tr>';
      // IF EXAM IS OUT OF STOCK (write this code )
  //  echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.'&nbsp;</td>';
    }
    $c++;
}
echo '</table></form></div></div>';

$result = $connect->query("SELECT id FROM Exam");
while($row = mysqli_fetch_array($result))
{
  $id = $row['id'];
  if(isset($_POST["Book_".$id]))
  {
      $sql = "SELECT * from Blind WHERE id=$id and flag_paired=0";
      $mainResult = $connect->query($sql);
      if(mysqli_num_rows($mainResult)==0)
      {
          echo "<h4 style='text-align:center;'>No Blind Student Added</h4>";
      }
      else
      {
        $row = mysqli_fetch_array($mainResult);
        $roll = $row['roll'];
        $name = $row['name'];

        $sql = "UPDATE Blind set flag_paired=1 WHERE roll=$roll";
        $mainResult = $connect->query($sql);


        $sql= "INSERT INTO Pair VALUES ('$username',$roll,$id)";
        $mainResult = $connect->query($sql);
        if($mainResult)
        {
          echo "<h4 style='text-align:center;'>Booked! Please Refersh the Page...</h4>";
          header('location: http://localhost/clever/exam/account.php?q=2');
        }

      }
      break;
  }

}
}?>



<?php

if($_GET['q']== 2)
{
echo  '<div class="panel title">
<form action="" method="post" data-ajax="false">
<table class="table table-striped title1" >
<tr>
<td>
  <b>No.  </b>
</td>
  <td>
    <b>Date</b>
  </td>
  <td>
    <b>School Name</b>
  </td>
  <td><b>Alloted Blind</b></td>
  <td><b>Duration</b></td>


<td><b>Exam Type</b></td>
<td><b>Start Time</b></td>
<td></td></tr>';
$q=$connect->query("SELECT * FROM Exam where id in(SELECT id FROM Pair WHERE username='$username')") or die('Error197');
  $c=0;
  while($row=mysqli_fetch_array($q) )
  {
      $date=$row['date'];
      $id=$row['id'];
      $duration=$row['duration'];
      $type=$row['type'];
      $start_time=$row['start_time'];

      $q=$connect->query("SELECT name FROM School where username='".$row['username']."'") or die('Error197');
      $row2=$q->fetch_assoc();
      $name=$row2['name'];
      $c++;
      $p =$connect->query("Select * from Pair where id = $id");
      $row3=$p->fetch_assoc();
      $roll = $row3['roll'];
      echo '<tr><td>'.$c.'</td><td>'.$date.'</td><td>'.$name.'</td><td>'.$roll.'</td><td>'.$duration.'</td><td>'.$type.'</td><td>'.$start_time.'</td><td>'.$r.'<td></span>
      &nbsp;<span class="title1"><b><button type="submit" name="Withdraw_'.$id.'" class="btn btn-default" > Withdraw</b></span></button></a></td>';
  }
  echo'</table></form></div>';

  $q=$connect->query("SELECT * FROM Exam where id in(SELECT id FROM Pair WHERE username='$username')") or die('Error197');
  while($row = mysqli_fetch_array($q))
  {
    $id = $row['id'];
    if(isset($_POST["Withdraw_".$id]))
    {
        $sql = "DELETE FROM Pair where id=$id and username='$username'";
        $mainResult = $connect->query($sql);
        if(mysqli_num_rows($mainResult)==0)
        {
          $sql = "UPDATE Blind SET flag_paired=0 where id=$id";
          $mainResult = $connect->query($sql);
          echo "<h4 style='text-align:center;'>Deleted! Please Refersh the Page...</h4>";

        }
        else
        {
          echo "<h4 style='text-align:center;'>Failed</h4>";
        }
        break;
    }

  }

}

//ranking start
if(@$_GET['q']== 3)
{ // PRINT ACC INFO
  ?>
  <body><form action="" method="post"><table>
        <tbody>
            <thead>
                <tr>
                    <th>Enter Contact No.</th>
                    <th>&nbsp;</th>
                    <th><input  type="text" name="contact" class="form-control"></input> </th>
                </tr>
                <tr>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th><button type="submit" name="update" action= class="btn btn-default" style="margin-top:15px;" >Update</th>
                      <th> &nbsp; </th>
                </tr>
            </thead>
        </tbody>
      </table>
</body>

<?php
    if(isset($_POST['update']))
    {
          $contact=$_POST['contact'];
          $sql = "UPDATE Volunteer set contact=$contact where username='$username'";
          $mainResult = $connect->query($sql);
          if($mainResult)
          {
             echo "<h4 style='text-align:center;'>Contact Updated Successfully!!</h4>";
          }

    }

}
?>



</div></div></div></div>
</body>
</html>

<?php require_once '../includes/footer.php' ?>
