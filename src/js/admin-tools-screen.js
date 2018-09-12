(function () {
    var appizyGeneratorForm = document.getElementById('appizy-short-code-generator');

    if (appizyGeneratorForm) {
        var shortCodeOutput = appizyGeneratorForm.querySelector('textarea[name="shortcode"]');
        var appIdSelector = appizyGeneratorForm.querySelector('select[name="app-id"]');
        var enableSaveDataCheckbox = appizyGeneratorForm.querySelector('input[name="enable-save"]');

        appizyGeneratorForm.addEventListener('change', function () {
            var appId = appIdSelector.value;

            var shortCode = '';

            if (parseInt(appId) > 0) {
                shortCode += '[appizy' + 'id="' + appId + '"';

                if (enableSaveDataCheckbox.checked) {
                    shortCode += ' save="enabled"';
                }

                shortCode += ']'
            }

            shortCodeOutput.value = shortCode;
        });
    }
})();