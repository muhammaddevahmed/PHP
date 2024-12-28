<?php
include("component/header.php")
?>

  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">

                <div class="row  bg-light rounded  mx-0">
                <div class="row justify-content-end">
    <div class="col-lg-2">
    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-primary m-2">Add category</button>
    </div>
</div>
                    <div class="col-md-6 text-center">
                        <h3>This is blank page</h3>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
<!--Add category Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Categories add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1">
                                </div>
                             
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
      </div>
     
    </div>
  </div>
</div>
<?php
include("component/footer.php")
?>