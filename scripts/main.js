$ = jQuery;
$( document ).ready(function() {
	showVideo();
	getClassname();
	menuFunction();
	// hamburger(); // TODO Remove before release
	openMenu();
	folding();
	addClassToMenuItems();
});



function showVideo() {
	$('.startpage-section__play').on('click', function() {
		$('.startpage-video').addClass('visible');
		$(".wp-video").prepend("<div class='wp-video--close'>Stäng X</div>");
	});
	$(document).on('click','.wp-video--close', function() {
		$('.startpage-video').removeClass('visible');
		$('.wp-video--close').remove();
	});
}

function openMenu() {
	$('.hamburger, .close').on('click', function() {
		console.log("open/close");
		$('.menu__content').toggleClass('menu__content--visible');
		// $('body').toggleClass('no-scroll');
	});
}

function folding() {
	$(".menu-item-has-children > .link").click(function() {
		var parent = $(this).parent();
		if(parent.hasClass("open")) { parent.removeClass("open"); }
		else {
			// $(".open").removeClass('open');   // TODO Remove before release
			var theParent = $(this).parent();
			theParent.toggleClass("open");
		}
	})
}

// function hamburger() {  // TODO Remove before release
//   $('#nav-icon3').click(function() {
//   $(this).toggleClass('cross');
// 	$(this).parent().toggleClass('alignRight');
// 	$(".open").removeClass('open');
// });
// }

function getClassname() {
	var targets = $(".menu-item-has-children > a");
	var target2 = $(".open").find();
	var targetsArray = Array.from(targets);
	targetsArray.map(function(t) {
		var text = t.innerText.toLowerCase();
		var className = text.replace(/ö/g, 'o').replace(/å/g, 'a').replace(/ä/g, 'a').replace(/ /g, '-').replace(/[?]/g, ' ');
		$(t).parent().addClass(className);
		$(t).wrap("<div class='link'></div>")
	})
}

$(window).scroll(function(){
	if ($(this).scrollTop() > 329) {
		$('.pharos-page__side-menu').addClass('fixed');
	} else {
		$('.pharos-page__side-menu').removeClass('fixed');
	}
});


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
		console.log(hash);
		var menuClass = "."+ path;
		$(menuClass).addClass("current open");
		var topMenu = $(menuClass + " > .sub-menu");
		$(".sub-menu > ." + hash).addClass("active");
	
		 // All list items
		 menuItems = topMenu.find("a");
		 // Anchors corresponding to menu items
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
	$(window).scroll(function(){
	   // Get container scroll position
	   var fromTop = $(this).scrollTop()+40;

	   
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
