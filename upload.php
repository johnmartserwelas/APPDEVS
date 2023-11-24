<?php
if(isset($_FILES['file'])){
$arr_file_types = ['image/png', 'image/jpg', 'image/jpeg'];
  
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    echo "false";
    return;
}
  
if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
}
  
$filename = time().'_'.$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$filename);
echo 'uploads/'.$filename;
die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoFlex</title>
    <link rel="stylesheet" href="upload.css">

</head>
<body>

  <div class="drag-area" ondrop="upload_file(event)" ondragover="return false">
    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
    <header>Drag & Drop to Upload File</header>
    <span>OR</span>
    <button>Browse File</button>
    <input type="file" name="file" id="file" hidden>
  </div>
  
  <script src="upload.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
