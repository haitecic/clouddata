<script type="text/javascript" src="<?php echo $js_location;?>/index1.js" ></script>
<script type="text/javascript" src="<?php echo $js_location;?>/validation.js" ></script>
<body id="a" onSelectStart="event.returnValue=false">
	<!--<script language="JavaScript" src="<?php //echo $js_location;?>/index.js"></script>-->
	
	<div id="header">
  		<p></p>
  	</div>

	<div id="wrap">
		 <div class="container">
			<!--登入表單-->
		 	<div id="pic"></div>
		 	<div id="xxx"></div>
			<div id="xxx_02"></div>
			<?php 
			$attributes = array('id' => 'myform');
			echo form_open('login', $attributes);?>
				<p>
				<label id="account_text">帳號:  </label>
				<input type="text" name="account" id="account"  value="<?php echo set_value('account'); ?>">
				</p>
				<p>
				<label id="passwd_text">密碼:  </label>
				<input type="password" name="passwd" id="passwd">
				</p>
				<p>
				<button type="submit" class="btn btn-primary" id="aaa">登入</button>
				</p>
				<div id="error_01">
				<?php echo validation_errors();  //此函數會回傳表單所有驗證的錯誤訊息，如果沒有錯誤訊息則會傳回空字串?>
				<?php if(isset($error_message)) echo $error_message;?>
				</div>  				
			</form>
			<!--註冊表單-->
			<?php 
			$attributes = array('id' => 'myform2');
			echo form_open('register', $attributes);?>
				<p>
				<label id="reg_account_text">註冊帳號:  </label>
				<input type="text" name="register_account" id="reg_account_input" onblur="reg_account_check(this)" value="<?php echo set_value('register_account'); ?>" <?php echo form_error('register_account'); ?>>
				<div id="error_reg_01"></div><!--請輸入正確訊息-->
				</p>
				<p>
				<label id="reg_passwd_text">註冊密碼:  </label>
				<input type="password" name="register_passwd" id="reg_passwd_input" onblur="reg_passwd_check(this)" <?php echo form_error('register_passwd'); ?>>
				<div id="error_reg_02"></div><!--請輸入正確訊息-->
				</p>
				<p>
				<label id="reg_passwd_text_checked">再次確認密碼:  </label>
				<input type="password" name="confirm_passwd" id="reg_passwd_input_checked" onblur="reg_conf_passwd_check(this)" <?php echo form_error('confirm_passwd'); ?>>
				<div id="error_reg_03"></div><!--請輸入正確訊息-->
				</p>
				<p>
				<label id="identity">身分:  </label>
					<select id="options" name="identity" value="<?php echo set_value('identity'); ?>" <?php echo form_error('identity'); ?>>
						<option value="0">請選擇身分</option>
						<option value="1">廠商</option>
						<option value="2">學校</option>
						<option value="3">法人</option>
				</select>
				<div id="error_reg_04"></div><!--請輸入正確訊息-->
				</p>
				<p>
					<button type="submit" class="btn btn-primary_02" id="bbb" onclick="">送出</button>
				</p>				
			</form>
			 	<a href="#" class="registration" onclick="register_link_onclick()">快速註冊</a>
				<a href="#" class="forget" onclick="register_link_onclick()">忘記密碼?</a>
		</div>
    </div>
	













