<?php

include 'config/koneksi.php';
include 'config/base_url.php';

error_reporting(0);

session_start();


// CSRF
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}

if (isset($_SESSION['email'])) {

    // header("Location: berhasil_login.php");
    header('Location: ' . BASE_URL);
}

if (isset($_POST['login'])) {
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

    // var_dump($token . ' ' . $_SESSION['token']);
    if (!$token || $token !== $_SESSION['token']) {
        // return 405 http status code
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit;
    } else {
        // process the form
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        //cek user login 
        $cek_login = $mysqli->query("select * from users where email='$email'");
        $ktm_login = $cek_login->num_rows;
        $data_login = $cek_login->fetch_assoc();

        if ($ktm_login >= 1) {
            //login email tersedia
            //verify password 
            if (password_verify($password, $data_login['password'])) {
                echo "Login Berhasil";
                //silakan buat session dan redirect disini
                session_start();
                $_SESSION['email'] = $data_login['email'];
                $_SESSION['name'] = $data_login['name'];

                //redircet 
                $url = BASE_URL;
                header('Location: ' . $url);
            } else {
                echo "Login gagal, Silahkan coba lagi!";
            }
        } else {
            //login gagal, email tidak tersedia
            echo "Login gagal, Email tidak tersedia!";
        }

        $mysqli->close();
    }
}

?>

<?php include 'config/includeWithVariables.php'; ?>

<!doctype html>
<html class="no-js" lang="en">

<?php includeWithVariables('view/include/script_header.php', array('title' => 'Login')); ?>

<style>
    .card {
        border: none;
        height: 320px
    }

    .forms-inputs {
        position: relative
    }

    .forms-inputs span {
        position: absolute;
        top: -18px;
        left: 10px;
        background-color: #fff;
        padding: 5px 10px;
        font-size: 15px
    }

    .forms-inputs input {
        height: 50px;
        border: 2px solid #eee
    }

    .forms-inputs input:focus {
        box-shadow: none;
        outline: none;
        border: 2px solid #000
    }

    .btn {
        height: 50px
    }

    .success-data {
        display: flex;
        flex-direction: column
    }

    .bxs-badge-check {
        font-size: 90px
    }
</style>

<body>
    <?php include 'view/include/header.php'; ?>
    <div class="breadcrumbs-area bg-overlay-dark bg-9" id="paralax" style="padding:0;background-image: linear-gradient(rgba(255, 255, 255, 0.47) 68%, rgb(31, 32, 32) 100%), url(&quot;http://localhost/astar_investment/asset/img/banner/4.jpg&quot;); background-position: 50% 50%;">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mt-5 mb-5" style="background: white;border-radius:20px">
                    <div class="card px-5 py-5" id="form1">

                        <form action="" method="post">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                            <div class="form-data" v-if="!submitted">
                                <div class="forms-inputs mb-4"> <span>Email or username</span>
                                    <input autocomplete="off" type="text" v-model="email" class="form-control" v-on:blur="emailBlured = true" name="email">
                                    <div class="invalid-feedback">A valid email is required!</div>
                                </div>
                                <div class="forms-inputs mb-4"> <span>Password</span>
                                    <input autocomplete="off" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true" name="password">
                                    <div class="invalid-feedback">Password must be 8 character!</div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-dark w-100" name="login" value="login">Login</button>
                                </div>
                            </div>
                        </form>
                        <!-- <div class="success-data" v-else>
                        <div class="text-center d-flex flex-column"> <i class='bx bxs-badge-check'></i> <span class="text-center fs-1">You have been logged in <br> Successfully</span> </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'view/include/footer.php'; ?>


</body>

</html>