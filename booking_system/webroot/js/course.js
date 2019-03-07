
jQuery(document).ready(function () {
$( "#datepicker" ).datetimepicker({
                    format: "yyyy-mm-dd hh:ii",
                    autoclose: true
}).on("change.dp", function(selectedDate) {        
    $("#addCourse").valid();
});;
    $("#addCourse").validate({
        rules: {
            "name": {
                required: true,
                minlength: 3,
                maxlength: 32,
                alphanumeric: true,
                /*remote: {
                    url: ajax_url + '/business-units/uniqueCheck',
                    type: 'post',
                    headers : {
                        'X-CSRF-Token': $('[name="_csrfToken"]').val()
                    },
                }*/
            },
            'date': {
                required: true
            },
            'description': {
                required: true
            },
        },
        messages: {
            "name": {
                required: "Please enter course name.",
                minlength: "Minimum 3 characters required.",
                maxlength: "Maximum 32 characters required.",
                //alphanumeric : "Only alpha numeric characters allowed"
            },
            'date': {
                required: "Please select date."
            },
            'description': {
                required: "Please enter description."
            }
        }
    });
    
});
