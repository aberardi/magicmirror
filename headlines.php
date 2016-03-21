<html>
<script src="js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        getTopStories();
        setInterval(getTopStories, 600000);
        updateHeadline(0);
        setInterval(updateHeadline, 7000);
    });


    function getTopStories(){
        var url = "http://feeds.feedburner.com/EtsBreakingNews"

        $.ajax({
            type: "GET",
            url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=1000&callback=?&q=' + encodeURIComponent(url),
            dataType: 'json',
            error: function(){
                alert('Unable to load feed, Incorrect path or invalid feed');
            },
            success: function(xml){
                values = xml.responseData.feed.entries;
                var html = '';
                for (i = 0; i<=5; i++)
                {
                	$("#story" + i).val(values[i].title);
                }
            }
        });

    }

    function updateHeadline(){

        var index = parseInt($("#index").val());
        var newHeadline = $("#story" + index).val();
        //$("#headline").fadeOut();
        //$("#headline").text(newHeadline);
    
        $("#headline").fadeOut(function(){
            $(this).text(newHeadline).fadeIn();
        });

        if (index < 4)
        {
            index = index + 1;
        }
        else
        {
            index = 0
        }
        $("#index").val(index);
    }


</script>

<div id="headline"></div>
<input type="hidden" id="story0"/>
<input type="hidden" id="story1"/>
<input type="hidden" id="story2"/>
<input type="hidden" id="story3"/>
<input type="hidden" id="story4"/>
<input type="hidden" id="index"/>


</html>