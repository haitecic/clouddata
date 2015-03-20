var showOrHide;

$(function() {

    $('.timeline_menu').hide().click(function(event) {
        event.stopPropagation();
    });

    $('.timeline_btn').click(function(){
        $('.timeline_menu').slideToggle(400);
    });
	
	
    /*$( "#main_05_tabs" ).tabs();*/
	/*$( "#main_6_2 > #main_06_tabs" ).tabs();
    $( "#main_6_3 > #main_06_tabs" ).tabs();
	*/
	
    $('.menu > li > ul').hide().click(function(event) {
        event.stopPropagation();
    });

    $('.menu > li').click(function(){
        $(this).find('ul').slideToggle(400);  //參數400打開按鈕的速度(單位毫秒)
    });

    $("#main_01_01").show();
    $("#main_01_01").attr("disabled",false);

    /*$("#main_01_02").hide();
    $("#main_01_02").attr("disabled",true);*/

    $(".main_02").hide();
    $(".main_02").attr("disabled",true);

    $(".main_03").hide();
    $(".main_03").attr("disabled",true);

    $(".main_04").hide();
    $(".main_04").attr("disabled",true);

    $(".main_05").hide();
    $(".main_05").attr("disabled",true);
	
	$("#fun_structure").hide();
	$("#fun_structure").attr("disabled",true);
		
	$("#initial_feasibility").hide();
	$("#initial_feasibility").attr("disabled",true);
	
	$("#main_6_0").hide();
    $("#main_6_0").attr("disabled",true);

    $("#main_6_1").hide();
    $("#main_6_1").attr("disabled",true);

    $("#main_6_2").hide();
    $("#main_6_2").attr("disabled",true);
	
	$("#main_6_3").hide();
    $("#main_6_3").attr("disabled",true);
	
	$("#main_6_4").hide();
    $("#main_6_4").attr("disabled",true);
	
	$("#main_6_5").hide();
    $("#main_6_5").attr("disabled",true);
	
	$("#main_6_6").hide();
    $("#main_6_6").attr("disabled",true);
	
	$("#main_6_7").hide();
    $("#main_6_7").attr("disabled",true);
	
	$("#main_6_8").hide();
    $("#main_6_8").attr("disabled",true);
	
	$("#main_6_9").hide();
    $("#main_6_9").attr("disabled",true);

    $("#main_07").hide();
    $("#main_07").attr("disabled",true);


//===========================================================================================Edit???

    $(".main_01_01_edit").show();
    $(".main_01_01_edit").attr("disabled",false);

    $(".main_01_02_edit").hide();
    $(".main_01_02_edit").attr("disabled",true);

    $(".main_02_edit").hide();
    $(".main_02_edit").attr("disabled",true);

    $(".main_03_edit").hide();
    $(".main_03_edit").attr("disabled",true);

    $(".main_04_edit").hide();
    $(".main_04_edit").attr("disabled",true);

    $(".main_05_edit").hide();
    $(".main_05_edit").attr("disabled",true);

    $(".main_06_00_edit").hide();
    $(".main_06_00_edit").attr("disabled",true);

    $(".main_06_01_edit").hide();
    $(".main_06_01_edit").attr("disabled",true);

    $(".main_07_edit").hide();
    $(".main_07_edit").attr("disabled",true);
	
	$("#feature_edit").hide();
    $("#feature_edit").attr("disabled",true);	
	

//===========================================================================================??澈??

    // $("#main_01_btn").css("background-color","#108cb5");
    // $(".main_01_01_btn,.main_01_02_btn").css("background-color","#9fd6ed");

    // $("#main_02_btn").css("background-color","#108cb5");
    // $("#main_03_btn").css("background-color","#108cb5");
    // $("#main_04_btn").css("background-color","#108cb5");
    // $("#main_05_btn").css("background-color","#108cb5");
    // $("#main_06_btn").css("background-color","#108cb5");

    // $(".main_06_00_btn,.main_06_01_btn,.main_06_02_btn").css("background-color","#9fd6ed");

    // $("#main_07_btn").css("background-color","#108cb5");
    // (".navbar_side ul ul a:link, .navbar_side ul ul a:visited").css("background-color","#9fd6ed");

//===========================================================================================

	/*檢視模式*/
	/*檢視模式-組織*/
    $(".main_01_btn").click(function(){
	
		$("#main_01_01").show();
		$("#main_01_01").attr("disabled",false);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
	

        /*$(".main_01_01_edit").show();
        $(".main_01_01_edit").attr("disabled",false);

        $(".main_01_02_edit").hide();
        $(".main_01_02_edit").attr("disabled",true);

        $(".main_02_edit").hide();
        $(".main_02_edit").attr("disabled",true);

        $(".main_03_edit").hide();
        $(".main_03_edit").attr("disabled",true);

        $(".main_04_edit").hide();
        $(".main_04_edit").attr("disabled",true);

        $(".main_05_edit").hide();
        $(".main_05_edit").attr("disabled",true);

        $(".main_06_00_edit").hide();
        $(".main_06_00_edit").attr("disabled",true);

        $(".main_06_01_edit").hide();
        $(".main_06_01_edit").attr("disabled",true);

        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);*/
    });
	
	/*檢視模式-外部組織*/
    /*$(".main_01_02_btn").click(function(){
	
		$("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		$("#main_01_02").show();
		$("#main_01_02").attr("disabled",false);
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
	});*/
	
	/*檢視模式-情境*/
    $("#main_02_btn").click(function(){
        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").show();
		$(".main_02").attr("disabled",false);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });

	/*檢視模式-差異化*/
    $("#main_03_btn").click(function(){
        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").show();
		$(".main_03").attr("disabled",false);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	/*檢視模式-價值性*/
    $("#main_04_btn").click(function(){
        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").show();
		$(".main_04").attr("disabled",false);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	/*檢視模式-功能-初步可行性*/
    $("#feasibility_btn").click(function(){
        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").show();
		$("#initial_feasibility").attr("disabled",false);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	/*檢視模式-功能-功能架構*/
    $("#function_structure").click(function(){
        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").show();
		$("#fun_structure").attr("disabled",false);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	/*檢視模式-功能-功能項目1*/
    $("#main_6_0_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").show();
		$("#main_6_0").attr("disabled",false);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });

	/*檢視模式-功能-功能項目2*/
    $("#main_6_1_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").show();
		$("#main_6_1").attr("disabled",false);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	
	/*檢視模式-功能-功能項目3*/
    $("#main_6_2_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").show();
		$("#main_6_2").attr("disabled",false);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	
	/*檢視模式-功能-功能項目4*/
    $("#main_6_3_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").show();
		$("#main_6_3").attr("disabled",false);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	
	/*檢視模式-功能-功能項目5*/
    $("#main_6_4_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").show();
		$("#main_6_4").attr("disabled",false);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });

	/*檢視模式-功能-功能項目6*/
    $("#main_6_5_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").show();
		$("#main_6_5").attr("disabled",false);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	
	/*檢視模式-功能-功能項目7*/
    $("#main_6_6_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").show();
		$("#main_6_6").attr("disabled",false);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
	
	/*檢視模式-功能-功能項目8*/
    $("#main_6_7_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").show();
		$("#main_6_7").attr("disabled",false);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });

	/*檢視模式-功能-功能項目9*/
    $("#main_6_8_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").show();
		$("#main_6_8").attr("disabled",false);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });	
	
	/*檢視模式-功能-功能項目10*/
    $("#main_6_9_btn").click(function(){

        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").show();
		$("#main_6_9").attr("disabled",false);
	
		$("#main_07").hide();
		$("#main_07").attr("disabled",true);
    });
    
	$("#main_07_btn").click(function(){
        $("#main_01_01").hide();
		$("#main_01_01").attr("disabled",true);
	
		/*$("#main_01_02").hide();
		$("#main_01_02").attr("disabled",true);*/
	
		$(".main_02").hide();
		$(".main_02").attr("disabled",true);
	
		$(".main_03").hide();
		$(".main_03").attr("disabled",true);
	
		$(".main_04").hide();
		$(".main_04").attr("disabled",true);

		$("#fun_structure").hide();
		$("#fun_structure").attr("disabled",true);
		
		$("#initial_feasibility").hide();
		$("#initial_feasibility").attr("disabled",true);
	
		$("#main_6_0").hide();
		$("#main_6_0").attr("disabled",true);
		
		$("#main_6_1").hide();
		$("#main_6_1").attr("disabled",true);
	
		$("#main_6_2").hide();
		$("#main_6_2").attr("disabled",true);
		
		$("#main_6_3").hide();
		$("#main_6_3").attr("disabled",true);
		
		$("#main_6_4").hide();
		$("#main_6_4").attr("disabled",true);
		
		$("#main_6_5").hide();
		$("#main_6_5").attr("disabled",true);
		
		$("#main_6_6").hide();
		$("#main_6_6").attr("disabled",true);
		
		$("#main_6_7").hide();
		$("#main_6_7").attr("disabled",true);
		
		$("#main_6_8").hide();
		$("#main_6_8").attr("disabled",true);
		
		$("#main_6_9").hide();
		$("#main_6_9").attr("disabled",true);
	
		$("#main_07").show();
		$("#main_07").attr("disabled",false);
    });
	/**
	編輯模式
	*/
	
	$("#main_01_01").show();
    $("#main_01_01").attr("disabled",false);

    /*$("#main_01_02").hide();
    $("#main_01_02").attr("disabled",true);*/

    $(".main_02").hide();
    $(".main_02").attr("disabled",true);

    $(".main_03").hide();
    $(".main_03").attr("disabled",true);        

    $(".main_05").hide();
    $(".main_05").attr("disabled",true);
	
	$("#main_6_0").hide();
    $("#main_6_0").attr("disabled",true); 		
	$("#main_6_1").hide();
    $("#main_6_1").attr("disabled",true);
    $("#main_6_2").hide();
    $("#main_6_2").attr("disabled",true);
	$("#main_6_3").hide();
    $("#main_6_3").attr("disabled",true);		 
	$("#main_6_4").hide();
    $("#main_6_4").attr("disabled",true);
	$("#main_6_5").hide();
    $("#main_6_5").attr("disabled",true);
	$("#main_6_6").hide();
    $("#main_6_6").attr("disabled",true);
	$("#main_6_7").hide();
    $("#main_6_7").attr("disabled",true);
	$("#main_6_8").hide();
    $("#main_6_8").attr("disabled",true);
	$("#main_6_9").hide();
    $("#main_6_9").attr("disabled",true);

    $("#main_07").hide();
    $("#main_07").attr("disabled",true);
	
	$("#feature_edit").hide();
    $("#feature_edit").attr("disabled",true);
	
	/*編輯模式-「合作組織」選項*/
	$("#main_01_btn").click(function(){
        $("#main_01_01").show();
        $("#main_01_01").attr("disabled",false);

        $("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true);
        $("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);
		
        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);

		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });
	/*編輯模式-「組織-內部部門組別」選項*/
	/*$("#inner_dep_btn_edit").click(function(){
        $("#main_01_01").show();
        $("#main_01_01").attr("disabled",false);

        $("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true);
        $("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);
		
        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);

		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });*/
	
	/*編輯模式-「組織-外部組織單位」選項*/
	/*$("#outer_org_btn_edit").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        $("#main_01_02").show();
        $("#main_01_02").attr("disabled",false);

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 	
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);

		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });*/
	
	/*編輯模式-「情境」選項*/
	$("#senario_btn_edit").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").show();
        $(".main_02").attr("disabled",false);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 	
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);

		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });
	
	/*編輯模式-「差異化」選項*/
	$("#distinction_btn_edit").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").show();
        $(".main_03").attr("disabled",false);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 	
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);

		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });
	
	/*編輯模式-「價值性」選項*/
	$("#value_btn_edit").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").show();
        $(".main_04").attr("disabled",false);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 	
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);

		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });
	
	/*編輯模式-功能「可行性評估」*/
	$("#feasibility_btn_edit").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").show();
        $(".main_05").attr("disabled",false);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 	
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);


        $(".main_01_01_edit").hide();
        $(".main_01_01_edit").attr("disabled",true);

        $(".main_01_02_edit").hide();
        $(".main_01_02_edit").attr("disabled",true);

        $(".main_02_edit").hide();
        $(".main_02_edit").attr("disabled",true);

        $(".main_03_edit").hide();
        $(".main_03_edit").attr("disabled",true);

        $(".main_04_edit").hide();
        $(".main_04_edit").attr("disabled",true);

        /*$(".main_05_edit").show();
        $(".main_05_edit").attr("disabled",false);*/

        $(".main_06_00_edit").hide();
        $(".main_06_00_edit").attr("disabled",true);

        $(".main_06_01_edit").hide();
        $(".main_06_01_edit").attr("disabled",true);

        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });
	
	/*編輯模式-「功能」選項*/
	$("#feature_btn_edit").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);

        $(".main_04").hide();
        $(".main_04").attr("disabled",true);

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);

		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 	
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").show();
        $("#feature_edit").attr("disabled",false);
    });
	
	/*編輯模式-「評估-第一項功能」*/
	$("#estimate_0_edit_btn").click(function(){
        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);
		
		$(".main_04").hide();
        $(".main_04").attr("disabled",true);		
		 
        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").show();
        $("#main_6_0").attr("disabled",false); 
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);
		
        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_01_01_edit").hide();
        $(".main_01_01_edit").attr("disabled",true);

        $(".main_01_02_edit").hide();
        $(".main_01_02_edit").attr("disabled",true);

        $(".main_02_edit").hide();
        $(".main_02_edit").attr("disabled",true);

        $(".main_03_edit").hide();
        $(".main_03_edit").attr("disabled",true);

        $(".main_04_edit").hide();
        $(".main_04_edit").attr("disabled",true);

        $(".main_05_edit").hide();
        $(".main_05_edit").attr("disabled",true);

        $(".main_06_00_edit").show();
        $(".main_06_00_edit").attr("disabled",false);

        $(".main_06_01_edit").hide();
        $(".main_06_01_edit").attr("disabled",true);

        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });

	/*編輯模式-「評估-第二項功能」*/
    $("#estimate_1_edit_btn").click(function(){

        $("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 
		$("#main_6_1").show();
        $("#main_6_1").attr("disabled",false);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
        $(".main_01_01_edit").hide();
        $(".main_01_01_edit").attr("disabled",true);

        $(".main_01_02_edit").hide();
        $(".main_01_02_edit").attr("disabled",true);

        $(".main_02_edit").hide();
        $(".main_02_edit").attr("disabled",true);

        $(".main_03_edit").hide();
        $(".main_03_edit").attr("disabled",true);

        $(".main_04_edit").hide();
        $(".main_04_edit").attr("disabled",true);

        $(".main_05_edit").hide();
        $(".main_05_edit").attr("disabled",true);

        $(".main_06_00_edit").hide();
        $(".main_06_00_edit").attr("disabled",true);

        $(".main_06_01_edit").show();
        $(".main_06_01_edit").attr("disabled",false);

        $(".main_07_edit").hide();
        $(".main_07_edit").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
    });

	/*編輯模式-「評估-第三項功能」*/
    $("#estimate_2_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").show();
        $("#main_6_2").attr("disabled",false);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第四項功能」*/
    $("#estimate_3_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").show();
        $("#main_6_3").attr("disabled",false);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第五項功能」*/
    $("#estimate_4_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").show();
        $("#main_6_4").attr("disabled",false);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第六項功能」*/
    $("#estimate_5_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").show();
        $("#main_6_5").attr("disabled",false);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第七項功能」*/
    $("#estimate_6_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").show();
        $("#main_6_6").attr("disabled",false);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第八項功能」*/
    $("#estimate_7_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").show();
        $("#main_6_7").attr("disabled",false);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第九項功能」*/
    $("#estimate_8_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").show();
        $("#main_6_8").attr("disabled",false);
		$("#main_6_9").hide();
        $("#main_6_9").attr("disabled",true);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});
	
	/*編輯模式-「評估-第十項功能」*/
    $("#estimate_9_edit_btn").click(function(){

		$("#main_01_01").hide();
        $("#main_01_01").attr("disabled",true);

        /*$("#main_01_02").hide();
        $("#main_01_02").attr("disabled",true);*/

        $(".main_02").hide();
        $(".main_02").attr("disabled",true);

        $(".main_03").hide();
        $(".main_03").attr("disabled",true);        

        $(".main_05").hide();
        $(".main_05").attr("disabled",true);
		
		$("#main_6_0").hide();
        $("#main_6_0").attr("disabled",true); 		
		$("#main_6_1").hide();
        $("#main_6_1").attr("disabled",true);
        $("#main_6_2").hide();
        $("#main_6_2").attr("disabled",true);
		$("#main_6_3").hide();
        $("#main_6_3").attr("disabled",true);		 
		$("#main_6_4").hide();
        $("#main_6_4").attr("disabled",true);
		$("#main_6_5").hide();
        $("#main_6_5").attr("disabled",true);
		$("#main_6_6").hide();
        $("#main_6_6").attr("disabled",true);
		$("#main_6_7").hide();
        $("#main_6_7").attr("disabled",true);
		$("#main_6_8").hide();
        $("#main_6_8").attr("disabled",true);
		$("#main_6_9").show();
        $("#main_6_9").attr("disabled",false);

        $("#main_07").hide();
        $("#main_07").attr("disabled",true);
		
		$("#feature_edit").hide();
        $("#feature_edit").attr("disabled",true);
	});

});


