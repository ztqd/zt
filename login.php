<?php
//登录
if (isset($_POST['sub'])) {
    if (empty($_POST['name'])||empty($_POST['pwd'])){
        echo '<script>alert(\'所填选项不能为空\')</script>';
    }else{
        $name=$_POST['name'];
        $pwd=$_POST['pwd'];
        $conn=mysqli_connect('127.0.0.1','root','','zt_sign')or die("连接失败");
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
                header("location:./code/demo.php");
            }else{
                echo '<script>alert(\'密码错误\')</script>';
            }
        }
        mysqli_close($conn);
    }
}
//注册
if (isset($_POST['subRegister'])) {
    $name = $_POST['name'];$major=$_POST['major'];$group=$_POST['groupName'];
    $phoneNum=$_POST['phoneNum'];$qqNum=$_POST['qqNum'];$pwd=$_POST['pwd'];
    $conn=mysqli_connect('127.0.0.1','root','','zt_sign');
    mysqli_query($conn, "set names utf8");
    $sqlInsert="insert into userInfo(name,major,groupName,phoneNum,qqNum,pwd)values(
        \"$name\",\"$major\",\"$group\",\"$phoneNum\",\"$qqNum\",\"$pwd\")";
    $sqlCheck="select * from userinfo where name=\"$name\"";
    $res1=mysqli_query($conn, $sqlCheck);
    $num=mysqli_num_rows($res1);
    //先判用户是否注册过，在进行注册
    if ($num==1){
        echo '<script>alert(\'注册失败，该用户名已注册过，请直接登录！\')</script>';
    }else{
        $res2=mysqli_query($conn,$sqlInsert);
        if ($res2) {
            echo '<script>alert(\'注册成功，请登录！\')</script>';
        }else{
            echo '<script>alert(\'注册失败，请重新注册！\')</script>';
        }
    }

}
?>

<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>知通团队</title>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/flat-ui.min.css">
<link rel='stylesheet' href='style.css' type='text/css' media='all' />
<link rel='stylesheet' href='style/css/media-queries.css' type='text/css' media='all' />
<script type='text/javascript' src='style/jquery.js'></script>
<script type='text/javascript' src='style/jquery-migrate.min.js'></script>
</head>
<body class="full-layout" style="background-image: url('images/home.jpg');background-color:rgba(0,0,0, .5);background-size: cover;">
  <!-- <div class="body-wrapper">  -->
      <div id="synopsis" class="col-lg-12 col-xs-12" style="background-attachment: fixed;background-repeat: repeat;padding: 0">
        <!-- <div class="inner light"> </div> -->
        <!-- 登录  -->
        <form action="" method="post">
          <div id="login" class="col-lg-12 col-xs-12"> <!-- style="background: rgba(0,0,0, .5);" -->
            <div class="inner light"> </div>
            <h3 class="text-center" style="color: #fff;font-weight: normal;"><i class="glyphicon glyphicon-leaf" style="color: #69AA46; margin-right: 10px; top: 3px;"></i>登录网站</h3>
            <div class="login-form col-lg-4 col-lg-offset-4 col-xs-12" style="box-shadow: 0 0 3px #333;margin-bottom: 50px;margin-top: 10px;">
              <div class="form-group">
                <label>用户名</label>
                <input class="form-control login-field" name="name" placeholder="用户名" required="" type="text">
              </div>
              <div class="form-group">
                <label>密码</label><a href="" class="pull-right">忘记密码？</a>
                <input class="form-control login-field" name="pwd" placeholder="密码" required="" type="password">
              </div>
              <div class="form-group">
                <input class="login_btn form-control login-field btn btn-primary btn-lg btn-block" style="color: #fff;" value="登录" type="submit" name="sub"/>
              </div>
              <div class="form-group">
                <a class="user_lg pull-right">
                  没有账号？注册
                  <i class="glyphicon glyphicon-hand-right"></i>
                </a>
              </div>
            </div>
          </div>
        </form>
        <!-- 注册 -->
      <form action="" method="post">
        <div id="register" class="col-lg-12 col-xs-12" style="display: none;">
          <div class="inner light"> </div>
          <h3 class="text-center" style="color: #fff;font-weight: normal;"><i class="glyphicon glyphicon-leaf" style="color: #69AA46; margin-right: 10px; top: 3px;"></i>注册用户</h3>
          <div class="login-form col-lg-4 col-lg-offset-4 col-xs-12" style="box-shadow: 0 0 3px #333;margin-bottom: 50px;margin-top: 10px;">
            <div class="form-group">
              <a class="user_reg">
                登录
                <i class="glyphicon glyphicon-hand-left"></i>
              </a>
            </div>
            <div class="form-group">
              <label>姓名</label>
              <input class="form-control login-field" name="name" placeholder="姓名" required="" type="text">
            </div>
            <div class="form-group">
              <label>班级</label>
              <input class="form-control login-field" name="major" placeholder="xx专业11-1班" required="" type="text">
            </div>
            <div class="form-group">
              <label>组别</label>
                <select name="groupName" class="form-control login-field">
                    <option value="前端">前端</option>
                    <option value="PHP">PHP</option>
                    <option value="JAVA">JAVA</option>
                </select>
            </div>
            <div class="form-group">
              <label>手机号</label>
              <input class="form-control login-field" name="phoneNum" placeholder="手机号" required="" type="text">
            </div>
            <div class="form-group">
              <label>QQ号</label>
              <input class="form-control login-field" name="qqNum" placeholder="QQ号" required="" type="text">
            </div>
            <div class="form-group">
                <label>设置密码</label>
                <input class="form-control login-field pwd" name="pwd" placeholder="设置密码" required="" type="password">
            </div>
            <div class="form-group">
                <label>重复密码</label>
                <a class="pull-right hide">*两次密码不一致</a>
                <input class="form-control login-field confPwd" name="confPwd" placeholder="重复密码" required="" type="password">
            </div>
            <div class="form-group">
              <label></label>
              <input type="submit" class="submit form-control login-field btn btn-primary btn-lg btn-block" value="报名"  name="subRegister"style="color: #fff;"/>
            </div>
          </div>
          <!-- </div> -->
        </div>
      </div>
  </form>
  <!-- </div> -->
<script type='text/javascript' src='style/jquery-3.0.0.min.js'></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/flat-ui.min.js"></script>
<script type="text/javascript">
  $(function(){
    //判断浏览器
    mozilla = /firefox/.test(navigator.userAgent.toLowerCase());
    webkit = /webkit/.test(navigator.userAgent.toLowerCase());
    opera = /opera/.test(navigator.userAgent.toLowerCase());
    msie = /msie/.test(navigator.userAgent.toLowerCase());
    var li = $('.navbar-nav:first-child li');
    body = webkit?'body':'html';
    //登录注册切换
    $('.user_lg').click(function(){
      $('#login').hide();
      $('#register').show();
    });
    $('.user_reg').click(function(){
      $('#register').hide();
      $('#login').show();
    });

    $('.submit').click(function(){
      if($('.pwd').val() != $('.confPwd').val()){
        $('.confPwd').siblings('a').removeClass('hide');
        return false;
      }
    });
  });
</script>
</body>
</html>

