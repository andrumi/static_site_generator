function cookieset(){
    document.cookie = document.getElementsById('imagetag').val();
}
function getcookie(){
    var imghtml =document.cookie;
    document.getElementById("imagetag").innerHTML = imghtml;
}