$(document).ready(function(){
	$("a[rel='ajax'], a[rel='colorbox']").colorbox({title:" "});

    $(document).on('click', "a[rel='ajax'], a[rel='colorbox']", function () {

        $.colorbox({
            href:$(this).attr('href')
        });

        return false;
    });
});