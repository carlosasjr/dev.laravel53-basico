/*==================== PAGINATION =========================*/
$(window).on('hashchange',function(){
    page = window.location.hash.replace('#','');
    getProducts(page);
});

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    location.hash = page;
});


$(document).on('click','#btnSearchProduct', function(e){
    e.preventDefault();
    var search = $('#search').val();

    $.ajax({
        url: '/painel/produtos/pesquisar',
        data : {'search': search}

    }).done(function(data){
        $('#tabela').html(data);
    });


});


function getProducts(page){
    var search = $('#search').val();

    $.ajax({
        url: '/painel/produtos?page=' + page,
        data : {'search': search}
    }).done(function(data){
        $('#tabela').html(data);
    });
}