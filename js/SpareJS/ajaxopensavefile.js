
var filename = document.getElementById("filename").value.toString();
var url = "http://localhost/ssg/editing/" + filename;
$("#save").click(function () {
    var filename = document.getElementById("filename").value.toString();
    var url = "http://localhost/ssg/editing/" + filename;
    $.ajax({
        url: url,
        type: 'post',
        data: {
            filename: filename,
            action: 'save',
            content: encodeURIComponent($('#html_content').val())
        }
    });
});
//        $("#delete").click(function() {
//            $.ajax({
//                url : url,
//                type: 'post',
//                data : {
//                    filename : $("#filename").val(),
//                    action : 'delete'
//                }
//            });
//        });
$("#load").click(function () {
    var filename = document.getElementById("filename").value.toString();
    var url = "http://localhost/ssg/editing/" + filename;
    $.ajax({
        url: url,
        type: 'post',
        data: {
            //filename : $("#filename").val(),
            filename: filename,
            action: 'load'
        },
        success: function (html) {
            $("#html_content").val(html);
        }
    });
});