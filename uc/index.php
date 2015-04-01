<!DOCTYPE html>

<html lang="en">
<title>邮件系统 四川大学信息安全与网络攻防协会</title>
<?php
	require('../header.inc.php');
	$_home_class='""';$_blog_class='""';$_game_class='""';$_train_class='"active"';$_about_class='"dropdown"';
	require_once('../navi.inc.php');
?>

<header id="head" class="secondary"></header>
<body>

	<div class="container">
		<ol class="breadcrumb">
				<li>邮件系统</a></li>
				<li class="active">登录</li>
		</ol>
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">登录</h1>
				</header>

				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">ISDC邮件系统 测试版</h3>
							<p class="text-center text-muted">邮件系统测试中<br />有问题请联系管理员</p>
							<hr />

							<form action="auth.php" method="post" name="form" id="form" class="form-horizontal" role="form">
							  <div class="form-group">
							    <label for="inputUsername" class="col-sm-2 control-label">用户名</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="userid" name="userid" placeholder="User Name">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="inputPassword" class="col-sm-2 control-label">密码</label>
							    <div class="col-sm-10">
							      <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="checkCode" class="col-sm-2 control-label"><img name="checkcode" src = "b.php" onclick="this.src='b.php?aa='+Math.random()"/></label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="checkCode" name="checkCode" placeholder="Check Code">
							    </div>
							  </div>
							  <hr />
							  <div class="form-group text-center">
							      <button type="submit" class="btn btn-action">登录</button>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>

	<?php
	require_once('../footer.inc.php');
	?>
</body>
</html>
