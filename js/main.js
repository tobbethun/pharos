$ = jQuery;
$( document ).ready(function() {
	audioPlayer();
	showVideo();
	openMenu();
	getClassname();
	menuFunction();
	folding();
	addClassToMenuItems();
});

function audioPlayer() {
	$('.startpage-section__speaker').on('click', function() {
		$('.audioplayer').slideToggle();
		var player = $('.wp-audio-shortcode audio');
		player.trigger("pause");
	});
}

function showVideo() {
	$('.startpage-section__play').on('click', function() {
		$('.startpage-video').addClass('visible');
		$(".startpage-video div").prepend("<div class='wp-video--close'>Stäng</div>");
		$('iframe').addClass('iframe');
		setTimeout(closeOnBackgroundClick, 1000);
	});
	$(document).on('click','.wp-video--close', function() {
		$('.startpage-video').removeClass('visible');
		$('.wp-video--close').remove();
		vimeoWrap = $('.startpage-video');
  		vimeoWrap.html(vimeoWrap.html());
	});
	function closeOnBackgroundClick() {
		$(document).one('click','.startpage', function() {
			$('.startpage-video').removeClass('visible');
			$('.wp-video--close').remove();
			vimeoWrap = $('.startpage-video');
  			vimeoWrap.html(vimeoWrap.html());
		});
	}
}

function openMenu() {
	$('.hamburger, .close').on('click', function() {
		$('.menu__content').toggleClass('menu__content--visible');
		// $('body').toggleClass('no-scroll'); 
	});
}

function folding() {
	// var link = $("menu-item-has-children > .link > a");
	// var submenu = $("menu-item-has-children > .link");
	$('.menu-item-has-children > .link').click(function(e){
		if($(e.target).closest('a').length){
			return;
		}
		else {
			var parent = $(this).parent();
			if(parent.hasClass("open")) { 
				parent.removeClass("open"); 
			}
			else {
			// $(".open").removeClass('open');   // TODO Remove before release
			var theParent = $(this).parent();
			theParent.toggleClass("open");
		}
	}
});
	$(".pharos-page, .startpage").click(function() {
		$('.menu__content').removeClass('menu__content--visible');
	});

	$('body').on('keydown', function(e) {
		if (e.which == 9) {		
			$('.menu__content').addClass('menu__content--visible');
			$('.menu-item-has-children').addClass('open');
			$('body').addClass('infocus');

		}
		if (e.which == 27) {	
			$('.menu__content').removeClass('menu__content--visible');
			$('.menu-item-has-children').removeClass('open');
			$('body').removeClass('infocus');

		}
		var element = document.activeElement;

	});
}



function getClassname() {
	$( ".menu-item-has-children > a" ).each(function( t ) {
		var text = $( this ).text().toLowerCase();
		var className = text.replace(/ö/g, 'o').replace(/å/g, 'a').replace(/ä/g, 'a').replace(/ /g, '-').replace(/[?]/g, ' ');
		$(this).parent().addClass(className);
		$(this).wrap("<div class='link'></div>")
	});
}

// $(window).scroll(function(){
// 	if ($(this).scrollTop() > 329) {
// 		$('.pharos-page__side-menu').addClass('fixed');
// 	} else {
// 		$('.pharos-page__side-menu').removeClass('fixed');
// 	}
// });


 //////////////////////////////////////////////////////////////

 function getFullURL(url){
 	url = url.replace(/#[^#]+$/, "").replace(/\?[^\?]+$/, "").replace(/\/$/, "");
 	return url.substr(url.lastIndexOf("/") + 1);
 }

 var getHashTag = function(url) {
 	var hash = url.split('#')[1];
 	return hash;
 };

 function addClassToMenuItems() {
 	$( "li.open ul.sub-menu > li > a" ).each(function( index ) {
 		var href = $(this)[0].hash.split('#')[1];
 		$(this).parent().addClass(href);
 	});
 }


 function menuFunction() {
	// Cache selectors
	var lastId;
	var path = getFullURL(window.location.pathname);
	var hash = getHashTag(window.location.href);
	if (path || hash) {
		var menuClass = "."+ path;
		// if (!hash) {
		// 	$(menuClass + " > .sub-menu > li:first-child" ).addClass("active");
		// }
		$(menuClass).addClass("current open");
		var topMenu = $(menuClass + " > .sub-menu");
		$(".sub-menu > ." + hash).addClass("active");

		 // All list items
		 menuItems = topMenu.find("a");
		 // Anchors corresponding to menu items
		 var scrollItems;
		 scrollItems = menuItems.map(function(){
		 	var hash = getHashTag($(this).attr('href'));
		 	var item = $('#' + hash);
		   // var href = item;
		   if (item.length) { return item; }
		});

		// Bind click handler to menu items
		// so we can get a fancy scroll animation
		menuItems.click(function(e){
			var href = $(this).attr("href");
			var hash = '#' + getHashTag(href);
			offsetTop = '#' + hash === "#" ? 0 : $(hash).offset().top-20;
			$(".menu__content--visible").removeClass("menu__content--visible");
				// $('body').toggleClass('no-scroll');

				$('html, body').stop().animate({ 
					scrollTop: offsetTop
				}, 850);
				e.preventDefault();
			});
	}

	// Bind to scroll
	if (scrollItems !== undefined) {
		$(window).scroll(function(){
	   // Get container scroll position
	   var fromTop = $(this).scrollTop()+50;
	   if($(window).scrollTop() === 0) {
	   	$(menuClass + " > .sub-menu > li:first-child" ).addClass("active");
	   }
	   	// Get id of current scroll item
	   	var cur = scrollItems.map(function(){
	   		if ($(this).offset().top < fromTop)
	   			return this;
	   	});
	   // Get the id of the current element
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";
	   if (lastId !== id) {
	   	lastId = id;
	       // Set/remove active class
	       menuItems.parent().removeClass("active");
	       id && $("." + id).addClass('active');

	   }                  
	});
	}
	
}
