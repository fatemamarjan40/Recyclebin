
$(document).ready(function(e){
    let $uploadfile = $('.upload-profile-image input[type="file"]');
    $uploadfile.change(function(){
        readURL(this);

    });
    $("reg-form").submit(function(event){
        let $password = $("#password");
        let $confirm = $("#confirm_pwd");
        let $error = $("#confirm_error");
        if($password.val()==$confirm.val())
        {
            return true;
        }
        else
        {
            $error.text("Password not Match");
            event.preventDefault();
        }
    });
});

function readURL(input)
{
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload= function(e){
            $(".upload-profile-image.img").attr('src',e.target.result);

        }
        reader.readAsDataURL(input.files[0]);
       

    }
}