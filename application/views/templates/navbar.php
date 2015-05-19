<body onmouseover="user_behavior_log('body')">
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2 ">
				<a href="<?php echo site_url().'project_list'?>" style="font-family: Adobe 繁黑體 Std;" onclick="user_behavior_log('logo')">專案管理系統</a>
			</div>
			<?php
			$attributes = array('id' => 'project_search_form', 'name'=>'project_search_form');
			echo form_open('project_list', $attributes);
			?>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4" style="margin-top:10px">
						<div id="search">
							<input id="search_bar" style="width:400px" type="text" placeholder="search" name="search_bar" value="<?php 
							if(isset($search) && !empty($search))
							{
								echo $search;
							}
							?>"/>
							<input id="search_bar_hidden" type="hidden" value="<?php 
							if(isset($search) && !empty($search))
							{
								echo $search;
							}
							?>"/>
							<i class="fa fa-search" onclick="start_search()"></i>
						</div>
					</div>
					<div style="text-align:right;margin-right:23px;" ><span style="color:#ffffff">使用者：<?php echo $username;?></span><span id="logout" onclick="user_behavior_log('logout')"><?php echo anchor("login", "登出",'style="margin-left:15px;color:#ffffff;"');?></span></div>
					<input id="user_id" type="hidden" value="<?php echo $user_id?>"/>
				</div>				
			</div>
			</form>
		</div>
		<!--<div style="text-align:right;color:#ffffff;float:left;magin-left:100px" >使用者：<?php echo $username;?></div>-->
		<!--<div style="text-align:right;margin-right:10px" ><span style="color:#ffffff">使用者：<?php echo $username;?></span><span><?php echo anchor("login", "登出",'style="margin-left:15px;color:#ffffff;"');?></span></div>-->
	</div>	
</header>
<script>
function start_search()
{
	document.getElementById("search_bar_hidden").value = document.getElementById("search_bar").value;
	user_behavior_log('search_bar');
	document.project_search_form.submit();	
}

$("#search_bar").keypress(function(event){   
	document.getElementById("search_bar_hidden").value = document.getElementById("search_bar").value; 
	user_behavior_log('search_bar');	
    if (event.keyCode == 13) 
		$("#project_search_form").submit();
});
</script>
<!--End Header-->