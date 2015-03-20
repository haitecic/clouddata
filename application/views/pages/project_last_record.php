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
	<br/>
	<?php
	//if(!empty($record))
	//{
		//echo form_open('project/project_record_create/'.$record['id']); //呈現網頁form表單的tag
	?>
	<table style="width:100%; border:#AEA9B1 1px solid;">
		<?php
		if(!empty($record['phase']) && $record['phase'] >= 1)  //RSD 需求定義
		{	
		?>
		<tr class="form_title">
			<td colspan="2" class="table_title" style="font-weight:100;height:40px;">◎ 創意提案階段</td>
			<td></td>
		</tr>
		<tr>
			<td class="title" >情境</td>
			<td class="data"><?php if(!empty($record['senario'])){ echo $record['senario'];} else{ echo "--";} ?></td>
		</tr>
		<?php
		if(!empty($record['phase']) && $record['phase']==1)
		{
		?>
		<tr>
			<td class="title" >功能概述</td>
			<td class="data"><?php if(!empty($record['feature_introduction'])){ echo $record['feature_introduction'];} else{  echo"--";} ?></td>
		</tr>
		<?php
		}
		?>
		<tr>		
			<td class="title" >差異化(市場)</td>		
			<td class="data"><?php if(!empty($record['distinction_market'])){ echo $record['distinction_market'];} else{ echo "--";} ?></td>
		</tr>
		<tr>		
			<td class="title" >差異化(KM)</td>	
			<td class="data"><?php if(!empty($record['distinction_km'])){echo $record['distinction_km'];} else{ echo "--";}  ?></td>
		</tr>	
		<tr>
			<td class="title" >價值性</td>
			<td class="data"><?php if(!empty($record['value'])){ echo $record['value'];}else{ echo "--";} ?></td>
		</tr>
		<tr>
			<td class="title" >初步可行性</td>
			<td class="data"><?php if(!empty($record['feasibility'])){ echo $record['feasibility'];} else{ echo "--";} ?></td>
		</tr>
		<?php
		}
		?>
		<?php
		if(!empty($record['phase']) && $record['phase'] >= 2)  //RSD 需求定義
		{	
		?>
		<tr class="form_title">
			<td colspan="2" class="table_title" style="font-weight:100;height:40px">◎ 需求定義階段</td>
			<td></td>
		</tr>
		<tr>
			<td class="title" >導入車型</td>
			<td class="data"><?php if(!empty($record['car_model'])){echo $record['car_model'];}else {echo "--";} ?></td>
		</tr>
		<tr>
			<td class="title" >功能詳述</td>
			<td class="data"><?php if(!empty($record['feature_introduction'])){ echo $record['feature_introduction'];} else{  echo"--";} ?></td>
		</tr>
		<tr>
			<td class="title" >功能架構</td>
			<td class="data" >
			<?php
			if(!empty($all_functions))
			{
			?>
			<div style="padding-top:5px;padding-bottom:5px;margin-bottom:5px;width:99%;border:1px solid #ffffff;border-bottom:1px solid #AEA9B1"><div style="padding-left:5px;width:30%;float:left;text-align:center">功能名稱</div><div style="width:90%;text-align:center">需求規格</div></div>
				<?php			
				$i=0;
				while($i < count($all_functions))
				{
				?>
					<div style="padding-top:5px;padding-bottom:50px;width:100%;border-bottom:1px solid #ffffff;border-left:1px solid #ffffff;border-right:1px solid #ffffff">
						<div style="padding-left:5px;width:30%;float:left"><?php if(!empty($all_functions[$i]['function_name'])){ echo $all_functions[$i]['function_name'];} else {echo "--";} ?></div>
						<div style="width:70%; float:left">
						<div style="float:left;width:100%"><?php if(!empty($all_functions[$i]['function_specification'])){ echo $all_functions[$i]['function_specification'];} else {echo "--";} ?></div>
						</div>
					</div>			
				<?php				
					$i++;
				}	
				?>
			</td>
		</tr>
		<?php
			}
			else
			{
				echo "--";
			}
		}
		?>
		<?php
		if(!empty($record['phase']) && $record['phase'] >= 3)  //FSC 可行性評估
		{	
		?>
		<tr class="form_title">
			<td colspan="2" class="table_title" style="font-weight:100;height:40px">◎ 可行性評估階段</td>
			<td></td>
		</tr>
		<tr>
			<td class="title">法規限制</td>
			<td class="data"><?php if(!empty($record['rule_restriction'])) echo $record['rule_restriction']; ?></td>
		</tr>
		<tr>
			<td class="title">技術限制</td>
			<td class="data"><?php if(!empty($record['tech_restriction'])) echo $record['tech_restriction']; ?></td>
		</tr>
		<tr>
			<td class="title">專利限制</td>
			<td class="data"><?php if(!empty($record['patent_restriction'])) echo $record['patent_restriction']; ?></td>
		</tr>
		<tr>
			<td class="title">FP評估成本<div class="hint">(單位 NT.)</div></td>
			<td class="data">
			<?php if(!empty($record['fp_design_dev'])) echo "設計開發成本：".number_format($record['fp_design_dev']); ?>&nbsp;
			<?php if(!empty($record['fp_validation'])) echo "驗證成本：".number_format($record['fp_validation']); ?>&nbsp;
			<?php if(!empty($record['fp_sample'])) echo "試作件成本：".number_format($record['fp_sample']); ?>&nbsp;
			</td>
		</tr>	
		<tr>
			<td class="title">FP計畫遞送時間</td>
			<td class="data">
			<?php if(!empty($record['fp_delivery'])) echo $record['fp_delivery']; ?></td>
		</tr>		
		<tr>
			<td class="title">PP評估成本<div class="hint">(單位 NT.)</div></td>
			<td class="data">
			<p style="padding-top:5px">
			<?php if(!empty($record['pp_design_dev'])) echo "設計開發成本：".number_format($record['pp_design_dev']); ?>&nbsp;
			<?php if(!empty($record['pp_mold'])) echo "模具成本：".number_format($record['pp_mold']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if(!empty($record['pp_jig'])) echo "治具成本：".number_format($record['pp_jig']); ?>&nbsp;
			<?php if(!empty($record['pp_gauge'])) echo "檢具成本：".number_format($record['pp_gauge']); ?>
			</p>
			<p>
			<?php if(!empty($record['pp_validation'])) echo "驗證成本：". number_format($record['pp_validation']); ?>&nbsp;
			<?php if(!empty($record['pp_quantity'])) echo "預計產量：".$record['pp_expect_production']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if(!empty($record['pp_unit_cost'])) echo "單件成本：".number_format($record['pp_unit_cost']); ?>&nbsp;
			</p>
			</td>
		</tr>
		<tr>
			<td class="title">PP計畫遞送時間</td>
			<td class="data">
			<?php if(!empty($record['pp_delivery'])) echo $record['pp_delivery']; ?></td>
		</tr>
		<?php		
		}
		//$person = "陳健發";
		//echo form_hidden('person', $person);
		//echo form_hidden('project_id', $record['project_id']);
		//echo form_hidden('phase', $record['phase']);
		//echo form_hidden('class', $record['class']);
		//echo form_hidden('unit_id', $record['unit_id']);
		?> 
	</table>	
	
	</form>
	<?php
	//}
	?>
	<p class="lead">
	</p>		
</div>