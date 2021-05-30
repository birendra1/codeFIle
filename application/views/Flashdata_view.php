<!-- Flash Data -->
<!-- To store some data for only one time and after that we want to remove that data. -->
<!-- CodeIgniter helps this with a help of flash data -->
<!-- In CodeIgniter, flashdata will only be avalible until the next request, and it will get deleted automatically -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Flash Data</title>
</head>
<body>

Flash data Example
<h2><?php echo  $this->session->flashdata('xyz'); ?>
</h2>

<a href="flashdata/add">Click here</a> to add flash data
    


</body>
</html>