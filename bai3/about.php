<?php
    include "checklogin.php";
    include "connect.php";
    $sql = "SELECT COUNT(id_customer) FROM user";
    $totalUsers = mysqli_query($conn,$sql);
    $total = mysqli_fetch_array($totalUsers);
    $sqlnorth = "SELECT * FROM user WHERE address IN ('Hà Nội', 'Hà Giang', 'Lào Cai','Yên Bái',' Điện Biên',' Cao Bằng',' Bắc Ninh','Hà Nam',' Hải Dương','Hải Phòng','Hưng Yên' )";
    $result1 = mysqli_query($conn,$sqlnorth);
    $northside =mysqli_num_rows($result1);
    $sqlsouth = "SELECT * FROM user WHERE address IN ('Đồng Nai','Cần Thơ', 'Bình Dương', 'Đà Lạt','Bình Phước','TP. Hồ Chí Minh','Tây Ninh','Vĩnh Long',' Đồng Tháp')";
    $result2 = mysqli_query($conn,$sqlsouth);
    $southside =mysqli_num_rows($result2);
    $sqlmiddle = "SELECT * FROM user WHERE address IN ('Nghệ An', 'Thanh Hóa','Hà Tĩnh' ,'Quảng Bình','Thừa Thiên Huế','Đà Nẵng','Quảng Trị ' )";
    $result3 = mysqli_query($conn,$sqlmiddle);
    $middleside =mysqli_num_rows($result3);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PeaShop - Số lượng khách</title>
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>

    <title>PeaShop</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Miền', 'Khách hàng'],
            <?php
                echo "['Miền Bắc' , $northside ],";
                echo "['Miền Trung' , $middleside ],";
                echo "['Miền Nam' , $southside ],";
            ?>
        ]);

        var options = {
            title: "Phân bố khách hàng theo vùng miền"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>


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
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Thống kê</li>
                <li class="breadcrumb-item active" aria-current="page">Vùng miền</li>
            </ol>
        </nav>

        <!-- Body -->

        <div class="container-fluid ">
            <div class="row">

                <div id="piechart" style="height:700px; width:1200px;"></div>


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