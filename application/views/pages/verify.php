<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>reCAPTCHA with PHP test</title>
</head>
    <body>

<?php
  
  require_once('recaptchalib.php');
  $privatekey = "6LcWcOwSAAAAAA4D7p2dxk4FtxBsjBjCJHXs-ZQv"; //此處填入 private_key
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if(!$resp->is_valid){
	// 此處是驗証失敗，所需執行的代碼，下述為google提供範例，就不修改了
	
	echo '<p>驗証失敗，原因為：' . $resp->error . '</p>
<form><p><input type="button" value="按此返回上頁" onclick="history.back(-1)"></p></form>';
	exit();

  }else{
	// 此處就是驗証成功後，所需執行的代碼
	
	echo '<p>恭喜，驗証通過。</p>';
	
  }
  
?>

    </body>
</html>