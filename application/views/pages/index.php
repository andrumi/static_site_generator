<?php
if ($this->imagefile !=""){
    echo '<script type="text/javascript">toggledropdown()</script> ';
}
?>
<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-sm-4">
        <h3>Build Options</h3>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#">Start Build</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Templates <span
                        class="caret"></span></a>
                <ul class="dropdown-menu keep_open">
                    <li>
                            <button class="togglebutton" onclick="toggle('templatesiframe1');filltemplateview('templatesiframe1','template/basictemplate.html')">Basic</button><br>
                        <form action="<?= base_url("index.php/pages/chooseframe/basictemplate.html") ?>" method="post">
                            <button class="selecttemplate">Use Basic as Template</button><br>
                        </form>
                        <iframe class="templatesiframe" id="templatesiframe1"
                                src="about:blank" height="200" width="300"
                                style="display:none;"></iframe>
                    </li>
                    <li>
                            <button class="togglebutton" onclick="toggle('templatesiframe3');filltemplateview('templatesiframe3','template/bswebpage.html')">Webpage</button><br>
                        <form action="<?= base_url("index.php/pages/chooseframe/bswebpage.html") ?>" method="post">
                            <button type="submit" class="selecttemplate">Use Webpage as Template</button><br>
                        </form>
                        <iframe class="templatesiframe" id="templatesiframe3"
                                src="about:blank" height="200" width="300"
                                style="display:none;"></iframe>
                    </li>
                    <li>
                            <button class="togglebutton" onclick="toggle('templatesiframe2');filltemplateview('templatesiframe2','template/bsblogtemplate.html')">Blog</button><br>
                        <form action="<?= base_url("index.php/pages/chooseframe/bsblogtemplate.html") ?>" method="post">
                        <button class="selecttemplate">Use Blog as Template</button><br>
                        </form>
                        <iframe class="templatesiframe" id="templatesiframe2"
                                src="about:blank" height="200" width="300"
                                style="display:none;"></iframe>
                    </li>
                </ul>
            </li>
            <li class="dropdown" ><a class="dropdown-toggle1" data-toggle="dropdown" id="uploaddropdown" href="#">Upload Image <span class="caret" ></span></a>
                <ul class="dropdown-menu keep_open" >
                    <li>
                        <form action="<?=base_url("index.php/pages/upload")?>" method="post" id="imageuploadform" enctype="multipart/form-data">
                            <label for="fileToUpload">Select image to upload.</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit" >
                        </form>
                        <label for="errormessage">Message.</label>
                        <textarea id ="errormessage" style="min-width: 100%" placeholder="Image upload message" ></textarea>
                        <label for="imagetag">HTML tag for uploaded image.</label>
                        <textarea id="imagetag" style="min-width: 100%" onchange="cookieset()"><?php echo $this->imagefile ?></textarea>
                    </li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Colours<span
                        class="caret"></span></a>
                <ul class="dropdown-menu keep_open">
                    <li>
                        <label for="background-color">Choose colour.</label>
                        <input id="background-color" type="color" value="#ff0000" onchange="document.getElementById('chosen-color').value = document.getElementById('background-color').value;"/>
                        <br>
                        <label for="chosen-color">Get colour values.</label>
                        <input id="chosen-color" type="text" readonly value="#ff0000"/>
                    </li>
                </ul>
            </li>
    </div>
    <div class="col-sm-4">
        <h3>Your Script</h3>
        <div>
            <button class ="sitebutton" data-toggle="collapse" data-target="#demo" id="collapsebtn"
                    onclick="changebuttonlabel('collapsebtn')">Hide Script</button>
        </div>
        <div id="demo" class="collapse in">
            <button class ="sitebutton" id="toggleeditarea" name="toggleeditarea" onclick="expander()">Toggle View</button>
            <button class ="sitebutton" id="load">Load Script</button><br>
            <form action="<?= base_url("index.php/pages/edit") ?>" id= "scriptform" method="post" style="display: " onsubmit="return confirm('Do you really want to submit the form?');">
                <textarea class="expand" id="html_content" name="html_content" style="width:100%" ></textarea>
                <label for="html_content">Editing Area.</label>
                <label for="file">Select file to edit/view.</label>
                <input type="file" name="file" id="file"  onchange="getfile(this.value)"><br>
                <label for="filename">Current Script:</label>
                <input type="text" id="filename" name="filename" style="border: hidden" value="<?php echo $filename2 ?>"><br>
                <button class ="sitebutton" id="edit">Save Edit</button>
            </form>
            <button class ="sitebutton" id="download">Download Site</button>
        </div>
    </div>
    <div class="col-sm-4">
        <h3>Your Page</h3>
        <div>   <button class ="sitebutton" data-toggle="collapse" data-target="#siteview" id="collapsebtn2"
                        onclick="toggle('siteviewer');filltemplateview('siteviewer','editing/inprogress.html');changebuttonlabel('collapsebtn2')" >Show Site</button>
        </div>
        <div id="siteview" class="collapse">
            <button class ="sitebutton" id="togglesiteviewer" name="togglesiteviewer" onclick="expandsiteview()">Toggle View</button><br>
            <iframe class="expand" id="siteviewer" name='siteviewer' src="about:blank" style="display: none; width:100%"></iframe>
        </div>
    </div>
</div>
</div>
<?php
echo '<script type="text/javascript">document.getElementById("imageuploadform").reset();</script> ';
echo '<script type="text/javascript">document.getElementById("errormessage").innerHTML= "'.$this->errorMessage.'"</script> ';
?>
<script>
    function filltemplateview(frame,view){
        var thesrc =document.getElementById(frame).src;
        if (thesrc=='about:blank'){
            filltemplateview2(frame, view);
        }
    }
</script>
<script>
    $('.keep_open').click(function (event) {
        event.stopPropagation();
    });
</script>
<script>
    $("#load").click(function () {
        var filename = document.getElementById("filename").value.toString();
        var url = "http://localhost/ssg/editing/" + filename;
        $.ajax({
            url: url,
            type: 'post',
            data: {
                filename: filename,
                action: 'load'
            },
            success: function (html) {
                $("#html_content").val(html);
            }
        });
    });
</script>