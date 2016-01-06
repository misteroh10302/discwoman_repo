
window.onload = init();

function init() {

	
	var boxs = document.getElementsByClassName("mainItems");

	var i;


	for( i=0; i< boxs.length; i++){

		boxs[i].style.maxWidth = "45%";
		boxs[i].style.display = "inline-block";

	}
	
}

$( ".mainItems" ).each(function() {
	var src = $(this).find('img').attr('src');
	$(this).find('img').css('opacity', '0');
	$(this).css({'background-image':'url('+src+')', 'background-repeat':'no-repeat', 'background-position': 'center',
    'background-size':'cover', 'max-height': '300px'});
});


