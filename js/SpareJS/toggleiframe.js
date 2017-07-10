/**
 * Created by andrew on 17/08/2016.
 */
function toggle(element) {
    if (document.getElementById(element).style.display == "none") {
        document.getElementById(element).style.display = "";
        // $('.templatesiframe').attr('src', 'http://localhost/ssg/template/bsblogtemplate.html');
    } else {
        document.getElementById(element).style.display = "none";
        // $('.templatesiframe').attr('src', '');
    }
}