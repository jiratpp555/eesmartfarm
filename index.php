<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT Smartfarm</title>
    <h1>IOT Smartfarm</h1>
    <h2>LED Controller</h2>
</head>

<body>

    <link rel="stylesheet" href="CSS/style.css">    

    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">


    <div>   
    </div> 

<p>Electronics Engineering KMITL</p>
<!-- <p><a href="index.php?logout='1'" style="color: red;">Log out</a></p> -->

</body>
</html>


<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && isset($_POST['text'])):
    $output = '';
    $filename = 'led.txt';
    if (!file_exists($filename)):
        $myfile = fopen($filename, "w");
    endif;
    file_put_contents($filename, $_POST['text']);   
    $output = array("File content created");
    die(json_encode($output));
else:
?>


<?php

    $n = 'LED turned on';
    $f = 'LED turned off';
   

/*for ($x = 1; $x <= 2; $x++):*/
?>

    <button class="onbtn" id="button" type="button" value="<?php echo $n; ?>">Turn on LED</button>
    <button class="offbtn" id="button" type="button" value="<?php echo $f; ?>">Turn off LED</button>

<!-- Upload images from rpi4 -->
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>




<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>     
<script>
$(document).on('click','#button',function(e) {
    var my_text = $(this).val();

    $.ajax({
        type: "POST",
        dataType:"json",
        url: window.location.href,
        data: "text=" + my_text,
        beforeSend: function (data) {
            alert('Success');
        },
        /*success: function (data) 
        {
            alert('Success');

        },*/
    });     
});
</script>
<?php endif; ?> 


    <!-- Add photo from aws server -->
   <object data="https://argitect-iot-demo-1.s3-ap-southeast-1.amazonaws.com/Background_3.jpg" width="1080" height="720"></object> 