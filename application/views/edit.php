<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud application- Update  user </title>
    <link rel="stylesheet" href="<?php echo base_url().'assests/css/bootstrap.min.css'?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">CRUD Application</a>
        </div>

    </div>

    <div class="container" style="padding-top:10px;">
        <h3>Update User</h3>
        <hr>
        <form method="post" name="editUser" action="<?php echo base_url().'/user/upload/'.$user['user_id'] ?>">
        <div class="row">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo set_value('name',$user['name']) ?>" class="form-control">
                     <?php  echo form_error('name') ?> 
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo set_value('email', $user['email']) ?>" class="form-control">
                    <?php  echo form_error('email') ?>
                </div>
                <div class="form-group">
                    <input type="file" name="userfile" id="" size="20">
                    <?php  echo form_error('userfile') ?>
                </div>
              

                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                    <a href="<?php echo base_url().'index.php/user/index'   ?>" class=" btn-secondary btn">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
    
</body>
</html>