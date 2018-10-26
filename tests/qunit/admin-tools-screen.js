/* global QUnit, wp */

QUnit.module('Admin tool screen');

QUnit.test('generate shortcode', function (assert) {
    assert.equal(wp.appizy.admin.generateShortCode('12'), '[appizy id="12"]');
});