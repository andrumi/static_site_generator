function expander() {
    var width = $(".expand").width();
    if (width <400){
       document.getElementById('html_content').style.width= '50em';
    }
    else{
        document.getElementById('html_content').style.width= '100%';
    }
}
