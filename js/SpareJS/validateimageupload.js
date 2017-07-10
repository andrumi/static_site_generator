/**
 * Created by andrew on 19/08/2016.
 */
function validateForm() {
    var x = document.forms["imageuploadform"]["fileToUpdate"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}