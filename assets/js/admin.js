/**
 * PROJECT : punkcoder
 * FILE    :
 * TIME    : 2019/3/20 14:57
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */


jQuery(document).ready(function($){
    var mediaUploader;
    $('#punkcoder-avatar-upload-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: '选择图片',
            button: {
                text: '确定'
            }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#punkcoder-options-avatar-input').val(attachment.url);
            $('#punkcoder-options-avatar-image').attr('src', attachment.url);
        });
        mediaUploader.open();
    });

    $('#punkcoder-wechat-upload-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: '选择图片',
            button: {
                text: '确定'
            }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#punkcoder-options-wechat-qr-image-input').val(attachment.url);
            $('#punkcoder-options-wechat-qr-image').attr('src', attachment.url);
        });
        mediaUploader.open();
    });

    $('#punkcoder-logo-upload-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: '选择图片',
            button: {
                text: '确定'
            }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#punkcoder-options-logo-input').val(attachment.url);
            $('#punkcoder-options-logo-image').attr('src', attachment.url);
        });
        mediaUploader.open();
    });
});