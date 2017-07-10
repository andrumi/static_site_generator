function load_home(site){
    var sitename = site;
    var route ="http://localhost/ssg/";
    var fullpath= route +""+sitename;
    // var object ='<object type="text/html" data= "'+ fullpath +" ></object>'
    document.getElementById("content").innerHTML='<object class = "templatesiframe" type="text/html" data= "'+ fullpath +'" ></object>';
}

function toggledropdown(){
    $(document).ready(function(){
        $(".dropdown-toggle1").dropdown("toggle");
    });
}