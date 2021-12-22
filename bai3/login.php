<?php
        
        include "connect.php";
        session_start();
        
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'" ;
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==1){
                
                $_SESSION['login'] = $username;
                if($_SESSION['login']=='admin'){
                header('Location:listCustomer.php');
                }
                else{
                    header('Location:index.php');
                }
            }else{
             
                echo"<script>alert('Tài khoản hoặc mật khẩu không đúng!');</script>"; ;
            }
        }
        

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PeaShop - Đăng nhập</title>
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>PeaShop</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg  " id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                Pea<span>Shop</span>
            </a>

            <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item"><a class="nav-link" href="register.php">Đăng ký</a></li>
                    <li class="nav-item active"><a class="nav-link" href="logout.php">Đăng nhập</a></li>
                </ul>

            </div>
        </div>


    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 card my-5">
                <div class="card-body ">

                    <form class="form-signin" action="login.php" method="post" role="form">
                        <h1 class="h3 mb-5 " style="text-align: center"> Đăng nhập</h1>

                        <input type="text" name="username" class="form-control" placeholder="Email hoặc số điện thoại">

                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                        <br>
                        <div class="login_btn">
                            <button class="btn btn-primary my-2 " type="submit" name="login">Đăng
                                nhập</button><br>
                            <a href="#" id="forgot_pswd">Forgot password?</a>
                            <hr>
                            <button class="btn btn-success my-2">
                                <a href="register.php" class="register_btn">Đăng ký</a>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <hr class="mt-5 hr_login">
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <h4 class=" mb-4">Về công ty</h4>

                        <ul class="list-unstyled ">
                            <li><a href="#">Điều khoản và dịch vụ</a></li>
                            <li><a href="#">Bảo mật</a></li>
                            <li><a href="#">Hỗ trợ</a></li>
                            <li><a href="#">Luật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4 class=" mb-4">Liên hệ</h4>

                        <ul class="list-unstyled ">
                            <li><i class="fa fa-facebook-square mb-3 mr-3"></i> <a href="#">Facebook</a></li>
                            <li><i class="fa fa-instagram mb-3 mr-3"></i> <a href="#">Instagram</a></li>
                            <li><i class="fa fa-twitter mb-3 mr-3"></i> <a href="#">Twitter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59615.843487499194!2d105.71730847201096!3d20.952907975988357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532bef4bcdb7%3A0xbcc7a679fcba07f6!2zSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1637828995657!5m2!1svi!2s"
                        width="100%" height="100%" style="border:1;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </footer>



</body>

</html>