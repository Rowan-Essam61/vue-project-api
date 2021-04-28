<?php

    class product{
        private $conn;
        public $id;
        public $category_id;
        public $color;
        public $quantity;
        public $size;
        public $description;
        public $name;
        public $price;
        public $brand_id;


    public function __construct($db){
            $this->conn=$db;
    }


    public function read(){
        $sql=$this->conn-> query("SELECT * FROM product");
        return $sql;
   
   
   }
    public function read_Category(){
        $sql=("SELECT * FROM product WHERE Category_id=?");
       
   $stmt=$this->conn->prepare($sql);
   $stmt->bindParam(1,$this->category_id);
   $stmt->execute();
   
  return $stmt;
       
       
   
   
   }
    public function read_Brand(){
    $sql=("SELECT * FROM product WHERE Brand_ID=?");
      $stmt=$this->conn->prepare($sql);
   $stmt->bindParam(1,$this->brand_id);
   $stmt->execute();
   
  return $stmt;
   
   }
     public function read_single(){
   $sql2='SELECT * FROM product WHERE ID=?';
   $stmt=$this->conn->prepare($sql2);
   $stmt->bindParam(1,$this->id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $this->id =$row['ID'];
   $this->category_id =$row['Category_id'];
   $this->color =$row['Colors'];
   $this->size =$row['Sizes'];
   $this->description =$row['Description'];
   $this->price =$row['Price'];
   $this->name =$row['Name'];
   $this->brand_id =$row['Brand_ID'];
   $this->quantity =$row['quantity'];
  
  
  }

   public function create(){
   $sql3="INSERT INTO product (Category_id,Colors,Sizes,Description,Price,Name,Brand_ID,quantity)  VALUES 
   (?, ? , ? ,?, ?,?,?,?)";
   $stmt=$this->conn->prepare($sql3);
// $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->category_id       =htmlspecialchars(strip_tags($this->category_id));
 $this->color             =htmlspecialchars(strip_tags($this->color));
 $this->size              =htmlspecialchars(strip_tags($this->size));
 $this->description       =htmlspecialchars(strip_tags($this->description));
 $this->price             =htmlspecialchars(strip_tags($this->price));
 $this->name              =htmlspecialchars(strip_tags($this->name));
 $this->brand_id          =htmlspecialchars(strip_tags($this->brand_id));
 $this->quantity          =htmlspecialchars(strip_tags($this->quantity));

 
  //$stmt->bindParam(1,$this->id);
  $stmt->bindParam(1,$this->category_id);
  $stmt->bindParam(2,$this->color);
  $stmt->bindParam(3,$this->size);
  $stmt->bindParam(4,$this->description);
  $stmt->bindParam(5,$this->price);
  $stmt->bindParam(6,$this->name);
  $stmt->bindParam(7,$this->brand_id);
  $stmt->bindParam(8,$this->quantity);


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
 $sql4="UPDATE product SET Category_id=?,Colors=?,Sizes=?,Description=?,Price=?,Name=?,Brand_ID=?,quantity=? WHERE ID=?";

 $stmt=$this->conn->prepare($sql4);
 $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->category_id       =htmlspecialchars(strip_tags($this->category_id));
 $this->color             =htmlspecialchars(strip_tags($this->color));
 $this->size              =htmlspecialchars(strip_tags($this->size));
 $this->description       =htmlspecialchars(strip_tags($this->description));
 $this->price             =htmlspecialchars(strip_tags($this->price));
 $this->name              =htmlspecialchars(strip_tags($this->name));
 $this->brand_id          =htmlspecialchars(strip_tags($this->brand_id));
 $this->quantity          =htmlspecialchars(strip_tags($this->quantity));

 
  $stmt->bindParam(1,$this->category_id);
  $stmt->bindParam(2,$this->color);
  $stmt->bindParam(3,$this->size);
  $stmt->bindParam(4,$this->description);
  $stmt->bindParam(5,$this->price);
  $stmt->bindParam(6,$this->name);
  $stmt->bindParam(7,$this->brand_id);
  $stmt->bindParam(8,$this->quantity);
  $stmt->bindParam(9,$this->id);
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
   $sql5="DELETE FROM product WHERE ID=?";
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