
$(document).ready(function(){

    $(window).scroll(fetchTweets);

    function fetchTweets(){

        var page = $('#endless-pagination').data('next-page');


        if(page !== null){

            clearTimeout($.data(this,"scrollCheck"));

            $.data(this,"scrollCheck",setTimeout(function(){

                var scroll_position_for_load= $(window).height() + $(window).scrollTop() + 100;


                if(scroll_position_for_load >= $(document).height()){

                    $('#endless-pagination').append('<div id="loading-tweet" class="tweet-wrapper"><img class="loading-spinner" src="images/spinner.gif"></div>');
                    $.get(page,function(data){
                        console.log("Works");
                        $('#endless-pagination').append(data.tweets);
                        $('#endless-pagination').data('next-page',data.next_page);
                        $('#loading-tweet').remove();
                    });

                }


            },350))

        }


    }

});