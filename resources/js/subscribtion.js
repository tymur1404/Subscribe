$(document).ready(function() {
    var checkbox = $('#flexSwitchCheckDefault');

    checkbox.change(function() {
        if ($(this).is(':checked')) {
            $('#flexSwitchCheckDefaultHidden').val(1);
        } else {
            $('#flexSwitchCheckDefaultHidden').val(0);
        }
    });
});
