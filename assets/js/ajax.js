function ft_success_ajax( payer_id , status  ) {


    var payer_id = payer_id;
    var success_status = status;


    jQuery.ajax(
        {
            url : ld_ajax_url.ajax_url,
            type : 'POST',
            data : {
                action : 'ft_after_success_ajax_func',
                status : success_status,
                payer_id : payer_id,
            },
            success : function( response ) {

            }
        }

    );

}

