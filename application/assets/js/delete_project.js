var xmlHttp;
function createXMLHttpRequest()  //依照瀏覽器建立對應的非同步請求物件
{		
	if(window.ActiveXObject)
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	else if(window.XMLHttpRequest)
		xmlHttp = new XMLHttpRequest();
}
/*
reg_account_check()：驗證帳戶欄位輸入的資料(是否為email格式、帳戶是否存在)
**/	
function reg_account_check(oInput)  //oInput
{		
	//建立非同步請求
	createXMLHttpRequest();
	var field_value = "account=" + oInput.value;
	var url = "http://localhost/haitec/resource_integration/validation/account?timestamp="+new Date().getTime();
	xmlHttp.open("POST", url);
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			showResult("error_reg_01", xmlHttp.responseText);
		}
	}
	//alert(field_value);
	xmlHttp.send(field_value);  //進行資料發送
}

/*
reg_passwd_check()：驗證密碼欄位輸入的資料(密碼與確認密碼輸入的欄位是否相符)
**/	
function reg_passwd_check(oInput)
{		
	//取得密碼欄位與確認密碼欄位的值
	var passwd = oInput.value;
	var conf_passwd = document.getElementById("reg_passwd_input_checked").value;
	
	//驗證密碼與確認密碼輸入欄位是否相符
	if(conf_passwd != "")  //當使用者有在「確認密碼」欄位輸入值時
	{
		if(passwd != conf_passwd)
		{
			showResult("error_reg_03", "確認密碼不符合!");
		}
		else
		{
			showResult("error_reg_03", "");
		}
	}
	else
		showResult("error_reg_03", "");
}

/*
reg_conf_passwd_check()：驗證密碼欄位輸入的資料(密碼與確認密碼輸入的欄位是否相符)
**/	
function reg_conf_passwd_check(oInput) 
{		
	//取得密碼欄位與確認密碼欄位的值
	var passwd = document.getElementById("reg_passwd_input").value;
	var conf_passwd = oInput.value;
	//驗證密碼與確認密碼輸入欄位是否相符
	if(conf_passwd != "")  //當使用者有在「確認密碼」欄位輸入值時
	{
		if(passwd != conf_passwd)
		{
			showResult("error_reg_03", "確認密碼不符合!");
		}
		else
		{
			showResult("error_reg_03", "");
		}
	}
}

function showResult(display_field, error_msg){
	var oSpan = document.getElementById(display_field);
	oSpan.innerHTML = error_msg;
	/*if(sText.indexOf("already exists") >= 0)
		//如果用戶名已被占用
		oSpan.style.color = "red";
	else
		oSpan.style.color = "black";*/
}

function register_link_onclick()
{
	showResult("error_01", "")
}