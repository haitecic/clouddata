<html>
	<head>
	</head>
	<body>		
		<?php 
			echo $message;
			echo form_open('project_minutes_mail/'.$record['id']);
			require_once("/../../assets/library/recaptchalib.php");
			$publickey = "6LcWcOwSAAAAADgih272ESA9qegqe0QytCKGpHzA"; //此處填入 public key
			echo recaptcha_get_html($publickey);
        ?>		
        <input type="submit" name="Submit" value="送出">
      </form>
	</body>
</html>
