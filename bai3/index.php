<?php
    include "checklogin.php";
    include "connect.php";
    if(isset($_SESSION['login'])){
        $username = $_SESSION['login'];
      $sql = "SELECT*FROM user WHERE username = '$username'";
      $result=  mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $year = substr($row['dob'],0,4);
      $day = substr($row['dob'],8,2);
      $month = substr($row['dob'],5,2);
  
    $born = mktime(0,0,0, $month,  $day,date("Y"));
    $moment = mktime(0,0,0,date("m"),date("d"),date("Y"));
    $rest = floor(($moment - $born)/86400);
  
        if($rest < 0){
            echo "<script>alert('Còn ".abs($rest)." ngày nữa là sinh nhật bạn đó');</script>";
        }else if($rest = 0){
          echo "<script>alert('Chúc mừng sinh nhật bạn')</script>";
        }else{
            echo "<script>alert('Chào "."$username"."! Sinh nhật của bạn đã qua mất rùi')</script>";
        }
           
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PeaShop - Trang chủ</title>
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>PeaShop</title>
</head>

<body>
    <header class="navigation">
        <nav class="navbar navbar-expand-lg  " id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    Pea<span>Shop</span>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample09">
                    <span class="fa fa-bars"></span>

                </button>


                <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown text-center">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown">Thống
                                kê</a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="about.php">Vùng miền</a></li>
                                <li><a class="dropdown-item" href="topCustomer.php">Top khách hàng</a></li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="typeCustomer.php">Phân loại khách hàng</a>
                        </li>


                        <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                    </ul>

                </div>
            </div>


        </nav>
    </header>

    <div class="main-wrapper ">

        <!-- Slide -->
        <div class="container-fluid ">
            <div id="carouselExampleIndicators" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="carousel_images rounded" src="./image/slide2.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="carousel_images rounded" src="./image/slide1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="carousel_images rounded" src="./image/slide3.jpg">
                    </div>
                </div>
                <a class="carousel-control-prev carousel-control-icon" href="#carouselExampleIndicators" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon "></span>
                </a>
                <a class="carousel-control-next carousel-control-icon" href="#carouselExampleIndicators" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon "></span>
                </a>
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

    </div>

</body>

</html>