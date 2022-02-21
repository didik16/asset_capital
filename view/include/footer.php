 <?php

    include 'config/koneksi.php';

    // CSRF
    if (!isset($_SESSION['token'])) {
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    }

    if (isset($_POST['send'])) {

        $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

        // CHECK CSRF
        if (!$token || $token !== $_SESSION['token']) {
            // return 405 http status code
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            exit;
        } else {

            $email = $_POST['email'];

            //cek email subscribe
            $cek_email = $mysqli->query("select * from email_subscribe where email='$email'");
            $ktm_email = $cek_email->num_rows;
            $data_email = $cek_email->fetch_assoc();


            if ($ktm_email <= 0) {

                $insert = $mysqli->query("INSERT INTO email_subscribe (email)VALUES ('$email') ");

                if ($insert) {
                    setcookie('send_subscribe', 'berhasil', time() + 1, "/");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                } else {
                    setcookie('send_subscribe', 'gagal', time() + 1, "/");
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
            } else {
                setcookie('send_subscribe', 'email_ada', time() + 1, "/");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }
    }

    ?>

 <footer class="probootstrap-footer probootstrap-bg">
     <div class="container">
         <div class="row">
             <div class="col-md-4 probootstrap-animate">
                 <div class="probootstrap-footer-widget">
                     <h3>About Us</h3>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate ab minus illum quaerat maxime inventore Ea consequatur consectetur hic provident dolor ab aliquam eveniet alias</p>
                     <ul class="probootstrap-footer-social">
                         <li><a href="#"><i class="icon-twitter"></i></a></li>
                         <li><a href="#"><i class="icon-facebook"></i></a></li>
                         <li><a href="#"><i class="icon-github"></i></a></li>
                         <li><a href="#"><i class="icon-dribbble"></i></a></li>
                         <li><a href="#"><i class="icon-linkedin"></i></a></li>
                         <li><a href="#"><i class="icon-youtube"></i></a></li>
                     </ul>
                 </div>
             </div>

             <div class="col-md-4 probootstrap-animate">
                 <div class="probootstrap-footer-widget">
                     <h3>Contact Info</h3>
                     <ul class="probootstrap-contact-info">
                         <li><i class="icon-location2"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
                         <li><i class="icon-mail"></i><span>info@domain.com</span></li>
                         <li><i class="icon-phone2"></i><span>+123 456 7890</span></li>
                     </ul>

                 </div>
             </div>

             <div class="col-md-4 probootstrap-animate">
                 <div class="probootstrap-footer-widget">
                     <h3>Donation</h3>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit omnis nam obcaecati placeat. Repellendus omnis in praesentium molestiae rem eligendi.</p>
                     <p><a href="#" class="btn btn-primary">Donate Now</a></p>
                 </div>
             </div>

         </div>
         <!-- END row -->

     </div>

     <div class="probootstrap-copyright">
         <div class="container">
             <div class="row">
                 <div class="col-md-8 text-left">
                     <p>&copy; 2017 <a href="https://uicookies.com/">uiCookies:Charity</a>. All Rights Reserved. Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://uicookies.com/">uicookies.com</a></p>
                 </div>
                 <div class="col-md-4 probootstrap-back-to-top">
                     <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
                 </div>
             </div>
         </div>
     </div>
 </footer>

 <script src="<?php echo ASSET_URL ?>js/scripts.min.js"></script>
 <script src="<?php echo ASSET_URL ?>js/main.min.js"></script>
 <script src="<?php echo ASSET_URL ?>js/custom.js"></script>