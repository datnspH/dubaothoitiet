<?php
session_start();
require_once './model/config.php';
$loi = "";
$id = $_SESSION['id'];
// Sẽ cần truy vấn -> cần biến $connect để thực thi -> require_once('db.php');
if (isset($_POST['btn']) == true) {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $newpassword_2 = $_POST['newpassword_1'];
    // $sql = "SELECT * FROM users WHERE password=?";
    // $statement = $connect->prepare($sql);
    // $statement->execute();
    $connection = new PDO("mysql:host=localhost;dbname=bee-blog;charset=utf8", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users where password = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$password]);
    //$users = getOne($query);
    if ($stmt->rowCount() == 0) {
        $loi .= "mật khẩu sai<br>";
    }
    if (strlen($newpassword < 6)) {
        $loi .= "mật khẩu quá ngắn";
    }
    if ($newpassword != $newpassword_2) {
        $loi .= "mật khẩu không trùng khớp";
    }

    if ($loi == "") {
        $sql = "UPDATE users SET password = ? WHERE id=$id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$newpassword]);
        echo '<script">alert("đã cập nhật")</script>';
    }
}
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto max-w-full text-[30px] px-10">
        <div class="header border-b drop-shadow-2xl">
            <div class="logo flex justify-between mb-10 ">
                <a href="../site/header.php"><img class=" rounded-full" src="../public/image/logo-bee-blog.png" alt=""
                        width="100px"></a>
                <!-- <a href=""><button>Đăng xuất</button></a>  -->
            </div>
        </div>
        <div class="grid grid-cols-4 ">
            <nav class="border-r">
                <ul class="  mt-20 ">
                    <div class="flex  hover:bg-blue-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                            class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                        <li class=""> <a href="./hdusser.php">Cài đặt chung </a></li>
                    </div>
                    <div class="flex  hover:bg-blue-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                            class="bi bi-card-heading" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                        </svg>
                        <li class="hover:bg-blue-300"><a href="./doimk.php">Mật Khẩu</a></li>
                    </div>
                    <div class="flex  hover:bg-blue-300 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <li class="hover:bg-blue-300"><a href="./thongtin.php">Thông tin cá nhân</a></li>
                    </div>
                </ul>
            </nav>
            <div class="col-span-3 border border-3 px-20">
                <h2>Thông tin cá nhân</h2>
                <small>quản lí thông tin cá nhân của bạn</small>
                <form action="" method="POST" class="pt-10 space-y-5">
                    <?php
                    if ($loi != "") { ?>
                    <div class="text-black"><?php echo $loi ?></div>
                    <?php  } ?>

                    <label for="">mật khẩu cũ</label><br>
                    <input type="password" class="border border-black" placeholder='password' name='password'><br>
                    <label for="">mật khẩu mới</label><br>
                    <input type="password" class="border border-black" placeholder='password' name='newpassword'><br>
                    <label for="">nhập lại mật khẩu</label><br>
                    <input type="password" class="border border-black" placeholder='password' name='newpassword_1'><br>
                    <a href=""> <button class="bg-blue-200 mt-10 border rounded-xl px-5 text-blue-500" type="submit"
                            name="btn"><strong> Thay đổi</button></a>

                </form>
            </div>
        </div>
        <section>
            <footer>

            </footer>
        </section>
    </div>
</body>

</html>