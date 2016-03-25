$(document).ready(function () {
 
   
   //var shouldHide= false;
   var count = 0;
   
   var olList = function() {
        var $cleanestBathrooms = $('<ol class= "cleanestBathrooms"> </ol>');
        var arr =[];
        arr.push($('<li> Davis </li>'));
        arr.push($('<li> UL </li>'));
        arr.push($('<li> Sitterson </li>'));
            
            
        for (var i = 0; i < arr.length; i++) {
                $cleanestBathrooms.append(arr[i]);
        }
            
        $('.cleanest').append($cleanestBathrooms);
   }
   
   
   
   $('#cleanest_bathrooms').click(function() {
        
        if (count === 0 ) {
            olList();    
        }
        count++;
        $('.cleanestBathrooms').fadeIn();
            
   
   });
   
   
       $('#hide_bathrooms').click(function() {
            $('.cleanestBathrooms').fadeOut();
       }); 
   
});