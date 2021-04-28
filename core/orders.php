<?php

    class orders{
        private $conn;
        public $id;
        public $product_id;
        public $total_price;
        public $delivery_data;
        public $order_date;
        public $quantity;
        public $username;
    public function __construct($db){
            $this->conn=$db;
    }
    public function read(){
    $sqll="SELECT * FROM orders";
        $sql=$this->conn-> prepare($sqll);
        $sql->execute();
       // $row = $sql->fetch();
      //  $count=count($row);
		

        return $sql;
   }
     public function read_single(){
   $sql2='SELECT * FROM order WHERE ID=?';
   $stmt=$this->conn->prepare($sql2);
   $stmt->bindParam(1,$this->id);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $this->id =$row['ID'];
   $this->product_id =$row['Product_ID'];
   $this->total_price =$row['Total_Price'];
   $this->delivery_data =$row['Delivery_Data'];
   $this->order_date =$row['Order_Date'];
   $this->quantity =$row['Quantity'];
   $this->username =$row['Username'];
  }

   public function create(){
   $sql3="INSERT INTO orders (Product_ID,Total_Price,Delivery_Data,Order_Date,Quantity,Username)  VALUES 
   (? , ?, ? , ? ,?, ?)";
   $stmt=$this->conn->prepare($sql3);
 $this->product_id        =htmlspecialchars(strip_tags($this->product_id));
 $this->total_price       =htmlspecialchars(strip_tags($this->total_price));
 $this->delivery_data        =htmlspecialchars(strip_tags($this->delivery_data));
 $this->order_date             =htmlspecialchars(strip_tags($this->order_date));
 $this->quantity        =htmlspecialchars(strip_tags($this->quantity));
 $this->username          =htmlspecialchars(strip_tags($this->username));

 
  $stmt->bindParam(1,$this->product_id);
  $stmt->bindParam(2,$this->total_price);
  $stmt->bindParam(3,$this->delivery_data);
  $stmt->bindParam(4,$this->order_date);
  $stmt->bindParam(5,$this->quantity);
  $stmt->bindParam(6,$this->username);



  if ($stmt->execute()) { 
  echo  "4atateeer";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}
}
  //if($stmt->execute()){
  //return true;
  //}
  //else {
	//printf("erorrr ya fa444lll");
  //return false;
//}


   public function update(){
 $sql4="UPDATE orders SET Product_ID=?,Total_Price=?,Delivery_Data=?,Order_Date=?,
 Quantity=?,Username=? WHERE
 ID=?";

   $stmt=$this->conn->prepare($sql4);
   
 $this->id                =htmlspecialchars(strip_tags($this->id));
 $this->product_id        =htmlspecialchars(strip_tags($this->product_id));
 $this->total_price       =htmlspecialchars(strip_tags($this->total_price));
 $this->delivery_data     =htmlspecialchars(strip_tags($this->delivery_data));
 $this->order_date        =htmlspecialchars(strip_tags($this->order_date));
 $this->quantity          =htmlspecialchars(strip_tags($this->quantity));
 $this->username           =htmlspecialchars(strip_tags($this->username));

  $stmt->bindParam(1,$this->product_id);
  $stmt->bindParam(2,$this->total_price);
  $stmt->bindParam(3,$this->delivery_data);
  $stmt->bindParam(4,$this->order_date);
  $stmt->bindParam(5,$this->quantity);
  $stmt->bindParam(6,$this->username);
  $stmt->bindParam(7,$this->id);
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
   $sql5="DELETE FROM orders WHERE ID=?";
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