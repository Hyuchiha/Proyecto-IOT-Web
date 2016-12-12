$(function(){
    var totParkings = $("#totParkings").text();
    var updateInterval = 5000;

    function update()
    {
        $.get('parkings', {}, function(data){
            var dataJson = jQuery.parseJSON(data);
            for (var i = 1; i <= totParkings; i++) {
                $("#PN-"+i).attr("class", "btn btn-"+dataJson[i.toString()]);
            }
        });
        setTimeout(update, updateInterval);
    }

    update();
});