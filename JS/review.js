var review = function(review_json) {

    this.username = review_json.username;
   //alert("username "+this.username);
    this.datePosted = review_json.datePosted;
     //alert("date_posted: "+this.datePosted);
    this.building = review_json.building;
     //alert("building "+this.building);
    this.rating = review_json.rating;
    //alert("rating "+this.rating);
    this.tpRating = review_json.tpRating;
   //alert("tpRating "+this.tpRating);
    this.helpful = review_json.helpful;
   //alert("heplful "+this.helpful);
    this.details = review_json.details;
     //alert("dertails "+this.details);
};
var review2 = function(review_json) {

    
    this.building = review_json.building;
     //alert("building "+this.building);
    this.avg_rating = review_json.avg_rating;
    //alert("rating "+this.rating);
   
     //alert("dertails "+this.details);
};
review2.prototype.makeCompactDiv2 = function(){
	  var tr2= $("<tr></tr>");
    
    var building_div = $("<td></td>");
   //	username.addClass('username');
    building_div.html("<span> <b> Building: </b> </span> " + this.building);
    tr2.append(building_div);  
 
  

    var avg_rating_div = $("<td></td>");
  //  datePosted.addClass('datePosted');
	avg_rating_div.html("<span> <b>  Average Rating:</b> </span> " + round2Fixed(this.avg_rating)); //only for formatting
    tr2.append(avg_rating_div);
    
        return tr2;
}

review.prototype.makeCompactDiv = function() {
 	
    var tr= $("<tr></tr>");
    
    var username_div = $("<td></td>");
   //	username.addClass('username');
    username_div.html("<span> <b> Posted by: </b> </span> " + this.username);
    tr.append(username_div);  
 
  

    var datePosted_div = $("<td></td>");
  //  datePosted.addClass('datePosted');
	datePosted_div.html("<span> <b> Date posted: </b> </span> " + this.datePosted);
    tr.append(datePosted_div);
    
    var rating_div = $("<td></td>");
    rating_div.html("<span> <b> Overall rating: </b> </span> " + this.rating);
    tr.append(rating_div);
    
    var tpRating_div = $("<td></td>");
   // tpRating.addClass('tpRating');
	tpRating_div.html("<span> <b> Toilet paper rating: </b> </span> " + this.tpRating);
    tr.append(tpRating_div);
    
      var details_div = $("<td></td>");
   // details.addClass('numRatings');
    details_div.html("<span> <b> Details: </b> </span> " + this.details);
    tr.append(details_div);
    
    tr.append("<br> </br>");
    
   
   //RETURNS UNDEFINED  
   /* var helpful_div = $("<div></div>");
  	helpful.addClass('helpful');
    //helpful_div.html(this.helpful);
    tr.append(helpful_div); */
    
    
    //Don't have this field 
    
    /* var numRatings_div = $("<div></div>");
   // numRatings.addClass('numRatings');
    //numRatings_div.html(this.numRatings);
    tr.append(numRatings_div); */
    
  
	
	
	
    
 
 
    return tr;
};

function showBuilding() {
	var building = $('#txt1').val();
	$("#show_building").append("<p> Here are the reviews for: " + "<span>" + building + "</span>" +"</p>");
	//$("#review_table").append("<span>" + building + "</span>");
}

function clearBuilding() {
	$("#show_bulding").clear();
}

//rounds number to 2 decimal places
function round2Fixed(value) {
  value = +value;

  if (isNaN(value))
    return NaN;

  // Shift
  value = value.toString().split('e');
  value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + 2) : 2)));

  // Shift back
  value = value.toString().split('e');
  return (+(value[0] + 'e' + (value[1] ? (+value[1] - 2) : -2))).toFixed(2);
}

