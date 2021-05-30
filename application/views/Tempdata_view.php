<!-- Tempdata -->
<!-- Where user wants to remove data stored in session after some specific time-period -->
<!-- CodeIgniter implements tempdata for this purpose  -->
<!-- To add data as tempdata, we have to use mark_as_tempdata() function -->
<!-- We can retrive the tempdata using tempdata() function  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Tempdata </title>
</head>
<body>
    Temp data Example 
    <h2><?php  echo $this->session->tempdata('item'); ?></h2>    
    <a href="tempdata/add">Click here</a>


</body>
</html>