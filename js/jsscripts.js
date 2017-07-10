/**
 * Created by andrew on 19/08/2016.
 */
function cookieset(){
    document.cookie = document.getElementsById('imagetag').val();
}
function getcookie(){
    var imghtml =document.cookie;
    document.getElementById("imagetag").innerHTML = imghtml;
}
function expander() {
    var width = $('#html_content')[0].style.width;
    if (width =='100%'){
        document.getElementById('html_content').style.width= '50em';
    }
    else{
        document.getElementById('html_content').style.width= '100%';
    }
}
function expandsiteview() {
    // var width =document.getElementById('siteview').style.width;
    var width = $('#siteviewer')[0].style.width;
    if (width =='100%'){
        document.getElementById('siteviewer').style.width= '50em';
    }
    else{
        document.getElementById('siteviewer').style.width= '100%';
    }
}
function getfile(newfile) {
    document.getElementById('filename').value = newfile.split('\\').pop().split('/').pop();
    document.getElementById('load').click();
}
function load_home(site){
    var sitename = site;
    var route ="http://localhost/ssg/";
    var fullpath= route +""+sitename;
    document.getElementById("content").innerHTML='<object class = "templatesiframe" type="text/html" data= "'+ fullpath +'" ></object>';
}

function toggledropdown(){
    $(document).ready(function(){
        $(".dropdown-toggle1").dropdown("toggle");
    });
}
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
function toggle(element) {
    if (document.getElementById(element).style.display == "none") {
        document.getElementById(element).style.display = "";
    } else {
        document.getElementById(element).style.display = "none";
    }
}
function filltemplateview2(elementid, page){
    var frame = document.getElementById(elementid);
    frame.src = "http://localhost/ssg/"+page;
}
function changebuttonlabel(buttonid){
    var label = document.getElementById(buttonid).textContent;
    if (label ==="Hide Site"){
        document.getElementById(buttonid).textContent="Show Site";
    }
    else if (label ==="Hide Script"){
        document.getElementById(buttonid).textContent="Show Script";
    }
    else if (label ==="Show Script"){
        document.getElementById(buttonid).textContent="Hide Script";
    }
    else {
        document.getElementById(buttonid).textContent="Hide Site";
    }
}
$("#download").click(function () {
    var url="http://localhost/ssg/index.php/pages/downloadzip"
    $.ajax({
        url: url,
        type: 'post'

    });
});