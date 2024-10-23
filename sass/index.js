
$(document).ready(()=>{

	
	$(".js-section-toggle-index").click((e)=>{
		$("#index-card").addClass('is-active')
		$("#instagram-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
		$("#twitter-card").removeClass('is-active')

	})
	$(".js-section-toggle-instagram").click((e)=>{
		$("#instagram-card").addClass('is-active')
		$("#index-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
		$("#twitter-card").removeClass('is-active')
	})
	$(".js-section-toggle-linkedin").click((e)=>{
		$("#linkedin-card").addClass('is-active')
		$("#instagram-card").removeClass('is-active')
		$("#index-card").removeClass('is-active')
		$("#twitter-card").removeClass('is-active')
	})
	$(".js-section-toggle-twitter").click((e)=>{
		$("#twitter-card").addClass('is-active')
		$("#index-card").removeClass('is-active')
		$("#instagram-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
	})
})

