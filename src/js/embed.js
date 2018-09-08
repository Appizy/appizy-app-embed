(function ($) {
    var appizy_iframe = document.getElementsByClassName('appizy-iframe');
    var default_margin = 16;

    appizy_iframe = appizy_iframe[0];

    var app_id = appizy_iframe.getAttribute('data-app-id');

    appizy_iframe.addEventListener('load', function () {
        appizy_iframe.style.height = appizy_iframe.contentWindow.document.body.offsetHeight + default_margin + 'px';

        $.ajax({
            url: appizyApi.root + 'wp-json/appizy/v1/app/' + app_id,
            method: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
            }
        }).done(function (data) {
            data = JSON.parse(data);
            data = data[0];
            if (!data) {
                data = {}
            }
            console.log(data);
            appizy_iframe.contentWindow.APY.setInputs(data);
            appizy_iframe.contentWindow.APY.calculate();
        });
    });

    var saveButton = document.getElementById('save');
    saveButton.addEventListener('click', function () {
        var inputs = appizy_iframe.contentWindow.APY.getInputs();
        console.log(inputs);

        $.ajax({
            url: appizyApi.root + 'wp-json/appizy/v1/app/' + app_id,
            data: inputs,
            method: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
            }
        }).done(function () {
            console.log('It works');
        }, 'json');
    });

})(jQuery);