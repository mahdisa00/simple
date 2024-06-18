<!DOCTYPE html>
<html lang="en">
<head>

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>فروشگاه آنلاین</title>
 <link rel="stylesheet" href="styles.css">
 <link href="css/styles.css" type= "text/css" rel="stylesheet"/>
</head>
<body>
<?php
// کانکشن به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// چک کردن کانکشن
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// دریافت محصولات از دیتابیس
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// چک کردن اگر دیتا وجود داشت
if ($result->num_rows > 0) {
   $products = array();
   while ($row = $result->fetch_assoc()) {
       $product = array(
           'id' => $row['id'],
           'name' => $row['name'],
           'description' => $row['description'],
           'price' => $row['price'],
           'image' => $row['image']
       );
       array_push($products, $product);
   }
   echo json_encode($products);
} else {
   echo "No products found.";
}

// بستن کانکشن
$conn->close();
?>
 <header>
   <nav>
     <ul>
       <li><a href="#">صفحه اصلی</a></li>
       <li><a href="#">محصولات</a></li>
       <li><a href="#">درباره ما</a></li>
       <li><a href="#">تماس با ما</a></li>
       <li><a href="#">سبد خرید</a></li>
     </ul>
   </nav>
 </header>

 <main>
   <section class="featured-products">
     <h2>محصولات ویژه</h2>
     <ul>
       <li>
         <img src="product1.jpg" alt="محصول 1">
         <h3>محصول 1</h3>
         <p>قیمت: 99,000 تومان</p>
         <button>افزودن به سبد خرید</button>
       </li>
       <li>
         <img src="product2.jpg" alt="محصول 2">
         <h3>محصول 2</h3>
         <p>قیمت: 129,000 تومان</p>
         <button>افزودن به سبد خرید</button>
       </li>
       <!-- سایر محصولات ویژه -->
     </ul>
   </section>

   <section class="product-categories">
     <h2>دسته بندی محصولات</h2>
     <ul>
       <li><a href="#">لباس</a></li>
       <li><a href="#">کفش</a></li>
       <li><a href="#">لوازم آرایشی</a></li>
       <li><a href="#">لوازم خانگی</a></li>
       <!-- سایر دسته بندی ها -->
     </ul>
   </section>
 </main>

 <footer>
   <p>&copy; 2023 فروشگاه آنلاین. همه حقوق محفوظ است.</p>
 </footer>

 <script src="script.js"></script>
</body>
</html>


