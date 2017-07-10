/**
 * Created by andrew on 18/08/2016.
 */
function getfile(newfile) {
    document.getElementById('filename').value = newfile.split('\\').pop().split('/').pop();
    document.getElementById('load').click();
}