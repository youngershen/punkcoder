/**
 * PROJECT : punkcoder
 * TIME    : 2019/4/1 18:11
 * AUTHOR  : Younger Shen
 * EMAIL   : younger.x.shen@gmail.com
 * PHONE   : 13811754531
 * WECHAT  : 13811754531
 * WEBSIT  : https://www.punkcoder.cn
 */
(function(window, $){

    var punkcoder = '';

    if(window.punkcoder)
    {
        punkcoder = window.punkcoder;
    }else
    {
        punkcoder = {};
    }

    punkcoder.post_like = function(post_id)
    {
        var data = {
            'post_id': post_id,
            'nonce': ajax_object.nonce,
            'action': 'post_like'
        };

        $.post(ajax_object.url, data, function(r){
            var j = JSON.parse(r);
            if(j.status)
            {
                $('#post-meta-item-like-count-' + post_id).html(j.data.count);
            }
        });
    }

})(window, $);