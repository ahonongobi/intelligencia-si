$(function () {
    "use strict";
    // init the validator
    $('#ajax-contact').validator();
    // when the form is submitted
    $('#ajax-contact').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
               
                success: function (result)
                {  

                    // data = JSON object that contact.php returns
                    
                    if (result == 'success') {
                    // data = JSON object that contact.php returns
                    $( "#msgSubmit" ).removeClass( "hidden" );
                    //interHTML(data.message) ti msgSubmit id;
                    // You can also use the following code:
                     $("#msgSubmit").html("Votre message a été envoyé avec succès. Un de nos agents vous contactera dans les plus brefs délai. Merci!. ");
                     $('#ajax-contact')[0].reset();
                     console.log("success");
                    } else {
                        $("#msgSubmit2" ).removeClass( "hidden" );
                        $("#msgSubmit2").html("Votre message n'a pas été envoyé. Veuillez réessayer plus tard. Merci!");
                        console.log("error");
                    }

                    
                }
            });
            return false;
        }
    })
});