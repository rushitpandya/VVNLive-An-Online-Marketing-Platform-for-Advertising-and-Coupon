$(function () {
        $("#description").keyup(function () {
			//alert("hi");
		desc=document.getElementById("description").value;
		document.getElementById('offer_description').innerHTML=desc;
		$('#offer_description').trigger('contentchanged'); 

		});
	});
	$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
	
  });
  
  $(function () {
        $("input[name='group3']").click(function () {
			
		//alert('hi');
            
			if ($("#other").is(":checked")) 
			{
                $("#show-meother").show();
				$("#description").prop('required',true);
				
				 $('html, body').animate({
        scrollTop: $("#show-meother").position().top
			}, 2000);
				
            } 
			else 
			{
                $("#show-meother").hide();
			}
				

			
  });
   });
  	

	$(function () {
        $("#discount_type").change(function () {
					
					var amount_discount = document.getElementById("amount_discount").value;
					
					var e=document.getElementById("discount_type");
					var strUser = e.options[e.selectedIndex].value;
					
					if(strUser=="1")
					{
						if($('#order11').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On All Products";
						}
						else if($('#order12').is(":checked"))
						{
							var product_name1=document.getElementById("product_name1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On "+product_name1;
						}
						
						else if($('#order13').is(":checked"))
						{
							amount_min1=document.getElementById("amount_min1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On Above Bill Of " +amount_min1+" Rs";
						}
						else
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs ";
						}
					}
					else if(strUser=="2")
					{
						if($('#order11').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On All Products";
						}
						else if($('#order12').is(":checked"))
						{
							var product_name1=document.getElementById("product_name1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On "+product_name1;
						}
						
						else if($('#order13').is(":checked"))
						{
							amount_min1=document.getElementById("amount_min1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On Above Bill Of " +amount_min1+" Rs";
						}
						else
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % ";
						}
					}
					$('#offer_description').trigger('contentchanged'); 
					
					
					
		});
	});
	
	$(function () {
        $("#amount_discount").keyup(function () {
			var amount_discount = document.getElementById("amount_discount").value;
					
					var e=document.getElementById("discount_type");
					var strUser = e.options[e.selectedIndex].value;
					if(strUser=="1")
					{
						if($('#order11').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On All Products";
						}
						else if($('#order12').is(":checked"))
						{
							var product_name1=document.getElementById("product_name1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On "+product_name1;
						}
						
						else if($('#order13').is(":checked"))
						{
							amount_min1=document.getElementById("amount_min1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On Above Bill Of " +amount_min1+" Rs";
						}
						else
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs ";
						}
					}
					else if(strUser=="2")
					{
						if($('#order11').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On All Products";
						}
						else if($('#order12').is(":checked"))
						{
							var product_name1=document.getElementById("product_name1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On "+product_name1;
						}
						
						else if($('#order13').is(":checked"))
						{
							amount_min1=document.getElementById("amount_min1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On Above Bill Of " +amount_min1+" Rs";
						}
						else
						{
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs ";
						}
					}
$('#offer_description').trigger('contentchanged'); 					
					
		});
	});
	
	
	$(function () {
		 $("#submit").click(function () {
		$("#discount1").trigger("click")

		  $('html, body').animate({
        scrollTop: $("#button12").position().top
			}, 2000);
		
		 });
	});
	
		$(function () {
		 $("#discountbutton").click(function () {
		
		  $('html, body').animate({
        scrollTop: $("#show-me9").position().top
			}, 2000);
		});
		
	});
	
	$(function () {
		 $("#combobutton").click(function () {
		
		  $('html, body').animate({
        scrollTop: $("#show-me9").position().top
			}, 2000);
		});
		
	});
	
	$(function () {
		 $("#productbutton").click(function () {
		
		  $('html, body').animate({
        scrollTop: $("#show-me9").position().top
			}, 2000);
		});
		
	});
		
	
	
	
	$(function () {
        $("#amount_min1").keyup(function () {
			var amount_discount = document.getElementById("amount_discount").value;
					
					var e=document.getElementById("discount_type");
					var strUser = e.options[e.selectedIndex].value;
					if(strUser=="1")
					{
						
						
						
							amount_min1=document.getElementById("amount_min1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On Above Bill Of " +amount_min1+" Rs ";
						
					}
					else if(strUser=="2")
					{
						
						
							amount_min1=document.getElementById("amount_min1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On Above Bill Of" +amount_min1+" Rs ";
						
					}
					$('#offer_description').trigger('contentchanged'); 
					
		});
	});
	
	$(function () {
        $("#product_name1").keyup(function () {
			var amount_discount = document.getElementById("amount_discount").value;
					
					var e=document.getElementById("discount_type");
					var strUser = e.options[e.selectedIndex].value;
					if(strUser=="1")
					{
						
						
						
							product_name1=document.getElementById("product_name1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On " +product_name1;
						
					}
					else if(strUser=="2")
					{
						
						
							productname1=document.getElementById("productname1").value;
							document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On " +product_name1;
						
					}
					$('#offer_description').trigger('contentchanged'); 
					
		});
	});
	
	$(function () {
        $("input[name='group6']").click(function () {
			
            if ($("#test6").is(":checked")) {
			
			 var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("cashback_type");
					var strUser = e.options[e.selectedIndex].value;
			
					
									
					if(strUser=="1")
					{
						$('#cashbackdesc').val(" Extra "+cashback_amount+" Rs Cashback");
					}
					else if(strUser=="2")
					{
						$('#cashbackdesc').val(" Extra "+cashback_amount+" % Cashback");
					}
					else{
					$('#cashbackdesc').val(" Extra "+cashback_amount+"  Cashback");
					}
				
	
			}
  });
   });
	
	////
	$(function () {
					
		 $("input[name='group67']").click(function () {			
		var amount_discount = document.getElementById("amount_discount").value
		var e=document.getElementById("discount_type");
		var strUser = e.options[e.selectedIndex].value;
		if($('#order11').is(":checked"))
		{
				if(strUser=="1")
				{
						document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On All Products";	
				}
				else if(strUser=="2")
				{
						document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On All Products";	
				}
		}
		else if($('#order12').is(":checked"))
		{
			var product_name1=document.getElementById("product_name1").value;
			if(strUser=="1")
				{
						document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On "+product_name1;
				}
				else if(strUser=="2")
				{
						document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On "+product_name1;
				}
							
			
		}
		else if($('#order13').is(":checked"))
		{
						amount_min1=document.getElementById("amount_min1").value;
						
				if(strUser=="1")
				{
						document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" Rs "+"On Above Bill Of" +amount_min1+" Rs";
				}
				else if(strUser=="2")
				{
						document.getElementById('offer_description').innerHTML="Flat "+amount_discount+" % "+"On Above Bill Of" +amount_min1+" Rs";
				}
						
			
		}
		$('#offer_description').trigger('contentchanged'); 
		
		 });
	});
	
	$(function () {
        $("#cashback_discount").keyup(function () {
					var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("cashback_type");
					var strUser = e.options[e.selectedIndex].value;		
						
			if ($("#test1").is(":checked")) 
				{
					
						
					if(strUser=="1")
					{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount+" Rs Cashback";
					}
					else if(strUser=="2")
					{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount+" % Cashback";
					}
					
					else{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount;
					}
					
					
					
					
				} 
				else 
				{
					
					if(strUser=="1")
					{
						document.getElementById('button1').text="Activate Deal+Get Extra "+cashback_amount+" Rs Cashback";
					}
					else if(strUser=="2")
					{
						document.getElementById('button1').text="Activate Deal+Get Extra"+cashback_amount+" % Cashback";
					}
					else{
						document.getElementById('button1').text="Activate Deal+Get Extra"+cashback_amount;
					}
				}
				$('#button1').trigger('contentchanged'); 
		});
			});
			
			$(function () {
        $("#cashback_type").change(function () {
			var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("cashback_type");
					var strUser = e.options[e.selectedIndex].value;
			if ($("#test1").is(':checked')) 
				{
					
									
					if(strUser=="1")
					{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount+" Rs Cashback";
					}
					else if(strUser=="2")
					{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount+" % Cashback";
					}
					else{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount;
					}
					
					
					
				} 
				else 
				{
					if(strUser=="1")
					{
						document.getElementById('button1').text="Activate Deal+Get Extra"+cashback_amount+"Rs Cashback";
					}
					else if(strUser=="2")
					{
						document.getElementById('button1').text="Activate Deal+Get Extra"+cashback_amount+"% Cashback";
					}
					else{
						document.getElementById('button1').text="Activate Deal+Get Extra"+cashback_amount;
					}
				}
				$('#button1').trigger('contentchanged'); 
		});
			});
			
			


   

		
		$(function () {
        $("input[name='group3']").click(function () {
            if ($("#discount2").is(":checked")) {
                $("#show-me3").show();
				
				$('offer_type').prop('required',true);
				$('html, body').animate({
        scrollTop: $("#show-me3").position().top
			}, 2000);
            } else {
                $("#show-me3").hide();
				
            }
		});
    });
	
	$(function () {
        $("input[name='group3']").click(function () {
			
			
            if ($("#discount1").is(":checked")) {
                $("#show-me2").show();
				$('#discount_type').prop('required',true);
				$('#amount_discount').prop('required',true);
				$('#radio-group1').prop('required',true);
				$("#order11").trigger("click");
				 $('html, body').animate({
        scrollTop: $("#show-me2").position().top
			}, 2000);
				
            } else {
                $("#show-me2").hide();
			}
		});
    });
	
	
	
	
	
	$(function () {
        $("input[name='group5']").click(function () {
            if ($("#order1").is(":checked")) 
			{
                $("#show-me5").show();
				$('#order_type').prop('required',true);
					var buy_product = document.getElementById("buy_product").value;
					var e=document.getElementById("get_type");
					var strUser = e.options[e.selectedIndex].value;
					var quantity = document.getElementById("quantity").value;
				
						if(strUser=="1")
						{
						
							
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On Second Order";
							}
							
						
						}
					else if(strUser=="2")
					{
						
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On Second Order";
							}
							
					
					} 
					else if(strUser=="3")
					{
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On Second Order";
							}
											
					}
					else 
					{
						document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" off";
					}
			}
			else if($("#order").is(":checked"))
			{
				$('#order_type').prop('required',false);
				$("#show-me5").hide();
				var buy_product = document.getElementById("buy_product").value;
					var e=document.getElementById("get_type");
					var strUser = e.options[e.selectedIndex].value;
					var quantity = document.getElementById("quantity").value;
				
					if(strUser=="1")
					{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" off On All Order";		
					}
					else if(strUser=="2")
					{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On All Order";
					} 
					else if(strUser=="3")
					{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On All Order";
					} 
					else 
					{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" off On All Order ";
					}
			}
			else
			{
				$('#order_type').prop('required',false);
				 	document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" off  ";
			}
			$('#offer_description').trigger('contentchanged'); 
		});
    });
	
	
	
	
	
	
		$(function () {
        $("input[name='group1']").click(function () {
            if ($("#test4").is(":checked")) 
			{
				 $("#show-me6").show();
					
					$('#button1').trigger('contentchanged'); 
					
				
					
            } 
			else 
			{
                $("#show-me6").hide();
            }
		});
    });
	
	
	$(function () {
        $("input[name='group67']").click(function () {
            if ($("#order12").is(":checked")) 
			{
				 $("#show-me78").show();
				 $('#product_name1').prop('required',true);
			
            } 
			else 
			{
                $("#show-me78").hide();
            }
		});
    });
	
	$(function () {
        $("input[name='group67']").click(function () {
            if ($("#order13").is(":checked")) 
			{
				 $("#show-me8").show();
				 $('#amount_min1').prop('required',true);
			
            } 
			else 
			{
                $("#show-me8").hide();
            }
		});
    });
	
	
	$(function () {
        $("input[name='group4']").click(function () {
            if ($("#no").is(":checked")) {
                $("#show-me4").show();
				$('#min').prop('required',true);
		
            } else {
                $('#min').prop('required',false);
				$("#show-me4").hide();
            }
			 if ($("#yes").is(":checked")) {
                $("#yesbutton").show();
				
		$('#product_name2').prop('required',true);
            } else {
                $("#yesbutton").hide();
				$('#product_name2').prop('required',false);
			}
		});
    });
	
	
			
        
		
	
	
	
	$(function () {
        $("input[name='group1']").click(function () {
			
            if ($("#test1").is(":checked")) {
				if($('#test4').is(":checked"))
				{
					var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("cashback_type");
					var strUser = e.options[e.selectedIndex].value;
					if(strUser=="1")
					{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount+"Rs Cashback";
					}
					else if(strUser=="2")
					{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount+"% Cashback";
					}
					
					else{
						document.getElementById('button1').text="Get Coupon Code + Extra "+cashback_amount;
					}
				}
				
				else	
				{
					
					document.getElementById('button1').text="Get Coupon Code";
				}
                $("#show-me").show();
				
            } 
			else 
			{
                $("#show-me").hide();
				if($('#test4').is(":checked"))
				{
					var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("cashback_type");
					var strUser = e.options[e.selectedIndex].value;
					if(strUser=="1")
					{
						document.getElementById('button1').text="Extra "+cashback_amount+"Rs Cashback";
					}
					else if(strUser=="2")
					{
						document.getElementById('button1').text="Extra "+cashback_amount+"% Cashback";
					}
					
					else{
						document.getElementById('button1').text="Extra "+cashback_amount;
					}
				}
				
				else	
				{
					
					document.getElementById('button1').text="Get Activate Deal";
				}
            }
			if ($("#test2").is(":checked")) {
                $("#show-me1").show();
            } else {
                $("#show-me1").hide();
            }
			$('#button1').trigger('contentchanged'); 
        });
    });
	$(function () {
        $("input[name='group2']").click(function () {
            if ($("#couponcode1").is(":checked")) {
				
                $("#coupon_code_auto_fill").show();
				var button111=document.getElementById('copybutton').text;
				//alert(button111);
				$('#copybutton1').val(button111);
				$("#coupon_code_fill").hide();
            } else {
                $("#coupon_code_auto_fill").hide();
            }
        });
    });
	$(function () {
        $("input[name='group2']").click(function () {
            if ($("#couponcode2").is(":checked")) {
                $("#coupon_code_fill").show();
				$("#coupon_code_auto_fill").hide();
            } else {
                $("#coupon_code_fill").hide();
            }
        });
		
		$('#copybutton').click(function() {
			
			copyToClipboard();
		});
    });
	
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
	 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
  
  $(document).ready(function() {
    $('select').material_select();
  

});




	function offer()
	{
		 var e = document.getElementById("offer_type");
	var strUser = e.options[e.selectedIndex].value;
	$('html, body').animate({
        scrollTop: $("#show-me3").position().top
			}, 2000);
	if(strUser=="1")
	{
		
		$('#product_type').show();
		$('#product_name').prop('required',true);
		$('#radio_group3').prop('required',true);
		$('#combo_type').hide();
		$('#buy_product').prop('required',false);
		$('#radio_group2').prop('required',false);
		$('#get_type').prop('required',false);
		$('#quantity').prop('required',false);
		$("#yes").trigger("click");
		$("#product_name").trigger("change");
		
		}
	else if(strUser=="2")
	{
		$('#combo_type').show();
			$("#order").trigger("click");
		$('#product_name').prop('required',false);
		$('#radio_group3').prop('required',false);
		$('#buy_product').prop('required',true);
		$('#get_type').prop('required',true);
		$('#radio_group2').prop('required',true);
		$('#quantity').prop('required',true);
		$('#product_type').hide();
	}

	}
       
  
  function copyToClipboard() {
	  
	  var copybutton=document.getElementById('copybutton').text;
	 
    window.prompt("Copy to clipboard: Ctrl+C, Enter", copybutton);
}
  
  $(function () {
        $("#product_name").keyup(function () {
					var productname = document.getElementById("product_name").value;
					var e=document.getElementById("offer_type");
					var strUser = e.options[e.selectedIndex].value;	
					
						
			if ($("#yes").is(":checked")) 
				{
					var productname1 = document.getElementById("product_name2").value;
					document.getElementById('offer_description').innerHTML="Get Free "+productname+" on Order of "+productname1;			
				} 
				else if($("#no").is(":checked")) 
				{
					var min = document.getElementById("min").value;
					document.getElementById('offer_description').innerHTML="Get Free "+productname+" on Above Order of "+min+" Rs";
					
				}
				else
				{
					document.getElementById('offer_description').innerHTML="Get Free "+productname;
				}
				$('#offer_description').trigger('contentchanged'); 
		});
			});
			
	 $(function () {
        $("#product_name2").keyup(function () {
					var productname = document.getElementById("product_name").value;
					var productname1 = document.getElementById("product_name2").value;
					document.getElementById('offer_description').innerHTML="Get Free "+productname+" on Order of "+productname1;			
		});
			});	
			
 $(function () {
        $("#min").keyup(function () {
					var productname = document.getElementById("product_name").value;
					var min = document.getElementById("min").value;
					document.getElementById('offer_description').innerHTML="Get Free "+productname+" on Above Order of "+min+" Rs";		
		});
			});				
	
	
	
	$(function () {
        $("#buy_product").keyup(function () {
			var buy_product = document.getElementById("buy_product").value;
					var e=document.getElementById("get_type");
					var strUser = e.options[e.selectedIndex].value;
					var quantity = document.getElementById("quantity").value;
									
					if(strUser=="1")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
							}
						
						}
						else{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
						}
					}	
					else if(strUser=="2")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off";
							}				
						}
					else{
						document.getElementById('offer_description').innerHTML="Buy "+buy_product+" and Get "+quantity+" % off" ;
						}
					}
					else if(strUser=="3")
					{
						if($('#order').is(":checked")) 
						{							
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off ";
							}				
						}
						else
						{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+" and Get "+quantity+ " Rs off" ;
						}
					}
					else
					{
						document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+ " off";
					}	
$('#offer_description').trigger('contentchanged'); 					
			});
		});
		


		$(function () {
        $("#coupon_name").keyup(function () {
			var name=document.getElementById('coupon_name').value;
			document.getElementById('title').innerHTML=name;
			document.getElementById('title1').innerHTML=name;
		});
		});
