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
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#punkcoder-options-profile-avatar-input').val(attachment.url);
            $('#punkcoder-options-profile-avatar-image').attr('src', attachment.url);
        });
        mediaUploader.open();
    });
});