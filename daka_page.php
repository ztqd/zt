<!DOCTYPE HTML>
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
<body class="full-layout" style=""><!-- background-image: url('images/home.jpg');background-color:rgba(0,0,0, .5);background-size: cover; -->
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
          <ul class="nav navbar-nav">
            <li class="daka"><a href="daka_page.php">打卡</a></li>
            <li class="manager"><a href="manager.php">后台管理</a></li>
          </ul>
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
		<form>
			<div class="form-group col-lg-4 col-lg-offset-2">
				<button type="button" class="start btn btn-primary btn-lg col-lg-4">开始打卡<i class="glyphicon glyphicon-play"></i></button>
			</div>
			<div class="form-group col-lg-4 col-lg-offset-2">
				<button type="button" class="stop btn btn-primary btn-lg col-lg-4">结束打卡<i class="glyphicon glyphicon-stop"></i></button>
			</div>
		</form>
		<div class="today">今天已打卡：<span></span></div>
		<div class="all">本周已打卡：<span></span></div>
	</div>
</div>
<script type='text/javascript' src='style/jquery-3.0.0.min.js'></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/flat-ui.min.js"></script>
<script type='text/javascript' src='style/js/jquery.themepunch.plugins.min.js'></script>
<script type='text/javascript' src='style/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='style/js/jquery.fancybox.pack.js'></script>
<script type='text/javascript' src='style/js/scripts.js'></script>
<script type="text/javascript">
  $(function(){
  	$('.daka').addClass('active');
  });
</script>
</body>
</html>