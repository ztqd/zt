<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>知通团队</title>

<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../dist/css/flat-ui.min.css">
<link rel='stylesheet' href='../style.css' type='text/css' media='all' />
<link rel='stylesheet' href='../style/css/media-queries.css' type='text/css' media='all' />
<script type='text/javascript' src='../style/jquery.js'></script>
<script type='text/javascript' src='../style/jquery-migrate.min.js'></script>

</head>
    <body class="full-layout" style="">
        <div class="body-wrapper">
            <!-- 导航 -->
            <nav class="navbar navbar-inverse navbar-embossed navbar-fixed-top" role="navigation" style="margin-bottom: 0;border-radius: 0">
              <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">知通团队</a>
              </div>
              <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="" class="user-name">admin</a></li>
                  <li><a href="" class="">退出</a></li>
                </ul>
              </div>
              </div>
            </nav>
            <!-- 中间部分 -->
            <div style="margin-top: 60px;">
                <div class="inner light"> </div>
                <form action="handle.php" method="post">
                    <div class="form-group col-lg-4 col-lg-offset-1">
                        <input class="start btn btn-primary btn-lg" type="submit" name="bTime" value="^_^我要打卡！！">
                    </div>
                </form>
                <form action="handle.php" method="post">
                    <div class="form-group col-lg-4 col-lg-offset-2">
                        <input class="start btn btn-primary btn-lg" type="submit" name="eTime" value="T_T我要下线！！">
                    </div>
                </form>
                <form action="handle.php" method="post">
                    <div class="form-group col-lg-4 col-lg-offset-2">
                        <!-- <input class="start btn btn-info btn-lg col-lg-4" type="submit" name="exit" value="退出系统"> -->
                    </div>
                </form>
                <br>
                <p class="time_massage col-lg-12" style="text-align: center;"></p>
                <div class="alert alert-warning alert-dismissable col-lg-10 col-lg-offset-1" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">
                        &times;
                    </button>
                </div>
            </div>
        </div>
    <script type='text/javascript' src='../style/jquery-3.0.0.min.js'></script>
    </body>
</html>
<?php
header("content-type:text/html;charset=utf8");
date_default_timezone_set('PRC');
if (isset($_SESSION['name'])){
    echo $_SESSION['name']."登陆成功！"."<br/>";
}else{
    // echo '<script>alert(\'登录超时，请重新登录！\')</script>';
    // echo '<script>window.location.href=\'../login.php\'</script>';
}
if (isset($_COOKIE['beginTime'])) {
    echo '<script>
    $(".time_massage").text("您已开始打卡，本次起始时间为：'.$_COOKIE['beginTime'].'")</script>';
}
if (isset($_GET['end'])&&$_GET['end']==1){
    //记录打卡时间段
    $endTime=date('Y-m-d H:i:s', time());//终止时间
    $beginTime=$_COOKIE['beginTime'];//起始时间
    $resTip="本次打卡结束--开始时间：$beginTime 结束时间：$endTime 共计：";
    $thisTotal=getTime();//总时间
    $resTip.=$thisTotal;
    //插入数据库
    $name=$_SESSION['name'];//用户名
    $time=date("Y-m-d",time());//日期
    $conn=mysqli_connect('127.0.0.1','root','','zt_sign')or die(mysqli_error($conn));
    mysqli_query($conn, "set names utf8")or die(mysqli_error($conn));
    $sql="insert into signtime(name,time,beginTime,endTime,thisTotal)VALUES(\"$name\",\"$time\",\"$beginTime\",\"$endTime\",\"$thisTotal\")";
    $res=mysqli_query($conn, $sql)or die(mysqli_error($conn));
    //插入数据库失败推到用户打卡页面
    if ($res){
        setcookie('beginTime', '');
        echo '<script>
    // var res=alert(\''.$resTip.'！\');
        var res = $(".alert-warning").text("'.$resTip.'");
        $(".alert-warning").show();
    if(!res){
        window.location.href=\'demo.php\'
    }
    </script>';
    }else{
        echo '<script>alert(\'填写数据失败，请联系管理员！\')</script>';
        echo '<script>window.location.href=\'demo.php\'</script>';
    }

}
function getTime()
{
    $et = time();
    $bt = strtotime($_COOKIE['beginTime']);
    $timeStamp = $et - $bt;
    $H = floor($timeStamp / (60 * 60));
    $M=floor(($timeStamp-$H*3600)/60);
    $S=floor($timeStamp-3600*$H-60*$M);
    $str="$H:$M:$S ";
    return $str;
}
?>