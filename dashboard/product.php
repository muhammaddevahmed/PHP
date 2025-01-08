<?php
include("component/header.php")
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row  bg-light rounded  mx-0">
        <div class="row justify-content-end">
            <div class="col-lg-2 my-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-outline-primary ">Add Product</button>
            </div>
        </div>
        <div class="col-md-12">
            <h3>All Products</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" colspan="2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $row  = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as$values){
?>
                    <tr>
                        <th scope="row">
                            <img src="<?php echo $catImageAdd.$values['image']?>" width="80" alt="" srcset="">
                        </th>
                        <td><?php echo $values['name']?></td>
                        <td><a href="#Update<?php echo $values['id']?>" class="btn btn-outline-success"
                                data-bs-toggle="modal">Edit</a></td>
                        <td><a href="#Delete<?php echo $values['id']?>" data-bs-toggle="modal"
                                class="btn btn-outline-danger">Delete</a></td>
                    </tr>

                    <!--Update category Modal -->
                    <div class="modal fade" id="Update<?php echo $values['id']?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Categories Update</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="catId" value="<?php echo $values['id']?>">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                            <input type="text" class="form-control" name="catName"
                                                value="<?php echo $values['name']?>" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Image</label>
                                            <input type="file" name="catImage" class="form-control"
                                                id="exampleInputPassword1">
                                            <img src="<?php echo $catImageAdd.$values['image']?>" width="80" alt="">
                                        </div>

                                        <button type="submit" name="updateCategory" class="btn btn-primary">Update
                                            Category</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--Delete category Modal -->
                    <div class="modal fade" id="Delete<?php echo $values['id']?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Categories Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="catId" value="<?php echo $values['id']?>">


                                        <button type="submit" name="deleteCategory" class="btn btn-primary">Delete
                                            Category</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php


                                    }
                                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Blank End -->
<!--Add product Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Product add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="pName" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="pPrice" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" class="form-control" name="pQuantity" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Category</label>
                        <select class="form-control" id="floatingSelect" name="pCatId"
                            aria-label="Floating label select example">
                            <option hidden selected>Open this select menu</option>
                            <?php
                                    $query = $pdo ->query("select * from categories");
                                    $catRow  = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($catRow as $catVal){
?>
                            <option value="<?php echo $catVal['id']?>"><?php echo $catVal['name']?></option>
                            <?php
                                    }
                                    ?>


                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Image</label>
                        <input type="file" name="pImage" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Description</label>
                        <textarea class="form-control" id="floatingTextarea" style="height: 150px;"
                            name="pDescription"></textarea>
                    </div>

                    <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
                </form>
            </div>

        </div>
    </div>
</div>


<?php
include("component/footer.php")
?>