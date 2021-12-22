<?php
    include 'connect.php';
    $this_id = $_GET['this_id'];
    $sql = "SELECT * FROM user WHERE id_customer= '$this_id'" ;
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    if(isset($_POST['edit_customer_pro'])){
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        
      $sql = "UPDATE user SET username='$username' , password='$password' , first_name = '$firstname', last_name='$lastname' ,
      dob='$dob' ,address='$address', phone_num='$phonenumber' WHERE id_customer='$this_id'";
       mysqli_query($conn,$sql);
        
    }
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
    <!-- <script src="main.js"></script> -->
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
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tùy chọn</li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách khách hàng</li>
                <li class="breadcrumb-item active" aria-current="page">Sửa thông tin khách hàng</li>
            </ol>
        </nav>
        <div class="title_listcustomer my-4 container">
            <div class="row">
                <h2>Sửa thông tin khách hàng : <?php echo $row['first_name'].' '.$row['last_name']; ?></h2>
            </div>

            <form method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Họ</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Họ"
                                value="<?php echo $row['first_name'] ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Tên"
                                value="<?php echo $row['last_name'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập"
                                value="<?php echo $row['username'] ?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu"
                                value="<?php echo $row['password'] ?>">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="dob" class="form-control" placeholder="Chọn ngày sinh"
                                value="<?php echo $row['dob'] ?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phonenumber" class="form-control" placeholder="Nhập số điện thoại"
                                value="<?php echo $row['phone_num'] ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Điền địa chỉ"
                        value="<?php echo $row['address'] ?>">
                </div>
                <button name="edit_customer_pro" class="btn btn-primary">Chỉnh sửa</button>
            </form>

        </div>



    </div>






</body>

</html>