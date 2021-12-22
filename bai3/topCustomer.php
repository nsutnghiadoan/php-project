<?php
    include "checklogin.php";
    include "connect.php";
    $sql ="SELECT id_customer, COUNT(id_order) FROM bill GROUP BY id_customer ORDER BY COUNT(id_order) DESC";
    $result = mysqli_query($conn,$sql);
    $topBill = array();
    $countBill = array();
    for($i=0;$i<4;$i++){
        $row = mysqli_fetch_array($result);
            $sql1 = "SELECT last_name FROM user WHERE id_customer='$row[0]'";
            $result1 = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_array($result1);
            $topBill[] = $row1[0]; 
            $countBill[] = $row[1];
            
    }
    $query ="SELECT id_customer, SUM(total_price) FROM bill GROUP BY id_customer ORDER BY SUM(total_price) DESC";
    $result2 = mysqli_query($conn,$query);
    $topPay = array();
    $totalPay = array();
    for($i=0;$i<4;$i++){
        $row2 = mysqli_fetch_array($result2);
            $sql3 = "SELECT last_name FROM user WHERE id_customer='$row2[0]'";
            $result3 = mysqli_query($conn,$sql3);
            $row3 = mysqli_fetch_array($result3);
            $topPay[] = $row3[0]; 
            $totalPay[] = $row2[1];
            
    }
        

   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PeaShop - Bài viết</title>
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>PeaShop</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Khách hàng', 'VND'],

            <?php

            include "customerChart.php";
            ?>

        ]);

        var options = {
            width: 800,
            legend: {
                position: 'none'
            },
            chart: {
                title: 'Thống kê chi tiêu của khách hàng',
            },
            axes: {
                y: {
                    0: {
                        side: 'top',
                        label: 'Số tiền đã chi '
                    } // Top x-axis.
                }
            },
            bar: {
                groupWidth: "40%"
            },

        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    };
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
                <li class="breadcrumb-item active" aria-current="page">Top khách hàng</li>
            </ol>
        </nav>
        <div class="container my-5">
            <div class="row">

                <div class="col-lg-5">
                    <h3>Bảng xếp hạng đơn hàng</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Tổng số đơn</th>
                                <th>Danh hiệu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $topBill[0]; ?></th>
                                <td><?php echo $countBill[0]; ?></td>
                                <td><img src="./image/goldmedal.png" width="30px"></td>
                            </tr>
                            <tr>
                                <th><?php echo $topBill[1]; ?></th>
                                <td><?php echo $countBill[1]; ?></td>
                                <td><img src="./image/silver-medal.png" width="30px"></td>
                            </tr>
                            <tr>
                                <th><?php echo $topBill[2]; ?></th>
                                <td><?php echo $countBill[2]; ?></td>
                                <td><img src="./image/bronze.png" width="30px"></td>
                            </tr>
                            <tr>
                                <th><?php echo $topBill[3]; ?></th>
                                <td><?php echo $countBill[3]; ?></td>
                                <td></td>
                            </tr>
                    </table>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <h3>Bảng xếp hạng chi tiêu</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Tổng số tiền</th>
                                <th>Danh hiệu</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><?php echo $topPay[0]; ?></th>
                                <td><?php echo $totalPay[0]; ?></td>
                                <td><img src="./image/goldmedal.png" width="30px"></td>
                            </tr>
                            <tr>
                                <th><?php echo $topPay[1]; ?></th>
                                <td><?php echo $totalPay[1]; ?></td>
                                <td><img src="./image/silver-medal.png" width="30px"></td>
                            </tr>
                            <tr>
                                <th><?php echo $topPay[2]; ?></th>
                                <td><?php echo $totalPay[2]; ?></td>
                                <td><img src="./image/bronze.png" width="30px"></td>
                            </tr>
                            <tr>
                                <th><?php echo $topPay[3]; ?></th>
                                <td><?php echo $totalPay[3]; ?></td>
                                <td></td>
                            </tr>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <div class="container">
        <div id="top_x_div" style="width: 800px; height: 600px;"></div>
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