<html>
    <head>
        <title>登录</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
    <form action="" method="post">
        用户名: <input type="text" name="name">
        密  码: <input type="text" name="pwd">
        <input type="submit" value="登录" name="sub">
    </form>
    </body>
</html>
<?php
if (isset($_POST['sub'])) {
    if (empty($_POST['name'])||empty($_POST['pwd'])){
        echo '<script>alert(\'所填选项不能为空\')</script>';
    }else{
        $name=$_POST['name'];
        $pwd=$_POST['pwd'];
        $conn=mysqli_connect('127.0.0.1','root','root','zt_sign')or die("连接失败");
        mysqli_query($conn,"set names utf8");
        $sql="select name,pwd from userInfo where name='$name'";
        $res=mysqli_query($conn,$sql);//获取资源
        $num = mysqli_num_rows($res);//获取查询到的条数
        if ($num==0){
            echo '<script>alert(\'您还未注册！\')</script>';
        }else{
            $realPwd = mysqli_fetch_assoc($res)['pwd'];
            if ($realPwd==$pwd){
                session_start();
                $_SESSION['name']=$name;
                header("location:demo.php");
            }else{
                echo '<script>alert(\'密码错误\')</script>';
            }
        }
    }
}
?>
