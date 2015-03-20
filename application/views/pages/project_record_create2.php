<!--新增專案紀錄-->
<script language="Javascript" type="text/javascript">
	function add_outer_org_input_field()
	{
		var outer_next_display_id;
		outer_next_display_id = document.getElementById("outer_current_display").value;
		if(outer_next_display_id >= 20)
		{
			alert("至多只能新增十筆外部組織單位資料!");
		}
		//document.getElementById("outer_org_" + outer_next_display_id).style.display = "inline";  //顯示下一個輸入欄位
		document.getElementById("outer_current_display").value = (parseInt(outer_next_display_id)+1);
		$("#outer_org_" + outer_next_display_id).slideDown(500);
	}
	function add_inner_dep_input_field()
	{
		var inner_next_display_id;			
		inner_next_display_id = document.getElementById("inner_current_display").value;
		if(inner_next_display_id >= 10)
		{
			alert("至多只能新增十筆內部部門組別資料!");
		}		
		//document.getElementById("inner_org_" + inner_next_display_id).style.display = "inline";  //顯示下一個輸入欄位
		document.getElementById("inner_current_display").value = (parseInt(inner_next_display_id)+1);
		$("#inner_org_" + inner_next_display_id).slideDown(500);
	}
	function add_function_input_field()
	{
		var next_display_id;
		next_display_id = document.getElementById("function_current_display").value;
		if(next_display_id >= 10)
		{
			alert("至多只能新增十項功能資料!");
		}
		//document.getElementById("function_" + next_display_id).style.display = "inline";  //顯示下一個輸入欄位
		//document.getElementById("fsc_" + next_display_id).style.display = "inline";  //顯示下一個輸入欄位
		document.getElementById("function_current_display").value = (parseInt(next_display_id)+1);
		document.getElementById("function_count").value = parseInt(document.getElementById("function_count").value)+1;
		$("#function_" + next_display_id).slideDown(500);
	}
	function delete_outer_org_input_field(delete_item_id)
	{
		document.getElementById("org_name_" + delete_item_id).value = ''; 
		document.getElementById("dep_name_" + delete_item_id).value = '';
		document.getElementById("pm_" + delete_item_id).value = '';
		document.getElementById("phone_firm_" + delete_item_id).value = '';
		document.getElementById("phone_mobile_" + delete_item_id).value = '';
		//document.getElementById("outer_org_" + delete_item_id).style.display = "none";
		$("#outer_org_" + delete_item_id).slideUp(500);
	}
	function delete_inner_dep_input_field(delete_item_id)
	{				
		document.getElementById("org_name_" + delete_item_id).value = '';
		document.getElementById("dep_name_" + delete_item_id).value = '';
		document.getElementById("pm_" + delete_item_id).value = '';			
		document.getElementById("phone_firm_" + delete_item_id).value = '';
		document.getElementById("phone_mobile_" + delete_item_id).value = '';
		//document.getElementById("inner_org_" + delete_item_id).style.display = "none";
		$("#inner_org_" + delete_item_id).slideUp(500);
	}
	function delete_function_input_field(delete_item_id)
	{	
		var function_count = document.getElementById("function_count").value;	
		//document.getElementById("function_" + delete_item_id).style.display = "none";
		$("#function_" + delete_item_id).slideUp(500);
		document.getElementById("function_name_" + delete_item_id).value = '';	
		document.getElementById("function_specification_" + delete_item_id).value = '';		
		document.getElementById("estimate_" + delete_item_id + "_edit_btn").style.display = "none";  //清除左選單列表中的功能選項
		document.getElementById("function_count").value = parseInt(function_count)-1;
		if(document.getElementById("function_count").value == 0)  //判斷可行性評估按鈕是否要出現
		{
			document.getElementById("feasibility_btn_edit").style.display = "inline";
		}
		var inner_org = document.getElementById("origin_inner_org_count").value;  //取得目前顯示的內部組織筆數
		var outer_org = document.getElementById("origin_outer_org_count").value;  //取得目前顯示的外部組織筆數 , 數值由10開始算外部組織的數量
		var i=0;			
		while(i<inner_org)  //處理內部組織既有部分
		{		
			if(document.getElementById("inner_org_function_option_"+i+"_"+ delete_item_id).selected == true)  //判斷在合作組織之功能是否有被選擇
			{
				document.getElementById("inner_org_function_option_"+i).selected = true;  //換成尚未選擇
			}
			document.getElementById("inner_org_function_option_"+i+"_"+delete_item_id).innerHTML = "";	
			document.getElementById("inner_org_function_option_"+i+"_"+delete_item_id).style.display = "none";
			i++;
		}
		while(i<10) //處理內部組織新增部分
		{					
			if(document.getElementById("inner_org_else_function_option_"+i+"_"+ delete_item_id).selected == true)
			{
				document.getElementById("inner_org_else_function_option_"+i).selected = true;
			}
			document.getElementById("inner_org_else_function_option_"+i+"_"+delete_item_id).innerHTML = "";	
			document.getElementById("inner_org_else_function_option_"+i+"_"+delete_item_id).style.display = "none";
			i++;
		}				
		while(i<outer_org)  //處理外部組織既有部分
		{
			if(document.getElementById("outer_org_function_option_"+i+"_"+ delete_item_id).selected == true)
			{
				document.getElementById("outer_org_function_option_"+i).selected = true;
			}
			document.getElementById("outer_org_function_option_"+i+"_"+delete_item_id).innerHTML = "";
			document.getElementById("outer_org_function_option_"+i+"_"+delete_item_id).style.display = "none";
			i++;
		}
		while(i<20) //處理外部組織新增部分
		{					
			
			if(document.getElementById("outer_org_else_function_option_"+i+"_"+ delete_item_id).selected == true)
			{
				document.getElementById("outer_org_else_function_option_"+i).selected = true;
			}
			document.getElementById("outer_org_else_function_option_"+i+"_"+delete_item_id).innerHTML = "";
			document.getElementById("outer_org_else_function_option_"+i+"_"+delete_item_id).style.display = "none";
			i++;
		}		
		/*document.getElementById("inner_org_function_option_"+ delete_item_id).innerHTML = "";
		document.getElementById("inner_org_function_option_"+ delete_item_id).style.display = "none";
		document.getElementById("inner_org_else_function_option_"+ delete_item_id).innerHTML = "";
		document.getElementById("inner_org_else_function_option_"+ delete_item_id).style.display = "none";
		document.getElementById("outer_org_function_option_"+ delete_item_id).innerHTML = "";
		document.getElementById("outer_org_function_option_"+ delete_item_id).style.display = "none";
		document.getElementById("outer_org_else_function_option_"+ delete_item_id).innerHTML = "";
		document.getElementById("outer_org_else_function_option_"+ delete_item_id).style.display = "none";
		*/
	}
	function show_file_upload_field(field_name)
	{
		document.getElementById(field_name).style.display = "inline";
	}
