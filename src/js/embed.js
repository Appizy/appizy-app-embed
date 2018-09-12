(function ($) {
    var default_margin = 16;
    var apps = document.getElementsByClassName('appizy-app');

    for (var i = 0; i < apps.length; i++) {
        var app = apps[i];
        var frame = app.querySelector('iframe');

        frame.addEventListener(
            'load',
            function () {
                this.style.height = this.contentWindow.document.body.offsetHeight + default_margin + 'px';
                var app_id = this.getAttribute('data-app-id');

                var _this = this;
                $.ajax(
                    {
                        url: appizyApi.root + 'wp-json/appizy/v1/app/' + app_id,
                        method: 'GET',
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
                        }
                    }
                ).done(
                    function (data) {
                        if (!data) {
                            data = {}
                        }

                        _this.contentWindow.APY.setInputs(data);
                        _this.contentWindow.APY.calculate();
                    }
                );
            }
        );

        var saveButton = app.querySelector('.appizy-app-toolbar button');

        saveButton.addEventListener(
            'click',
            function () {
                var inputs = this.contentWindow.APY.getInputs();
                var app_id = this.getAttribute('data-app-id');
                console.log(inputs, app_id);

                $.ajax(
                    {
                        url: appizyApi.root + 'wp-json/appizy/v1/app/' + app_id,
                        data: inputs,
                        method: 'POST',
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
                        }
                    }
                ).done(
                    function () {
                        console.log('It works');
                    }, 'json'
                );
            }.bind(frame), false
        );
    }
})(jQuery);
