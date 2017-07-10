/**
 * Created by andrew on 19/08/2016.
 */
function imageupload($param)
{

    $.ajax({
        type: "GET",
        url:"http://localhost/ssg/index.php/pages/imageupload/" + $param,
        success:function(result){

            $("#imagetag").html(result);
        }});
}