</script>
<style>
.org_table_label
{
	text-align:right;
	padding:3px;
}
.org_table_input
{
	padding:3px;
}
</style>
<!--專案管理功能選單-->		
<?php echo form_open('project_record_create/'.$project_basic_info['project_id']);?>
<div class="navbar_side" style="clear:left;margin-top:-8px"><!-- style="clear:left;float:left"-->	
	<ul class="menu">
        <!--<li class="mainTitle"><span id="main_01_btn">組織&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="arrow_01">▼</div></span>
			<ul class="subMenu">
				<li><a href="#" id="inner_dep_btn_edit" class="main_01_02_btn">內部部門組別</a></li>
				<li><a href="#" id="outer_org_btn_edit" class="main_01_02_btn">外部組織單位</a></li>
			</ul>
        </li>-->
		<li class="mainTitle" id="main_01_btn"><a href="#">合作組織</a></li>
        <li id="senario_btn_edit" class="mainTitle"><a href="#">情境需求</a></li>
		<li id="feature_btn_edit" class="mainTitle"><a href="#">功能構想</a></li>
		<!--<li id="feature_btn_edit" class="mainTitle" ><a href="#">功能</a></li>-->
		<!--<li class="mainTitle"><span id="main_20_btn">功能&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="arrow_01">▼</div></span>
			<ul class="subMenu">
				<li><a href="#" id="feature_btn_edit" class="main_01_02_btn">功能構想</a></li>
			</ul>
        </li>-->
		<li class="mainTitle"><span id="main_06_btn">評估<div class="arrow_01">▼</div></span>
			<ul id="subMenu" class="subMenu">				
				<li <?php if(count($all_functions) > 0){echo ' style="display:none"';}?> id="feasibility_btn_edit"><a href="#">初步可行性</a></li>
				<?php				
				$i=0;
				while($i < count($all_functions))
				{
				?>
					<li id="estimate_<?php echo $i;?>_edit_btn"><a id="<?php echo "fun_link_".$i;?>" href="#"><?php echo $all_functions[$i]['function_name'];?></a></li>
				<?php
					$i++;
				}
				while($i < 10)
				{
				?>				
					<li style="border-bottom:1px solid #153e71;display:none" id="estimate_<?php echo $i;?>_edit_btn"><a id="<?php echo "fun_link_".$i;?>" href="#"></a></li>
				<?php 
					$i++;
				}
				?>				
			</ul>
        </li>
        <li id="distinction_btn_edit" class="mainTitle"><a href="#">差異化</a></li>
        <li id="value_btn_edit" class="mainTitle"><a href="#">價值性</a></li> 
        <!--<li class="mainTitle" id="main_05_btn"><a href="#">初步可行性</a></li>-->		 
        <li class="mainTitle" id="main_07_btn"><a href="#">導入車型</a></li>  
	</ul>
