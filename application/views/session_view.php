<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Session Management</title>
</head>
<body>
    Welcome <?php echo $this->session->userdata('name'); ?>

    <br/>

    <a href="http://localhost/codefile/index.php/sessionx/session_unset">Click here</a> to unset your user data
</body>
</html>