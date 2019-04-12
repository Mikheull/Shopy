function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}


// Navbar
$( ".sub_menu_button" ).click(function() {
    $(this).find("i").toggleClass( 'fa-angle-down' );
    $(this).find("i").toggleClass( 'fa-angle-up' );
    $(this).next(".submenu").toggleClass( 'hidden' );
})


$( document ).ready(function() {
    var name = $_GET('query');
    $("[data-page='"+ name +"']").find("i").toggleClass( 'fa-angle-down' );
    $("[data-page='"+ name +"']").find("i").toggleClass( 'fa-angle-up' );
    $("[data-page='"+ name +"']").next(".submenu").toggleClass( 'hidden' );
});





// Element page loader
$( ".ajax-sp-ovw a" ).click(function() {
    var type = this.dataset.type;
    var category = this.dataset.category;

    $( ".ajax-sp-ovw a" ).removeClass( 'active' );
    $(this).toggleClass( 'active' );
    
    $.ajax({
        url: 'views/components/pages/back/'+ category +'/data/ajax/'+ type +'.php',
        success:function(data){
            $(".data_content").html(data);
        }
    });

})

$( ".step_nav a" ).click(function() {
    var type = this.dataset.type;

    $( ".step_nav a" ).removeClass( 'active' );
    $(this).toggleClass( 'active' );
    $( ".wrapper_step-category" ).hide();
    $( "#"+type ).show();

})


// Search
$( ".table_search input" ).keyup(function() {
    var type = this.dataset.type;
    var query = this.dataset.search;
    var param = this.dataset.param;
    var keyword = $(this).val();

    if (keyword.length > 0) {
        $.ajax({
            url: 'controller/ajax/search/'+ type +'.php',
            type: 'POST',
            data: {type:type, query:query, keyword:keyword, param:param},
            success:function(data){
                $('#searchOutput').html(data);
            }
        });
    }else{
        $("#searchOutput").load(location.href + " #searchOutput");
    }

})





// Preview d'image
var cID = 1;

function readURL(input) {
    if (input.files && input.files[0]) {
        var i;
        for (i = 0; i < input.files.length; ++i) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var fieldHTML = '<div class="image-act" data-ImageOrignal-id="'+ cID +'" id="ImgOr-'+ cID +'"> <img src="'+e.target.result+'"> <input type="hidden" name="ImageOrignal_iD[]" value="'+ cID +'"/> <input type="hidden" name="ImageOrignal_src[]" value="'+e.target.result+'"/> <input type="hidden" name="ImageOrignal_isCover[]" value="false"/> <input type="hidden" name="ImageOrignal_alt[]" value="Image du produit"/> </div>'; 
                $('#preview-image .output').append( fieldHTML );
                ++cID;
            }
            reader.readAsDataURL(input.files[i]);

        }
    }
}

$("#imgInp").change(function(){
    if($('.image-act').length < 15){
        readURL(this);
    }else{
        console.log('Maximum files atteint')
    }
});


$(document).on('click', '.output .image-act', function() {
    
    $( "#cover-input, #alt-input, #delete" ).remove();
    
    //$( ".image-act input[name='ImageOrignal_isCover[]']" ).first().val(true);

    var thisID = this.id;

    // Image
    var link = $("#"+ thisID +" img").attr('src');
    $(".actions-output img").attr("src",link);

    // Cover
    var isCover = $("#"+ thisID +" input[name='ImageOrignal_isCover[]']").val();
    if(isCover == "true"){
        var checkbox = '<div id="cover-input"><input id="ID-cover" data-id="'+ thisID +'" type="checkbox" name="check" checked> Image de couverture</div>';
    }else{
        var checkbox = '<div id="cover-input"><input id="ID-cover" data-id="'+ thisID +'" type="checkbox" name="check"> Image de couverture</div>';
    }
    $( ".actions-output" ).append( checkbox );

    // Alt
    var alt = $("#"+ thisID +" input[name='ImageOrignal_alt[]']").val();
    var input = '<div id="alt-input"> <input id="ID-alt" type="text" data-id="'+ thisID +'" name="text" value="'+ alt +'"> </div>';
    $( ".actions-output" ).append( input );

    // Delete
    var input = '<div id="delete" data-id="'+ thisID +'"> Supprimer </div>';
    $( ".actions-output" ).append( input );
});



$(document).on('click', '#delete', function() {
    var id = this.dataset.id;
    $("#"+ id).remove();
    $(".output .image-act").first().click();
});

$(document).on('change', '#ID-cover', function() {
    var id = this.dataset.id;

    if($("#ID-cover").is(':checked')){
        var val = 'true';
    }else{
        var val = 'false';
    }
    $("input[name='ImageOrignal_isCover[]']").val("false");
    $("#"+ id + " input[name='ImageOrignal_isCover[]']").val(val);

});

$(document).on('change', '#ID-alt', function() {
    var id = this.dataset.id;
    var val = $( "#ID-alt" ).val();
    $("#"+ id + " input[name='ImageOrignal_alt[]']").val(val);
});





$("#comments").keyup(function(){
    var keyword = $(this).val();
    var lastChar = keyword.substr(keyword.length - 1);


    if(lastChar == ";"){
        var str = keyword.substring(0,keyword.length - 1)
        var fieldHTML = '<div style="width: 30%;margin: 15px 20px;"> <input type="text" name="comments_list[]" value="'+ str +'" style="width:90%"/> <a href="javascript:void(0);" class="removeFieldComment" style="margin: 5px;float:right"> <i class="fas fa-minus-circle"></i> </a></div>'; 

        $( '#ouput-AddComments' ).append(fieldHTML);
        $("#comments").val('');
    }
});
$(document).on('click', '.removeFieldComment', function() {
    $(this).parent('div').remove();
});


$("#price_ht").keyup(function(){

    var price=parseFloat($(this).val());
    var tx = 20 * price / 100;
    var val = (price + tx);
    $("#price_ttc").val(val);
});

$("#price_ttc").keyup(function(){

    var price=parseFloat($(this).val());
    var tx = 20 * price / 100;
    var val = (price - tx);

    $("#price_ht").val(val);
});



$(document).on('click', '.showListSelect', function() {
    $('.bodyListSelect').toggleClass('hidden');
});

$(document).on('click', '.bodyListSelect .title', function() {
    $('.bodyListSelect .content').toggleClass('hidden');
});

$(document).on('click', '.bodyListSelect .content .item', function() {
    var category = this.dataset.category;
    var category_name = this.dataset.category_name;
    $("input[name='category_name']").val(category_name);
    $("input[name='category']").val(category);

    $('.bodyListSelect').toggleClass('hidden');
});