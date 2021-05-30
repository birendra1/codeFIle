<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "CodeIgniter File Upload mechanism!" ?></title>
    <link rel="stylesheet" href="<?php echo base_url().'assests/css/bootstrap.min.css'?>">
</head>
<body>
    <?php echo form_open_multipart('user/upload', array('id' => 'loginform')); ?> 
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        <?php //echo $error; ?>
            <input type="file" name="userfile" id="" size="20">
            <?php echo $error ?>
            </br>

            <input type="submit" value="Upload" class="btn btn-primary">
 <?php echo form_close(); ?>
    
</body>
</html>