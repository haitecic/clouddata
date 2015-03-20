	<script>	
	// 預設顯示第一個 Tab
    var _showTab = 0;
	function show_fsc_detail(show_fsc_id)
	{
		$("#mwt_mwt_slider_scroll").animate({right:'0px' }, 600 ,'swing');
		document.getElementById("rule_restriction").innerHTML = document.getElementById("rule_restriction_"+show_fsc_id).value;
		document.getElementById("tech_restriction").innerHTML = document.getElementById("tech_restriction_"+show_fsc_id).value;
		document.getElementById("patent_restriction").innerHTML = document.getElementById("patent_restriction_"+show_fsc_id).value;
		document.getElementById("fp_design_dev").innerHTML = document.getElementById("fp_design_dev_"+show_fsc_id).value;
		document.getElementById("fp_validation").innerHTML = document.getElementById("fp_validation_"+show_fsc_id).value;
		document.getElementById("fp_sample").innerHTML = document.getElementById("fp_sample_"+show_fsc_id).value;
		document.getElementById("fp_delivery").innerHTML = document.getElementById("fp_delivery_"+show_fsc_id).value;
		document.getElementById("pp_design_dev").innerHTML = document.getElementById("pp_design_dev_"+show_fsc_id).value;
		document.getElementById("pp_mold").innerHTML = document.getElementById("pp_mold_"+show_fsc_id).value;
		document.getElementById("pp_jig").innerHTML = document.getElementById("pp_jig_"+show_fsc_id).value;
		document.getElementById("pp_gauge").innerHTML = document.getElementById("pp_gauge_"+show_fsc_id).value;
		document.getElementById("pp_validation").innerHTML = document.getElementById("pp_validation_"+show_fsc_id).value;
		document.getElementById("pp_quantity").innerHTML = document.getElementById("pp_quantity_"+show_fsc_id).value;
		document.getElementById("pp_unit_cost").innerHTML = document.getElementById("pp_unit_cost_"+show_fsc_id).value;
		document.getElementById("pp_delivery").innerHTML = document.getElementById("pp_delivery_"+show_fsc_id).value;
	}
	$(function(){
		var w = $("#mwt_slider_content").width();
		$("#mwt_slider_content").mouseleave(function(){　//滑鼠離開後
			$("#mwt_mwt_slider_scroll").animate( {right:'-'+w+'px' }, 600 ,'swing');    
		}); 	

    //=================================================================

    $('.abgne_tab').each(function(){
        // 目前的頁籤區塊
        var $tab = $(this);
 
        var $defaultLi = $('.tabs li', $tab).eq(_showTab).addClass('active');
        $($defaultLi.find('a').attr('href')).siblings().hide();

        // 當 li 頁籤被點擊時
        // 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
        $('.tabs li', $tab).click(function() {
            // 找出 li 中的超連結 href(#id)
            var $this = $(this);
            var _clickTab = $this.find('a').attr('href');
            // 把目前點擊到的 li 頁籤加上 .active
            // 並把兄弟元素中有 .active 的都移除 class
            $this.addClass('active').siblings('.active').removeClass('active');
            // 淡入相對應的內容並隱藏兄弟元素
            $(_clickTab).stop(false, true).fadeIn().siblings().hide();
 
            return false;
        }).find('a').focus(function(){
            this.blur();
        });
    });
	
    //=================================================================

    $("button").focus(function(){   //消除按鈕邊框虛線
	       this.blur();  
	});
}); 
  </script>  
	<!--新加入-->
	<div id="header" style="font-size:12pt">
	<div id="mwt_mwt_slider_scroll">
		<div id="mwt_slider_content">
			<div class="tab_bg">
			<div class="tab_header_top"></div>
			<div class="tab_header_line"></div>
			<p class="tab_header_txt">可行性評估</p>
			<div class="abgne_tab">
			<ul class="tabs">
				<li><a href="#rule_restriction">法規限制</a></li>
				<li><a href="#tech_restriction">技術限制</a></li>
				<li><a href="#patent_restriction">專利限制</a></li>
				<li><a href="#fp">功能原型</a></li>
				<li><a href="#pp">量產原型</a></li>
			</ul>
			<div class="tab_container">
			<div id="rule_restriction" class="tab_content">
				<!--<h2>Title</h2>
				<p id="">content</p>-->
			</div>
			<div id="tech_restriction" class="tab_content">
				<!--<h2>Title</h2>
				<p>content</p>-->
			</div>
			<div id="patent_restriction" class="tab_content">
				<!--<h2>Title</h2>
				<p>content</p>-->
			</div>
			<div id="fp" class="tab_content">
				<div class="tab4_all">
					<div class="t_01">
						<div class="t_01_icon"></div>
						<div class="t_01_txt">開發設計：<span style="font-weight:normal" id="fp_design_dev"></span></div>
					</div>
					<br/>
					<!--<div class="t_01_01"></div>-->
					<div class="t_02">
						<div class="t_02_icon"></div>
						<div class="t_02_txt">驗證：<span style="font-weight:normal" id="fp_validation"></span></div>
					</div>
					<br/>
					<!--<div class="t_02_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_03">
						<div class="t_03_icon"></div>
						<div class="t_03_txt">試作件：<span style="font-weight:normal" id="fp_sample"></span></div>
					</div>
					<!--<div class="t_03_01">XXXXXXXXXXXXXXX</div>-->
					<br/>
					<div class="t_04">
						<div class="t_04_icon"></div>
						<div class="t_04_txt">時程：<span style="font-weight:normal" id="fp_delivery"></span></div>
					</div>
					<!--<div class="t_04_01">XXXXXXXXXXXXXXX</div>-->
				</div>
			</div>
			<div id="pp" class="tab_content">
				<div class="tab5_all">
					<div class="t_05">
						<div class="t_05_icon"></div>
						<div class="t_05_txt">設計開發：<span style="font-weight:normal" id="pp_design_dev"></span></div>
					</div>
					<br/>
					<!--<div class="t_05_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_06">
						<div class="t_06_icon"></div>
						<div class="t_06_txt">模具：<span style="font-weight:normal" id="pp_mold"></span></div>
					</div>
					<br/>
					<!--<div class="t_06_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_07">
						<div class="t_07_icon"></div>
						<div class="t_07_txt">製具：<span style="font-weight:normal" id="pp_jig"></span></div>
					</div>
					<br/>
					<!--<div class="t_07_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_08">
						<div class="t_08_icon"></div>
						<div class="t_08_txt">檢具：<span style="font-weight:normal" id="pp_gauge"></span></div>
					</div>
					<br/>
					<!--<div class="t_08_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_09">
						<div class="t_09_icon"></div>
						<div class="t_09_txt">驗證：<span style="font-weight:normal" id="pp_validation"></span></div>
					</div>
					<br/>
					<!--<div class="t_09_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_10">
						<div class="t_10_icon"></div>
						<div class="t_10_txt">預計量產：<span style="font-weight:normal" id="pp_quantity"></span></div>
					</div>
					<br/>
					<!--<div class="t_10_01">XXXXXXXXXXXXXXX</div>-->
					<div class="t_11">
						<div class="t_11_icon"></div>
						<div class="t_11_txt">單件成本：<span style="font-weight:normal" id="pp_unit_cost"></span></div>
					</div>
					
					<div class="t_11">
						<div class="t_11_icon"></div>
						<div class="t_11_txt">時程：<span style="font-weight:normal" id="pp_delivery"></span></div>
					</div>					
					<!--<div class="t_11_01">XXXXXXXXXXXXXXX</div>-->
				</div>
			</div>
			</div>
			</div>
			</div>
		</div>
	</div>
	</div>
	<!--新加入-->
	<!-- Begin page content -->
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
	<?php echo form_open('project/project_record_create/'.$record['id']); //呈現網頁form表單的tag?>
	<table style="width:100%; border:#AEA9B1 1px solid;">
		<tr class="form_title" style="display:none">
			<td colspan="2" class="table_title" style="height:40px">◎ 最新紀錄內容</td>
			<td></td>
		</tr>
		<tr style="display:none">
			<td class="title" >記錄時間</td>
			<td class="data"><?php if(!empty($record['create_datetime'])){ echo $record['create_datetime'];} else {echo "--";}?></td>
		</tr>
		<tr style="display:none">
			<td class="title" >記錄人員</td>
			<td class="data"><?php if(!empty($record['person'])){echo $record['person'];} else {echo "--";}?></td>
		</tr>
		<tr style="display:none">
			<td class="title">記錄階段</td>
			<td class="data">
			<?php
			switch($record['phase'])
			{
				case 0: 
					echo "提案中";
					break;
				case 1:
					echo "創意提案 (IDC)";
					break;
				case 2:
					echo "需求定義 (RSD)";
					break;
				case 3:
					echo "可行性評估 (FSC)";
					break;
				case 4:
					echo "試作件製作 (PMA)"; 
					break;
			}
			?>
			</td>
		</tr>
		<?php
		if($record['phase'] >= 1)  //RSD 需求定義
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
		if($record['phase']==1)
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
		if($record['phase'] >= 2)  //RSD 需求定義
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
						<div style="width:55%;float:left;word-break:normal;overflow:auto;">
						<?php if(!empty($all_functions[$i]['function_specification'])){ echo $all_functions[$i]['function_specification'];} else {echo "--";} ?>
						</div>						
						<div style="padding-left:10px;width:15%; float:left">
						<input id="fsc_detail"  type="button" name="senario_button" value="可行性評估" onclick="show_fsc_detail(<?php echo $i;?>)">
						</div>
					</div>	
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
					echo form_input(array('type'=>'hidden', 'id' =>'rule_restriction_'.$i, 'value'=>$text_rule));
					if(file_exists("application/assets/project". $all_functions[$i]['tech_restriction']))
				      {
					  $text_tech=file_get_contents($project_location. $all_functions[$i]['tech_restriction']); 
				      $text_tech=str_replace('$project_location',$project_location,$text_tech);
			          }
					  else
					  {
					  $text_tech="";					
					  }
					echo form_input(array('type'=>'hidden', 'id' =>'tech_restriction_'.$i, 'value'=>$text_tech));
					if(file_exists("application/assets/project". $all_functions[$i]['patent_restriction']))
				      {
					  $text_patent=file_get_contents($project_location. $all_functions[$i]['patent_restriction']); 
				      $text_patent=str_replace('$project_location',$project_location,$text_patent);
			          }
					  else
					  {
					  $text_patent="";					
					  }					
					echo form_input(array('type'=>'hidden', 'id' =>'patent_restriction_'.$i, 'value'=>$text_patent));
					echo form_input(array('type'=>'hidden', 'id' =>'fp_design_dev_'.$i, 'value'=>$all_functions[$i]['fp_design_dev']));
					echo form_input(array('type'=>'hidden', 'id' =>'fp_validation_'.$i, 'value'=>$all_functions[$i]['fp_validation']));
					echo form_input(array('type'=>'hidden', 'id' =>'fp_sample_'.$i, 'value'=>$all_functions[$i]['fp_sample']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_design_dev_'.$i, 'value'=>$all_functions[$i]['pp_design_dev']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_mold_'.$i, 'value'=>$all_functions[$i]['pp_mold']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_jig_'.$i, 'value'=>$all_functions[$i]['pp_jig']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_gauge_'.$i, 'value'=>$all_functions[$i]['pp_gauge']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_validation_'.$i, 'value'=>$all_functions[$i]['pp_validation']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_quantity_'.$i, 'value'=>$all_functions[$i]['pp_quantity']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_unit_cost_'.$i, 'value'=>$all_functions[$i]['pp_unit_cost']));
					echo form_input(array('type'=>'hidden', 'id' =>'fp_delivery_'.$i, 'value'=>$all_functions[$i]['fp_delivery']));
					echo form_input(array('type'=>'hidden', 'id' =>'pp_delivery_'.$i, 'value'=>$all_functions[$i]['pp_delivery']));
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
		if(false)  //FSC 可行性評估
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
			<?php if(!empty($record['fp_prototype'])) echo "試作件成本：".number_format($record['fp_prototype']); ?>&nbsp;
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
			<?php if(!empty($record['pp_fixture'])) echo "治具成本：".number_format($record['pp_fixture']); ?>&nbsp;
			<?php if(!empty($record['pp_gauge'])) echo "檢具成本：".number_format($record['pp_gauge']); ?>
			</p>
			<p>
			<?php if(!empty($record['pp_validation'])) echo "驗證成本：". number_format($record['pp_validation']); ?>&nbsp;
			<?php if(!empty($record['pp_expect_production'])) echo "量產成本：".number_format($record['pp_expect_production']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
		?> 
	</table>
	<br/>
	
	<table border="1" style="font-size:14pt;width:100%; border:#AEA9B1 1px solid;">
	<tr class="form_title">
		<td colspan="6" class="table_title" style="font-weight:100;height:40px;">◎ 合作組織單位</td>
	</tr>
	<tr>
		<td class="title">內部部門組別</td>
		<td class="data">
		<table width="100%" style="table-layout:fixed;line-height:28px">
		<tr style="font-size:13pt;text-align:center">
			<td <?php if($record['phase'] < 2){echo "style=display:none";} ?>>系統部品</td>
			<td>部門</td>
			<td>組別</td>
			<td>擔當</td>
			<td width="20%">電話#分機</td>
			<td>手機</td>
			<td>備註</td>
		</tr>
		<?php 
		foreach($relative_organizations as $organiztion)
		{
			if($organiztion['unit_class'] == 4)
			{			
		?>			
				<tr style="font-size:12pt;text-align:center">
				<td <?php if($record['phase'] < 2){echo "style=display:none";} ?>><?php if(!empty($organiztion['function_name'])){echo $organiztion['function_name'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['org_name'])){echo $organiztion['org_name'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['dep_name'])){echo $organiztion['dep_name'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['pm'])){echo $organiztion['pm'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['phone_firm'])){echo $organiztion['phone_firm'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['phone_mobile'])){echo $organiztion['phone_mobile'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['memo'])){echo $organiztion['memo'];} else { echo "--";}?></td>
				</tr>
		<?php
			}
			else
			{
				continue;
			}
		}
	?>	
		</table>
		</td>
	</tr>
	<tr>
		<td class="title">外部組織單位</td>
		<td class="data">
		<table width="100%" style="table-layout:fixed;line-height:28px">
		<tr style="font-size:13pt;text-align:center">
			<td <?php if($record['phase'] < 2){echo "style=display:none";} ?>>系統部品</td>
			<td>組織</td>
			<td>單位</td>
			<td>擔當</td>
			<td width="20%">電話#分機</td>
			<td>手機</td>
			<td>備註</td>
		</tr>
		<?php 
		foreach($relative_organizations as $organiztion)
		{
			if($organiztion['unit_class'] == 1 || $organiztion['unit_class'] == 2 || $organiztion['unit_class'] == 3)
			{			
		?>			
				<tr style="font-size:12pt;text-align:center">
				<td <?php if($record['phase'] < 2){echo "style=display:none";} ?>><?php if(!empty($organiztion['function_name'])){echo $organiztion['function_name'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['org_name'])){echo $organiztion['org_name'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['dep_name'])){echo $organiztion['dep_name'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['pm'])){echo $organiztion['pm'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['phone_firm'])){echo $organiztion['phone_firm'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['phone_mobile'])){echo $organiztion['phone_mobile'];} else { echo "--";}?></td>
				<td><?php if(!empty($organiztion['memo'])){echo $organiztion['memo'];} else { echo "--";}?></td>
				</tr>
		<?php
			}
			else
			{
				continue;
			}
		}
	?>	
		</table>
		</td>
	</tr>	
	</table>
	</form>
	
	<p class="lead">
	</p>		
</div>