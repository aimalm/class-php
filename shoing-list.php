
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Delete the product</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      //var_dump($productsArray);
      $num = 0;
      if (!isset($_POST['delete_btn'])) {
        for ($i = 0; $i < sizeof($productsArray); $i++){ ?> 
     
                <tr>
                    <th scope="row"><?php $num++; echo $num; ?> </th>
                    <td> <?php echo $productsArray[$i];  ?> </td> 
                    <td> <?php echo $productPrices[$i];  ?> </td> 
                    <td> <input type="text"  value="1" name="quantity"> </td> 

                    <td> <button type="button" class="btn btn-danger" name="delete_btn">Delete</button></td> 

                </tr>   
     <?php
     } 
      $totalValue * 2;
     }
     $totalValue * 2;
    ?>
  </tbody>
</table>
</form>