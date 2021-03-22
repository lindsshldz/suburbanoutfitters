<?php
$page_roles = array('admin');
require_once 'checksession.php';
include 'navbar.php';

if(isset($_POST['submit'])) {
    $productID = mysql_entities_fix_string($conn, $_POST['productID']);
    $productName = mysql_entities_fix_string($conn,$_POST['productName']);
    $sellPrice = mysql_entities_fix_string($conn,$_POST['sellPrice']);
    $description = mysql_entities_fix_string($conn,$_POST['description']);
    $category = mysql_entities_fix_string($conn,$_POST['category']);
    $sku = mysql_entities_fix_string($conn,$_POST['sku']);
    $tags = mysql_entities_fix_string($conn,$_POST['tags']);
    $imgName = "SUlogo.png";
    $imgThumbnail = "SUlogo.png";

    $prodQuery = "";
    if($productID != null and $productID != "") {
        $prodQuery = "UPDATE products SET productName='$productName', sellPrice='$sellPrice', productDescription='$description',
                        category='$category', sku='$sku', tags='$tags' WHERE productID='$productID'";

        $prodResult = $conn->query($prodQuery);
        if(!$prodResult) die($conn->error);
    }else {
        $prodQuery = "INSERT INTO products (productName, sellPrice, productDescription, category, sku, tags, imgName, imgThumbnail)
                        VALUES ('$productName', '$sellPrice', '$description','$category', '$sku', '$tags', '$imgName', '$imgThumbnail')";
        $prodResult = $conn->query($prodQuery);
        if(!$prodResult) die($conn->error);
        $productID = $conn->insert_id;
    }


    header("Location: aproddetails.php?productID=$productID");
}

if(isset($_POST['inventory'])){
    $inventoryID = mysql_entities_fix_string($conn,$_POST['inventoryID']);
    $productID = mysql_entities_fix_string($conn,$_POST['productID']);
    $size = mysql_entities_fix_string($conn,$_POST['size']);
    $quantity = mysql_entities_fix_string($conn,$_POST['quantity']);
    $cost = mysql_entities_fix_string($conn,$_POST['cost']);
    $storeID = mysql_entities_fix_string($conn,$_POST['storeID']);

    $invQuery = "";
    if($inventoryID != null AND $inventoryID !="") {
        $invQuery = "UPDATE inventory SET invSize='$size', quantity='$quantity', cost='$cost', storeID='$storeID'
                        WHERE inventoryID='$inventoryID'";
    }else {
        $invQuery = "INSERT INTO inventory (productID, invSize, quantity, cost, storeID)
                        VALUES ('$productID', '$size', '$quantity', '$cost', '$storeID')";
    }
    $invResult = $conn->query($invQuery);
    if(!$invQuery) die($conn->error);

    header("Location: aproddetails.php?productID=$productID");
}

if (isset($_POST['delete'])) {
    $productID = mysql_entities_fix_string($conn, $_POST['productID']);

    $deleteQuery = "DELETE FROM products WHERE productID='$productID'";
    $deleteResult = $conn->query($deleteQuery);
    if(!$deleteResult) die($conn->error);

    header("Location: aproducts.php");
    exit();
}

$productID = $_GET['productID'];

$query = "SELECT * FROM products WHERE productID='$productID'";
$result = $conn->query($query);
if(!$result) die($conn->error);

