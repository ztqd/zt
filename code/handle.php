<?php
header("content-type:text/html;charset=utf8");
require './lib/func_class.php';
//我要打卡
if (isset($_POST['bTime'])){
    //当beginTime存在时提醒用户先下线
        if (!empty($_COOKIE['beginTime'])) {
            echo '<script>alert(\'您当前账号还未下线,请先下线！\')</script>';
            echo '<script>window.location.href=\'demo.php?name='.$_SESSION['name'].'\'</script>';
        } else {
            //判断是否处于设定网络中登录
            $ip=getRealIp();//获取用户网络IP地址
            if ($ip=='127.0.0.1'){
                $getTime = date('Y-m-d H:i:s', time());
                $res=setcookie('beginTime', $getTime);
                if ($res) {
                    echo '<script>alert(\'已记录打卡起始时间！\')</script>';
                    echo '<script>window.location.href=\'demo.php\'</script>';
                }
            }else{
                echo '<script>alert(\'使用其他网络无效，请在团队网络下打卡！！\')</script>';
                echo '<script>window.location.href=\'demo.php\'</script>';
            }
        }
    }
//我要下线
if (isset($_POST['eTime'])){
    $endip=getRealIp();
    if ($endip=='127.0.0.1') {
        if (isset($_COOKIE['beginTime'])) {
            echo '<script>
            var end=confirm(\'确定下线？！！\')
            if(end){
                window.location.href=\'demo.php?end=1\';
            }else{
                window.location.href=\'demo.php\';
            }
          </script>';
        } else {
            echo '<script>alert(\'您还未打卡，请先打卡！\')</script>';
            echo '<script>window.location.href=\'demo.php\'</script>';
        }
    }
}
//退出
if (isset($_POST['exit'])) {
    session_destroy();
    header("location:../login.php");
}



