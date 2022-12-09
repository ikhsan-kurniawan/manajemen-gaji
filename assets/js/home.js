$(document).ready(function () {
	'use strict';
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
		theme: 'pp_default',
		hook: 'data-rel',
		social_tools: ''
	});
	$("#owl-carousel").owlCarousel({
		items: 5,
		itemsDesktop: [1199, 5],
		itemsDesktopSmall: [979, 3],
		itemsTablet: [768, 2],
		itemsMobile: [479, 1],
		navigation: true,
		navigationText: [
			"<i class='fa fa-chevron-left icon-white'></i>",
			"<i class='fa fa-chevron-right icon-white'></i>"
		],
		autoPlay: true,
		pagination: false
	});
	$("#guru-carousel").owlCarousel({
		items: 6,
		itemsDesktop: [1199, 6],
		itemsDesktopSmall: [979, 3],
		itemsTablet: [768, 2],
		itemsMobile: [479, 2],
		navigation: true,
		navigationText: [
			"<i class='fa fa-chevron-left icon-white'></i>",
			"<i class='fa fa-chevron-right icon-white'></i>"
		],
		autoPlay: true,
		pagination: false
	});
	$("#slide_pan").owlCarousel({
		items: 1,
		itemsDesktop: [1199, 1],
		itemsDesktopSmall: [979, 1],
		itemsTablet: [768, 1],
		itemsMobile: [479, 1],
		navigation: true,
		navigationText: [
			"<i class='fa fa-chevron-left icon-white'></i>",
			"<i class='fa fa-chevron-right icon-white'></i>"
		],
		autoPlay: false,
		pagination: false
	});
	$("#testim_sec").owlCarousel({
		items: 3,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [979, 2],
		itemsTablet: [768, 1],
		itemsMobile: [479, 1],
		navigation: true,
		navigationText: [
			"<i class='fa fa-chevron-left icon-white'></i>",
			"<i class='fa fa-chevron-right icon-white'></i>"
		],
		autoPlay: true,
		pagination: false
	});
	$("#testim_sec_new").owlCarousel({
		items: 1,
		itemsDesktop: [1199, 1],
		itemsDesktopSmall: [979, 1],
		itemsTablet: [768, 1],
		itemsMobile: [479, 1],
		navigation: true,
		navigationText: [
			"<i class='fa fa-chevron-left icon-white'></i>",
			"<i class='fa fa-chevron-right icon-white'></i>"
		],
		autoPlay: true,
		pagination: false
	});
	$('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: true
	});
});

<!-- //Date -->
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var thisDay = date.getDay(),
thisDay = myDays[thisDay];
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.getElementById('calendar').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
//-->
<!-- //Time -->
function startTime() {
	var today=new Date(),
	curr_hour=today.getHours(),
	curr_min=today.getMinutes(),
	curr_sec=today.getSeconds();
	curr_hour=checkTime(curr_hour);
	curr_min=checkTime(curr_min);
	curr_sec=checkTime(curr_sec);
	document.getElementById('clock').innerHTML=curr_hour+":"+curr_min;
}
function checkTime(i) {
	if (i<10) {
		i="0" + i;
	}
	return i;
}
setInterval(startTime, 500);
//-->