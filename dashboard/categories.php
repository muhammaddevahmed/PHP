<?php
include("component/header.php")
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row  bg-light rounded  mx-0">
        <div class="row justify-content-end">
            <div class="col-lg-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-outline-primary m-2">Add category</button>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <h3>All Categories</h3>
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
                                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $values){
                                    ?>    
                                        <tr>
                                        <th scope="row">
                                            <img src="<?php echo $catImageAdd.$values['image']?>" width ="80" alt ="">
                                        </th>
                                        <td><?php echo $values['name']?></td>
                                        <td><a href="" class="btn btn-outline-success">Edit</a></td>
                                        <td><a href="" class="btn btn-outline-danger">Delete</a></td>
                                        </tr>

                                    <?php  
                                    } 

                                    ?>
                                    
                                   
                                </tbody>
                            </table>
        </div>
    </div>
</div>
<!-- Blank End -->

<!--Add category Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Categories add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method = "post" enctype = "multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="catName" id="exampleInputEmail1"
                            aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" class="form-control" name="catImage" id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="addCategory" class="btn btn-primary">Add Category</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
include("component/footer.php")
?>