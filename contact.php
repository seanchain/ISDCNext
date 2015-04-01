<!DOCTYPE html>
<html lang="en">
<head>
	<title>联系我们 四川大学信息安全与网络攻防协会</title>
	<?php require './header.inc.php' ?>
</head>

<body>
	<?php $_home_class='""';$_blog_class='""';$_game_class='""';$_train_class='""';$_about_class='"active dropdown"';require './navi.inc.php';?> 

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">
		<ol class="breadcrumb">
			<li>关于我们</a></li>
			<li class="active">联系我们</li>
		</ol>

		<div class="row">

			<br />
			<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <strong>Warning!</strong> 暂时还不能用
			</div>


			<!-- Article main content -->
			<article class="col-sm-9 maincontent">

				<header class="page-header">
					<h1 class="page-title">联系我们</h1>
				</header>
				
				<p>
					想提点意见什么的？尽管写下来吧！
				</p>
				<br>
					<form action="contact.php" method="post">
						<div class="row">
							<div class="col-sm-6">
								<input class="form-control" type="text" name="fname" id="fname" placeholder="姓名">
							</div>
							<div class="col-sm-6">
								<input class="form-control" type="text" name="email" id="email" placeholder="邮箱">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea name="message" id="message" placeholder="将你想说的都写下来吧" class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12 text-right">
								<input class="btn btn-action" type="submit" value="点击提交">
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>我们的微信：</h4>
					<p>
						<img alt="微信公众号" src="/assets/images/qrcode.jpg" />
					</p>
					<h4>我们的邮箱：</h4>
					<mail>
						info#scuisdc.com(将#替换成@)
					</mail>
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
</body>
<?php require './footer.inc.php' ?>
</html>