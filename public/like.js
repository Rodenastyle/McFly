/**
 * Created by Sergio on 18/05/2016.
 */
$(document).ready(function(){
    $('.likebutton').click(function(){
        var itsmy = this;
        $.ajax({
            url: $(this).attr("data-url"),
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $(this).attr("data-csrf") },
            success: function(){
                $(itsmy).addClass("disabled");
            }
        });
    });
});