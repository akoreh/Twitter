<div class="tweet-modal-wrapper">
    <div class="tweet-modal w-clearfix"><a class="button-3 w-button" data-ix="hide-tweet-modal" href="#">X</a>
        <h1 class="tweet-modal-heading">Compose new Tweet</h1>
        <div class="tweet-modal-form-wrapper w-form">
            <form class="tweet-modal-form w-clearfix" id="tweet-form"  method="POST" action="{{route('tweet')}}" >

                <textarea class="tweet-modal-textarea w-input" id="tweet"  name="tweet" placeholder="What&#39;s happening?" ></textarea>

                {{--<input class="tweet-modal-image-button w-button"  type="file" value="Photo">--}}
                <button class="tweet-button tweet-modal-button w-button" type="submit" id="tweet-button"  data-ix="hide-tweet-modal"><span class="tweet-button-icon"></span>Tweet</button>
            </form>

        </div>
    </div>
</div>
</div>

<script>
    $('#tweet-button').on('click',function(e){
        e.preventDefault();


        $.ajax({
            type:'post',
            url:'/tweet',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                tweet: $('#tweet').val()
            },
            success:function(){

                $('#tweet').val('');
                successAlert("Tweet successfully posted!");
                var tweetCount = parseInt($('#home-tweet-count').html());
                tweetCount++;
                $('#home-tweet-count').html(tweetCount);

                if (typeof getLatestTweet == 'function') {
                    getLatestTweet();
                }


            },
            error: function(xhr){
                errorAlert("Failed to post tweet!");
    }
        });

    });

</script>

