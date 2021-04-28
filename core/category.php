<?php

    class category{
        private $conn;
        public $id;
        public $name;
      
    public function __construct($db){
            $this->conn=$db;
    }


    public function read(){
        $sql=$this->conn-> query("SELECT * FROM category");
       
        return $sql;
   }
   

     public function read_single(){
   $sql2='SELECT * FROM category WHERE ID=?';
   $stmt=$this->conn->prepare($sql2);
   $stmt->bindParam(1,$this->id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $this->id =$row['ID'];
   $this->name =$row['Name'];
  
  
  }

   public function create(){
   $sql3="INSERT INTO category (Name)  VALUES 
   (?)";
   $stmt=$this->conn->prepare($sql3);
// $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->name              =htmlspecialchars(strip_tags($this->name));
 
  //$stmt->bindParam(1,$this->id);
  $stmt->bindParam(1,$this->name);

  if ($stmt->execute()) { 
  echo  "4atateeer";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}

  //if($stmt->execute()){
  //return true;
  //}
  //else {
	//printf("erorrr ya fa444lll");
  //return false;
//}


  }
   
      public function update(){
 $sql4="UPDATE category SET Name=? WHERE ID=?";

 $stmt=$this->conn->prepare($sql4);
 $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->name              =htmlspecialchars(strip_tags($this->name));
 
  $stmt->bindParam(1,$this->name);
  $stmt->bindParam(2,$this->id);
  if ($stmt->execute()) { 
  echo  "4atateeer update";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}

  //if($stmt->execute()){
  //return true;
  //}
  //else {
	//printf("erorrr ya fa444lll");
  //return false;
//}


  }
   public function delete(){
   $sql5="DELETE FROM category WHERE ID=?";
    $stmt=$this->conn->prepare($sql5);
 $this->id        =htmlspecialchars(strip_tags($this->id));
  $stmt->bindParam(1,$this->id);
   if ($stmt->execute()) { 
  echo  "4atateeer deleted";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}
   }
   
   
   }
  
   
?>