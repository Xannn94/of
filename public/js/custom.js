var captcha = (function() {
    return {
        refresh : function(elem)
        {
            $(elem).find('img').attr('src','/captcha/flat?'+Math.random());
        }
    }
})();