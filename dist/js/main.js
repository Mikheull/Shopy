// Init de Tippy
tippy.setDefaults({
    arrow: true,
    arrowType: 'round',
    animation: 'scale',
    size: 'large',
    duration: 300,
    interactive: true,
    placement: 'bottom',
    trigger: 'click'
})
  
tippy('.tpy-account', { content: document.querySelector('#tpy-account') })
tippy('.tpy-wishlist', { content: document.querySelector('#tpy-wishlist') })

tippy('.tpy-filter', {
    content: "Indisponible",
    placement: 'right',
})



// WishList Partie :


$( ".buttonWishlist" ).click(function() {
    var id = this.dataset.id;
    $( this ).toggleClass('addedToWishlist');

    $.ajax({
        url: 'controller/ajax/wishlist.php',
        type: 'POST',
        data: {idProduct: id},
        success: function(data){
            $( '#result' ).html(data);
        }
    })

})

$(document).on('click', '.buttonWishlistHead', function() {
    var id = this.dataset.id;

    $.ajax({
        url: 'controller/ajax/wishlist.php',
        type: 'POST',
        data: {idProduct: id},
        success: function(data){
            $( '#result' ).html(data);
            $( '#wishlist-item-'+id).remove();
        }
    })
});



$( ".sub_menu_button" ).click(function() {
    $(this).find("i").toggleClass( 'fa-angle-down' );
    $(this).find("i").toggleClass( 'fa-angle-up' );
    $(this).next(".submenu").toggleClass( 'sub-hidden' );
})




// Produit
$( document ).ready(function() {
    $('.minImage').removeClass( 'active' );
    $('.coverImage').toggleClass( 'active' );

    // Image
    var link = $('.coverImage').attr('src');
    $(".previewImage img").attr("src",link);
});

$(document).on('click', '.minImage', function() {
    $('.minImage').removeClass( 'active' );
    $(this).toggleClass( 'active' );

    // Image
    var link = $(this).attr('src');
    $(".previewImage img").attr("src",link);
});



$('img[data-enlargable]').addClass('img-enlargable').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});



// Panier
$(document).on('click', '.addToCart', function() {
    var id = $(this).find("span").html();
    var quantity = $("#quantity").val();

    $.ajax({
        url: 'controller/ajax/cart.php',
        type: 'POST',
        data: {idProduct: id,quantity: quantity},
        success: function(data){
            $( '#outputCart' ).html(data);
            $ ('body' ).load(location.href + "body");
            $.notify(" Produit ajouté au panier ", {type:"success", icon:"exclamation-triangle",close: true});
        }
    })
});


$(document).on('click', '.less', function() {
    var product = this.dataset.product;

    $.ajax({
        url: 'controller/ajax/cart.php',
        type: 'POST',
        data: {product: product, mode: 'less'},
        success: function(data){
            $( '#outputAjax' ).html(data);
            location.reload();
        }
    })
});


$(document).on('click', '.more', function() {
    var product = this.dataset.product;
    
    $.ajax({
        url: 'controller/ajax/cart.php',
        type: 'POST',
        data: {product: product, mode: 'more'},
        success: function(data){
            $( '#outputAjax' ).html(data);
            location.reload();
        }
    })
});




// Recherche
$('#main_search_output').hide();
$(document).on('keyup', '#main_search', function() {
	var min_length = 3;
    var keyword = $('#main_search').val();
    

    if (keyword.length >= min_length) {
		$.ajax({
			url: 'controller/ajax/search.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#main_search_output').show();
				$('#main_search_output').html(data);
			}
		});
	} else {
		$('#main_search_output').hide();
	}
});
