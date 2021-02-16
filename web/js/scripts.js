$(document).ready(function() {
    $('#contact').on('beforeSubmit', function() {
        var $form = $(this);
        $.ajax({
            type : 'post',
            url : '/site/save/',
            data : $form.serializeArray()
        }).done(function(data) {
                if (data.message != null) {
                    $(".alert").text(data.message).removeClass("hidden alert-danger").addClass("alert-success");
                } else {
                    $(".alert").text(data.error).removeClass("hidden alert-success").addClass("alert-danger");
                }
        });
        return false;
    });
});