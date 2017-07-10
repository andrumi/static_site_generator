<?php

/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 16/08/2016
 * Time: 20:32
 */
class pages_model extends CI_Model{

    public function editPage(){
        $this->load->helper('url');

        $text= $this->input->post('html_content');
        $edit = array(
            'filename' => "C:wamp/www/ssg/editing/".$this->input->post('filename'),

            'text' => $this->input->post('html_content')
        );

        $myfile = fopen($edit['filename'], "w") or die("Unable to open file!");
        fwrite($myfile, $edit['text']);
        fclose($myfile);

        return $this->input->post('filename');
    }

    public function copytemplate($filein){
        $file= "c:wamp/www/ssg/template/".$filein;
        $newfile = 'c:wamp/www/ssg/editing/inprogress.html';

        if (!copy($file, $newfile)) {
            echo "failed to copy $file...\n";
        }
        $finished=true;
        return $finished;
    }

    public function uploadimg(){
        $this->errorMessage="";
        $image="";
        if (basename($_FILES["fileToUpload"]["name"])==null||basename($_FILES["fileToUpload"]["name"])==""){
            $this->errorMessage="No file has been selected.";
            $returns= array($image,$this->errorMessage);
            return $returns;
        }
        $target_dir = 'c:wamp/www/ssg/editing/';
        $image=basename($_FILES["fileToUpload"]["name"]);

        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $this->errorMessage=$this->errorMessage."File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            $this->errorMessage=$this->errorMessage."Sorry, file already exists. ";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $this->errorMessage=$this->errorMessage."Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $this->errorMessage=$this->errorMessage."Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $this->errorMessage=$this->errorMessage."Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $this->errorMessage=$this->errorMessage."The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $this->errorMessage=$this->errorMessage." Sorry, there was an error uploading your file.";
            }
        }

        $returns= array($image,$this->errorMessage);
        return $returns;
    }
    public function zipper(){

        $this->load->library('zip');
        $this->load->helper('url');
        $path = 'editing/';

        $this->zip->read_dir($path);
        $this->zip->archive('archive.zip');
        $this->zip->download('archive.zip');

    }
}