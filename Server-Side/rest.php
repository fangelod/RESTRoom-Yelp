<?php

require_once('ORM/Review.php');



//$path_components = explode('/', $_SERVER['PATH_INFO']);
$test = $_SERVER['REQUEST_URI'];
$path_components = parse_url($test, PHP_URL_QUERY);
//echo $path_components;
$path_components1 = explode('=', $path_components);


$path_components1[1]= rtrim($path_components1[1],"&_");
//echo($path_components1[1]);

//$path_components1 = explode('/', $_SERVER['PATH_INFO']);
  
if ($_SERVER['REQUEST_METHOD'] == "GET") {
	
    if (($path_components1[1] != "")) {
		
		if (is_numeric($path_components1[1])) { // GET for postId, returns JSON of one Review object
			//echo "Has ID parameter";
			$id = intval($path_components1[1]);
			
			header("Content-type: application/json");
			
			$review = Review::getBuildingById($id);
			
			echo ($review->getJSON());
		} else { // GET for building, returns array of ids
			//echo "Has building parameter";
			//echo($path_components1[1]);
			$build = $path_components1[1];
			
			header("Content-type: application/json");
			
			$id_array = array();
			
			$id_array = Review::searchByBuilding($build);
			
			echo (json_encode($id_array));
		
		}
		
		/*
		$build = ($path_components1[1]);
		
        $review = array();
        
        header("Content-type: application/json");
        $review = (Review::searchByBuilding($build));
       	
        $value;
        
        
        for ($i = 0; $i < count($review); $i++) {
       		$value = Review::findByID(intval($review[$i]));
        
        	echo($value->getJSON());
        }
        */
        /*
        if ($review == null) {
          // review not found.
          header("HTTP/1.0 404 Not Found");
          print("Review building: " . $build . " not found.");
          exit();
        }
        */
        // Check to see if deleting
        /*
        if (isset($_REQUEST['delete'])) {
          $todo->delete();
          header("Content-type: application/json");
          print(json_encode(true));
          exit();
        } 
        */
        
        // Normal lookup.
        // Generate JSON encoding as response
       
        exit();
        
    }
   $value= Review::getBuildingRating();
        header("Content-type: application/json");
        echo(json_encode($value));
        exit();
    
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
    $username = trim($_REQUEST['username']);
    
    if ($username == "") {
        header("HTTP/1.0 400 Bad Request");
        print("Invalid username");
        exit();
    }
    
    $datePosted = trim($_REQUEST['datePosted']);
    if ($datePosted == "") {
        header("HTTP/1.0 400 Bad Request");
        print("Invalid date");
        exit();
    }
    
    $building = trim($_REQUEST['building']);
    if ($building == "") {
        header("HTTP/1.0 400 Bad Request");
        print("Invalid building name");
        exit();
    }
    
    $rating = trim($_REQUEST['rating']);
    if ($rating == "") {
        header("HTTP/1.0 400 Bad Request");
        print("Invalid rating");
        exit();
    }
    
    $tpRating = trim($_REQUEST['tpRating']);
    if ($tpRating == "") {
        header("HTTP/1.0 400 Bad Request");
        print("Invalid TP rating");
        exit();
    }
    
    $details = trim($_REQUEST['details']);
    if ($details == "") {
        header("HTTP/1.0 400 Bad Request");
        print("Must enter details");
        exit();
    }
    
    $new_review = Review::create($username, $datePosted, $building, $rating, $tpRating, $details);
    
   // Report if failed
    if ($new_review == null) {
      header("HTTP/1.0 500 Server Error");
      print("Server couldn't create new review.");
      exit();
    }
    
    //Generate JSON encoding of new Todo
    header("Content-type: application/json");
    print($new_review->getJSON());
    exit();

} else {
    
}

/* //None of the above applied and URL could not be interpreted w/ respect to RESTFUL conventions
header("HTTP/1.0 400 Bad Request");
print("Did not understand URL"); */
     

?>