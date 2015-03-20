<!--專案管理功能選單-->		
<div class="navbar_side" style="clear:left">	
	<ul class="menu">
        <!--<li class="mainTitle"><span id="main_01_btn">組織&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="arrow_01">▼</div></span>
			<ul class="subMenu">
				<li><a href="#" class="main_01_01_btn">內部部門組別</a></li>
				<li><a href="#" class="main_01_02_btn">外部組織單位</a></li>
			</ul>
        </li>-->
		<li class="mainTitle" id="main_01_btn"><a href="#">合作組織</a></li>
        <li class="mainTitle" id="main_02_btn"><a href="#">情境需求</a></li>
		<li class="mainTitle" id="function_structure"><a href="#">功能構想</a></li>
		<li class="mainTitle"><span id="main_06_btn">評估<div class="arrow_01">▼</div></span>
			<ul class="subMenu">
				<!--<li id="function_structure"><a href="#">功能構想</a></li>-->	
				<li id="feasibility_btn" <?php if(count($all_functions) > 0){echo ' style="display:none"';}?>><a href="#">初步可行性</a></li>
				<?php			
				$i=0;
				while($i < count($all_functions))
				{
				?>
					<li id="main_6_<?php echo $i;?>_btn"><a href="#"><?php echo $all_functions[$i]['function_name'];?></a></li>
				<?php
					$i++;
				}
				?>
			</ul>
        </li>
        <li class="mainTitle" id="main_03_btn"><a href="#">差異化</a></li>
        <li class="mainTitle" id="main_04_btn"><a href="#">價值性</a></li> 
        <!--<li class="mainTitle" id="main_05_btn"><a href="#">初步可行性</a></li>-->         
        <li class="mainTitle" id="main_07_btn"><a href="#">導入車型</a></li>  
	</ul>
