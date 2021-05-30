<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users </title>
    <link rel="stylesheet" href="<?php echo base_url().'assests/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">CRUD Application</a>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $success = $this->session->userdata('success');
                    if($success != ""){
                ?>
                <div class="alert alert-success"> <?php echo $success; ?> </div>
                    <?php
                    }
                    ?>
                    <?php
                        $failure = $this->session->userdata('failure');
                        if($failure != "") {
                    ?>
                    <div class="alert alert-success"> <?php echo $failure ; ?> </div>
                        <?php 

                }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top:10px;">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                <div class="col-md-6">
        <h3>View User</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url().'user/create';?>" class="btn btn-primary rounded-15">Create</a>
        </div>
                </div>
            </div>
       
        </div> 
        <hr>

        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered table-hover table-lg">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col" >Edit</th>
                            <th scope="col" >Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($users))
                    {
                        foreach($users as $user) {
                            ?> 
                       
                    
                        <tr>

                            <td><?php echo $user['user_id'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><img src="uploads/<?php echo $user['upload_image'] ?>" alt="Not found" height="45" width="75"></td>
                            <td>
                            <!-- <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li> -->

                                <a href="<?php echo base_url().'user/edit/'.$user['user_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                            <td>
                            <!-- <li class="list-inline-item">
                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                            </li> -->
                                <a href="<?php echo base_url().'user/delete/'.$user['user_id'] ?>" class="btn btn-secondary btn-sm">Delete</a>
                            </td>
                        </tr>
                   
                    <?php  
                    }} else { ?>
                    
                    
                <tr>
                    <td colspan="5">
                        Record Not found
                    </td>
                </tr>

                <?php } ?>
                <tbody>
                </table>
            </div>
        </div>
        
    </div>
    
</body>
</html>