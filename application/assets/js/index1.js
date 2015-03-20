$(function(){



    		$(".registration").click(function(){

    			$("#wrap .container").animate({  //面板高度變長
    				height:"440px",top:"30px"
    			},300);


    			// ===================================================

    			$("#account_text").fadeOut(300);
    			$("#account_text").attr("disabled",true);

    			$("#account").fadeOut(300);
    			$("#account").attr("disabled",true);

    			$("#passwd_text").fadeOut(300);
    			$("#passwd_text").attr("disabled",true);

    			$("#passwd").fadeOut(300);
    			$("#passwd").attr("disabled",true);

    			$(".btn-primary").fadeOut(300);
    			$(".btn-primary").attr("disabled",true);

    			$('#pic').fadeOut(300);
    			$('#pic').attr("disabled",true);

                $('#error_01').fadeOut(300);
                $('#error_01').attr("disabled",true);


    			$("a").fadeOut(300);
    			$("a").attr("disabled",true);

    			// ===================================================

    			$("#xxx").fadeIn(300);

    			$("#reg_account_text").fadeIn(300);
    			$("#reg_account_text").attr("disabled",false);

    			$("#reg_account_input").fadeIn(300);
    			$("#reg_account_input").attr("disabled",false);

                $("#error_reg_01").fadeIn(300);
                $("#error_reg_01").attr("disabled",false);

    			$("#reg_passwd_text").fadeIn(300);
    			$("#reg_passwd_text").attr("disabled",false);

    			$("#reg_passwd_input").fadeIn(300);
    			$("#reg_passwd_input").attr("disabled",false);

                $("#error_reg_02").fadeIn(300);
                $("#error_reg_02").attr("disabled",false);

    			$("#reg_passwd_text_checked").fadeIn(300);
    			$("#reg_passwd_text_checked").attr("disabled",false);

    			$("#reg_passwd_input_checked").fadeIn(300);
    			$("#reg_passwd_input_checked").attr("disabled",false);

                $("#error_reg_03").fadeIn(300);
                $("#error_reg_03").attr("disabled",false);

    			$("#identity").fadeIn(300);
    			$("#identity").attr("disabled",false);

    			$("#options").fadeIn(300);
    			$("#options").attr("disabled",false);

                $("#error_reg_04").fadeIn(300);
                $("#error_reg_04").attr("disabled",false);

    			$(".btn-primary_02").fadeIn(300);
    			$(".btn-primary_02").attr("disabled",false);

    		});

            //=================================================================

            $(".forget").click(function(){
                
                $("#account_text").fadeOut(300);
                $("#account_text").attr("disabled",true);

                $("#account").fadeOut(300);
                $("#account").attr("disabled",true);

                $("#passwd_text").fadeOut(300);
                $("#passwd_text").attr("disabled",true);

                $("#passwd").fadeOut(300);
                $("#passwd").attr("disabled",true);

                $(".btn-primary").fadeOut(300);
                $(".btn-primary").attr("disabled",true);

                $('#pic').fadeOut(300);
                $('#pic').attr("disabled",true);

                $('#error_01').fadeOut(300);
                $('#error_01').attr("disabled",true);


                $("a").fadeOut(300);
                $("a").attr("disabled",true);


                $("#xxx_02").fadeIn(300);

            });


            //=================================================================

    		$("#xxx").click(function(){

    			$("#wrap .container").animate({   //面板高度復原
    				height:"345px",top:"80px"
    			},300);


    			$("#account_text").fadeIn(300);
    			$("#account_text").attr("disabled",false);

    			$("#account").fadeIn(300);
    			$("#account").attr("disabled",false);

    			$("#passwd_text").fadeIn(300);
    			$("#passwd_text").attr("disabled",false);

    			$("#passwd").fadeIn(300);
    			$("#passwd").attr("disabled",false);

    			$(".btn-primary").fadeIn(300);
    			$(".btn-primary").attr("disabled",false);

    			$('#pic').fadeIn(300);
    			$('#pic').attr("disabled",false);

                $('#error_01').fadeIn(300);
                $('#error_01').attr("disabled",false);

    			$("a").fadeIn(300);
    			$("a").attr("disabled",false);

    			// ==================================================== 

    			$("#xxx").fadeOut(300);

    			$("#reg_account_text").fadeOut(300);
    			$("#reg_account_text").attr("disabled",true);

    			$("#reg_account_input").fadeOut(300);
    			$("#reg_account_input").attr("disabled",true);

                $("#error_reg_01").fadeOut(300);
                $("#error_reg_01").attr("disabled",true);

    			$("#reg_passwd_text").fadeOut(300);
    			$("#reg_passwd_text").attr("disabled",true);

    			$("#reg_passwd_input").fadeOut(300);
    			$("#reg_passwd_input").attr("disabled",true);

                $("#error_reg_02").fadeOut(300);
                $("#error_reg_02").attr("disabled",true);

    			$("#reg_passwd_text_checked").fadeOut(300);
    			$("#reg_passwd_text_checked").attr("disabled",true);

    			$("#reg_passwd_input_checked").fadeOut(300);
    			$("#reg_passwd_input_checked").attr("disabled",true);

                $("#error_reg_03").fadeOut(300);
                $("#error_reg_03").attr("disabled",true);

    			$("#identity").fadeOut(300);
    			$("#identity").attr("disabled",true);

    			$("#options").fadeOut(300);
    			$("#options").attr("disabled",true);

                $("#error_reg_04").fadeOut(300);
                $("#error_reg_04").attr("disabled",true);

    			$(".btn-primary_02").fadeOut(300);
    			$(".btn-primary_02").attr("disabled",true);

    		});

            
            $("#xxx_02").click(function(){

                $("#account_text").fadeIn(300);
                $("#account_text").attr("disabled",false);

                $("#account").fadeIn(300);
                $("#account").attr("disabled",false);

                $("#passwd_text").fadeIn(300);
                $("#passwd_text").attr("disabled",false);

                $("#passwd").fadeIn(300);
                $("#passwd").attr("disabled",false);

                $(".btn-primary").fadeIn(300);
                $(".btn-primary").attr("disabled",false);

                $('#pic').fadeIn(300);
                $('#pic').attr("disabled",false);

                $('#error_01').fadeIn(300);
                $('#error_01').attr("disabled",false);

                $("a").fadeIn(300);
                $("a").attr("disabled",false);

                // ==================================================== 

                $("#xxx_02").fadeOut(300);

            });

        



            $(".btn-primary_02").click(function(){

                alert("註冊已完成!");
                $("#xxx").click();
           
            });



    		$("button").focus(function(){   //消除按鈕邊框虛線
	           	this.blur();  
	       	});

	        $("#xxx").focus(function(){   //消除按鈕邊框虛線
	            this.blur();  
	       	});

            $("#xxx_02").focus(function(){   //消除按鈕邊框虛線
                this.blur();  
            });


    	});

