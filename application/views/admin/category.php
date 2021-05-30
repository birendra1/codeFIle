<div class="container">

    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php base_url(); ?>/admin/category">Category List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php base_url(); ?>/admin/category_add">Add Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php base_url(); ?>/admin/product_add">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php base_url(); ?>/admin/product_list">View all Product</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover table-striped">
                <?php   
                        $success = $this->session->tempdata('success');
                        if($success != ""){
                    ?>
                <div class="alert alert-success"> <?php echo $success; ?> </div>
                <?php
                        }
                        ?>
                <?php
                            $failure = $this->session->tempdata('failure');
                            if($failure != "") {
                        ?>
                <div class="alert alert-danger"> <?php echo $failure ; ?> </div>
                <?php 

                    }
                    ?>
                          <?php   
                        $error = $this->session->tempdata('error');
                        if($error != ""){
                    ?>
                <div class="alert alert-danger"> <?php echo $error; ?> </div>
                <?php
                        }
                        ?>
                
                <thead>
                    <tr>
                        <td class="col" style="width: 10%;">No.</td>
                        <td class="col" style="width: 10%;">Category Type</td>
                        <td class="col" style="width: 10%;">Category Name</td>
                        <td class="col" style="width: 30%;">Category Description</td>
                        <!-- <td class="col">Category image</td> -->
                        <td class="col" style="width:10%;">Active</td>
                        <td class="col" style="width: 10%;">Tags</td>
                        <td class="col" style="width: 10%;">Created Time</td>
                        <td class="col" style="width: 10%;">Edit</td>
                        <td class="col" style="width: 10%;">Delete</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    //   var_dump($results);
                    if (gettype($results) == 'array') {
                        // echo "here";

                        foreach ($results as $result) {
                            $i = 1;
                    ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result->category_type; ?></td>
                                <td><?php echo $result->category_name; ?></td>
                                <td><small><?php echo substr($result->description , 0, 100)."..."; ?></small></td>
                                <!-- <td></td> -->
                                <td><?php echo $result->isActive; ?></td>
                                <td><?php echo $result->tags; ?></td>
                                <td><?php echo $result->created_at; ?></td>
                                <td><a href="" class="btn btn-primary">Edit</a></td>
                                <td><a href="" class="btn btn-danger">Delete</a></td>
                            </tr>

                            <tr>

                            <?php  $i = $i+1;}
                    } else { ?>
                            <td colspan="8" class="col text-center">
                                <?php echo "No records found"; ?> </td>

                        <?php  }
                        ?>
                            </tr>
                </tbody>

            </table>
        </div>
    </div>
    <!-- <div class="card mt-5">
        <div class="card-header text-black-50">
            Category
        </div>
        <div class="card-body">
            <div class="table table-responsive table-bordered table-hover">
                <thead>
                    <tr class="row">
                        <td class="col">Category Name</td>
                        <td class="col">Category Title</td>
                        <td class="col">Category Description</td>
                        <td class="col">Category image</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>contents</td>
                    </tr>
                </tbody>

            </div>
        </div>
    </div> -->
</div>