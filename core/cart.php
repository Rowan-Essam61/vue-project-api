<?php

    class cart{
        private $conn;
        public $id;
        public $username;
        public $productid;
        public $quantity;
        public $price;

    public function __construct($db){
            $this->conn=$db;
    }


    public function read(){
        $sql=$this->conn-> query("SELECT * FROM cart");
      
        return $sql;
   
   
   }
   

     public function read_single(){
   $sql2='SELECT * FROM cart WHERE ID=?';
   $stmt=$this->conn->prepare($sql2);
   $stmt->bindParam(1,$this->id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $this->id =$row['ID'];
   $this->username =$row['Username'];
   $this->productid =$row['Product_id'];
    $this->quantity =$row['quantity'];
   $this->price =$row['price'];
  
  }

   public function create(){
   $sql3="INSERT INTO cart (Username,Product_id,quantity,price)  VALUES 
   (?, ?,?,?)";
   $stmt=$this->conn->prepare($sql3);
// $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->username               =htmlspecialchars(strip_tags($this->username));
 $this->productid              =htmlspecialchars(strip_tags($this->productid));
  $this->quantity              =htmlspecialchars(strip_tags($this->quantity));
 $this->price                  =htmlspecialchars(strip_tags($this->price));
 
  //$stmt->bindParam(1,$this->id);
  $stmt->bindParam(1,$this->username);
  $stmt->bindParam(2,$this->productid);
   $stmt->bindParam(3,$this->quantity);
  $stmt->bindParam(4,$this->price);


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
 $sql4="UPDATE cart SET Username=?,Product_id=?,quantity=?,price=? WHERE ID=?";

 $stmt=$this->conn->prepare($sql4);
 $this->username          =htmlspecialchars(strip_tags($this->Username));
 $this->productid              =htmlspecialchars(strip_tags($this->Product_id));
 $this->quantity               =htmlspecialchars(strip_tags($this->quantity));
 $this->price              =htmlspecialchars(strip_tags($this->price));
 
 
  $stmt->bindParam(1,$this->username);
  $stmt->bindParam(2,$this->productid);
  $stmt->bindParam(3,$this->quantity);
  $stmt->bindParam(4,$this->price);
  $stmt->bindParam(5,$this->id);
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
   $sql5="DELETE FROM cart WHERE ID=?";
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