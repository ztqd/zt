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
	<link rel="stylesheet" href="style/css/jquery.dataTables.min.css">
<script type='text/javascript' src='style/jquery-migrate.min.js'></script>
	<style type="text/css">
		#example tr>td{
			text-align: center;
		}
		.dataTables_scrollHead thead th {
			text-align: center !important;
		}
		td:first-child{
			color: #1abc9c;
		}
		/*#example_filter */
	</style>
</head>
<body class="full-layout" style="background: #fff">
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
	          <li><a href="" class="user-name"><? echo $_SESSION['name'] ?></a></li>
            <li><a class="exit">退出</a></li>
	        </ul>
	      </div>
	      </div>
	  </nav>
		<!-- 中间部分 -->
	  <div style="margin-top: 60px;">
	  <!-- <div class="inner light"> </div> -->
			<div class="" style="margin-top: 90px;">
				<table id="example" class="display" cellspacing="0" width="">
					<thead>
						<tr style="height: 45px;">
							<th>姓名</th>
							<th>组别</th>
							<th>日期</th>
							<th>开始时间</th>
							<th>结束时间</th>
							<th>计时总计</th>
							<th>备注</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="style/js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="dist/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="style/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.manager').addClass('active');
			$('#example').DataTable( {
				"ajax": "datatable.json",
				"bInfo" : false,
				"bSort" : true,
				"sScrollX" : 500,
				"bAutoWidth" : true,
				"iDisplayLength" : 6,
				"oLanguage": { //国际化配置  
                "sProcessing" : "正在获取数据，请稍后...",    
                "sLengthMenu" : "显示 _MENU_ 条",    
                "sZeroRecords" : "没有您要搜索的内容",    
                "sInfo" : "从 _START_ 到  _END_ 条记录 总记录数为 _TOTAL_ 条",    
                "sInfoEmpty" : "记录数为0",    
                "sInfoFiltered" : "(全部记录数 _MAX_ 条)",    
                "sInfoPostFix" : "",    
                "sSearch" : "",    
                "sUrl" : "",    
                "oPaginate": {    
                    "sFirst" : "第一页",    
                    "sPrevious" : "上一页",    
                    "sNext" : "下一页",    
                    "sLast" : "最后一页"    
                }  
          },
      "fnInitComplete":function(oSettings, json) {
      	$("#example_filter").addClass('col-lg-2 form-group');
      	$("#example_filter input").addClass('col-lg-2 form-control');
      }
			});
		$('#example_length').remove();
		});
	</script>
</body>
</html>