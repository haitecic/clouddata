<body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="font-size:17pt;font-family:SimHei" href=""><b>專案管理系統</b></a>
			</div>
			<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php
				if($username == null)
				{
				?>
					<li><a href="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/login">登入</a></li>
				<?php 
				}
				else
				{
				?>
					<li style="color:white;padding-left:14px;padding-top:14px">使用者：<?php echo $username;?></li>
					<li><a href="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/logout">登出</a></li>
				<?php
				}
				?>
			</ul>
			</div><!--/.nav-collapse -->
		</div>
    </div>

	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1 style="font-family:Meiryo">一鍵探索華創的無限</h1>
					<?php
					$attributes = array('class' => 'form-inline', 'role' => 'form');
					echo form_open('search_form_index', $attributes);
					?>
					  <div class="form-group">
					    <input type="text" style="width:300px" class="form-control" name="index_search_bar" placeholder="電動車,太陽能...">
					  </div>
					  <button type="submit" class="btn btn-warning btn-lg">搜尋</button>
					</form>					
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="<?php echo $img_location;?>/ipad-hand.png" alt=""><!---->
				</div><!-- /col-lg-6 -->
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>為何需要<br/>專案管理系統 ?</h1>
				<h3>搜尋洞見、創意整合、創造價值</h3>
			</div>
		</div><!-- /row -->
		
		<div class="row mt centered">
			<div class="col-lg-4">
				<img src="<?php echo $img_location;?>/ser01.png" width="180" alt="">
				<h4>1秒搜尋超過2,000個創意文件</h4>
				<p>「專案管理系統」主動收集網路文章、知識管理系統、以及各種創意資料來源，只要透過一個按鈕就可以搜尋。</p>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="<?php echo $img_location;?>/ser02.png" width="180" alt="">
				<h4>增加 30% 跨部門溝通效率</h4>
				<p>「專案管理系統」已整合不同部門的創意文件，便利部門間交換彼此的知識與檔案，增加溝通效率。</p>

			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="<?php echo $img_location;?>/ser03.png" width="180" alt="">
				<h4>將超過15GB↑的資料轉化決策</h4>
				<p>「專案管理系統」可以將大量的文件檔、試算表、簡報檔、影音自動轉換成統計報告，給您做最佳的決策參考。</p>

			</div><!--/col-lg-4 -->
		</div><!-- /row -->
	</div><!-- /container -->
	<hr>
	<p class="centered">Copyright© 2015 創意中心開發團隊, All Rights Reserved.</p>
	</div><!-- /container -->