$row = $result->fetch_array(MYSQLI_ASSOC);
echo <<<_END
<div class="container">
    <section class="py-5">
        <form method="post" action="aproddetails.php" id="product">
            <h4><i class="fas fa-tshirt"></i><span style="margin-left: 5px;"> Product Details</span></h4>
            <table>
                <tr>
                    <td class="col-form-label">Product Name: </td>
                    <td class="col-form-label"><input type="text" id="productName" name="productName" value="$row[productName]" required></td>
                </tr>
                <tr>
                    <td class="col-form-label">Sell Price: </td>
                    <td class="col-form-label"><input type="number" id="sellPrice" name="sellPrice" value="$row[sellPrice]" required></td>
                </tr>
                <tr>
                    <td class="col-form-label">Description: </td>
                    <td class="col-form-label"><textarea rows="3" cols="19" name="description" form="product" required>$row[productDescription]</textarea></td>
                </tr>
                <tr>
                    <td class="col-form-label">Category: </td>
                    <td class="col-form-label"><input type="text" id="category" name="category" value="$row[category]" required></td>
                </tr>
                <tr>
                    <td class="col-form-label">SKU: </td>
                    <td class="col-form-label"><input type="text" id="sku" name="sku" value="$row[sku]" required></td>
                </tr>
                <tr>
                    <td class="col-form-label">Tags: </td>
                    <td class="col-form-label"><input type="text" id="tags" name="tags" value="$row[tags]"></td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="productID" value="$productID">
            <input type="submit" name="submit" class="btn btn-light btn-outline-dark">
        </form>
        <hr>
        <h4><i class="fas fa-boxes"></i><span style="margin-left: 5px"> Product Inventory</span></h4>
        <table>
            <tbody>
_END;
$inventoryQuery = "SELECT * FROM inventory where productID='$productID'";
$inventoryResult = $conn->query($inventoryQuery);
if(!$inventoryResult) die($conn->error);

$rows = $inventoryResult->num_rows;
for($j=0; $j<$rows; ++$j) {
    $row = $inventoryResult->fetch_array(MYSQLI_ASSOC);
    echo <<<_END
                    <form method="post" action="aproddetails.php">
                    <tr class="col-form-label">
                        <td><label for="Size">Size: </label></td>
                        <td><input style="margin-right: 10px;"type="text" id="size" name="size" value="$row[invSize]" required>
                        </td>
                        
                        <td><label for="quantity">Qty:  </label></td>
                        <td><input style="width: 100px; margin-right: 10px;" type="number" id="quantity" name="quantity" value="$row[quantity]" required></td>
                        
                        <td><label for="price">Cost:</label></td>
                        <td><input style="width: 100px; margin-right: 10px;" type="number" id="price" name="cost" value="$row[cost]" required>
                        </td>
                        
                        <td><label for="Size">Store ID: </label></td>
                        <td><input style="width: 100px; margin-right: 20px;" type="number" id="Size" name="storeID" value="$row[storeID]" required>
                        </td>
                        <input type="hidden" name="inventoryID"value="$row[inventoryID]" >
                        <input type="hidden" name="productID" value="$productID">
                        <td><input class="text-small" type="submit" name="inventory" value="Save"></td>
                    </tr>
                    </form>
_END;
}
echo <<<_END
                    <form method="post" action="aproddetails.php">
                    <tr class="col-form-label">
                        <td><label for="Size">Size: </label></td>
                        <td><input style="margin-right: 10px;"type="text" id="size" name="size">
                        </td>
                        
                        <td><label for="quantity">Qty:  </label></td>
                        <td><input style="width: 100px; margin-right: 10px;" type="number" id="quantity" name="quantity"></td>
                        
                        <td><label for="price">Cost:</label></td>
                        <td><input style="width: 100px; margin-right: 10px;" type="number" id="price" name="cost">
                        </td>
                        
                        <td><label for="Size">Store ID: </label></td>
                        <td><input style="width: 100px; margin-right: 20px;" type="number" id="Size" name="storeID">
                        </td>
                        <input type="hidden" name="inventoryID">
                        <input type="hidden" name="productID" value="$productID">
                        <td><input class="text-small" type="submit" name="inventory" value="Save"></td>
                    </tr>
                    </form>
                    <tr>
                        <td>
                            <form method="post" action="aproddetails.php">
                                        <input type="hidden" name="productID" value="$productID">
                                        <button type="submit" name="delete" class="btn btn-danger" style="margin-top: 20px">
                                            <i class="fas fa-trash-alt"></i><span style="margin-left: 8px;">Delete Product</span>
                                        </button>
                            </form>
                        </td>
                    </tr>
            </tbody>    
        </table>
        <br>
        <a class="btn btn-light btn-outline-dark"href="aproducts.php">Back</a>
    </section>
</div>
</body>
_END;

$conn->close();
