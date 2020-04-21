<?php
    include "operations.php";
    /**
     * 
     */
    class User implements operations{
    	private $user_id;
    	private $first_name;
    	private $last_name;
    	private $city_name;
    	public $query;
    	
    	function __construct($first_name,$last_name,$city_name){

    	$this->first_name =$first_name;
    	$this->last_name =$last_name;
    	$this->city_name =$city_name;
    	    	}

    	public function setUserid($user_id){
    		$this->user_id=$user_id;
    	}

    	public function getUserid(){
    		return $this->$user_id;
    	}
    	public function save(){
           $con = new DBConnector();
    	   $fn=$this->first_name;
    	   $ln=$this->last_name;	
    	   $city=$this->city_name;

    	   $res =mysqli_query($con->conn,"INSERT INTO users (first_name,last_name,city_name)VALUES('$fn','$ln','$city')") or die ("Error..." .mysqli_error()); 	
                return $res;

    	}

    	public function readAll(){
    	   $con = new DBConnector();

    	   $roo =mysqli_query($con->conn,"SELECT * FROM users") or die("error...".mysqli_error());

    	       return $roo;

    	}

    	public function readUnique(){
    			return null;
    	}

    	public function search(){
    			return null;
    	}

    	public function update(){
    			return null;
    	}

    	public function removeAll(){
    			return null;
    	}

    	public function removeOne(){
    			return null;
    	}

  public function closedb(){
  	$con= new DBConnector();
            $close=mysqli_close($con->conn);
            return $close;
            
        }
    }
    ?>