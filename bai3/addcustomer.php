<?php
    include "checklogin.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <title>PeaShop</title>

</head>

<body>
    <header class="navigation">
        <nav class="navbar navbar-expand-lg  " id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    Admin
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample09">
                    <span class="fa fa-bars"></span>

                </button>


                <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="listCustomer.php">Danh sách khách hàng</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact.php">Liên hệ khách hàng</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                    </ul>

                </div>
            </div>


        </nav>
    </header>
    <div class="main-wrapper ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tùy chọn</li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách khách hàng</li>
                <li class="breadcrumb-item active" aria-current="page">Thêm khách hàng</li>
            </ol>
        </nav>
        <div class="title_listcustomer my-4 container-fluid">


            <h2 class="text-center">Thêm khách hàng</h2>

        </div>
        <div class="container">

            <form method="post" id="add_customer">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Họ</label>
                            <input type="text" id="firstname" class="form-control" placeholder="Họ">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" id="lastname" class="form-control" placeholder="Tên">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" id="username" class="form-control" placeholder="Nhập tên đăng nhập">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" id="dob" class="form-control" placeholder="Chọn ngày sinh">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" id="phonenumber" class="form-control" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" id="address" class="form-control" placeholder="Điền địa chỉ">
                </div>

                <a type="button" class="btn btn-primary" id="button_add_customer" name="add_customer"><i
                        class="fa fa-plus"></i>
                    Thêm
                    khách hàng</a>

            </form>
        </div>
        <script type="text/javascript">
        $('#button_add_customer').on('click', function() {
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var dob = $('#dob').val();
            var address = $('#address').val();
            var phonenumber = $('#phonenumber').val();


            if (firstname == '' || lastname == '' || username == '' || password == '' || dob == '' ||
                phonenumber ==
                '' || address == '') {
                alert('Vui lòng điền đầy đủ thông tin!')
            } else {
                $.ajax({
                    url: "ajax_add_cus.php",
                    method: "POST",
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        username: username,
                        password: password,
                        dob: dob,
                        address: address,
                        phonenumber: phonenumber
                    },
                    success: function(data) {

                        alert('Thêm khách hàng thành công')
                        $('#add_customer')[0].reset();
                    }

                });
            }

        });
        </script>

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