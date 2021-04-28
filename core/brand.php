<?php

    class brand{
        private $conn;
        public $id;
        public $name;
        public $logo;
      

    public function __construct($db){
            $this->conn=$db;
    }


    public function read(){
        $sql=$this->conn-> query("SELECT * FROM brand");
    
        return $sql;
   
   
   }
   

     public function read_single(){
   $sql2='SELECT * FROM brand WHERE ID=?';
   $stmt=$this->conn->prepare($sql2);
   $stmt->bindParam(1,$this->id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $this->id =$row['ID'];
   $this->name =$row['Name'];
   $this->logo =$row['Logo'];
  
  
  }

   public function create(){
   $sql3="INSERT INTO brand (Name,Logo)  VALUES 
   (?, ?)";
   $stmt=$this->conn->prepare($sql3);
// $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->name              =htmlspecialchars(strip_tags($this->name));
 $this->logo          =htmlspecialchars(strip_tags($this->logo));
 
  //$stmt->bindParam(1,$this->id);
  $stmt->bindParam(1,$this->name);
  $stmt->bindParam(2,$this->logo);
 


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
 $sql4="UPDATE brand SET Name=?,Logo=? WHERE ID=?";

 $stmt=$this->conn->prepare($sql4);
 $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->name              =htmlspecialchars(strip_tags($this->name));
 $this->logo              =htmlspecialchars(strip_tags($this->logo));

 
 
  $stmt->bindParam(1,$this->name);
  $stmt->bindParam(2,$this->logo);
  $stmt->bindParam(3,$this->id);
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
   $sql5="DELETE FROM brand WHERE ID=?";
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