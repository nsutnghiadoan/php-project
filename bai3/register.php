<?php
    include "connect.php";
    include "ajax_add_cus.php";
    
    if(isset($_POST['firstname'])){
        header('Location: login.php');
    }
?>



<!doctype html>
<html lang="en">

<head>
    <title>PeaShop - Đăng Ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
    <p style=" font-size: 40px; " class=" text-center my-5">Đăng Ký</p>
    <div class="container">

        <form action="register.php" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Họ</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Họ">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Tên">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" name="dob" class="form-control" placeholder="Chọn ngày sinh">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="phonenumber" class="form-control" placeholder="Nhập số điện thoại">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Điền địa chỉ">
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-primary "><a href="register.php"
                        class="btn_cancel_register">Hủy</a></button>
                <button type="submit" class="btn btn-success" name="register">Đăng ký</button>
            </div>
        </form>
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