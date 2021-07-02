jQuery(document).ready(function ($) {
    $("#lb_ajax_request_certificate_message").css("display", "none");
    $("#lb_ajax_request_certificate_button").click(function () {
            user_id = $("#user_id").val();
            var data = {
                'action': 'lb_ajax_action',
                'user_id': user_id
            };
            jQuery.post(
                lb_ajax_object.ajax_url,
                data,
                function (response) {
                    if (response == 'error') {
                        $("#lb_ajax_request_certificate_message").css("display", "inline-block");
                        $("#lb_ajax_request_certificate_button_anchor").css('display', 'none');
                        $("#lb_ajax_request_certificate_message").html("Error! Try to check the number you typed.");
                    } else {
                        $("#lb_ajax_request_certificate_message").css("display", "none");
                        $("#lb_ajax_request_certificate_button_anchor").css('display', 'inline');
                        $("#lb_ajax_request_certificate_button_anchor").prop("href", response);
                    }
                });
        }
    );
});