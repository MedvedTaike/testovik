$(document).ready(function(){

    var inProgress = false;
    
    var startFrom = 3;

    var id_cat = findCategory();
    var id_tags = findTags();
    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
            $.ajax({
                url: '/article/ajax', 
                method: 'POST',
                data: {"startFrom" :startFrom,"id_category": id_cat,"id_tags": id_tags},
                beforeSend: function() {
                    inProgress = true;
                }
            }).done(function(data){
                if(data.length > 0) {
                    data = jQuery.parseJSON(data);
                    loadArticles(data);
                    inProgress = false;
                    startFrom += 3;
                }
            });
        }
    });
    function loadArticles(data){
        $.each(data, function(index, article){
            $('#articles').append(htmlText(article));
        });
    }
    function htmlText(article){
        var html = '';
        html += '<div class="card mb-3 custom_card_img">';
        html += '<img class="card-img-top" src="'+ article.image +'" alt="Ыссык-Куль">';
            html += '<div class="card-body">';
                html += '<h5 class="card-title">'+ article.name +'</h5>';
                html += '<p class="card-text">'+ article.content +'<a href="/article/view/'+ article.id +'" class="card-link ml-0">читать далее </a></p>';
                    html += '<p class="card-text">';
                    if(article.tags !== null){
                        $.each(article.tags , function(index, tags){
                            html += '<a href="/article/tags/'+ tags.id +'" class="card-link ml-0">'+ tags.name +' </a>';
                        });
                    }
                    html += '</p>';
                    html += '<p class="card-text"><small class="text-muted">Опубликовано: '+ article.date_on +' ' ;
                    if(article.edit !== null){
                        html += 'Отредактировано: ' + article.edit + '</small></p>';
                    } else {
                        html += ' </small></p>';
                    }
                    html += '<footer class="blockquote-footer">Автор : <cite title="Source Title">'+ article.author +'</cite></footer>';
            html += '</div>';
        html += '</div>';
        return html;
    }
    
    function findCategory(){
        var object = location.href;
        var category = /(?:category)/gi;
        var output = 0;
        if(object.match(category)){
            var result = object.match(/\d+/);
            output = parseInt(result[0] ,10);
        }
        return output;
    }
    function findTags(){
        var object = location.href;
        var tags = /(?:tags)/gi;
        var output = 0;
        if(object.match(tags)){
            var result = object.match(/\d+/);
            output = parseInt(result[0] ,10);
        }
        return output;
    }
});
