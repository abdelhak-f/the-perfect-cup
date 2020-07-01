<?php include "admin_header.php" ?>
<?php 

$connection = mysqli_connect('Localhost','root','','perfectcup');
if (isset($_GET['modifier'])) {
    $id_prod = $_GET['modifier']; 
}

$modifier_query = "SELECT * FROM tbl_product WHERE id = $id_prod ";
$load_product_query = mysqli_query($connection,$modifier_query);

while($row = mysqli_fetch_array($load_product_query)){
$id_prod = $row['id'];
$titre_produit = $row['pro_title'];
$pro_images = $row['pro_images'];
$desc_produit = $row['pro_description'];
$infos_produit = $row['pro_info'];
$prix_produit = $row['pro_price'];
//$pro_date = $_POST['_Date'];
}


if (isset($_POST['modifier_produits'])) {
    $titre_produit = $_POST['pro_title'];
    $pro_images = $_FILES['image']['name'];
    $produit_image_temp = $_FILES['image']['tmp_name'];
    $desc_produit = $_POST['pro_description'];
    $infos_produit = $_POST['pro_info'];
    $prix_produit = $_POST['pro_price'];
    //$prod_date = $_POST['date'];

    move_uploaded_file($produit_image_temp, "../img/$pro_images");

    $titre_produit = mysqli_real_escape_string($connection,$titre_produit);
    $pro_images = mysqli_real_escape_string($connection,$pro_images);
    $desc_produit = mysqli_real_escape_string($connection,$desc_produit);
    $infos_produit = mysqli_real_escape_string($connection,$infos_produit);

    $query = "UPDATE tbl_product SET pro_title = '$titre_produit' , pro_images ='$pro_images', pro_description = '$desc_produit', pro_info = '$infos_produit', pro_price = '$prix_produit' WHERE id = '$id_prod' ";
    $modifier_produit_query = mysqli_query($connection,$query);

    if (!$modifier_produit_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }

    
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Modifier le produit
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
             <form action="modifier_produits.php?modifier=<?php echo $id_prod ?>" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Titre de Produit</label>
                        <input type="text" value = "<?php echo $titre_produit ?>" class="form-control" name="pro_title">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="pro_images">Image de Produit</label>
                        <input type="file"  name="image">
                    </div>

                    
                    <div class="form-group">
                        <label for="desc_produit">Description de Produit</label>
                        <textarea class="form-control" name="pro_description" id="" cols="30" rows="5"><?php echo $desc_produit ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="infos_produit">Infos de Produit</label>
                        <textarea class="form-control" name="pro_info" id="" cols="30" rows="5"><?php echo $infos_produit ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="prix_produit">Prix de Produit</label>
                        <input type="number" value = "<?php echo $prix_produit ?>" class="form-control" name="pro_price">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="modifier_produits" value="Edit product">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>