</div>
<div class="content_bg" style="padding-left:220px">
	<div id="main_01_01" class="main_01_01">
        <div class="main_title">合作組織</div>
        <div class="main_line"></div>
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">內部部門組別&nbsp;&nbsp;[<input style="font-size:13pt;background-color:#ffffff;border:0px;color:#344FA6" type="button" name="add_inner_department" value="+新增" onclick="add_inner_dep_input_field()">]</span>
		<div>			
			<?php 			
			$j=0;
			foreach($relative_organizations as $organization)
			{	
				if($organization['unit_class'] == 4)
				{
				?>
					<div id="<?php echo "inner_org_".$j;?>">
					<div style="background-color:#F7F7F6;border-radius:5px;padding:5px;width:95%;margin-left:20px" >
					<table style="font-size:13pt;width:100%;">
						<tr>
							<td colspan="6" style="text-align:right;"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_inner_dep_input_field(<?php echo $j;?>)"></img></td>
						</tr>
						<tr>
						<td class="org_table_label"><label>部門：</label></td>
						<td class="org_table_input"><input id="<?php echo "org_name_".$j;?>" size="12px" name="<?php echo "org_name_".$j;?>" value="<?php echo $organization['org_name']?>"></td>
						<td class="org_table_label"><label>組別：</label></td>
						<td class="org_table_input"><input id="<?php echo "dep_name_".$j;?>" size="12px" name="<?php echo "dep_name_".$j;?>" value="<?php echo $organization['dep_name']?>"></td>
						<td class="org_table_label"><label>功能項目：</label></td>
						<td>
						<select id="<?php echo "function_id_".$j;?>" style="min-width:153px;" name="<?php echo "function_id_".$j;?>">
							<option id="inner_org_function_option_<?php echo $j; ?>" value="NULL">尚無指定</option>
							<?php
							$function_count = 0;
							$ii=0;
							foreach($all_functions as $feature)
							{
							?>
								<option id="inner_org_function_option_<?php echo $j.'_'.$ii;?>" value="<?php echo $function_count?>" <?php if($organization['function_id']==$feature['id']) echo " selected"?>><?php echo $feature['function_name'];?></option>
							<?php
								$ii++;
								$function_count++;
							}							
							while($ii < 10)
							{
							?>
								<option style="display:none" id="inner_org_function_option_<?php echo $j.'_'.$ii;?>" value="<?php echo $function_count?>"></option>
							<?php
								$ii++;
								$function_count++;
							}
							?>
						</select>
						</td>						
						</tr>
						<tr>
						<td class="org_table_label"><label>擔當：</label></td>
						<td class="org_table_input"><input id="<?php echo "pm_".$j;?>" size="12px" name="<?php echo "pm_".$j;?>" value="<?php echo $organization['pm']?>"></td>
						<td class="org_table_label"><label>分機：</label></td>
						<td class="org_table_input"><input id="<?php echo "phone_firm_".$j;?>" size="12px" name="<?php echo "phone_firm_".$j;?>" value="<?php echo $organization['phone_firm'];?>"></td>				
						<td class="org_table_label"><label>手機：</label></td>
						<td class="org_table_input"><input id="<?php echo "phone_mobile_".$j;?>" size="12px" name="<?php echo "phone_mobile_".$j;?>" value="<?php echo $organization['phone_mobile'];?>"></td>
						</tr>
						<tr>
						<td style="text-align:right"><label>備註：</label></td>
						<td colspan="5">
						<textarea style="text-align:left" id="<?php echo "memo_".$j;?>" name="<?php echo "memo_".$j;?>" rows="3" cols="87"><?php echo $organization['memo'];?></textarea>
						</td>
						</tr>
					</table>
					<?php echo form_hidden('unit_class_'.$j, 4);?>
					<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
					</div>
					<br/>
					</div>
			<?php
				}
				else
				{
					continue;
				}
				$j++;
			}
			
		echo form_input(array('name' => 'inner_current_display', 'type'=>'hidden', 'id' =>'inner_current_display', 'value'=>$j));		
		echo form_input(array('name' => 'origin_inner_org_count', 'type'=>'hidden', 'id' =>'origin_inner_org_count', 'value'=>$j));	 //最初的內部組織數量
		while($j < 10)
		{
		?>
			<div id="<?php echo "inner_org_".$j;?>" style="display:none;">
				<div style="background-color:#F7F7F6;border-radius:5px;padding:5px;width:95%;margin-left:20px" >
				<table style="width:100%;font-size:13pt;border-radius:5px;margin-left:5px;padding-left:15px;background-color:#F7F7F6">
					<tr>
						<td colspan="6" style="text-align:right;"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_inner_dep_input_field(<?php echo $j;?>)"></img></td>
					</tr>
					<tr>
					<td class="org_table_label"><label>部門：</label></td>
					<td class="org_table_input"><input id="<?php echo "org_name_".$j;?>" size="12px" name="<?php echo "org_name_".$j;?>"></td>
					<td class="org_table_label"><label>組別：</label></td>
					<td class="org_table_input"><input id="<?php echo "dep_name_".$j;?>" size="12px" name="<?php echo "dep_name_".$j;?>"></td>
					<td class="org_table_label"><label>功能項目：</label></td>
					<td>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:153px;" name="<?php echo "function_id_".$j;?>">
						<option id="inner_org_else_function_option_<?php echo $j;?>" value="NULL">尚無指定</option>
						<?php
						$function_count = 0;
						$ii = 0;
						foreach($all_functions as $feature)
						{
						?>
							<option id="inner_org_else_function_option_<?php echo $j.'_'.$ii;?>" value="<?php echo $function_count?>"><?php echo $feature['function_name'];?></option>
						<?php
							$ii++;
							$function_count++;
						}	
						while($ii < 10)
						{
						?>
							<option id="inner_org_else_function_option_<?php echo $j.'_'.$ii;?>" style="display:none" value="<?php echo $function_count?>"></option>
						<?php
							$ii++;
							$function_count++;
						}							
						?>
					</select>
					</td>						
					</tr>
					<tr>
					<td class="org_table_label"><label>擔當：</label></td>
					<td class="org_table_input"><input id="<?php echo "pm_".$j;?>" size="12px" name="<?php echo "pm_".$j;?>" value=""></td>
					<td class="org_table_label"><label>分機：</label></td>
					<td class="org_table_input"><input id="<?php echo "phone_firm_".$j;?>" size="12px" name="<?php echo "phone_firm_".$j;?>" value=""></td>				
					<td class="org_table_label"><label>手機：</label></td>
					<td class="org_table_input"><input id="<?php echo "phone_mobile_".$j;?>" size="12px" name="<?php echo "phone_mobile_".$j;?>" value=""></td>
					</tr>
					<tr>
					<td style="text-align:right">備註：</label></td>
					<td colspan="5">
					<textarea style="text-align:left" id="<?php echo "memo_".$j;?>" name="<?php echo "memo_".$j;?>" rows="3" cols="87"></textarea>
					</td>
					</tr>
				</table>
				<?php echo form_hidden('unit_class_'.$j, 4);?>
				<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
				</div>
			<br/>
			</div>
		<?php
			$j++;
		}
		?>
		</div>
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
		<span class="subtitle">外部組織單位&nbsp;&nbsp;[<input style="font-size:13pt;background-color:#ffffff;border:0px;color:#344FA6" type="button" name="add_inner_department" value="+新增" onclick="add_outer_org_input_field()">]</span>
		<div>			
			<?php 			
			foreach($relative_organizations as $organization)
			{
				if($organization['unit_class'] == 1 || $organization['unit_class'] == 2 || $organization['unit_class'] == 3)
				{
				?>
					<div id="<?php echo "outer_org_".$j;?>">
					<div style="background-color:#F7F7F6;border-radius:5px;padding:5px;width:95%;margin-left:20px" >
					<table style="font-size:13pt;width:100%;margin-left:5px">
						<tr>
							<td colspan="6" style="text-align:right;"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_outer_org_input_field(<?php echo $j;?>)"></img></td>
						</tr>
						<tr>
						<td class="org_table_label"><label>組織：</label></td>
						<td class="org_table_input"><input id="<?php echo "org_name_".$j;?>" size="12px" name="<?php echo "org_name_".$j;?>" value="<?php echo $organization['org_name']?>"></td>
						<td class="org_table_label"><label>部門：</label></td>
						<td class="org_table_input"><input id="<?php echo "dep_name_".$j;?>" size="12px" name="<?php echo "dep_name_".$j;?>" value="<?php echo $organization['dep_name']?>"></td>
						<td class="org_table_label"><label>功能項目：</label></td>
						<td>
						<select id="<?php echo "function_id_".$j;?>" style="min-width:153px;" name="<?php echo "function_id_".$j;?>">
							<option id="outer_org_function_option_<?php echo $j;?>" value="NULL">尚無指定</option>
							<?php
							$ii=0;
							$function_count = 0;
							foreach($all_functions as $feature)
							{
							?>
								<option id="outer_org_function_option_<?php echo $j.'_'.$ii;?>" value="<?php echo $function_count?>" <?php if($organization['function_id']==$feature['id']) echo " selected"?>><?php echo $feature['function_name'];?></option>
							<?php
								$ii++;
								$function_count++;
							}
							while($ii < 10)
							{
							?>
								<option id="outer_org_function_option_<?php echo $j.'_'.$ii;?>" style="display:none" value="<?php echo $function_count?>"></option>
							<?php
								$ii++;
								$function_count++;
							}								
							?>
						</select>
						</td>						
						</tr>
						<tr>
						<td class="org_table_label"><label>擔當：</label></td>
						<td class="org_table_input"><input id="<?php echo "pm_".$j;?>" size="12px" name="<?php echo "pm_".$j;?>" value="<?php echo $organization['pm']?>"></td>
						<td class="org_table_label"><label>分機：</label></td>
						<td class="org_table_input"><input id="<?php echo "phone_firm_".$j;?>" size="12px" name="<?php echo "phone_firm_".$j;?>" value="<?php echo $organization['phone_firm'];?>"></td>				
						<td class="org_table_label"><label>手機：</label></td>
						<td class="org_table_input"><input id="<?php echo "phone_mobile_".$j;?>" size="12px" name="<?php echo "phone_mobile_".$j;?>" value="<?php echo $organization['phone_mobile'];?>"></td>
						</tr>
						<tr>
						<td style="text-align:right"><label>備註：</label></td>
						<td colspan="5">
						<textarea style="text-align:left" id="<?php echo "memo_".$j;?>" name="<?php echo "memo_".$j;?>" rows="3" cols="87"><?php echo $organization['memo'];?></textarea>
						</td>
						</tr>
					</table>
					<?php echo form_hidden('unit_class_'.$j, 1);?>
					<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
					</div>
					<br/>
					</div>					
			<?php
				}
				else
				{
					continue;
				}
				$j++;				
			}			
		echo form_input(array('name' => 'outer_current_display', 'type'=>'hidden', 'id' =>'outer_current_display', 'value'=>$j));		
		echo form_input(array('name' => 'origin_outer_org_count', 'type'=>'hidden', 'id' =>'origin_outer_org_count', 'value'=>$j));  //最初的外部組織資料
		while($j < 20)
		{
		?>
			<div id="<?php echo "outer_org_".$j;?>" style="display:none">
				<div style="background-color:#F7F7F6;border-radius:5px;padding:5px;width:95%;margin-left:20px" >
				<table style="width:100%;font-size:13pt;border-radius:5px;margin-left:5px;padding-left:15px;background-color:#F7F7F6">
					<tr>
						<td colspan="6" style="text-align:right;"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_outer_org_input_field(<?php echo $j;?>)"></img></td>
					</tr>
					<tr>
					<td class="org_table_label"><label>組織：</label></td>
					<td class="org_table_input"><input id="<?php echo "org_name_".$j;?>" size="12px" name="<?php echo "org_name_".$j;?>"></td>
					<td class="org_table_label"><label>部門：</label></td>
					<td class="org_table_input"><input id="<?php echo "dep_name_".$j;?>" size="12px" name="<?php echo "dep_name_".$j;?>"></td>
					<td class="org_table_label"><label>功能項目：</label></td>
					<td>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:153px;" name="<?php echo "function_id_".$j;?>">
						<option id="outer_org_else_function_option_<?php echo $j?>" value="NULL">尚無指定</option>
						<?php
						$function_count = 0;
						$ii = 0 ;
						foreach($all_functions as $feature)
						{
						?>
							<option id="outer_org_else_function_option_<?php echo $j.'_'.$ii;?>" value="<?php echo $function_count?>"><?php echo $feature['function_name'];?></option>
						<?php
							$ii++;
							$function_count++;
						}	
						while($ii < 10)
						{
						?>
							<option style="display:none" id="outer_org_else_function_option_<?php echo $j.'_'.$ii;?>" value="<?php echo $function_count?>"></option>
						<?php
							$ii++;
							$function_count++;
						}								
						?>
					</select>
					</td>						
					</tr>
					<tr>
					<td class="org_table_label"><label>擔當：</label></td>
					<td class="org_table_input"><input id="<?php echo "pm_".$j;?>" size="12px" name="<?php echo "pm_".$j;?>" value=""></td>
					<td class="org_table_label"><label>分機：</label></td>
					<td class="org_table_input"><input id="<?php echo "phone_firm_".$j;?>" size="12px" name="<?php echo "phone_firm_".$j;?>" value=""></td>				
					<td class="org_table_label"><label>手機：</label></td>
					<td class="org_table_input"><input id="<?php echo "phone_mobile_".$j;?>" size="12px" name="<?php echo "phone_mobile_".$j;?>" value=""></td>
					</tr>
					<tr>
					<td style="text-align:right"><label>備註：</label></td>
					<td colspan="5">
					<textarea style="text-align:left" id="<?php echo "memo_".$j;?>" name="<?php echo "memo_".$j;?>" rows="3" cols="87"></textarea>
					</td>
					</tr>
				</table>
				<?php echo form_hidden('unit_class_'.$j, 1);?>
				<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
				</div>
				<br/>
			</div>	
		<?php
			$j++;
		}
		?>
		</div>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
		<br/>
	</div>
    <!--<div id="main_01_02" class="main_01_02">
        <div class="main_title">組織&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;外部組織單位 &nbsp;[<input style="font-size:13pt;background-color:#ffffff;border:0px;color:#344FA6" type="button" name="add_inner_department" value="+新增" onclick="add_outer_org_input_field()">]</div>
        <div class="main_line"></div>    

        <div>			
			<?php 
			foreach($relative_organizations as $organization)
			{				
				if($organization['unit_class'] == 1 || $organization['unit_class'] == 2 || $organization['unit_class'] == 3)
				{
				?>
					<div id="<?php echo "outer_org_".$j;?>">
					<table style="font-size:13pt;width:730px;background-color:#F7F7F6;border-radius:5px;margin-left:5px">
						<tr>
							<td colspan="6" style="text-align:right;"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_outer_org_input_field(<?php echo $j;?>)"></img></td>
						</tr>
						<tr>
						<td class="org_table_label"><label>部門：</label></td>
						<td class="org_table_input"><input id="<?php echo "org_name_".$j;?>" size="12px" name="<?php echo "org_name_".$j;?>" value="<?php echo $organization['org_name']?>"></td>
						<td class="org_table_label"><label>組別：</label></td>
						<td class="org_table_input"><input id="<?php echo "dep_name_".$j;?>" size="12px" name="<?php echo "dep_name_".$j;?>" value="<?php echo $organization['dep_name']?>"></td>
						<td class="org_table_label"><label>負責系統部品：</label></td>
						<td>
						<select id="<?php echo "function_id_".$j;?>" style="min-width:153px;" name="<?php echo "function_id_".$j;?>">
							<option value="NULL">尚無指定</option>
							<?php
								$function_count = 0;
								foreach($all_functions as $feature)
								{
							?>
									<option value="<?php echo $function_count?>" <?php if($organization['function_id']==$feature['id']) echo " selected"?>><?php echo $feature['function_name'];?></option>
							<?php
									$function_count++;
								}							
							?>
						</select>
						</td>						
						</tr>
						<tr>
						<td class="org_table_label"><label>擔當：</label></td>
						<td class="org_table_input"><input id="<?php echo "pm_".$j;?>" size="12px" name="<?php echo "pm_".$j;?>" value="<?php echo $organization['pm']?>"></td>
						<td class="org_table_label"><label>分機：</label></td>
						<td class="org_table_input"><input id="<?php echo "phone_firm_".$j;?>" size="12px" name="<?php echo "phone_firm_".$j;?>" value="<?php echo $organization['phone_firm'];?>"></td>				
						<td class="org_table_label"><label>手機：</label></td>
						<td class="org_table_input"><input id="<?php echo "phone_mobile_".$j;?>" size="12px" name="<?php echo "phone_mobile_".$j;?>" value="<?php echo $organization['phone_mobile'];?>"></td>
						</tr>
						<tr>
						<td><label>備註：</label></td>
						<td colspan="5">
						<textarea style="text-align:left" id="<?php echo "memo_".$j;?>" name="<?php echo "memo_".$j;?>" rows="3" cols="64"><?php echo $organization['memo'];?></textarea>
						</td>
						</tr>
					</table>
					<?php echo form_hidden('unit_class_'.$j, 1);?>
					<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
					<br/>
					</div>
			<?php
				}
				else
				{
					continue;
				}
				$j++;
			}			
		echo form_input(array('name' => 'outer_current_display', 'type'=>'hidden', 'id' =>'outer_current_display', 'value'=>$j));		
		while($j < 20)
		{
		?>
			<div id="<?php echo "outer_org_".$j;?>" style="display:none">
				<table style="width:730px;font-size:13pt;width:730px;border-radius:5px;margin-left:5px;padding-left:15px;background-color:#F7F7F6">
					<tr>
						<td colspan="6" style="text-align:right;"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_outer_org_input_field(<?php echo $j;?>)"></img></td>
					</tr>
					<tr>
					<td class="org_table_label"><label>部門：</label></td>
					<td class="org_table_input"><input id="<?php echo "org_name_".$j;?>" size="12px" name="<?php echo "org_name_".$j;?>"></td>
					<td class="org_table_label"><label>組別：</label></td>
					<td class="org_table_input"><input id="<?php echo "dep_name_".$j;?>" size="12px" name="<?php echo "dep_name_".$j;?>"></td>
					<td class="org_table_label"><label>負責系統部品：</label></td>
					<td>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:153px;" name="<?php echo "function_id_".$j;?>">
						<option value="NULL">尚無指定</option>
						<?php
							$function_count = 0;
							foreach($all_functions as $feature)
							{
						?>
								<option value="<?php echo $function_count?>"><?php echo $feature['function_name'];?></option>
						<?php
								$function_count++;
							}							
						?>
					</select>
					</td>						
					</tr>
					<tr>
					<td class="org_table_label"><label>擔當：</label></td>
					<td class="org_table_input"><input id="<?php echo "pm_".$j;?>" size="12px" name="<?php echo "pm_".$j;?>" value=""></td>
					<td class="org_table_label"><label>分機：</label></td>
					<td class="org_table_input"><input id="<?php echo "phone_firm_".$j;?>" size="12px" name="<?php echo "phone_firm_".$j;?>" value=""></td>				
					<td class="org_table_label"><label>手機：</label></td>
					<td class="org_table_input"><input id="<?php echo "phone_mobile_".$j;?>" size="12px" name="<?php echo "phone_mobile_".$j;?>" value=""></td>
					</tr>
					<tr>
					<td><label>備註：</label></td>
					<td colspan="5">
					<textarea style="text-align:left" id="<?php echo "memo_".$j;?>" name="<?php echo "memo_".$j;?>" rows="3" cols="64"></textarea>
					</td>
					</tr>
				</table>
				<?php echo form_hidden('unit_class_'.$j, 1);?>
				<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
				<br/>
			</div>	
		<?php
			$j++;
		}
		?>
		</div>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
    </div>-->
    <div class="main_02">
		<div class="main_title">情境需求</div>
        <div class="main_line"></div>    
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
		<span class="subtitle">內容</span>
		<div align="center"><textarea id="senario" name="senario" rows="8" cols="129"><?php echo $record['senario'];?></textarea></div>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
	</div>
    <div class="main_03">
        <div class="main_title">差異化</div>
        <div class="main_line"></div>    
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">市場差異化</span>
        <div align="center"><textarea id="distinction_market" name="distinction_market" rows="8" cols="129"><?php echo $record['distinction_market'];?></textarea></div>
        <img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
        <span class="subtitle">KM差異化</span>
        <div align="center"><textarea id="distinction_km" name="distinction_km" rows="8" cols="129"><?php echo $record['distinction_km'];?></textarea></div>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
	</div>
    <div class="main_04">
        <div class="main_title">價值性</div>
        <div class="main_line"></div>
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
		<span class="subtitle">內容</span>
		<div align="center"><textarea id="value" name="value" rows="8" cols="129"><?php echo $record['value'];?></textarea></div>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>		
    </div>        
	<div id="feature_edit">
        <div class="main_title">功能構想</div>
        <div class="main_line"></div> 
		<img src="<?php echo $img_location ?>/arrow.png"></img> <!--小標題icon-->
		<span class="subtitle">功能描述</span>
		<div align="center"><textarea id="feature_introduction" name="feature_introduction" rows="8" cols="129"><?php echo $record['feature_introduction'];?></textarea></div>
		<br/>
		<!--<img src="<?php echo $img_location ?>/arrow.png"></img>
		<span class="subtitle">示意圖</span>
		<div align="center"><textarea id="photo" name="photo" rows="8" cols="90"></textarea></div>
		-->
		<br/>
		<img src="<?php echo $img_location ?>/arrow.png"></img>
		<span class="subtitle">系統架構</span>
		[<input style="background-color:#ffffff;border:0px;color:#344FA6" type="button" name="add_function" value="+新增" onclick="add_function_input_field()"/>]
		<script Language="JavaScript">
		function estimate_function(id)
		{
			var function_name = document.getElementById("function_name_"+id).value;
			var function_specification = document.getElementById("function_specification_"+id).value;
			var function_count = document.getElementById("function_count").value;
			if(function_name != "")  //使用者有輸入值
			{
				document.getElementById("fun_link_" + id).innerHTML = function_name;
				document.getElementById("estimate_"+ id +"_edit_btn").style.display = "inline";
				document.getElementById("fun_link_"+ id).style.borderBottom = "1px solid #153E71";				
				//document.getElementById("estimate_"+ id +"_edit_btn").style.borderBottom = "thick solid #0000FF";
				document.getElementById("estimate_fun_name_"+ id).innerHTML = '評估&nbsp;&nbsp;&nbsp;＞&nbsp;&nbsp;&nbsp;'+function_name;
				var inner_org = document.getElementById("origin_inner_org_count").value;  //取得目前顯示的內部組織筆數
				var outer_org = document.getElementById("origin_outer_org_count").value;  //取得目前顯示的外部組織筆數 , 數值由10開始算外部組織的數量
				var i=0;			
				while(i<inner_org)  //處理內部組織既有部分
				{
					document.getElementById("inner_org_function_option_"+i+"_"+id).innerHTML = function_name;
					document.getElementById("inner_org_function_option_"+i+"_"+id).style.display = "inline";
					i++;
				}
				while(i<10) //處理內部組織新增部分
				{
					document.getElementById("inner_org_else_function_option_"+i+"_"+id).innerHTML = function_name;
					document.getElementById("inner_org_else_function_option_"+i+"_"+id).style.display = "inline";
					i++;
				}				
				while(i<outer_org)  //處理外部組織既有部分
				{
					document.getElementById("outer_org_function_option_"+i+"_"+id).innerHTML = function_name;
					document.getElementById("outer_org_function_option_"+i+"_"+id).style.display = "inline";
					i++;
				}
				while(i<20) //處理外部組織新增部分
				{					
					document.getElementById("outer_org_else_function_option_"+i+"_"+id).innerHTML = function_name;
					document.getElementById("outer_org_else_function_option_"+i+"_"+id).style.display = "inline";
					i++;
				}
				//document.getElementById("estimate_fun_spe_"+ id).innerHTML = '<p class="content" style="padding-left:22px;">'+function_specification.replace(/\n/g,"<br/>")+'</p>';
				//document.getElementById("estimate_fun_spe_"+ id).innerHTML = function_specification.replace(/\n/g,"<br/>");				
				if(function_count > 0)
				{
					document.getElementById("feasibility_btn_edit").style.display = "none";
				}
			}
		}
		function function_spe_change(id)
		{
			var function_specification = document.getElementById("function_specification_"+id).value;
			var origin_function_count = document.getElementById("origin_function_count").value;  //取得最原始的功能數量
			//document.getElementById("estimate_fun_spe_"+id).innerHTML = "";
			if(id < (origin_function_count))
			{
				document.getElementById("estimate_fun_spe_"+ id).innerHTML = function_specification.replace(/\n/g,"<br/>");
			}
			else
			{
				document.getElementById("estimate_fun_spe_"+ id).innerHTML = '<p class="content" style="padding-left:22px;">'+function_specification.replace(/\n/g,"<br/>")+'</p>';//function_specification.replace(/\n/g,"<br/>");
			}
			//document.getElementById("estimate_fun_spe_"+ id).innerHTML = function_specification.replace(/\n/g,"<br/>");
		}
		function estimate_function_onblur(id)
		{
			var function_name = document.getElementById("function_name_"+id).value;
			if(function_name == "")  //使用者有輸入值
			{
				var delete_checked = confirm("未填寫功能名稱，則該項功能將被刪除\n確定要刪除此功能嗎？");
				var function_count = document.getElementById("function_count").value;
				if(delete_checked)
				{
					//document.getElementById("function_" + id).style.display = "none";
					$("#function_" + id).slideUp(500);
					sleep(500);
					document.getElementById("function_name_" + id).value = '';	
					document.getElementById("function_specification_" + id).value = '';
					document.getElementById("estimate_" + id + "_edit_btn").style.display = "none";  //清除左選單列表中的功能選項
					document.getElementById("function_count").value = parseInt(function_count)-1;
					if(document.getElementById("function_count").value == 0)
					{
						document.getElementById("feasibility_btn_edit").style.display = "inline";
					}
					var inner_org = document.getElementById("origin_inner_org_count").value;  //取得目前顯示的內部組織筆數
					var outer_org = document.getElementById("origin_outer_org_count").value;  //取得目前顯示的外部組織筆數 , 數值由10開始算外部組織的數量
					var i=0;			
					while(i<inner_org)  //處理內部組織既有部分
					{		
						if(document.getElementById("inner_org_function_option_"+i+"_"+ id).selected == true)  //判斷在合作組織之功能是否有被選擇
						{
							document.getElementById("inner_org_function_option_"+i).selected = true;  //換成尚未選擇
						}
						document.getElementById("inner_org_function_option_"+i+"_"+id).innerHTML = "";	
						document.getElementById("inner_org_function_option_"+i+"_"+id).style.display = "none";
						i++;
					}
					while(i<10) //處理內部組織新增部分
					{					
						if(document.getElementById("inner_org_else_function_option_"+i+"_"+ id).selected == true)
						{
							document.getElementById("inner_org_else_function_option_"+i).selected = true;
						}
						document.getElementById("inner_org_else_function_option_"+i+"_"+id).innerHTML = "";	
						document.getElementById("inner_org_else_function_option_"+i+"_"+id).style.display = "none";
						i++;
					}				
					while(i<outer_org)  //處理外部組織既有部分
					{
						if(document.getElementById("outer_org_function_option_"+i+"_"+ id).selected == true)
						{
							document.getElementById("outer_org_function_option_"+i).selected = true;
						}
						document.getElementById("outer_org_function_option_"+i+"_"+id).innerHTML = "";
						document.getElementById("outer_org_function_option_"+i+"_"+id).style.display = "none";
						i++;
					}
					while(i<20) //處理外部組織新增部分
					{					
						
						if(document.getElementById("outer_org_else_function_option_"+i+"_"+ id).selected == true)
						{
							document.getElementById("outer_org_else_function_option_"+i).selected = true;
						}
						document.getElementById("outer_org_else_function_option_"+i+"_"+id).innerHTML = "";
						document.getElementById("outer_org_else_function_option_"+i+"_"+id).style.display = "none";
						i++;
					}
					/*document.getElementById("inner_org_function_option_"+ id).innerHTML = "";
					document.getElementById("inner_org_function_option_"+ id).style.display = "none";
					document.getElementById("inner_org_else_function_option_"+ id).innerHTML = "";
					document.getElementById("inner_org_else_function_option_"+ id).style.display = "none";
					document.getElementById("outer_org_function_option_"+ id).innerHTML = "";
					document.getElementById("outer_org_function_option_"+ id).style.display = "none";
					document.getElementById("outer_org_else_function_option_"+ id).innerHTML = "";
					document.getElementById("outer_org_else_function_option_"+ id).style.display = "none";
					if(document.getElementById("inner_org_function_option_"+ id).selected == true)  //判斷在合作組織之功能是否有被選擇
					{
						document.getElementById("inner_org_function_option").selected = true;  //換成尚未選擇
					}
					if(document.getElementById("inner_org_else_function_option_"+ id).selected == true)
					{
						document.getElementById("inner_org_else_function_option").selected = true;
					}
					if(document.getElementById("outer_org_function_option_"+ id).selected == true)
					{
						document.getElementById("outer_org_function_option").selected = true;
					}
					if(document.getElementById("outer_org_else_function_option_"+ id).selected == true)
					{
						document.getElementById("outer_org_else_function_option").selected = true;
					}*/
				}
				else
				{
					document.getElementById("function_name_" + id).focus();
				}
			}
		}
		</script>
		<?php
		$i=0;
		while($i < count($all_functions))
		{			
		?>
			<div id="<?php echo "function_".$i;?>">				
				<div style="margin-left:25px;padding-left:20px;padding-top:20;padding-right:20;padding-bottom:20;background-color;font-size:13pt;width:92%;background-color:#F7F7F6;border-radius:5px;">
				<div style="text-align:right"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_function_input_field(<?php echo $i;?>)"></img></div>
				功能項目名稱：<input type="text" size="20" id="<?php echo "function_name_".$i;?>" name="<?php echo "function_name_".$i;?>" value="<?php if(!empty($all_functions[$i]['function_name'])) echo $all_functions[$i]['function_name']; ?>" onchange="estimate_function(<?php echo $i?>)" onblur="estimate_function_onblur(<?php echo $i?>)"/>
				<br/>
				<p style="margin-top:10px;margin-bottom:5px">功能需求規格：</p>	
				<textarea onchange="function_spe_change(<?php echo $i?>)" rows="3" cols="120" id="<?php echo "function_specification_".$i;?>" name="<?php echo "function_specification_".$i;?>"><?php if(!empty($all_functions[$i]['function_specification'])) echo str_ireplace("<br />", "", $all_functions[$i]['function_specification']); ?></textarea>
				</div>
				<br/>
			</div>						
		<?php	
			$i++;				
		}
		echo form_input(array('name' => 'function_current_display', 'type'=>'hidden', 'id' =>'function_current_display', 'value'=>$i));
		while($i < 10)
		{
		?>			
			<div id="<?php echo "function_".$i;?>" style="display:none">
			<div style="margin-left:25px;padding-left:20px;padding-top:20;padding-right:20;padding-bottom:20;background-color;font-size:13pt;width:92%;background-color:#F7F7F6;border-radius:5px;">
			<div style="text-align:right"><img src="<?php echo $img_location.'/delete_org.png';?>" alt="刪除" height="12" width="12" onclick="delete_function_input_field(<?php echo $i;?>)"></img></div>
			功能項目名稱：<input type="text" size="20" id="<?php echo "function_name_".$i;?>" name="<?php echo "function_name_".$i;?>" onchange="estimate_function(<?php echo $i?>)" onblur="estimate_function_onblur(<?php echo $i?>)"/>
			<br/>
			<p style="margin-top:10px;margin-bottom:5px">功能需求規格：</p>						
			<textarea onchange="function_spe_change(<?php echo $i?>)" rows="3" cols="120" id="<?php echo "function_specification_".$i;?>" name="<?php echo "function_specification_".$i;?>"></textarea>
			</div>
			<br/>
			</div>
			<?php				
			$i++;
		}		
		?>			
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
		<br/>
	</div>
	
	<div class="main_05">
        <div class="main_title">初步可行性評估</div>
        <div class="main_line"></div> 
		<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
		<span class="subtitle">內容</span>
		<div align="center"><textarea id="feasibility" name="feasibility" rows="8" cols="90"><?php echo $record['feasibility'];?></textarea></div>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
	</div>
	<!--功能項目評估-->	
	<?php
	$i=0;
	while($i < count($all_functions))
	{
	?>
		<input type="hidden" name="project_id" value="">
		<div id="main_6_<?php echo $i;?>" style="padding-right:20px">
			<div id="estimate_fun_name_<?php echo $i;?>" class="main_title">評估&nbsp;&nbsp;&nbsp;＞&nbsp;&nbsp;&nbsp;<?php echo $all_functions[$i]['function_name'];?></div>
			<div class="main_line"></div> 			
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">需求定義</span>
			<p style="padding-left:22px" class="content" id="estimate_fun_spe_<?php echo $i;?>"><?php if(!empty($all_functions[$i]['function_specification'])) echo $all_functions[$i]['function_specification'];?></p>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">法規限制</span>
			<textarea id="rule_<?php echo $i;?>" name="rule_<?php echo $i;?>"  cols="60" rows="5">
				<?php 
				if(file_exists("application/assets/project". $all_functions[$i]['rule_restriction']))
				{
					$text_rule=file_get_contents($project_location. $all_functions[$i]['rule_restriction']); 
				    echo str_replace('$project_location',$project_location,$text_rule);
			    }
				?> 
			</textarea>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">技術限制</span>
			<textarea id="tech_<?php echo $i;?>" name="tech_<?php echo $i;?>"  cols="60" rows="5">
			<?php 
			if(file_exists("application/assets/project". $all_functions[$i]['tech_restriction']))
			{
			    $text_tech=file_get_contents($project_location. $all_functions[$i]['tech_restriction']); 
			    echo str_replace('$project_location',$project_location,$text_tech);
            }				
			?>
			</textarea>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">專利限制</span>
			<textarea id="patent_<?php echo $i;?>" name="patent_<?php echo $i;?>"  cols="50" rows="4">
			<?php 
			if(file_exists("application/assets/project". $all_functions[$i]['patent_restriction']))
			{
				$text_patent=file_get_contents($project_location. $all_functions[$i]['patent_restriction']); 
			    echo str_replace('$project_location',$project_location,$text_patent);
			}
			?>
			</textarea>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">功能原型(Functional Prototype)</span><br/>
			<table style="width:100%;font-family:微軟正黑體">
			<tr>
			<td style="padding:5px;text-align:right">設計開發：</td>
			<td style="padding:5px"><input type="text" name="fp_design_dev_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_design_dev'])) echo $all_functions[$i]['fp_design_dev'];?>"></td>
			<td style="padding:5px;text-align:right">驗證：</td>
			<td style="padding:5px"><input type="text" name="fp_validation_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_validation'])) echo $all_functions[$i]['fp_validation'];?>"></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">試作件：</td>			
			<td style="padding:5px"><input type="text" name="fp_sample_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_sample'])) echo $all_functions[$i]['fp_sample'];?>"></td>
			</td>
			<td style="padding:5px;text-align:right">時程：</td>
			<td style="padding:5px"><input type="text" name="fp_delivery_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_delivery'])) echo $all_functions[$i]['fp_delivery'];?>"></td>
			</tr>
			</table>
			<br/>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">量產原型(Production Prototype)</span><br/>
			
			<!---->
			<table style="width:100%;font-family:微軟正黑體">
			<tr>
			<td style="padding:5px;text-align:right">設計開發：</td>
			<td style="padding:5px"><input type="text" name="pp_design_dev_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_design_dev'])) echo $all_functions[$i]['pp_design_dev'];?>"/></td>
			<td style="padding:5px;text-align:right">模具：</td>
			<td style="padding:5px"><input type="text" name="pp_mold_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_mold'])) echo $all_functions[$i]['pp_mold'];?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">治具：</td>			
			<td style="padding:5px"><input type="text" name="pp_jig_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_jig'])) echo $all_functions[$i]['pp_jig'];?>"/></td>
			</td>
			<td style="padding:5px;text-align:right">檢具：</td>
			<td style="padding:5px"><input type="text" name="pp_gauge_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_gauge'])) echo $all_functions[$i]['pp_gauge'];?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">驗證：</td>			
			<td style="padding:5px"><input type="text" name="pp_validation_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_validation'])) echo $all_functions[$i]['pp_validation'];?>"/></td>
			</td>
			<td style="padding:5px;text-align:right">預計產量：</td>
			<td style="padding:5px"><input type="text" name="pp_quantity_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_quantity'])) echo $all_functions[$i]['pp_quantity'];?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">時程：</td>			
			<td style="padding:5px"><input type="text" name="pp_delivery_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_delivery'])) echo $all_functions[$i]['pp_delivery'];?>"/></td>
			</td>
			<td style="padding:5px"></td>
			<td style="padding:5px"></td>
			</tr>
			</table>
			<script>
				if(CKEDITOR) {
				
				CKEDITOR.replace('rule_'+<?php echo $i;?>, {
					
					'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
					'filebrowserImageBrowseUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
					'filebrowserImageUploadUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgupload.php'
				});
					CKEDITOR.replace('tech_'+<?php echo $i;?>, {
					
					'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
					'filebrowserImageBrowseUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
					'filebrowserImageUploadUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgupload.php'
				});
					CKEDITOR.replace('patent_'+<?php echo $i;?>, {
					
					'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
					'filebrowserImageBrowseUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
					'filebrowserImageUploadUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgupload.php'
				});
				}
			</script>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
		</div>
	<?php
		$i++;			
	}
	while($i < 10)
	{
	?>
		<input type="hidden" name="project_id" value="">
		<div id="main_6_<?php echo $i;?>" style="padding-right:20px">
			<div id="estimate_fun_name_<?php echo $i;?>" class="main_title"><!--填入功能名稱--></div>
			<div class="main_line"></div> 			
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">需求定義</span>
			<p id="estimate_fun_spe_<?php echo $i;?>"></p>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">法規限制</span>
			<textarea id="rule_<?php echo $i;?>" name="rule_<?php echo $i;?>"  cols="60" rows="5"></textarea>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">技術限制</span>
			<textarea id="tech_<?php echo $i;?>" name="tech_<?php echo $i;?>"  cols="60" rows="5"></textarea>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">專利限制</span>
			<textarea id="patent_<?php echo $i;?>" name="patent_<?php echo $i;?>"  cols="50" rows="4"></textarea>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">功能原型(Functional Prototype)</span><br/>
			<table style="width:100%;font-family:微軟正黑體">
			<tr>
			<td style="padding:5px;text-align:right">設計開發：</td>
			<td style="padding:5px"><input type="text" name="fp_design_dev_<?php echo $i;?>"/></td>
			<td style="padding:5px;text-align:right">驗證：</td>
			<td style="padding:5px"><input type="text" name="fp_validation_<?php echo $i;?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">試作件：</td>			
			<td style="padding:5px"><input type="text" name="fp_sample_<?php echo $i;?>"/></td>
			</td>
			<td style="padding:5px;text-align:right">時程：</td>
			<td style="padding:5px"><input type="text" name="fp_delivery_<?php echo $i;?>"/></td>
			</tr>
			</table>
			<br/>
			<img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
			<span class="subtitle">量產原型(Production Prototype)</span><br/>
			
			<!---->
			<table style="width:100%;font-family:微軟正黑體">
			<tr>
			<td style="padding:5px;text-align:right">設計開發：</td>
			<td style="padding:5px"><input type="text" name="pp_design_dev_<?php echo $i;?>"/></td>
			<td style="padding:5px;text-align:right">模具：</td>
			<td style="padding:5px"><input type="text" name="pp_mold_<?php echo $i;?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">治具：</td>			
			<td style="padding:5px"><input type="text" name="pp_jig_<?php echo $i;?>"/></td>
			</td>
			<td style="padding:5px;text-align:right">檢具：</td>
			<td style="padding:5px"><input type="text" name="pp_gauge_<?php echo $i;?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">驗證：</td>			
			<td style="padding:5px"><input type="text" name="pp_validation_<?php echo $i;?>"/></td>
			</td>
			<td style="padding:5px;text-align:right">預計產量：</td>
			<td style="padding:5px"><input type="text" name="pp_quantity_<?php echo $i;?>"/></td>
			</tr>
			<tr>
			<td style="padding:5px;text-align:right">時程：</td>			
			<td style="padding:5px"><input type="text" name="pp_delivery_<?php echo $i;?>"/></td>
			</td>
			<td style="padding:5px"></td>
			<td style="padding:5px"></td>
			</tr>
			</table>
			<script>
				if(CKEDITOR) {
				
				CKEDITOR.replace('rule_'+<?php echo $i;?>, {
					
					'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
					'filebrowserImageBrowseUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
					'filebrowserImageUploadUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgupload.php'
				});
					CKEDITOR.replace('tech_'+<?php echo $i;?>, {
					
					'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
					'filebrowserImageBrowseUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
					'filebrowserImageUploadUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgupload.php'
				});
					CKEDITOR.replace('patent_'+<?php echo $i;?>, {
					
					'extraPlugins': 'showblocks,div,doksoft_backup,doksoft_stat',
					'filebrowserImageBrowseUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
					'filebrowserImageUploadUrl': '<?php echo $js_location;?>/ckeditor/plugins/imgupload.php'
				});
				}
			</script>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
		</div>
	<?php
		$i++;
	}
	?>
	
	<div id="main_07">
        <div class="main_title">導入車型</div>
        <div class="main_line"></div> 
        <img src="<?php echo $img_location ?>/arrow.png"> <!--小標題icon-->
		<span class="subtitle">內容</span>
		<div align="center"><textarea id="car_model" name="car_model" rows="8" cols="129"><?php echo $record['car_model'];?></textarea></div>
		<br/>
		<div align="center"><input type="submit" value="送出確認" style="font-size:13pt;"/></div>
    </div>
	<?php
	$person = $username;  
	echo form_hidden('person', $person);
	echo form_hidden('pm', $project_basic_info['pm']);
	echo form_hidden('project_id', $project_basic_info['project_id']);
	echo form_hidden('phase', $project_basic_info['phase']);
	echo form_hidden('status', $project_basic_info['status']);
	echo form_input(array('name' => 'function_count', 'type'=>'hidden', 'id' =>'function_count', 'value'=>count($all_functions)));  //紀錄功能數量
	echo form_input(array('name' => 'origin_function_count', 'type'=>'hidden', 'id' =>'origin_function_count', 'value'=>count($all_functions)));  //紀錄原始功能數量
	?>
</div>
</form>