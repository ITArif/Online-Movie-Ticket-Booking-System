<?php 

   include 'connection/conn.php';

 ?>

<!DOCTYPE html>
<html>
<head>
<title>confirm ticket</title>
<link rel="stylesheet" href="common/css/bootstrap.css" type="text/css" />
<script src="js/bootstrap.js"></script>
<style type="text/css">
	.sign {
    float: right;
    margin-right: 100px;
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<br>
	<nav class="navbar navbar-default">
             		<div class="container-fluid">
             			<div class="navbar-header">
             				<a classs="nav navbar-nav pull-right abc" href="#"><img src="common/images/right.png"></a>
             			</div>
             			<ul class="nav navbar-nav pull-right">
             				<li><a href="Profile.php"><i class="fas fa-home"></i>Home</a></li>
             				<li><a href="logout.php"><i class="fas fa-user"></i>Profile</a></li>
             				<li><a href="login.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
             			</ul>
             		</div>
    </nav>
    <?php 

          if ($_SERVER["REQUEST_METHOD"]=="POST") {

              $mviename=$_POST['mviename'];
              $mtime=$_POST['mtime'];
              $scategory=$_POST['scategory'];
              $sprice=$_POST['sprice'];
              $spackage=$_POST['spackage'];
              $pnumber=$_POST['pnumber'];
              $datetime=$_POST['datetime'];
              if (empty($mviename) || empty($mtime) || empty($scategory) || empty($sprice) || empty($spackage) || empty($pnumber) || empty($datetime)) {
                echo "not empty";
              }else{
                $sql="INSERT INTO book(seattype,package,showdate,showtime,price,phone,mname) VALUES('$scategory','$spackage','$datetime','$mtime','$sprice','$pnumber','$mviename')";
                 $query=mysqli_query($connection,$sql);
                 if ($query) {
                    $sql="UPDATE seat set status='1' where seat_id='$scategory'";
                     $query=mysqli_query($connection,$sql);
                 }else{
                  echo "failed",mysqli_error($connection);
                 }

              }
              

          }

     ?>
<form action="" method="post" >
          <div class="form-row">
	            <div class="form-group col-md-6">
              <label for="inputState">Select Movie</label>
              <?php 
                $sql="SELECT * FROM tbl_movie  order by movie_id desc limit 1";
                $query=mysqli_query($connection,$sql);
                if ($query) {
                  while ($row=mysqli_fetch_array($query)) {
                  
                
               ?>
             <input type="text" name="mviename" value="<?php echo $row['movie_name'] ?>" readonly>
             <?php }} ?>
            </div>
	            <div class="form-group col-md-6">
              <label for="inputState">Select Time</label>
              <select id="mtime" class="form-control" name="mtime">
                <option value="">Choose...</option>
                 <?php 
                $sql="SELECT * FROM movie_time";
                $query=mysqli_query($connection,$sql);
                if ($query) {
                  while ($row=mysqli_fetch_array($query)) {
                  
                
               ?>
                 <option value="<?php echo $row['timemovie'] ?>"><?php echo $row['timemovie'] ?></option>
                 <?php }} ?>
               
              </select>
            </div>
          </div>
          <div class="form-row">
	              <div class="form-group col-md-6">
              <label for="inputState">Select Seat</label>
              <select id="scategory" class="form-control" name="scategory">
                  <option value="">Choose...</option>
                <?php 
                $sql="SELECT * from seat where status=0";
                $query=mysqli_query($connection,$sql);
                if ($query) {
                  while ($row=mysqli_fetch_array($query)) {
                  
                
               ?>
                 <option value="<?php echo $row['seat_id'] ?>"><?php echo $row['types'] ?></option>
                 <?php }} ?>
                
              </select>
            </div>
	              <div class="form-group col-md-6">
              <label for="inputState">Select Seat Price</label>
              <select id="sprice" class="form-control" name="sprice">
                <option selected>Choose...</option>
                 <?php 
                $sql="SELECT * from seat ";
                $query=mysqli_query($connection,$sql);
                if ($query) {
                  while ($row=mysqli_fetch_array($query)) {
                  
                
               ?>
                 <option value="<?php echo $row['price'] ?>"><?php echo $row['price'] ?></option>
                 <?php }} ?>
               
              </select>
            </div>
          </div>
          <div class="form-row">
                <div class="form-group col-md-6">
              <label for="inputState">Select Seat Package</label>
              <select id="spackage" class="form-control" name="spackage">
                <option selected>Choose...</option>
                <?php 
                $sql="SELECT * from tbl_package ";
                $query=mysqli_query($connection,$sql);
                if ($query) {
                  while ($row=mysqli_fetch_array($query)) {
                
               ?>
                 <option value="<?php echo $row['package_name'] ?>"><?php echo $row['package_name'] ?></option>
                 <?php }} ?>
               
              </select>
            </div>
           
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Phone Number</label>
                <input type="text" class="form-control" name="pnumber" id="pnumber" placeholder="Enter Phone Number">
              </div>

              <div class="form-group col-md-6">
                <label for="datetime">Date</label>
                <input type="date" name="datetime" id="datetime" />
               </div>
          </div>
          <button type="submit" class="btn btn-primary sign">Sign in</button>
          <br>	
</form>
</div>
<div class="container">
	<div class="navbar navbar-default">
		<p> &copy; All Rights Reserved. | Develop by <a href="http://www.baseltd.com/" target="_blank">Arif Hossain</a></p>
	</div>
</div>
</body>
</html>