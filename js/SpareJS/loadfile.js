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
