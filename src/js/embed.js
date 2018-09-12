(function ($) {
    var default_margin = 16;
    var apps = document.getElementsByClassName('appizy-app');

    for (var i = 0; i < apps.length; i++) {
        var app = apps[i];

        var frame = app.querySelector('iframe');
        var saveButton = app.querySelector('.appizy-app-toolbar button');
        var isSaveEnabled = !!saveButton;

        frame.addEventListener('load', _resizeFrame);

        if (isSaveEnabled) {
            frame.addEventListener('load', _loadUserData);
            saveButton.addEventListener('click', _saveUserData.bind(frame));
        }

        function _resizeFrame() {
            this.style.height = this.contentWindow.document.body.offsetHeight + default_margin + 'px';
        }

        function _loadUserData() {
            var app_id = this.getAttribute('data-app-id');

            var _this = this;
            $.ajax({
                url: appizyApi.root + 'wp-json/appizy/v1/app/' + app_id,
                method: 'GET',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
                }
            }).done(
                function (data) {
                    if (!data) {
                        data = {}
                    }

                    _this.contentWindow.APY.setInputs(data);
                    _this.contentWindow.APY.calculate();
                }
            );
        }

        function _saveUserData(e) {
            var inputs = this.contentWindow.APY.getInputs();
            var app_id = this.getAttribute('data-app-id');

            $.ajax({
                url: appizyApi.root + 'wp-json/appizy/v1/app/' + app_id,
                data: inputs,
                method: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', appizyApi.nonce);
                }
            }).done(
                function () {
                    console.log('It works');
                }, 'json'
            );
        }
    }
})(jQuery);
