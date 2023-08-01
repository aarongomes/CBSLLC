!window.jQuery && document.write(unescape('%3Cscript src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.10.2.min.js"%3E%3C/script%3E'));
//$('meta[name="viewport"]').prop('content', 'width=1259');

!function(e,t,r){function n(){for(;d[0]&&"loaded"==d[0][f];)c=d.shift(),c[o]=!i.parentNode.insertBefore(c,i)}for(var s,a,c,d=[],i=e.scripts[0],o="onreadystatechange",f="readyState";s=r.shift();)a=e.createElement(t),"async"in i?(a.async=!1,e.body.appendChild(a)):i[f]?(d.push(a),a[o]=n):e.write("<"+t+' src="'+s+'" defer></'+t+">"),a.src=s}(document,"script",['//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js','Scripts/helpers.min.js'])

if(Page=='home'){
!function(e,t,r){function n(){for(;d[0]&&"loaded"==d[0][f];)c=d.shift(),c[o]=!i.parentNode.insertBefore(c,i)}for(var s,a,c,d=[],i=e.scripts[0],o="onreadystatechange",f="readyState";s=r.shift();)a=e.createElement(t),"async"in i?(a.async=!1,e.body.appendChild(a)):i[f]?(d.push(a),a[o]=n):e.write("<"+t+' src="'+s+'" defer></'+t+">"),a.src=s}(document,"script",['Scripts/fluid_dg.min.js'])
}


$(window).load(function(e) {

$('.top_next').click(function(){
$(this).next().slideToggle('fast');$(this).toggleClass('top_next_act');
});

$('.popup').fancybox({iframe:{css:{width:'600'}}});;

$('[data-fancybox="images"]').fancybox({
  loop:false,thumbs:{showOnStart:true}})
$('.shownext').click(function(){$('.subdd').hide('fast'); $(this).next().slideToggle('fast');});

$('.dd_next').click(function(){
$(this).next().slideToggle('fast');$(this).toggleClass('dd_next_act');
});
$('.dd_next1').click(function(){
	$(this).next().slideToggle(200);
	return false;
});



$('.tabs').click(function(){var dg=$(this).attr('href'); $('.form_box').css({'display':'none'});$(dg).css({'display':'block'}); $('.tabs').removeClass('act'); $(this).addClass('act'); return false})

$('.number').click(function(){
	$(".top").slideToggle('slow');
})

$("#owl-example").owlCarousel({autoplay:true,rtl:true,dots:true,loop:1,items:1,responsive:{0:{items:1},610:{items:1},979:{items:1},991:{items:1},1200:{items:1}}});

$("#owl-example2").owlCarousel({loop:true, autoplay:true, autoplayTimeout:4000,autoplaySpeed:2000, autoplayHoverPause:true,items:1,responsive:{0:{items:1},610:{items:1},979:{items:2},991:{items:3},1200:{items:5}}});



$(window).scroll(function(){
if($(this).scrollTop()>60){$('.top2').addClass('t2_fixer'); $('.top2_b').css({'display':'block'})}
else{$('.top2').removeClass('t2_fixer'); $('.top2_b').css({'display':'none'})}
})

$('.rm_link').click(function(){
	$(this).prev().toggleClass('t_text_1_auto');$(this).toggleClass('rm_link_x');
	return false;
})

$('.des_bar').slimscroll({height:'336px',size:'10px',color:"#666"});

$("#back-top").hide();	
$(function () {$(window).scroll(function () {if ($(this).scrollTop() > 100) {$('#back-top').fadeIn();} else {$('#back-top').fadeOut();}});
$('#back-top a').click(function () {$('body,html').animate({scrollTop: 0}, 800);return false;});
});

if(Page=='details'){
}

if(Page=='home'){
$(function(){$('#fluid_dg_wrap_1').fluid_dg({thumbnails: false,height:"38%",minHeight:'120',fx:'simpleFade,scrollRight,scrollLeft',navigationHover:'false',playPause:'false',loader:'none',hover:'false',time:3000,pagination:'false',onLoaded:function(){$('#Page_loader').fadeOut()}});})

var abc=0;$(window).scroll(function(){var t=$("#counter").offset().top-window.innerHeight;0==abc&&$(window).scrollTop()>t&&($(".counter-value").each(function(){var t=$(this),n=t.attr("data-count");$({countNum:t.text()}).animate({countNum:n},{duration:3e3,easing:"swing",step:function(){t.text(Math.floor(this.countNum))},complete:function(){t.text(this.countNum)}})}),abc=1)});

}

});