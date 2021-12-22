<?php
   use PHPMailer\PHPMailer\PHPMailer;
    if(isset($_POST['register1'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];
         require_once "Mailer/PHPMailer.php";
        require_once "Mailer/Exception.php";
        require_once "Mailer/SMTP.php";
  
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'nghiadoan2k@gmail.com';                    
        $mail->Password   = 'Nghia08021963';                            
        $mail->SMTPSecure = "ssl";       
        $mail->Port       = 465;                                 
        $mail->setFrom('nghiadoan2k@gmail.com','Nghia Doan');
        $mail->addAddress($email,$name);   
         $mail->isHTML(true);                                 
        $mail->Subject = $subject;
        $mail->Body    = $body;
    

        if($mail->send()){
            echo '<script>alert("Đã gửi thành công")</script>';
        }else{
            echo '<script>alert("Lỗi gửi mail")</script>';
        }
       
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PeaShop - Liên hệ</title>
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

        <!-- Contact Form -->

        <h2 class="h1-responsive font-weight-bold text-center my-4">Liên hệ</h2> <br><br>
        <div class="container">
            <form method="post">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input type="text" name="name" class="form-control" placeholder="Tên khách hàng">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email khách hàng">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Chủ đề</label>
                            <input type="text" name="subject" class="form-control" placeholder="Nhập chủ đề">
                        </div>

                    </div>


                </div>



                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea type="text" name="body" class="form-control" placeholder="Nội dung" rows="5"></textarea>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-success" name="register1">Gửi</button>
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

    </div>

</body>

</html>