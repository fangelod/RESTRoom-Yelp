<?php

class Review 
{
    private $postId;
    private $username;
    private $datePosted;
    private $building;
    private $rating;
    private $tpRating;
    private $helpful;
    private $numRatings;
    private $details;
    
    public static function create($username, $datePosted, $building, $rating, $tpRating, $details) {
        $conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        
        $sql = "INSERT INTO fpReview VALUES ('0', '$username', '$datePosted', '$building', '$rating', '$tpRating', '0', '0', '$details')";
		$result = $conn->query($sql);
        if ($result=== TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting into table: " . $conn->error;
        }
	    return $result;
    }
    
    public function getBuildingById($id) {
    	$conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
    	
    	$sql = "SELECT * FROM fpReview WHERE postId='".$id."'";
    	
    	$result = $conn->query($sql);
    	if ($result) {
    		$info = $result->fetch_array();
    		
    		return new Review(	
    		$info["username"], 
    		$info["datePosted"],
    		$info["building"],
    		intval($info["rating"]),	
    		intval($info["tpRating"]),
			$info["details"]);
    	}
    	
    	return null;
    	
    }
    
    public function getIdsForBuilding($build) {
    	$conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
    	
    	$sql = "SELECT postId FROM fpReview WHERE building='".$build."'";
    	
    	$result = $conn->query($sql);
    	$ids = array();
    	if ($result) {
    		if ($result->num_rows == 0) {
    			echo "0 results";
    		}
    		
    		while($row = $result->fetch_array()) {
    			$ids[] = intval($row['postId']);
    		}
    		
    		return $ids;
    	}
    	echo "Query Failed";
    	return $ids;
    }
    
    //findbyid
    public static function searchByBuilding($building) {
    
        $conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        
        $sql = "SELECT postId FROM fpReview WHERE building='".$building."'";
        

       $result = $conn->query($sql);
       $id_array = array();
  		$var=0;
  		if ($result) {
  			if ($result->num_rows == 0) {
  				echo "0 results";
  			}
		    // output data of each row
		    while($row = $result->fetch_array()) {
		      
		      $id_array[]=intval($row["postId"]);
     
    		}
		} else {
			//query didn't work. Deal w/ failure
    		echo "query failure";
		}
    
        return $id_array;
    }
    
    public static function findById($id) {
    	$conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
    	$result = $conn->query("select * from fpReview where postId = '".$id."'");
    	if ($result) {
    		if ($result->num_rows == 0) {
    			echo("empty");
    			return null;
    		} 
    	
    	$review_info = $result->fetch_array();
    	//echo($review_info["numRatings"]);
    	//echo	($review_info["datePosted"]); 
    
    	return new Review(	
    		$review_info["username"], 
    		$review_info["datePosted"],
    		$review_info["building"],
    	intval($review_info["rating"]),	
    	intval($review_info["tpRating"]),

    	      $review_info["details"]);
    	}
    	
    	return null;
    }
    
    public static function getHighRatings() {
        $conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        
        $sql = "SELECT postId FROM fpReview WHERE rating>=4";
        
       $result = $conn->query($sql);
       $id_array = array();
  		$var=0;
  		if ($result) {
  			if ($result->num_rows == 0) {
  				echo "0 results";
  			}
		    // output data of each row
		    while($row = $result->fetch_array()) {
		      
		      $id_array[]=intval($row["postId"]);
     
    		}
		} else {
			//query didn't work. Deal w/ failure
    		echo "query failure";
		}
    
        return $id_array;
    }
    
    public static function getBuildingRating() {
        $conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        
        $sql = "SELECT building, avg(rating) as avg_rating FROM fpReview GROUP BY building ORDER BY avg_rating DESC";
        
        $result = $conn->query($sql);
        
        $review_array = array();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $review_array[] = $row;
            }
        }
        
        return $review_array;
    }
    
      public function getIdJSON() {
      	$json_obj = array(//'postId' => $this->postId,
          'postId'=>$this->postId
      	);
      	
      }
      public function getJSON() {
      	
        $json_obj = array(//'postId' => $this->postId,
          'username'=>$this->username,
          'datePosted'=>$this->datePosted,
          'building'=>$this->building,
          'rating'=>$this->rating,
          'tpRating'=>$this->tpRating,
          //'helpful' => $this->helpful,
         // 'numRatings'=> $this->numRatings,
          'details'=>$this->details);
         
        return json_encode($json_obj);
  }
  
  //constructor
  private function __construct($username, $datePosted, $building, $rating, $tpRating, $details) {
  	$this->username = $username;
  	$this->datePosted = $datePosted;
  	$this->building = $building;
  	$this->rating = $rating;
  	$this->tpRating = $tpRating;
  	$this->details = $details;
  }
    
    /*
    public function markReviewHelpful($postId) {
        $conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");
        $result = $mysqli->query();
    }
    
    public function markReviewUnhelpful($postId) {
        $conn = new mysqli();
        $result = $mysqli->query();
    }
    */
    
    
    
    // Getters & Setters
    
    

}

?>