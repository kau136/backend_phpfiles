<?php
if(isset($_FILES['image'])){

    $File_name=$_FILES['image']['name'];
    $ext=explode(".", $File_name);
    $tmp=count($ext);
    if($ext[$tmp-1]=='jpg'|| $ext[$tmp-1]=='png'|| $ext[$tmp-1]=='jpeg'|| $ext[$tmp-1]=='pdf'){
        $File_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($File_tmp,"upload-images/".$File_name);
    }
    else{
        echo "file type not allowed";
    }
   
}

?>
<html>
    <body>
    <form action="upload.php" method="POST" enctype="multipart/form-data" >			
    <input type="file" name="image" /><br>
    <input type='submit'/>
    </form>

</body>
</html>