$(function () {
        $("#coupon_code_own").keyup(function () {

var button111=document.getElementById('coupon_code_own').value;
		
				$('#copybutton1').val(button111);

		});
});
		
		$(function () {
        $("#quantity").keyup(function () {
			var buy_product = document.getElementById("buy_product").value;
					var e=document.getElementById("get_type");
					var strUser = e.options[e.selectedIndex].value;
					var quantity = document.getElementById("quantity").value;
									
					if(strUser=="1")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
							}
						
						}
						else{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +"  ";
						}
					}
					else if(strUser=="2")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off";
							}				
						}
						else{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" off ";
						}
					}
					else if(strUser=="3")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs ";
							}				
						}
						else{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
						}
					}
					else
					{
						document.getElementById('offer_description').innerHTML="Buy "+buy_product+" and Get "+quantity ;
					}
					$('#offer_description').trigger('contentchanged'); 
			});
		});

function order1()
	{
					var buy_product = document.getElementById("buy_product").value;
					var e=document.getElementById("get_type");
					var strUser = e.options[e.selectedIndex].value;
					var quantity = document.getElementById("quantity").value;
				
						if(strUser=="1")
						{
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On First Order";
							}
							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  On Second Order";
							}
							
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +"  ";
							}
						
						}
						else if(strUser=="2")
						{
						
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off";
							}				
					
						} 
						else if(strUser=="3")
						{
						
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							//alert(strUser);
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off";
							}				
					
						} 
						else 
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+"  off";
						}
	$('#offer_description').trigger('contentchanged'); 
	}
		
  function get1()
  {
	  var buy_product = document.getElementById("buy_product").value;
					var e=document.getElementById("get_type");
					var strUser = e.options[e.selectedIndex].value;
					var quantity = document.getElementById("quantity").value;
									
					if(strUser=="1")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
							}
						}
						else{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
						}
						
						
					}
					else if(strUser=="2")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" % off";
							}				
						}
						else{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +" ";
						}
					}
					else if(strUser=="3")
					{
						if($('#order').is(":checked"))
						{
							document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On All Orders";
						}
						else if($('#order1').is(":checked"))
						{	
							
							var e1=document.getElementById("order_type");
							var strUser1 = e1.options[e1.selectedIndex].value;
							if(strUser1=="1")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On First Order";
							}

							else if(strUser1=="2")
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off On Second Order";
							}
							else
							{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity+" Rs off";
							}				
						}
						else
						{
								document.getElementById('offer_description').innerHTML="Buy "+buy_product+ " and Get "+quantity +"  off ";
						}
					}
					
					$('#offer_description').trigger('contentchanged'); 
			
  }
  
   function readURL(input) {
		
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result)
              .width(120)
              .height(120);
			  
      };

      reader.readAsDataURL(input.files[0]);
  }
};
$(document).ready(function () {


	  
		
		$('#offer_description').bind('contentchanged', function() {
  // do something after the div content has changed
  
 var desc= document.getElementById('offer_description').innerHTML;

 $('#offer_description1').val(desc);
  });
  
  
  $('#button1').bind('contentchanged', function() {
  // do something after the div content has changed
  
 var couponbutton= document.getElementById('button1').text;

 $('#cashback1').val(couponbutton);
 			
  });
  
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
	
  });
   });
   
   $(function () {
        $("input[name='group6']").click(function () {
			
			//alert('hi');
            if ($("#test6").is(":checked")) {
			
			 var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("cashback_type");
					var strUser = e.options[e.selectedIndex].value;
			
					
									
					if(strUser=="1")
					{
						$('#cashbackdesc').val(" Extra "+cashback_amount+" Rs Cashback");
					}
					else if(strUser=="2")
					{
						$('#cashbackdesc').val(" Extra "+cashback_amount+" % Cashback");
					}
					else{
					$('#cashbackdesc').val(" Extra "+cashback_amount+"  Cashback");
					}
				
	
			}
  });
   });
   
   
   
	