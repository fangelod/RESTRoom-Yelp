var url_base = "http://fangelod.github.io/RESTRoom-Yelp/Server-Side/";



//$('#best_buildings').childNodes.length === 0

$(document).ready(function ()  {
	
	var count = 0;
	var showTable = true;
	//alert("showTable: " + ∑showTable);
	
	
	 $('#cleanest_bathrooms').on('click', function(e) {
	 	if (showTable) {
			e.preventDefault();
			$.ajax(url_base + "rest.php",
							{type: "GET",
							dataType: "json",
						
							success: function(review_objects,status, jqXHR) {
								if (count === 0) {
								
									for (var i = 0; i <5; i++) {
									     var x = new review2(review_objects[i]);
									  	 $('#best_buildings').append(x.makeCompactDiv2());
								  	} 	
								}
							  	 $('#best_buildings').fadeIn();
							  	  showTable = false;
					    		  count++;
			    			},
							error: function(jqXHR, status, error) {
								alert("iii");
								alert(status);
							  	alert(error);
						    }});
						    
					    
	 	}
					    
					   
	}); 
	
	 $('#hide_bathrooms').on('click', function(e) {
	 	e.preventDefault();
	 	$('#best_buildings').fadeOut();
	 	showTable = true;
	 });	
 
$('#building').on('submit',
			       function (e) {
				   e.preventDefault();
				   var building = $('#txt1').val();
				   if (building === "") {
				   	alert("field cannot be empty");
				   	return;
				   }
				   //alert(building);
				   $('#review_table').html('');
				   //console.log(url_base + "rest.php/"+ $('#txt1').val());
				   $.ajax(url_base + "rest.php",
						{type: "GET",
						dataType: "json",
						data:{
							"building" : $('#txt1').val()
						},
						success: function(review_objects,status, jqXHR) {
							for (var i = 0; i < review_objects.length; i++) {
						  		loadReview(review_objects[i]);
						  	} 	
		    			},
						error: function(jqXHR, status, error) {
							alert("No review for " + $('#txt1').val());
							
					    }});
			       });
			       
    	function bathroomloadReview(id) {
			 $.ajax(url_base + "rest.php/?postId=" + id,
						  {type: "GET",
							  dataType: "json",
							  success: function(review_object,status, jqXHR) {
							 var x = new review(review_object);
							 $('#bestbathroom').append(x.makeCompactDiv());
			    			  },
							  error: function(jqXHR, status, error) {
							  //alert(jqXHR.responseText);
							  alert("iii");
							   alert(error);
						      }});
	}
	
	function loadReview(id) {
		 $.ajax(url_base + "rest.php/?postId=" + id,
					  {type: "GET",
						  dataType: "json",
						  success: function(review_object,status, jqXHR) {
						 var x = new review(review_object);
						 $('#review_table').append(x.makeCompactDiv());
		    			  },
						  error: function(jqXHR, status, error) {
						  //alert(jqXHR.responseText);
						  alert("iii");
						   alert(error);
					      }});
	}
	
	 
	
	

	$('#new_todo_form').on('submit', function (e) {
		
		var dateValue = $("input[name='datePosted']").val();
	 	alert(dateValue);
		if (!isValidDate(new Date(dateValue))) {
			alert("Invalid date format. Please try again");
		}

				  // alert("hello");
				   e.preventDefault();
				  
				  
				   $.ajax(url_base + "rest.php",
					  {type: "POST",
						  dataType: "json",
						  data: $(this).serialize(),
						  success: function(result,status,jqXHR){
						  	  alert("success");
						  },
						  error: function (jqXHR,status,error){
						  		alert(jqXHR.responseText);
						  }
					
						});
					      return false;
			       });
					
    });
    
    function isValidDate(d) {
    	if (Object.prototype.toString.call(d) !== "[object Date]") {
    		//not a date
    		return false;
    	}
    	//is a valid date
    	return !isNaN(d.getTime());
    }
    
    
    /* alert($("input[name='datePosted']").val());
				  var dateInput = $("input[name='datePosted']").val();
				  var date = new Date(dateInput); */
    
  