</div>
<!--專案管理內容-->
<!--<div style="float:left">-->
<div class="content_bg" style="padding-left:220px">
<!--顯示資料新增成功訊息-->
<?php 
if(!empty($message))
{
	switch($message)
	{
		case "create":
			$message = "資料新增成功!";
			break;
		case "edit":
			$message = "資料編輯成功!";
			break;
	}		
?>
	<div style="width:100%; text-align:center; color:blue; font-size:14pt"><?php echo $message;?></div>
<?php
}
?>
    <div id="main_01_01" class="main_01_01"><!-- -->
        <div class="main_title">合作組織</div>
        <div class="main_line"></div> 		
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">內部部門組別</span>
        <table class="datalist" id="oTable">
            <tr>
                <th>功能項目</th>
                <th>部門</th>
                <th>組別</th>
                <th>擔當</th>
                <th>分機</th>
                <th>手機</th>
                <th>備註</th>
            </tr>
			<?php 
			foreach($relative_organizations as $organiztion)
			{
				if($organiztion['unit_class'] == 4)
				{			
			?>
				<tr>
					<td><?php if(!empty($organiztion['function_name'])){echo $organiztion['function_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['org_name'])){echo $organiztion['org_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['dep_name'])){echo $organiztion['dep_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['pm'])){echo $organiztion['pm'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['phone_firm'])){echo $organiztion['phone_firm'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['phone_mobile'])){echo $organiztion['phone_mobile'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['memo'])){echo $organiztion['memo'];} else { echo "--";}?></td>
				</tr>
			<?php
				}
			}
			?>
        </table>
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">外部組織單位</span>
		<table class="datalist" id="oTable">
            <tr>
                <th>功能項目</th>
                <th>組織</th>
                <th>部門</th>
                <th>擔當</th>
                <th>分機</th>
                <th>手機</th>
                <th>備註</th>
            </tr>
            <?php 
			foreach($relative_organizations as $organiztion)
			{
				if($organiztion['unit_class'] == 1 || $organiztion['unit_class'] == 2 || $organiztion['unit_class'] == 3)
				{			
			?>
				<tr>
					<td><?php if(!empty($organiztion['function_name'])){echo $organiztion['function_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['org_name'])){echo $organiztion['org_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['dep_name'])){echo $organiztion['dep_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['pm'])){echo $organiztion['pm'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['phone_firm'])){echo $organiztion['phone_firm'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['phone_mobile'])){echo $organiztion['phone_mobile'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['memo'])){echo $organiztion['memo'];} else { echo "--";}?></td>
				</tr>
			<?php
				}
			}
			?>
        </table>
    </div>
   <!-- <div id="main_01_02" class="main_01_02">
        <div class="main_title">組織&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;外部組織單位</div>
        <div class="main_line"></div>    

        <table class="datalist" id="oTable">
            <tr>
                <th>系統部品</th>
                <th>組織</th>
                <th>汽車事業部</th>
                <th>擔當</th>
                <th>分機</th>
                <th>手機</th>
                <th>備註</th>
            </tr>
            <?php 
			foreach($relative_organizations as $organiztion)
			{
				if($organiztion['unit_class'] == 1 || $organiztion['unit_class'] == 2 || $organiztion['unit_class'] == 3)
				{			
			?>
				<tr>
					<td><?php if(!empty($organiztion['function_name'])){echo $organiztion['function_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['org_name'])){echo $organiztion['org_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['dep_name'])){echo $organiztion['dep_name'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['pm'])){echo $organiztion['pm'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['phone_firm'])){echo $organiztion['phone_firm'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['phone_mobile'])){echo $organiztion['phone_mobile'];} else { echo "--";}?></td>
					<td><?php if(!empty($organiztion['memo'])){echo $organiztion['memo'];} else { echo "--";}?></td>
				</tr>
			<?php
				}
			}
			?>
        </table>
    </div>-->
    <div class="main_02">
        <div class="main_title">情境需求</div>
        <div class="main_line"></div><!--主題與內容的分隔線-->
        <?php if(!empty($record['senario'])){ echo $record['senario'];} else{ echo "--";} ?>
    </div>
    <div class="main_03">
        <div class="main_title">差異化</div>
        <div class="main_line"></div>    
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">市場差異化</span>
        <p class="content"><?php if(!empty($record['distinction_market'])){ echo $record['distinction_market'];} else{  echo"--";} ?></p>
        <img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">KM差異化</span>
        <p class="content"><?php if(!empty($record['distinction_km'])){ echo $record['distinction_km'];} else{  echo"--";} ?></p>
	</div>
    <div class="main_04">
        <div class="main_title">價值性</div>
        <div class="main_line"></div>    
        <?php if(!empty($record['value'])){ echo $record['value'];}else{ echo "--";} ?>
    </div>        
	<div id="fun_structure">
        <div class="main_title">功能構想</div>
        <div class="main_line"></div>
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">功能描述</span>
        <p class="content"><?php if(!empty($record['feature_introduction'])){ echo $record['feature_introduction'];} else{  echo"--";} ?></p>
        <img src="<?php echo $img_location ?>/arrow.png">
        <span class="subtitle">系統架構</span>
		<p style="margin-left:25px">
		<?php
		if(empty($all_functions))
		{
			echo "<br/>--";
		}
		?>
		</p>
		<div id="accordion" style="margin-left:20px;margin-right:25px">
			<?php 
			foreach($all_functions as $function)
			{
			?>
				<h3><?php echo $function['function_name'];?></h3>
				<div>
					<p><?php echo $function['function_specification'];?></p>
				</div>				
			<?php
			}
			?>
		</div> 
		<script>
			$( "#accordion" ).accordion();
		</script>	
	</div>
	<div id="initial_feasibility">
        <div class="main_title">初步可行性評估</div>
        <div class="main_line"></div> 
		<?php if(!empty($record['feasibility'])){ echo $record['feasibility'];}else{ echo "--";} ?>
    </div>
	<?php			
	$i=0;
	while($i < count($all_functions))
	{
	?>
		<!--<div id="main_6_<?php //echo ($i+2);?>">-->
		<div id="main_6_<?php echo $i;?>">
			<div class="main_title">評估&nbsp;&nbsp;&nbsp;＞&nbsp;&nbsp;&nbsp;<?php echo $all_functions[$i]['function_name'];?></div>
			<div class="main_line"></div> 			
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">需求規格</span>
			<p class="content"><?php echo $all_functions[$i]['function_specification'];?></p>        
			<img src="<?php echo $img_location ?>/arrow.png">
			<span class="subtitle">評估項目</span>
			<?php 
			if(file_exists("application/assets/project". $all_functions[$i]['rule_restriction']))
			{
				$text_rule=file_get_contents($project_location. $all_functions[$i]['rule_restriction']); 
				$text_rule=str_replace('$project_location',$project_location,$text_rule);
			}
			else
			{
				$text_rule="";
			}
			if(file_exists("application/assets/project". $all_functions[$i]['tech_restriction']))
			{
				$text_tech=file_get_contents($project_location. $all_functions[$i]['tech_restriction']); 
				$text_tech=str_replace('$project_location',$project_location,$text_tech);
			}
			else
			{
				$text_tech="";					
			}
			if(file_exists("application/assets/project". $all_functions[$i]['patent_restriction']))
			{
				$text_patent=file_get_contents($project_location. $all_functions[$i]['patent_restriction']); 
				$text_patent=str_replace('$project_location',$project_location,$text_patent);
			}
			else
			{
				$text_patent="";					
			}		
			?>
			
			<div id="tabs" style="margin-right:20px">
			<ul style="height:38px;font-size:12pt">
				<li><a href="#tabs-1">法規限制</a></li>
				<li><a href="#tabs-2">技術限制</a></li>
				<li><a href="#tabs-3">專利限制</a></li>
				<li><a href="#tabs-4">功能原型</a></li>
				<li><a href="#tabs-5">量產原型</a></li>
			</ul>
			<div id="tabs-1" style="min-height:200px">
				<p><?php echo $text_rule;?></p>
			</div>
			<div id="tabs-2" style="min-height:200px">
				<p><?php echo $text_tech;?></p>
			</div>
			<div id="tabs-3" style="min-height:200px">
				<?php echo $text_patent;?>
			</div>
			<div id="tabs-4" style="line-height:30px;min-height:200px">
				設計開發：<?php if(!empty($all_functions[$i]['fp_design_dev'])){echo $all_functions[$i]['fp_design_dev'];} else{ echo "--";}?><br/>
				驗證：<?php if(!empty($all_functions[$i]['fp_validation'])){echo $all_functions[$i]['fp_validation'];} else{ echo "--";}?><br/>
				試作件：<?php if(!empty($all_functions[$i]['fp_validation'])){echo $all_functions[$i]['fp_sample'];} else{ echo "--";}?><br/>
				時程：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_design_dev'];} else{ echo "--";}?><br/>			
			</div>
			<div id="tabs-5" style="line-height:30px;min-height:200px">
				設計開發：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_design_dev'];} else{ echo "--";}?><br/>
				模具：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_mold'];} else{ echo "--";}?><br/>
				治具：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_jig'];} else{ echo "--";}?><br/>
				檢具：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_gauge'];} else{ echo "--";}?><br/>
				驗證：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_validation'];} else{ echo "--";}?><br/>
				預計產量：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_quantity'];} else{ echo "--";}?><br/>
				時程：<?php if(!empty($all_functions[$i]['pp_design_dev'])){echo $all_functions[$i]['pp_delivery'];} else{ echo "--";}?><br/>
			</div>
			</div>			       
		</div>
	<?php
		$i++;
	}
	?>	    
	<div id="main_07">
        <div class="main_title">導入車型</div>
        <div class="main_line"></div> 
        <?php if(!empty($record['car_model'])){echo $record['car_model'];} else {echo "--";} ?>
    </div>
</div>

	<script type="text/javascript">
	<?php 
	$i=0;
	while($i < count($all_functions))
	{
	?>
		$( "#main_6_<?php echo $i;?> > #tabs" ).tabs();
	<?php
		$i++;
	}
	?>
	</script>