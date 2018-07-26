function includeJS(incFile)
{
  document.write('<script type="text/javascript" src="'
    + incFile+ '"></scr' + 'ipt>'); 
}
function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');
}

   function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
		
                }
				
				

// to call, use:
	
// Convert numbers to words


// American Numbering System
var th = ['','thousand','million', 'billion','trillion'];
// uncomment this line for English Number System
// var th = ['','thousand','million', 'milliard','billion'];

var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; 
var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; 
var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; 
function toWords(s){s = s.toString(); s = s.replace(/[\, ]/g,''); if (s != parseFloat(s)) return 'not a number'; var x = s.indexOf('.'); if (x == -1) x = s.length; if (x > 15) return 'too big'; var n = s.split(''); var str = ''; var sk = 0; for (var i=0; i < x; i++) {if ((x-i)%3==2) {if (n[i] == '1') {str += tn[Number(n[i+1])] + ' '; i++; sk=1;} else if (n[i]!=0) {str += tw[n[i]-2] + ' ';sk=1;}} else if (n[i]!=0) {str += dg[n[i]] +' '; if ((x-i)%3==0) str += 'hundred and ';sk=1;} if ((x-i)%3==1) {if (sk) str += th[(x-i-1)/3] + ' ';sk=0;}} if (x != s.length) {var y = s.length; str += 'point '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}

// JavaScript Document

/********************************************************
*                                                       *
*              Style Page Corners                       *
*                                                       *
*********************************************************/
$(function(){
$(".leftPanel").corner("left");
$(".rightPanel").corner("right");
$(".leftPanel .left_Panel_Links ul li a").corner("left");
$(".links").corner("tl 10px");
$(".links ul li a").corner("top 5px");
$("#showFleet ul li a").corner("5px");
$(".dialog").corner("5px");
$("#loading").corner("5px");
$(".inpElemt").corner("5px");
$(".inpElemts").corner("5px");
$(".text_area, .s").corner("5px");
$(" .in_menu ul li a").corner("top 5px");
});


$(function()
{
	$(".good, .bad").click(function(){
	$(this).hide("slow");
	$(".nextDiv").show("slow");
	});
	
	$("#addNewDesignation").click(function(){
	$(this).remove().fadeOut("slow");
	$("#selfromlist, #addNewDesignation").css('display', 'none');
	
	$('#designation_show').fadeIn();
//	$("").fadeIn("slow");
	});
	
function hideThis(){
	$("#addNewDesignation2").remove().fadeOut("slow");
	$("#selfromlist, #addNewDesignation2").css('display', 'none');
	
	$('#designation_show2').fadeIn();
//	$("").fadeIn("slow");
	};
})




/********************************************************
*                                                       *
*              Modal Functions Start                    *
*                                                       *
*********************************************************/


$(document).ready(
	function()
	{
	
		$(".close img").click( function()
			{
				var dialog = $(this).parents(".dialog");
				dialog.modalClose();
			}
		);
		
		
			$("#content1 .dialog .close img#cls").click( function()
			{
				var dialog = $(this).parents("#content1 .dialog");
				dialog.modalClose();
			}
		);
		
		
		/*$("#cls").bind("click", function()
			{var dialog = $(this).parents(".dialog");
				$.modal.close();
			}
		);
		*/
		
				$('#rate').blur(function(){
		// $(this).autoNumeric();
		
	});		
	
		$("#1box").bind("click", function()
			{
				$("#box1").modal()
				//console.log("dfkjdf")

			}
		);
		
		$("#2box").bind("click", function()
			{
				$("#box2").modal()
			}
		);
		
		$("#3box").bind("click", function()
			{
				$("#box3").modal()
			}
		);
		
		$("#4box").bind("click", function()
			{
				$("#box4").modal()
			}
		);
		
		
		
	}	
)


function slideMe()
{
 $("#slideDownDiv").fadeIn("slow");	
}
/********************************************************
*                                                       *
*     Ajax Page for Add /  Edit Company Details          *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#save_company").click(function(){
                 var querystring = $("#make_company").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#make_company").fadeOut();
				 //$("#box1");
				 
				 $(".make_company #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_company #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".make_company #msg").remove();
				$("#make_company").fadeIn();
					
		
				
				$(document).ajaxStop(function(){
    window.location.reload();
});

					});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
/********************************************************
*                                                       *
*     Ajax Page for Add /  New Staff                    *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#make_admin").click(function(){
                 var querystring = $("#add_admin_staff").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#add_admin_staff").fadeOut();
				 //$("#box1");
				 
				 $(".add_admin_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".add_admin_staff #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".add_admin_staff #msg").remove();
				resetForm($('#add_admin_staff'));
				$("#add_admin_staff").fadeIn().load( window.location.reload());
});

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
		
/********************************************************
*                                                       *
*     Ajax Page for Add /  New Staff                    *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#add_fleet").click(function(){
                 var querystring = $("#add_fleets").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#add_fleets").fadeOut();
				 //$("#box1");
				 
				 $(".add_fleet #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".add_fleet #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".add_fleet #msg").remove();
				resetForm($('#add_fleets'));
				$("#add_fleet").fadeIn().load( window.location.reload());
});

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
						
/********************************************************
*                                                       *
*     Ajax Page for Add Admin Staff                     *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#makeStaff").click(function(){
                 var querystring = $("#add_staff").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#add_staff").fadeOut();
				 //$("#box1");
				 
				 $(".make_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_staff #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".make_staff #msg").remove();
				resetForm($('#add_staff'));
				$("#add_staff").fadeIn().on( window.location.reload());
});

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
		
		/********************************************************
*                                                       *
*     Ajax Page for Add Admin Staff                     *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#makeDriverStaff").click(function(){
                 var querystring = $("#add_driver_staff").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-driver.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$(".add_fleet").load( window.location.reload());
				$(".add_fleet .dialog").modalClose();
				/*$("#add_driver_staff").fadeOut();
				 //$("#box1");
				 
				 $(".make_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_staff #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".make_staff #msg").remove();
				resetForm($('#add_staff'));
				$("#add_staff").fadeIn().on( window.location.reload());
});*/

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
		
	
/********************************************************
*                                                       *
*              FUnction for Styliing Tables             *
*                                                       *
*********************************************************/		
//$("table").tablecloth({ theme: "dark" });
/*
   $(document).ready(function() {
        $("table").tablecloth({
          theme: "default"
         
        });
		
		$("table").tablecloth({ theme: "default" });
		return true;
      });
	  */
/********************************************************
*                                                       *
*              Ajax Page For Deleting staff in lIST     *
*                                                       *
*********************************************************/
	  	$(document).ready(function()
	{
		$('table.display td a#delete').click(function()
		{
			if (confirm("Are you sure you want to delete this Staff?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();

				$.ajax(
				{
					   type: "POST",
					   url: "delete_staff.php",
					   data: data,
					   cache: false,
					
					   success: function(data)
					   {
						   //alert(data);
							parent.fadeOut('slow', function() {$(this).remove().load( window.location.reload());});
							
							
					   }
				 });				
			}
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		$('table#delTable tr:odd').css('background',' #FFFFFF');
	});


/********************************************************
*                                                       *
*              Ajax Page For Editing Room Names         *
*                                                       *
*********************************************************/	


	$(document).ready(function(){
             $("#finishEditRooms").click(function(){
                 var mydata =$("#edRm").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
				 $.ajax({
            url: 'editRoom.php',
            type: "POST",
            data: mydata,//"mydata="+ $('#neweventform').serialize(),
            success: function(data) {
                //code to execute
				
				$("#edRmUl").fadeOut();
				 //$("#box1");
				 
				 $("#edit_room #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$("#edit_room #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$("#edit_room #msg").remove();
				$("#edRmUl").fadeIn();
					
				$("#edRmUl").reset();
					});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
	  
/********************************************************
*                                                       *
*              Ajax Page For Deleting Staff in lIST     *
*                                                       *
********************************************************
	  	$(document).ready(function()
	{
		$('table#delStaffTable td a.delete').click(function()
		{
			if (confirm("Are you sure you want to delete this Staff?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
				
				$.ajax(
				{
					   type: "POST",
					   url: "delete_staff.php",
					   data: data,
					   cache: false,
					
					   success: function()
					   {
							parent.fadeOut('slow', function() {$(this).remove();});
					   }
				 });				
			}
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		$('table#delStaffTable tr:odd').css('background',' #FFFFFF');
	});
*/





/********************************************************
*                                                       *
*              Ajax Page For Editing Staff Details      *
*                                                       *
*********************************************************/	


	$(document).ready(function(){
             $("table.display td a#editThisStaff").click(function(){
                 
				 var id = $(this).parent().parent().attr('id');
				var myId = 'id=' + id ;
				var parent = $(this).parent().parent();
				

				
				 //var mydata =$("#edRm").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
				 $.ajax({
            url: 'editSD.php',
            type: "POST",
            data: myId,//"mydata="+ $('#neweventform').serialize(),
			cache: true,
            success: function(data) {
                //code to execute
				
				$("#content1 .dialog").modal().html(data);
				
			}
            });
				 
                 return true;
                 });
        });
		
		
	  
//	  //


/********************************************************
*                                                       *
*              Ajax Page For View Staff Details         *
*                                                       *
*********************************************************/	


	$(document).ready(function(){
             $("table.display td a#viewStaff").click(function(){
                 
				 var id = $(this).parent().parent().attr('id');
				var myId = 'id=' + id ;
				var parent = $(this).parent().parent();
				

				
				 //var mydata =$("#edRm").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
				 $.ajax({
            url: 'viewStaff.php',
            type: "POST",
            data: myId,//"mydata="+ $('#neweventform').serialize(),
			cache: true,
            success: function(data) {
                //code to execute
				
				$("#content1 .dialog").modal().html(data);
				
				 //$("#box1");
				 
				//$("#content1 .dialog #loading").fadeIn(800).delay(800).fadeOut("slow");
					
//				$("#content1 .dialog").fadeIn("slow");//.delay(2800).fadeIn(2800, function(){
/*				$("#edit_room #msg").remove();
				$("#edRmUl").fadeIn();
					
				$("#edRmUl").reset();
					});*/
//				$("#ert").delay(8000).fadeIn();


	//			});
			}
            });
				 
                 return true;
                 });
        });
		
		
/********************************************************
*                                                       *
*              Ajax Page For edit_this_Staff details    *
*                                                       *
*********************************************************/	


function makeUpdate(){
            
                 var mydata = $("#update_Staff").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
//				alert("am here");
				/* 
				 			sname: $("#sname").val(),
							uname: $("#uname").val(),
							pword: $("#pword").val(),
							alevel: $("#alevel").val(),
							sid: $("#sid").val(),

							action: "postmsg"*/
							
				 $.ajax({
            url: 'eStaff.php',
            type: "POST",
            data: mydata,//"mydata="+ $('#neweventform').serialize(),
            success: function(data) {
                //code to execute
				//
				/*$("#update_Staff").fadeOut();
				 //$("#box1");
				 
				 $("#show_Staff_Details #loading").fadeIn(800).fadeOut("slow");
					
				$("#show_Staff_Details #msg").fadeIn("slow").html(data).delay(800).fadeOut(400, function(){
				$("#show_Staff_Details #msg").fadeOut();
				$("#update_Staff").fadeIn();
					
				//$("#edRmUl").reset();
					});*/
					
					if(confirm (data)){
						$("table.display").load( window.location.reload());
					$("#content1 .dialog").modalClose();
					
					}
						
					//$.modal;
//				$("#ert").delay(8000).fadeIn();


                    }
            });
}









/********************************************************
*                                                       *
*              Ajax Page For Deleting staff in lIST     *
*                                                       *
*********************************************************/
	  	$(document).ready(function()
	{
		$('table.display td a#deleteAdmin').click(function()
		{
			if (confirm("Are you sure you want to delete this Staff?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
//
				$.ajax(
				{
					   type: "POST",
					   url: "delete_admin.php",
					   data: data,
					   cache: false,
					
					   success: function(data)
					   {
						   
							//alert(data);
							parent.fadeOut('slow', function() {$(this).remove().load( window.location.reload());});
							
							
					   }
				 });				
			}
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		$('table#delTable tr:odd').css('background',' #FFFFFF');
	});




/********************************************************
*                                                       *
*              Ajax Page For Editing Admin Details      *
*                                                       *
*********************************************************/	


	$(document).ready(function(){
             $("table.display td a#editAdmin").click(function(){
                 
				 var id = $(this).parent().parent().attr('id');
				var myId = 'id=' + id ;
				var parent = $(this).parent().parent();
				

				
				 //var mydata =$("#edRm").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
				 $.ajax({
            url: 'editAd.php',
            type: "POST",
            data: myId,//"mydata="+ $('#neweventform').serialize(),
			cache: true,
            success: function(data) {
                //code to execute
				
				$(".demo_jui .dialog").modal().html(data);
				
				 //$("#box1");
				 
				//$("#content1 .dialog #loading").fadeIn(800).delay(800).fadeOut("slow");
					
//				$("#content1 .dialog").fadeIn("slow");//.delay(2800).fadeIn(2800, function(){
/*				$("#edit_room #msg").remove();
				$("#edRmUl").fadeIn();
					
				$("#edRmUl").reset();
					});*/
//				$("#ert").delay(8000).fadeIn();


	//			});
			}
            });
				 
                 return true;
                 });
        });
		
		
	  
//	  //



/********************************************************
*                                                       *
*              Ajax Page For edit_this_Staff details    *
*                                                       *
*********************************************************/	


function doAdminUpdate(){
            
                 var mydata = $("#update_admin").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
//				alert("am here");
				/* 
				 			sname: $("#sname").val(),
							uname: $("#uname").val(),
							pword: $("#pword").val(),
							alevel: $("#alevel").val(),
							sid: $("#sid").val(),

							action: "postmsg"*/
							
				 $.ajax({
            url: 'eAdmin.php',
            type: "POST",
            data: mydata,//"mydata="+ $('#neweventform').serialize(),
            success: function(data) {
            //so execute code
					
					if(confirm (data)){
						$("table.display").on(window.location.reload());
					$(".demo_jui .dialog").modalClose();
					
					}
						
					//$.modal;
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                
                 
        
}

/********************************************************
*                                                       *
*              Ajax Page For Editing Property Info      *
*                                                       *
*********************************************************/	



		$(document).ready(function(){
			$("#propertyInof").click(function(){

				 $("#hform").hide("slow").fadeOut();
				 //$("#box1");
				 $("#loading").show("slow").fadeIn(800).delay(800).hide("slow");

				$("#msg").show("slow").load("script.php", {
					
							sname: $("#sname").val(),
							uname: $("#uname").val(),
							pword: $("#pword").val(),
							alevel: $("#alevel").val(),
							action: "postmsg"
					
					});
			});
		});
		
	
/********************************************************
*                                                       *
*             Simple Hide and Show                      *
*                                                       *
*********************************************************/	

function showList()
{

	$(".gridView").fadeOut("fast").delay(800, function(){
	$(".listView").fadeIn("slow") });
//				$(".gridView").fadeOut("slow");
}

function showGrid()
{
				
	$(".listView").css("display", "none").fadeOut("fast").delay(800, function(){
	$(".gridView").fadeIn("slow") });

   
}


/********************************************************
*                                                       *
*              Ajax Page For Editing Fleet details      *
*                                                       *
*********************************************************/	


function doFleetUpdate(){
            
                 var mydata = $("#doUpdate").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
//				alert("am here");
				/* 
				 			sname: $("#sname").val(),
							uname: $("#uname").val(),
							pword: $("#pword").val(),
							alevel: $("#alevel").val(),
							sid: $("#sid").val(),

							action: "postmsg"*/
							
				 $.ajax({
            url: 'eFleet.php',
            type: "POST",
            data: mydata,//"mydata="+ $('#neweventform').serialize(),
            success: function(data) {
            //so execute code
					
					if(confirm (data)){
						$("table.display").on(window.location.reload());
					$(".listView .dialog").modalClose();
					
					}
						
					//$.modal;
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                
                 
        
}



/********************************************************
*                                                       *
*  Ajax Page For Editing Viewing Fleet For Editing   	*
*                                                       *
*********************************************************/	


	$(document).ready(function(){
             $("table.display td a#editFleet").click(function(){
                 
				 var id = $(this).parent().parent().attr('id');
				var myId = 'id=' + id ;
				var parent = $(this).parent().parent();
				

				
				 //var mydata =$("#edRm").serialize();//$("form#edRm").serialize();
                 //$('#result').html(querystring);
				 //action="editRoom.php" 
				 $.ajax({
            url: 'editFleet.php',
            type: "POST",
            data: myId,//"mydata="+ $('#neweventform').serialize(),
			cache: true,
            success: function(data) {
                //code to execute
				
				$(".listView .dialog").modal().html(data);
				
				 //$("#box1");
				 
				//$("#content1 .dialog #loading").fadeIn(800).delay(800).fadeOut("slow");
					
//				$("#content1 .dialog").fadeIn("slow");//.delay(2800).fadeIn(2800, function(){
/*				$("#edit_room #msg").remove();
				$("#edRmUl").fadeIn();
					
				$("#edRmUl").reset();
					});*/
//				$("#ert").delay(8000).fadeIn();


	//			});
			}
            });
				 
                 return true;
                 });
        });
		
		
	  
//	  //



/********************************************************
*                                                       *
*              Ajax Page For Deleting Fleet in lIST     *
*                                                       *
*********************************************************/
	  	$(document).ready(function()
	{
		$('table.display td a#deleteFleet').click(function()
		{
			if (confirm("Are you sure you want to delete this Fleet?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
//
				$.ajax(
				{
					   type: "POST",
					   url: "delete_fleet.php",
					   data: data,
					   cache: false,
					
					   success: function(data)
					   {
						   
							//alert(data);
							parent.fadeOut('slow', function() {$(this).remove().load( window.location.reload());});
							
							
					   }
				 });				
			}
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		$('table#delTable tr:odd').css('background',' #FFFFFF');
	});




		
/********************************************************
*                                                       *
*     Ajax Page for Add /  New Client                   *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#add_client").click(function(){
                 var querystring = $("#add_new_client").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#add_new_client").fadeOut();
				 //$("#box1");
				 
				 $(".make_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_staff  #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".make_staff  #msg").remove();
				resetForm($('#add_new_client'));
				$("#add_new_client").fadeIn();//.load( window.location.reload());
});

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
	
	

/********************************************************
*                                                       *
*              Ajax Page For Editing Fleet details      *
*                                                       *
*********************************************************/	


function doClientUpdate(){
            
                 var mydata = $("#update_Client").serialize();//$("form#edRm").serialize();

				 $.ajax({
            url: 'eFleet.php',
            type: "POST",
            data: mydata,//"mydata="+ $('#neweventform').serialize(),
            success: function(data) {
            //so execute code
					
					if(confirm (data)){
						$("table.display").on(window.location.reload());
					$("#content1 .dialog").modalClose();
					
					}
						
					//$.modal;
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                
                 
        
}



/********************************************************
*                                                       *
*  Ajax Page For Editing Viewing Fleet For Editing   	*
*                                                       *
*********************************************************/	


	$(document).ready(function(){
             $("table.display td a#editClient").click(function(){
                 
				 var id = $(this).parent().parent().attr('id');
				var myId = 'id=' + id ;
				var parent = $(this).parent().parent();
 
				 $.ajax({
            url: 'editFleet.php',
            type: "POST",
            data: myId,//"mydata="+ $('#neweventform').serialize(),
			cache: true,
            success: function(data) {
                //code to execute
				
				$("#content1 .dialog").modal().html(data);
				

			}
            });
				 
                 return true;
                 });
        });
		
		
	  
//	  //



/********************************************************
*                                                       *
*              Ajax Page For Deleting Fleet in lIST     *
*                                                       *
*********************************************************/
	  	$(document).ready(function()
	{
		$('table.display td a#deleteClient').click(function()
		{
			if (confirm("Are you sure you want to delete this Client?"))
			{
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
//
				$.ajax(
				{
					   type: "POST",
					   url: "delete_fleet.php",
					   data: data,
					   cache: false,
					
					   success: function(data)
					   {
						   
							//alert(data);
							parent.fadeOut('slow', function() {$(this).remove().ajaxStop( window.location.reload());});
							
							
					   }
				 });				
			}
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		$('table#delTable tr:odd').css('background',' #FFFFFF');
	});




/********************************************************
*                                                       *
*     		Ajax for Transactions 		                *
*                                                       *
*********************************************************/	


/********************************************************
*                                                       *
*     Ajax Page for Add /  Transactions                    *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#do_trans").click(function(){
                 var querystring = $("#make_trans").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#make_trans").fadeOut();
				 //$("#box1");
				 
				 $(".make_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_staff #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".make_staff #msg").remove();
				resetForm($('#make_trans'));
				$("#make_trans").fadeIn().ajaxStop( window.location.reload());
});

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
/********************************************************
*                                                       *
*     Ajax Page for Add /  New Client (Transaction)     *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#add_new_client").click(function(){
                 var querystring = $("#add_client_form").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-client.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$(".dialog").modalClose()
				.ajaxStop(function(){
    window.location.reload();
});

				 //$("#box1");
				 
				 //.load( window.location.reload());


					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
	
/********************************************************
*                                                       *
*     Ajax Page for Printing Transactions               *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("table.display td a#clientHistory").click(function(){
				 
			
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
				
	
				 $.ajax({
            url: 'workHistoryBuild.php',
            type: "POST",
            data: data,
            success: function(data) {
                //code to execute
				
$("#content1 .dialog").modal().html(data);
		/*var win = window.open('','_blank', 'width=1000,height=auto,location=false, scrollbars=yes');
		win.document.write(data);
		win.document.close();*/
		
		


                    }
            });
			
                 return true;
                 });
        });
		

/********************************************************
*                                                       *
*     Ajax Page for Printing Transactions               *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#myClientHistory").click(function(){
				 
			
				var clientDetails = $("#clientHis").serialize();

				
	
				 $.ajax({
            url: 'workHistory.php',
            type: "POST",
            data: data,
            success: function(data) {
                //code to execute
				
$("#content1 .dialog").modalClose()
		var win = window.open('','_blank', 'width=1000,height=auto,location=false, scrollbars=yes');
		win.document.write(data);
		win.document.close();
		
		


                    }
            });
			
                 return true;
                 });
        });
		

	
	


/********************************************************
*                                                       *
*     Ajax Page for Fleet History              *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("table.display td a#showWorkHistory").click(function(){
				 
					
					//$("#showF").modalClose();
					//$("#truck").val(data);
					//fnGetSelected();
					//html(sData);
					//alert( "The following data would have been submitted to the server: \n\n"+sData );
					//
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
				
	//			oTable = $('#example').dataTable();
//				var sData = oTable.$('input').serialize();
				
//				var sData = $("#transHistory").serialize();
                 //$('#result').html(querystring);
				 //return false;
				 $.ajax({
            url: 'workHistory.php',
            type: "POST",
            data: data,
            success: function(data) {
                //code to execute
				

		var win = window.open('','_blank', 'width=1000,height=auto,location=false, scrollbars=yes');
		win.document.write(data);
		win.document.close();
		
		
				 //$("#box1");
				 
				 

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		

	


/********************************************************
*                                                       *
*     Ajax Page for Invoice Calc (Transaction)     		*
*                                                       *
*********************************************************/	

$(document).ready(function(){

 $("#tax_0").click(function(){ 
 
 var rate = $("#rate").val().replace(",","");
 var truck = $("#trucks").val();
 var trip = $("#trips").val();
 
 var amount = eval (rate * truck * trip);
 var tax = eval(amount * 5 / 100);
 var tot = eval(amount + tax);
 $("#hideTr").fadeIn();
   $("#rate").val(rate);
 $("#amount").val(amount);
 $("#taxAmount").val(tax);
 $("#totalCost").val(tot);
 $("#makeInvoice").disabled = false;
// .disabled = false;
 });


 $("#tax_1").click(function(){ 
// $('input[type=text]').val($(this).val().replace(",",""));
 var rate = $("#rate").val().replace(",","");
 var truck = $("#trucks").val();
 var trip = $("#trips").val();
 
 var amount = eval (rate * truck * trip);
 var tax = eval(amount * 10 / 100);
 var tot = eval(amount + tax);
 $("#hideTr").fadeIn();
   $("#rate").val(rate);
 $("#amount").val(amount);
 $("#taxAmount").val(tax);
 $("#totalCost").val(tot);
 $("#makeInvoice").disabled = false;
 
 });


 $("#tax_2").click(function(){ 
 
 var rate = $("#rate").val().replace(",","");
 var truck = $("#trucks").val();
 var trip = $("#trips").val();
 
 var amount = eval (rate * truck * trip);
 var tax = eval(amount * 15 / 100);
 var tot = eval(amount + tax);
 $("#hideTr").fadeIn();
   $("#rate").val(rate);
 $("#amount").val(amount);
 $("#taxAmount").val(tax);
 $("#totalCost").val(tot);
 $("#makeInvoice").disabled = false;
 
 });


 $("#tax_3").click(function(){ 
 
 var rate = $("#rate").val().replace(",","");
 var truck = $("#trucks").val();
 var trip = $("#trips").val();
 
 var amount = eval (rate * truck * trip);
 var tax = eval(amount * 20 / 100);
 var tot = eval(amount + tax);
 $("#hideTr").fadeIn();
  $("#rate").val(rate);
 $("#amount").val(amount);
 $("#taxAmount").val(tax);
 $("#totalCost").val(tot);
 $("#makeInvoice").disabled = false;
 
 });





 
  
});


/********************************************************
*                                                       *
*     Ajax Page for Add /  New Client (Transaction)     *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#doInvoice").click(function(){
                 var querystring = $("#do_invoice_form").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
					 
            url: 'my-invoice.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
			$("#do_invoice_form").fadeOut();
				 //$("#box1");
				 		var win = window.open('','_blank', 'width=1000,height=800,location=false');
		win.document.write(data);
		win.document.close();
				 $(".make_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_staff #msg").fadeIn("slow").html(data).delay().fadeIn(2800, function(){
				$(".make_staff #msg").remove();
				resetForm($('#do_invoice_form'));
				$("#do_invoice_form").fadeIn().load( window.location.reload());
});



				 //$("#box1");
				 
				 //.load( window.location.reload());


					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
		$(document).ready(function(){
			var querystring = '1';
             $("#truck").click(function(){
				  $.ajax({
            url: 'fleetList.php',
            type: "POST",
            data: querystring,
            success: function(data) { 
			
			$("#showF").modal().html(data)
			
			}});
			 });
			 });
/********************************************************
*                                                       *
*     Ajax Page for Add /  Receipt    	                *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#do_receipt").click(function(){
                 var querystring = $("#do_receipt_form").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				//$("#divToPrint").html(data);


//var divToPrint = document.getElementById('divToPrint');
           //var popupWin = window.open('', '_blank', 'width=300,height=300');
           //popupWin.document.open();
          // popupWin.document.write('<html><body onload="window.print()">' + html(data)+ '</html>');
//            popupWin.document.close();
		//var content = document.write(html(data));
		var win = window.open('','_blank', 'width=1000,height=800,location=false');
		win.document.write(data);
		win.document.close();
		
		
				 //$("#box1");
				 
				 

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
		
/********************************************************
*                                                       *
*     Ajax Page for Making Payment    	                *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#do_payment").click(function(){
                 var querystring = $("#do_payment_form").serialize();
                 //$('#result').html(querystring);
				 
				 $.ajax({
            url: 'my-script.php',
            type: "POST",
            data: querystring,
            success: function(data) {
                //code to execute
				
				$("#do_payment_form").fadeOut();
				 //$("#box1");
				 
				 $(".make_staff #loading").fadeIn(800).delay(800).fadeOut("slow");
					
				$(".make_staff #msg").fadeIn("slow").html(data).delay(2800).fadeIn(2800, function(){
				$(".make_staff #msg").remove();
				resetForm($('#do_payment_form'));
				$("#do_payment_form").fadeIn().ajaxStop( window.location.reload());
});

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
/*		$(document).ready(function(){
    $(':checkbox.selectall').on('click', function(){
        $(':checkbox[name="' + $(this).data('checkbox-name') + '"]').prop("checked", $(this).prop("checked"));
    });
    $(':checkbox.checkme').on('click', function(){
        var _selectall = $(this).prop("checked");
        if ( _selectall ) {
            $( ':checkbox[name="' + $(this).attr('name') + '"]' ).each(function(i){
                _selectall = $(this).prop("checked");
                return _selectall;
            });
        }
        $(':checkbox[name="' + $(this).data('select-all') + '"]').prop("checked", _selectall);
    });
});*/


/********************************************************
*                                                       *
*     Ajax Page for Printing Transactions               *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("#trans").click(function(){
				 
					
					//$("#showF").modalClose();
					//$("#truck").val(data);
					//fnGetSelected();
					//html(sData);
					//alert( "The following data would have been submitted to the server: \n\n"+sData );
					//
			
				
	//			oTable = $('#example').dataTable();
//				var sData = oTable.$('input').serialize();
				
				var sData = $("#transHistory").serialize();
                 //$('#result').html(querystring);
				 //return false;
				 $.ajax({
            url: 'transactions.php',
            type: "POST",
            data: sData,
            success: function(data) {
                //code to execute
				

		var win = window.open('','_blank', 'width=1000,height=auto,location=false, scrollbars=yes');
		win.document.write(data);
		win.document.close();
		
		
				 //$("#box1");
				 
				 

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		
		
		

/********************************************************
*                                                       *
*     Ajax Page for Printing Transactions               *
*                                                       *
*********************************************************/		
		$(document).ready(function(){
             $("table.display td a#printTransact").click(function(){
				 
					
					//$("#showF").modalClose();
					//$("#truck").val(data);
					//fnGetSelected();
					//html(sData);
					//alert( "The following data would have been submitted to the server: \n\n"+sData );
					//
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
				
	//			oTable = $('#example').dataTable();
//				var sData = oTable.$('input').serialize();
				
//				var sData = $("#transHistory").serialize();
                 //$('#result').html(querystring);
				 //return false;
				 $.ajax({
            url: 's_transactions.php',
            type: "POST",
            data: data,
            success: function(data) {
                //code to execute
				

		var win = window.open('','_blank', 'width=1000,height=auto,location=false, scrollbars=yes');
		win.document.write(data);
		win.document.close();
		
		
				 //$("#box1");
				 
				 

					//});
//				$("#ert").delay(8000).fadeIn();


                    }
            });
			
                 return true;
                 });
        });
		

/********************************************************
*                                                       *
*    Ajax Page For Hiding  Transaction Line in lIST     *
*                                                       *
*********************************************************/
	  	$(document).ready(function()
	{
		$('table.display td a#hideTransact').click(function()
		{
			
				var id = $(this).parent().parent().attr('id');
				var data = 'id=' + id ;
				var parent = $(this).parent().parent();
//
			
						   
							//alert(data);
							parent.fadeOut('slow', function() {$(this).remove();//.ajaxStop( window.location.reload());});
							
							
			
				 });				
			
		});
		
		// style the table with alternate colors
		// sets specified color for every odd row
		//$('table#delTable tr:odd').css('background',' #FFFFFF');
	});
