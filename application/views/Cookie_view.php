<!-- Cookie Management -->
<!-- Cookie is a small piece of data sent from web server to ctore on client's computer-->
<!-- CodeIgniter has one helper called "Cookie Helper" for cookie management -->
<!-- Method's in Cookie -->
<!-- Set_cookie(), get_cookie(), delete_cookie() -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Management</title>
</head>
<body>
    <a href="<?php echo base_url() ?>index.php/cookie/display">Click here</a> to display the value of cookie
    <a href="<?php echo base_url() ?>index.php/cookie/delete">Click here</a> to delete the value of cookie;
    
</body>
</html>

<!-- Libraries -->
<!-- The essential part of a CodeIgniter framework is its libraries . -->
<!-- Provides a rich set of libraries, which increases the speed of developing an application. -->
