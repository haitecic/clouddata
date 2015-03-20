    <!-- Begin page content -->
	<script language="Javascript" type="text/javascript">
		function add_outer_org_input_field()
		{
			var outer_next_display_id;
			outer_next_display_id = document.getElementById("outer_current_display").value;
			if(outer_next_display_id >= 20)
			{
				alert("至多只能新增十筆外部組織單位資料!");
			}
			document.getElementById("outer_org_" + outer_next_display_id).style.display = "inline";  //顯示下一個輸入欄位
			document.getElementById("outer_current_display").value = (parseInt(outer_next_display_id)+1);
		}
		function add_inner_dep_input_field()
		{
			var inner_next_display_id;			
			inner_next_display_id = document.getElementById("inner_current_display").value;
			if(inner_next_display_id >= 10)
			{
				alert("至多只能新增十筆內部部門組別資料!");
			}
			document.getElementById("inner_org_" + inner_next_display_id).style.display = "inline";  //顯示下一個輸入欄位
			document.getElementById("inner_current_display").value = (parseInt(inner_next_display_id)+1);
		}
		function add_function_input_field()
		{
			var next_display_id;
			next_display_id = document.getElementById("function_current_display").value;
			if(next_display_id >= 10)
			{
				alert("至多只能新增十項功能資料!");
			}
			document.getElementById("function_" + next_display_id).style.display = "inline";  //顯示下一個輸入欄位
			//document.getElementById("fsc_" + next_display_id).style.display = "inline";  //顯示下一個輸入欄位
			document.getElementById("function_current_display").value = (parseInt(next_display_id)+1);
		}
		function delete_outer_org_input_field(delete_item_id)
		{
			document.getElementById("org_name_" + delete_item_id).value = ''; 
			document.getElementById("dep_name_" + delete_item_id).value = '';
			document.getElementById("pm_" + delete_item_id).value = '';
			document.getElementById("phone_firm_" + delete_item_id).value = '';
			document.getElementById("phone_mobile_" + delete_item_id).value = '';
			document.getElementById("outer_org_" + delete_item_id).style.display = "none";
		}
		function delete_inner_dep_input_field(delete_item_id)
		{				
			document.getElementById("org_name_" + delete_item_id).value = '';
			document.getElementById("dep_name_" + delete_item_id).value = '';
			document.getElementById("pm_" + delete_item_id).value = '';			
			document.getElementById("phone_firm_" + delete_item_id).value = '';
			document.getElementById("phone_mobile_" + delete_item_id).value = '';
			document.getElementById("inner_org_" + delete_item_id).style.display = "none";
		}
		function show_file_upload_field(field_name)
		{
			document.getElementById(field_name).style.display = "inline";
		}
	</script>
	<?php echo form_open('project_record_create/'.$project_basic_info['project_id']); //呈現網頁form表單的tag?>
	<?php
	
	?>
	<table style="width:100%; border:#AEA9B1 1px solid;">		
		<tr class="form_title" style="display:none">
			<td colspan="2" class="table_title" style="height:40px">◎ 專案紀錄內容</td>
			<td></td>
		</tr>
		<tr style="display:none">
			<td class="title">記錄人員</td>
			<td class="data"><?php if(!empty($record['person'])){echo $record['person'];} else { echo "陳健發";}?></td>
		</tr>
		<tr style="display:none">
			<td class="title">專案狀態</td>
			<td class="data">
			<input type="radio" name="status" value="1" <?php if($project_basic_info['status'] == 1) echo "checked";?>>執行中&nbsp;
			<input type="radio" name="status" value="0" <?php if($project_basic_info['status'] == 0) echo "checked";?>>結案
			</td>
		</tr>
		<tr style="display:none">
			<td class="title">專案階段</td>
			<td class="data">
				<select name="phase">				
				<!--<option value="0">創意提案</option>-->
				<option value="1" <?php if($project_basic_info['phase'] == 1) echo "selected";?>>創意提案</option>
				<option value="2" <?php if($project_basic_info['phase'] == 2) echo "selected";?>>需求定義</option>
				<option value="3" <?php if($project_basic_info['phase'] == 3) echo "selected";?>>可行性評估</option>
				<option value="4" <?php if($project_basic_info['phase'] == 4) echo "selected";?>>試作件製作</option>
				</select>
			</td>
		</tr>
		<?php
		//if($record['phase'] >= 1)  //RSD 需求定義
		//{			
		?>
		<tr class="form_title" <?php if($project_basic_info['phase'] < 1) {echo 'style="display:none"';}?>>
			<td colspan="2" class="table_title" style="font-weight:100;height:40px">◎ 創意提案階段</td>
			<td></td>
		</tr>
		<tr <?php if($project_basic_info['phase'] < 1) {echo 'style="display:none"';}?>>
			<td class="title" >情境<!--<div class="hint"> (150字內)</div>-->
			<!--<br/>[<input style="background:#F0F0F0;border:0px;color:#344FA6" type="button" name="senario_button" value="+上傳檔案" onclick="show_file_upload_field('senario_file')">]</td>-->
			<td class="data"><textarea width="900px" name="senario" rows="2" cols="100"><?php if(!empty($record['senario'])) echo str_ireplace("<br />", "", $record['senario']); ?></textarea>
			<input style="display:none" type="file" id="senario_file" name="senario_file">
			</td>
		</tr>
		<?php 
		if($project_basic_info['phase'] == 1)
		{
		?>
		<tr>
			<td class="title" >功能概述
			<!--<br/>[<input style="background:#F0F0F0;border:0px;color:#344FA6" type="button" name="function_brief_specification" value="+上傳檔案" onclick="show_file_upload_field('function_brief_description')">]--><!--<div class="hint"> (150字內)</div>-->
			</td>
			<td class="data"><textarea width="900px" name="feature_introduction" rows="2" cols="100"><?php if(!empty($record['feature_introduction'])) echo str_ireplace("<br />", "", $record['feature_introduction']); ?></textarea><?php //if(!empty($record['feature_introduction'])){ echo $record['feature_introduction'];} else {echo "--";}?>
			<input style="display:none" type="file" id="function_brief_description" name="function_brief_description">
			</td>
		</tr>
		<?php
		}
		?>
		<tr <?php if($project_basic_info['phase'] < 1) {echo 'style="display:none"';}?>>		
			<td class="title" >差異化(市場)<!--<div class="hint"> (150字內)</div>--></td>		
			<td class="data"><textarea width="900px" name="distinction_market" rows="2" cols="100"><?php if(!empty($record['distinction_market'])) echo str_ireplace("<br />", "", $record['distinction_market']); ?></textarea><?php //if(!empty($record['distinction_market'])){echo $record['distinction_market'];} else {echo "--";}?></td>
		</tr>
		<tr <?php if($project_basic_info['phase'] < 1) {echo 'style="display:none"';}?>>		
			<td class="title" >差異化(KM)<!--div class="hint"> (150字內)</div>--></td>	
			<td class="data"><textarea width="900px" name="distinction_km" rows="2" cols="100"><?php if(!empty($record['distinction_km'])) echo str_ireplace("<br />", "", $record['distinction_km']); ?></textarea><?php //if(!empty($record['distinction_km'])){echo $record['distinction_km'];} else {echo "--";}?></td>
		</tr>	
		<tr <?php if($project_basic_info['phase'] < 1) {echo 'style="display:none"';}?>>
			<td class="title" >價值性<!--<div class="hint"> (150字內)</div>--></td>
			<td class="data"><textarea width="900px" name="value" rows="2" cols="100"><?php if(!empty($record['value'])) echo str_ireplace("<br />", "", $record['value']); ?></textarea><?php //if(!empty($record['value'])){ echo $record['value'];} else {echo "--";}?></td>
		</tr>
		<tr <?php if($project_basic_info['phase'] < 1) {echo 'style="display:none"';}?>>
			<td class="title" >初步可行性<!--<div class="hint"> (150字內)</div>--></td>
			<td class="data"><textarea width="900px" name="feasibility" rows="2" cols="100"><?php if(!empty($record['feasibility'])) echo str_ireplace("<br />", "", $record['feasibility']); ?></textarea><?php //if(!empty($record['feasibility'])){ echo $record['feasibility'];} else {echo "--";}?></td>
		</tr>
		<?php
		//}
		?>
		<?php
		//if($record['phase'] >= 2)  //RSD 需求定義
		//{	
		?>
		<tr class="form_title" <?php if($project_basic_info['phase'] < 2) {echo 'style="display:none"';}?>>
			<td colspan="2" class="table_title" style="font-weight:100;height:40px">◎ 需求定義階段</td>
			<td></td>
		</tr>
		<tr <?php if($project_basic_info['phase'] < 2) {echo 'style="display:none"';}?>>
			<td class="title" >導入車型</td>
			<td class="data"><textarea width="900px" name="car_model" rows="2" cols="100"><?php if(!empty($record['car_model'])) echo $record['car_model']; ?></textarea><?php //if(!empty($record['car_model'])){ echo $record['car_model'];} else {echo "--";}?></td>
		</tr>
		<?php 
		if($project_basic_info['phase'] >= 2)
		{
		?>
		<tr>
			<td class="title" >功能詳述
			<!--<br/>[<input style="background:#F0F0F0;border:0px;color:#344FA6" type="button" name="function_specification" value="+上傳檔案" onclick="show_file_upload_field('function_spe_file_upload')">]-->
			<!--<div class="hint"> (200字內)</div>--></td>
			<td class="data"><textarea width="900px" name="feature_introduction" rows="2" cols="100"><?php if(!empty($record['feature_introduction'])) echo str_ireplace("<br />", "", $record['feature_introduction']); ?></textarea><?php //if(!empty($record['feature_introduction'])){ echo $record['feature_introduction'];} else {echo "--";}?>
			<br/><input style="display:none" type="file" id="function_spe_file_upload" name="function_spe_file_upload">
			</td>
		</tr>
		<?php 
		}
		?>
		<tr <?php if($project_basic_info['phase'] < 2) {echo 'style="display:none"';}?>>
			<td class="title" >功能架構
			<br/>[<input style="background:#F0F0F0;border:0px;color:#344FA6" type="button" name="add_function" value="+新增" onclick="add_function_input_field()">]
			<td class="data" >
			<div style="padding-top:5px;padding-bottom:5px;margin-bottom:5px;width:98%;border:1px solid #ffffff;border-bottom:1px solid #AEA9B1"><div style="padding-left:5px;width:20%;float:left;text-align:center">功能名稱</div><div style="width:80%;text-align:center;margin-left:200px">需求規格<!--<span class="hint"> (150字內)</span>--></div></div>
			<?php
			$i=0;
			while($i < count($all_functions))
			{				
			?>
				<div id="<?php echo "function_".$i;?>" style="padding-top:5px;padding-bottom:5px;width:98%;border-bottom:1px solid #ffffff;border-left:1px solid #ffffff;border-right:1px solid #ffffff">
					<div style="padding-left:5px;width:20%;float:left"><input type="text" size="20" name="<?php echo "function_name_".$i;?>" value="<?php if(!empty($all_functions[$i]['function_name'])) echo $all_functions[$i]['function_name']; ?>"/></div>
					<div style="width:103%;text-align:center">
					<div style="float:left;margin-left:70px;padding-bottom:20px" ><textarea cols="71" rows="2" name="<?php echo "function_specification_".$i;?>"><?php if(!empty($all_functions[$i]['function_specification'])) echo str_ireplace("<br />", "", $all_functions[$i]['function_specification']); ?></textarea></div>
					<!--<div style="padding-bottom:30px">&nbsp;<?php //echo anchor('project/project_record_create/'. $record['id'], "刪除" ,'style="font-size:12pt;"');?></div>-->
					</div>
					<!---->
				<div id="<?php echo "fsc_".$i;?>" style="clear:left">
				<input type="hidden" name="project_id" value="">
				<b><p>法規限制</p></b>
				<textarea id="rule_<?php echo $i;?>" name="rule_<?php echo $i;?>"  cols="60" rows="5">
				<?php 
				      if(file_exists("application/assets/project". $all_functions[$i]['rule_restriction']))
				      {
					  $text_rule=file_get_contents($project_location. $all_functions[$i]['rule_restriction']); 
				      echo str_replace('$project_location',$project_location,$text_rule);
			          }
				?> 
				</textarea>
				<b><p>技術限制</p></b>
				<textarea id="tech_<?php echo $i;?>" name="tech_<?php echo $i;?>"  cols="60" rows="5">
				<?php if(file_exists("application/assets/project". $all_functions[$i]['tech_restriction']))
				      {
					  $text_tech=file_get_contents($project_location. $all_functions[$i]['tech_restriction']); 
				      echo str_replace('$project_location',$project_location,$text_tech);
                      }				
				?>
				</textarea>
				<b><p>專利限制</p></b>
				<textarea id="patent_<?php echo $i;?>" name="patent_<?php echo $i;?>"  cols="60" rows="5">
				<?php if(file_exists("application/assets/project". $all_functions[$i]['patent_restriction']))
				      {
					  $text_patent=file_get_contents($project_location. $all_functions[$i]['patent_restriction']); 
				      echo str_replace('$project_location',$project_location,$text_patent);
				      }
				?>
				</textarea>
				<b><p>功能原型(Functional Prototype)</p></b>
				設計開發：<input type="text" name="fp_design_dev_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_design_dev'])) echo $all_functions[$i]['fp_design_dev'];?>">
				驗    證：<input type="text" name="fp_validation_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_validation'])) echo $all_functions[$i]['fp_validation'];?>">
				<br/>試 作 件：<input type="text" name="fp_sample_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_sample'])) echo $all_functions[$i]['fp_sample'];?>">
				時    程：<input type="text" name="fp_delivery_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['fp_delivery'])) echo $all_functions[$i]['fp_delivery'];?>">
				<b><p>量產原型(production Prototype)</p></b>
				設計開發：<input type="text" name="pp_design_dev_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_design_dev'])) echo $all_functions[$i]['pp_design_dev'];?>">
				模具：<input type="text" name="pp_mold_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_mold'])) echo $all_functions[$i]['pp_mold'];?>">
				治具：<input type="text" name="pp_jig_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_jig'])) echo $all_functions[$i]['pp_jig'];?>">
				<br/>檢具：<input type="text" name="pp_gauge_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_gauge'])) echo $all_functions[$i]['pp_gauge'];?>">
				驗證：<input type="text" name="pp_validation_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_validation'])) echo $all_functions[$i]['pp_validation'];?>">
				預計產量：<input type="text" name="pp_quantity_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_quantity'])) echo $all_functions[$i]['pp_quantity'];?>">
				<br/>時    程：<input type="text" name="pp_delivery_<?php echo $i;?>" value="<?php if(!empty($all_functions[$i]['pp_delivery'])) echo $all_functions[$i]['pp_delivery'];?>"><br>
				<!--<input type="submit" value="儲存編輯內容" onclick="if(confirm('是否確認儲存？')) return true;else return false">-->
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
				</div>				
				<!---->
				</div>								
			<?php	
				$i++;				
			}
			echo form_input(array('name' => 'function_current_display', 'type'=>'hidden', 'id' =>'function_current_display', 'value'=>$i));
			while($i < 10)
			{
			?>			
				<div id="<?php echo "function_".$i;?>" style="padding-top:5px;padding-bottom:5px;width:98%;border-bottom:1px solid #ffffff;border-left:1px solid #ffffff;border-right:1px solid #ffffff;display:none">
					<div style="padding-left:5px;width:20%;float:left"><input type="text" size="20" name="<?php echo "function_name_".$i;?>"/></div>
					<div style="width:103%;text-align:center">
					<div style="float:left;margin-left:70px;padding-bottom:20px"><textarea cols="71" rows="2" name="<?php echo "function_specification_".$i;?>"></textarea></div>
					<!--<div style="padding-bottom:30px">&nbsp;<?php //echo anchor('project/project_record_create/'. $record['id'], "刪除" ,'style="font-size:12pt;"');?></div>-->
					</div>
					<div id="<?php echo "fsc_".$i;?>" style="clear:left">
				<input type="hidden" name="project_id" value="">
				<b><p>法規限制</p></b>
				<textarea id="rule_<?php echo $i;?>" name="rule_<?php echo $i;?>"  cols="60" rows="5"></textarea>
				<b><p>技術限制</p></b>
				<textarea id="tech_<?php echo $i;?>" name="tech_<?php echo $i;?>"  cols="60" rows="5"></textarea>
				<b><p>專利限制</p></b>
				<textarea id="patent_<?php echo $i;?>" name="patent_<?php echo $i;?>"  cols="60" rows="5"></textarea>
				<b><p>功能原型(Functional Prototype)</p></b>
				設計開發：<input type="text" name="fp_design_dev_<?php echo $i;?>">
				驗    證：<input type="text" name="fp_validation_<?php echo $i;?>">
				試 作 件：<input type="text" name="fp_sample_<?php echo $i;?>">
				時    程：<input type="text" name="fp_delivery_<?php echo $i;?>">
				<b><p>量產原型(production Prototype)</p></b>
				設計開發：<input type="text" name="pp_design_dev_<?php echo $i;?>">
				模具：<input type="text" name="pp_mold_<?php echo $i;?>">
				治具：<input type="text" name="pp_jig_<?php echo $i;?>">
				檢具：<input type="text" name="pp_gauge_<?php echo $i;?>">
				驗證：<input type="text" name="pp_validation_<?php echo $i;?>">
				預計產量：<input type="text" name="pp_quantity_<?php echo $i;?>">
				時    程：<input type="text" name="pp_delivery_<?php echo $i;?>"><br>
				<!--<input type="submit" value="儲存編輯內容" onclick="if(confirm('是否確認儲存？')) return true;else return false">-->
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
				</div>
				</div>				
			<?php				
				$i++;
			}		
			?>
			</td>
		</tr>
		<tr class="form_title" <?php echo 'style="display:none"';?>>
			<td colspan="2" class="table_title" style="font-weight:100;height:40px">◎ 可行性評估階段</td>
			<td></td>
		</tr>
		<tr <?php echo 'style="display:none"';?>>
			<td class="title">法規限制</td>
			<td class="data"><textarea width="900px" name="rule_restriction" rows="1" cols="100"><?php if(!empty($record['rule_restriction'])) echo $record['rule_restriction']; ?></textarea></td>
		</tr>
		<tr <?php echo 'style="display:none"';?>>
			<td class="title">技術限制</td>
			<td class="data"><textarea width="900px" name="tech_restriction" rows="1" cols="100"><?php if(!empty($record['tech_restriction'])) echo $record['tech_restriction']; ?></textarea></td>
		</tr>
		<tr <?php echo 'style="display:none"';?>>
			<td class="title">專利限制</td>
			<td class="data"><textarea width="900px" name="patent_restriction" rows="1" cols="100"><?php if(!empty($record['patent_restriction'])) echo $record['patent_restriction']; ?></textarea></td>
		</tr>
		<tr <?php echo 'style="display:none"';?>>
			<td class="title">FP成本與時程評估<div class="hint">(單位 NT.)</div></td>
			<td class="data">設計開發成本：<input style="text-align:right" size="8px" name="fp_design_dev" value="<?php if(!empty($record['fp_design_dev'])) echo $record['fp_design_dev']; ?>"/>&nbsp;驗證成本：<input style="text-align:right" size="8px" name="fp_validation" value="<?php if(!empty($record['fp_validation'])) echo $record['fp_validation']; ?>"/>&nbsp;試作件成本：<input style="text-align:right" size="8px" name="fp_sample" value="<?php if(!empty($record['fp_sample'])) echo $record['fp_sample']; ?>"/>&nbsp;遞送時間：<input size="8px" name="fp_delivery" value="<?php if(!empty($record['fp_delivery'])) echo $record['fp_delivery']; ?>"/></td>
		</tr>		
		<tr <?php echo 'style="display:none"';?>>
			<td class="title">PP成本與時程評估<div class="hint">(單位 NT.)</div></td>
			<td class="data"><p style="padding-top:5px">設計開發成本：<input style="text-align:right" size="8px" name="pp_design_dev" value="<?php if(!empty($record['pp_design_dev'])) echo $record['pp_design_dev']; ?>"/>&nbsp;模具成本：<input style="text-align:right" size="8px" name="pp_mold" value="<?php if(!empty($record['pp_mold'])) echo $record['pp_mold']; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;治具成本：<input style="text-align:right" size="8px" name="pp_jig" value="<?php if(!empty($record['pp_jig'])) echo $record['pp_jig']; ?>"/>&nbsp;檢具成本：<input style="text-align:right" size="8px" name="pp_gauge" value="<?php if(!empty($record['pp_gauge'])) echo $record['pp_gauge']; ?>" /></p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;驗證成本：<input style="text-align:right" size="8px" name="pp_validation" value="<?php if(!empty($record['pp_validation'])) echo $record['pp_validation']; ?>"/>&nbsp;預計產量：<input style="text-align:right" size="8px" name="pp_quantity" value="<?php if(!empty($record['pp_quantity'])) echo $record['pp_quantity']; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;單件成本：<input style="text-align:right" size="8px" name="pp_unit_cost" value="<?php if(!empty($record['pp_unit_cost'])) echo $record['pp_unit_cost']; ?>"/>&nbsp;遞送時間：<input size="8px" name="pp_delivery" value="<?php if(!empty($record['pp_delivery'])) echo $record['pp_delivery']; ?>"/></p><?php //if(!empty($record['function_specification'])){echo $record['function_specification'];} else {echo "--";}?>
			</td>
		</tr>
		
		<?php
		$person = $username;  
		echo form_hidden('person', $person);
		echo form_hidden('pm', $project_basic_info['pm']);
		echo form_hidden('project_id', $project_basic_info['project_id']);
		?> 
	</table>		
	<br/>
	<table border="1" style="font-size:14pt;width:100%; border:#AEA9B1 1px solid;">
	<tr class="form_title">
		<td colspan="6" class="table_title" style="font-weight:100;height:40px;">◎ 合作組織單位</td>
	</tr>	
	<tr>
		<td class="title">內部部門組別
		<br/>[<input style="background:#F0F0F0;border:0px;color:#344FA6" type="button" name="add_inner_department" value="+新增" onclick="add_inner_dep_input_field()">]
		</td>
		<td class="data">
		<table width="100%" style="table-layout:fixed;line-height:28px">
		<tr style="font-size:13pt;text-align:center">
			<td <?php //if($record['phase'] < 2){echo "style=display:none";} ?>>系統部品</td>
			<td>部門</td>
			<td>組別</td>
			<td>擔當</td>
			<td width="20%">電話#分機</td>
			<td>手機</td>
			<!--<td>備註</td>-->
		</tr>
		<?php 
		$j=0;
		foreach($relative_organizations as $organization)
		{
			if($organization['unit_class'] == 4)
			{			
		?>			
				<tr id="<?php echo "inner_org_".$j;?>" style="font-size:12pt;text-align:center">
				<td <?php //if($record['phase'] < 2){echo "style=display:none";} ?>>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:100px;" name="<?php echo "function_id_".$j;?>">
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
				<td><input id="<?php echo "org_name_".$j;?>" size="10px" name="<?php echo "org_name_".$j;?>" value="<?php echo $organization['org_name']?>"></td>
				<td><input id="<?php echo "dep_name_".$j;?>" size="9px" name="<?php echo "dep_name_".$j;?>" value="<?php echo $organization['dep_name']?>"></td>
				<?php echo form_hidden('unit_class_'.$j, 4);?>
				<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
				<td><input id="<?php echo "pm_".$j;?>" size="9px" name="<?php echo "pm_".$j;?>" value="<?php echo $organization['pm']?>"></td>
				<td><input id="<?php echo "phone_firm_".$j;?>" size="15px" name="<?php echo "phone_firm_".$j;?>" value="<?php echo $organization['phone_firm']?>"></td>
				<td><input id="<?php echo "phone_mobile_".$j;?>" size="10px" name="<?php echo "phone_mobile_".$j;?>" value="<?php echo $organization['phone_mobile']?>"></td>
				<td><input style="background:#ffffff;border:0px;color:#344FA6" type="button" name="delete" value="[刪除]" onclick="delete_inner_dep_input_field(<?php echo $j;?>)"></td>
				<!--<td><input size="10px" name="<?php //echo "memo_".$j;?>" value="<?php //if(!empty($organization['memo'])){ echo $organization['memo'];}?>"></td>-->
				</tr>
		<?php
				$j++;
			}
			else
			{
				continue;
			}
		}
		echo form_input(array('name' => 'inner_current_display', 'type'=>'hidden', 'id' =>'inner_current_display', 'value'=>$j));
		while($j < 10)
		{
		?>			
			<tr id="<?php echo "inner_org_".$j;?>" style="font-size:12pt;text-align:center;display:none" >
				<td style="padding-left:12px" align="center" <?php //if($record['phase'] < 2){echo " style=display:none";} ?>>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:100px;" name="<?php echo "function_id_".$j;?>">
						<option value="NULL">尚無指定</option>
						<?php	
							$function_count = 0;
							foreach($all_functions as $feature)
							{
						?>
								<option value="<?php echo $function_count;?>"><?php echo $feature['function_name'];?></option>
						<?php
								$function_count++;
							}
						?>
					</select>
				</td>
				<td style="padding-left:16px"><input id="<?php echo "org_name_".$j;?>" size="10px" name="<?php echo "org_name_".$j;?>"></td>
				<td style="padding-left:10px"><input id="<?php echo "dep_name_".$j;?>" size="9px" name="<?php echo "dep_name_".$j;?>"></td>	
				<?php echo form_hidden('unit_class_'.$j, 4);?>				
				<td style="padding-left:14px"><input id="<?php echo "pm_".$j;?>" size="9px" name="<?php echo "pm_".$j;?>"></td>
				<td style="padding-left:21px"><input id="<?php echo "phone_firm_".$j;?>" size="15px" name="<?php echo "phone_firm_".$j;?>"></td>
				<td style="padding-left:18px"><input id="<?php echo "phone_mobile_".$j;?>" size="10px" name="<?php echo "phone_mobile_".$j;?>"></td>
				<td style="padding-left:40px"><input style="background:#ffffff;border:0px;color:#344FA6" type="button" name="delete" value="[刪除]" onclick="delete_inner_dep_input_field(<?php echo $j;?>)"></td>
				<!--<td style="padding-left:7px"><input size="10px" name="<?php echo "memo_".$j;?>" value=""></td>-->
			</tr>	
		<?php
			$j++;
		}
	?>	
		</table>
		</td>
	</tr>
	<tr>
		<td class="title">外部組織單位
		<br/>[<input style="background:#F0F0F0;border:0px;color:#344FA6" type="button" name="add_inner_department" value="+新增" onclick="add_outer_org_input_field()">]
		</td>
		<td class="data">
		<table width="100%" style="table-layout:fixed;line-height:28px">
		<tr style="font-size:13pt;text-align:center">
			<td <?php //if($record['phase'] < 2){echo "style=display:none";} ?>>系統部品</td>
			<td>組織</td>
			<td>單位</td>
			<td>擔當</td>
			<td width="20%">電話#分機</td>
			<td>手機</td>
			<!--<td>備註</td>-->
		</tr>		
		<?php
		$j=10;
		foreach($relative_organizations as $organization)
		{
			if($organization['unit_class'] == 1 || $organization['unit_class'] == 2 || $organization['unit_class'] == 3)
			{			
		?>			
				<tr id="<?php echo "outer_org_".$j;?>" style="font-size:12pt;text-align:center">
				<td <?php //if($record['phase'] < 2){echo "style=display:none";} ?>>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:100px;" name="<?php echo "function_id_".$j;?>">
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
				<td><input id="<?php echo "org_name_".$j;?>" size="10px" name="<?php echo "org_name_".$j;?>" value="<?php echo $organization['org_name']?>"></td>
				<td><input id="<?php echo "dep_name_".$j;?>" size="9px" name="<?php echo "dep_name_".$j;?>" value="<?php echo $organization['dep_name']?>"></td>
				<?php echo form_hidden('unit_class_'.$j, 1);?>
				<?php echo form_hidden('level_class_'.$j, $organization['level_class']);?>
				<td><input id="<?php echo "pm_".$j;?>" size="9px" name="<?php echo "pm_".$j;?>" value="<?php echo $organization['pm']?>"></td>
				<td><input id="<?php echo "phone_firm_".$j;?>" size="15px" name="<?php echo "phone_firm_".$j;?>" value="<?php echo $organization['phone_firm']?>"></td>
				<td><input id="<?php echo "phone_mobile_".$j;?>" size="10px" name="<?php echo "phone_mobile_".$j;?>" value="<?php echo $organization['phone_mobile']?>"></td>
				<td><input style="background:#ffffff;border:0px;color:#344FA6" type="button" name="delete" value="[刪除]" onclick="delete_outer_org_input_field(<?php echo $j;?>)"></td>
				<!--<td><input size="10px" name="<?php echo "memo_".$j;?>" value="<?php if(!empty($organization['memo'])){ echo $organization['memo'];}?>"></td>-->
				</tr>
		<?php
				$j++;
			}
			else
			{
				continue;
			}			
		}
		echo form_input(array('name' => 'outer_current_display', 'type'=>'hidden', 'id' =>'outer_current_display', 'value'=>$j));
		while($j < 20)
		{
		?>			
			<tr id="<?php echo "outer_org_".$j;?>" style="font-size:12pt;text-align:center;display:none" >
				<td style="padding-left:12px" align="center" <?php //if($record['phase'] < 2){echo " style=display:none";} ?>>
					<select id="<?php echo "function_id_".$j;?>" style="min-width:100px;" name="<?php echo "function_id_".$j;?>">
						<option value="NULL">尚無指定</option>
						<?php	
							$function_count = 0;
							foreach($all_functions as $feature)
							{
						?>
								<option value="<?php echo $function_count;?>"><?php echo $feature['function_name'];?></option>
						<?php
								$function_count++;
							}
						?>
					</select>
				</td>
				<td style="padding-left:16px"><input id="<?php echo "org_name_".$j;?>" size="10px" name="<?php echo "org_name_".$j;?>"></td>
				<td style="padding-left:10px"><input id="<?php echo "dep_name_".$j;?>" size="9px" name="<?php echo "dep_name_".$j;?>"></td>	
				<?php echo form_hidden('unit_class_'.$j, 1);?>				
				<td style="padding-left:14px"><input id="<?php echo "pm_".$j;?>" size="9px" name="<?php echo "pm_".$j;?>" value=""></td>
				<td style="padding-left:21px"><input id="<?php echo "phone_firm_".$j;?>" size="15px" name="<?php echo "phone_firm_".$j;?>"></td>
				<td style="padding-left:18px"><input id="<?php echo "phone_mobile_".$j;?>" size="10px" name="<?php echo "phone_mobile_".$j;?>"></td>
				<td style="padding-left:40px"><input style="background:#ffffff;border:0px;color:#344FA6" type="button" name="delete" value="[刪除]" onclick="delete_outer_org_input_field(<?php echo $j;?>)"></td>
				<!--<td style="padding-left:7px"><input size="10px" name="<?php echo "memo_".$j;?>" value=""></td>-->
			</tr>	
		<?php
			$j++;
		}
	?>	
		</table>
		</td>
	</tr>	
	</table>
	<br/>
	<div style="text-align:center;padding-bottom:5px"><input type="submit" value="送出確認" style="font-size:13pt"/></div>
	</form>
	<p class="lead">
	</p>		
</div>