$('#queryText').bind("enterKey",function(e){
  wikiSearch();
});
$('#queryText').keyup(function(e){
    if(e.keyCode == 13)
    {
        $(this).trigger("enterKey");
    }
});

function wikiSearch() {
  $('#foundList').empty();
  var myQuery = $('#queryText').val();
  var wikiUrl =
      'https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&generator=search&exsentences=2&exlimit=max&exintro=1&gsrnamespace=0&gsrsearch=' + myQuery + '&callback=wikicallback';


  $.ajax({
    url: wikiUrl,
    dataType: "jsonp",
    jsonp: "callback",
    success: function(response) {
    var wikiList = response.query.pages;

      var wikiArr = [];
      for(key in wikiList){
        if(wikiList.hasOwnProperty(key)){
          wikiArr.push(wikiList[key]);
        }
      }
 
      for(var i=0;i<wikiArr.length; i++){
  $('#found').append("<div class='panel panel-default'><div class='panel-heading'><h3><a href='https://en.wikipedia.org/?curid=" + wikiArr[i].pageid + "'>" + wikiArr[i].title + "</a></h3></div><div class='panel-body'>" + wikiArr[i].extract + "</div></div>")
}
    }
  });
};