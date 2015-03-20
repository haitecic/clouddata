<!--專案管理功能選單-->		
<div class="navbar_side" style="clear:left"><!-- style="clear:left;float:left"-->	
	<ul class="menu">
        <li class="mainTitle"><span id="main_01_btn">組織&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="arrow_01">▼</div></span>
			<ul class="subMenu">
				<li><a href="#" class="main_01_01_btn">內部部門組別</a></li>
				<li><a href="#" class="main_01_02_btn">外部組織單位</a></li>
			</ul>
        </li>
        <li class="mainTitle" id="main_02_btn"><a href="#">情境</a></li>
        <li class="mainTitle" id="main_03_btn"><a href="#">差異化</a></li>
        <li class="mainTitle" id="main_04_btn"><a href="#">價值性</a></li> 
        <li class="mainTitle" id="main_05_btn"><a href="#">初步可行性</a></li> 
        <li class="mainTitle"><span id="main_06_btn">功能&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="arrow_01">▼</div></span>
			<ul class="subMenu">
				<li id="main_6_1_btn"><a href="#">功能架構</a></li>				
				<?php			
				$i=0;
				while($i < count($all_functions))
				{
				?>
					<li id="main_6_<?php echo ($i+2);?>_btn"><a href="#"><?php echo $all_functions[$i]['function_name'];?></a></li>
				<?php
					$i++;
				}
				?>
			</ul>
        </li> 
        <li class="mainTitle" id="main_07_btn"><a href="#">導入車型</a></li>  
	</ul>
</div>