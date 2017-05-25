
$(document).ready(function(){



    $(window).scroll(fetchTweets);
    var page = $('#endless-pagination').data('next-page');

    function fetchTweets(){

        if(page != null){
            var finished = true;
            clearTimeout($.data(this,"scrollCheck"));

            $.data(this,"scrollCheck",setTimeout(function(){

                var scroll_position_for_load= $(window).height() + $(window).scrollTop() + 100;

                if(finished) {
                    if (scroll_position_for_load >= $(document).height()) {
                        finished=false;
                        $('#endless-pagination').append('<div id="loading-tweet" class="tweet-wrapper"><img class="loading-spinner" src="images/spinner.gif"></div>');

                        $.get(page, function (data) {
                            $('#endless-pagination').append(data.tweets);
                            page = data.next_page;
                            $('#loading-tweet').remove();
                        });

                    }
                }

            },1000))
            finished=true;
        }


    }

});