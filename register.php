<?php  
include 'connect.php';
if(isset($_POST['signUp'])){
  $firstName = $_POST['fName'];
  $lastName = $_POST['LName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);

  $checkEmail = "SELECT * FROM user where email='$email'";
  $result = $conn->query($checkEmail);
  if($result->num_rows>0){
    echo "Email address alrady Exist";

  }else{


    $insertQuery = "INSERT INTO user(firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$password')"
    if($conn->query($insertQuery)==TRUE){
      header("lacation:index.php")
    }else{
      echo "Eroor:".$conn->error
    }
  }

}
if(isset($_POST['signIn'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);

  $sql = "SELECT * FROM user WHERE email='$email' and password = '$password'";
  $result = $conn->query($sql);
  if($result->num_rows>0){
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location:homepage.php");
    exit();
  }else{
    echo "Not Found,incorreact Email or password"
  }


}



?>