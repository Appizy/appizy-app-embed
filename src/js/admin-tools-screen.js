/* global window, document */

(function () {

    var admin = {
        generateShortCode: generateShortCode
    };

    var appizyGeneratorForm = document.getElementById('appizy-short-code-generator');

    if (appizyGeneratorForm) {
        var shortCodeOutput = appizyGeneratorForm.querySelector('textarea[name="shortcode"]');
        var appIdSelector = appizyGeneratorForm.querySelector('select[name="app-id"]');
        var enableSaveDataCheckbox = appizyGeneratorForm.querySelector('input[name="enable-save"]');

        appizyGeneratorForm.addEventListener('change', function () {
            var appId = appIdSelector.value;
            var enableSave = enableSaveDataCheckbox.checked;

            shortCodeOutput.value = generateShortCode(appId, enableSave);
        });
    }

    /**
     * @param {string} appId
     * @param {boolean} enableSave
     * @return {string}
     */
    function generateShortCode(appId, enableSave) {
        var shortCode = '';

        if (parseInt(appId, 0) > 0) {
            shortCode += '[appizy' + ' id="' + appId + '"';

            if (enableSave) {
                shortCode += ' save="enabled"';
            }

            shortCode += ']';
        }

        return shortCode;
    }

    // Add Admin to the WP Appizy namespace
    window.wp = window.wp || {};
    window.wp.appizy = window.wp.appizy || {};
    window.wp.appizy.admin = admin;
})();