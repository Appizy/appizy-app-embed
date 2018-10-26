/* global QUnit, wp */

QUnit.module('Admin too screen');

QUnit.test('a basic test example', function (assert) {
    var value = 'hello';
    assert.equal(value, 'hello', 'We expect value to be hello');
});

QUnit.test('generate shortcode', function (assert) {
    assert.equal(wp.appizy.admin.generateShortCode('12'), '[appizy id="12"]');
});