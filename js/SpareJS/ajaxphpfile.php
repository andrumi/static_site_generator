<?php
if(isset($_FILES["file"]["type"]))
{
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
        ) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        }
        else
        {
            if (file_exists("../editing/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            }
            else
            {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../editing/".$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
                echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
                echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
            }
        }
    }
    else
    {
        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
    }
}
?>
<!--the html to go with this ajax file upload stooped working on chrome???-->
<!---->
<!--<p>Ajax Image Upload</p><br/>-->
<!--<hr>-->
<!--<form id="uploadimage" action="" method="post" enctype="multipart/form-data">-->
<!--    <div id="image_preview"><img id="previewing" src="noimage.png" /></div>-->
<!--    <hr id="line">-->
<!--    <div id="selectImage">-->
<!--        <label>Select Your Image</label><br/>-->
<!--        <input type="file" name="file" id="file" required />-->
<!--        <input type="submit" value="Upload" class="submit" />-->
<!--    </div>-->
<!--</form>-->
<!--</div>-->
<!--<p id='loading' >loading..</p>-->
<!--<div id="message"></div>-->-->
<!--</li>-->
