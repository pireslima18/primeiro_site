function loading(){
	document.getElementsByClassName('box-load')[0].style.display='none';
	document.getElementsByClassName('conteudo-pagina')[0].style.display='block';
}


$(document).ready(()=>{

	
	$(".js-section-toggle-index").click((e)=>{
		$("#index-card").addClass('is-active')
		$("#toggle-index").addClass('is-active')

		$("#instagram-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
		$("#email-card").removeClass('is-active')
		$("#whatsapp-card").removeClass('is-active')

		$("#toggle-instagram").removeClass('is-active')
		$("#toggle-linkedin").removeClass('is-active')
		$("#toggle-email").removeClass('is-active')
		$("#toggle-whatsapp").removeClass('is-active')

	})
	$(".js-section-toggle-instagram").click((e)=>{
		$("#instagram-card").addClass('is-active')
		$("#toggle-instagram").addClass('is-active')

		$("#index-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
		$("#email-card").removeClass('is-active')
		$("#whatsapp-card").removeClass('is-active')

		$("#toggle-index").removeClass('is-active')
		$("#toggle-linkedin").removeClass('is-active')
		$("#toggle-email").removeClass('is-active')
		$("#toggle-whatsapp").removeClass('is-active')
	})
	$(".js-section-toggle-linkedin").click((e)=>{
		$("#linkedin-card").addClass('is-active')
		$("#toggle-linkedin").addClass('is-active')

		$("#index-card").removeClass('is-active')
		$("#instagram-card").removeClass('is-active')
		$("#email-card").removeClass('is-active')
		$("#whatsapp-card").removeClass('is-active')

		$("#toggle-index").removeClass('is-active')
		$("#toggle-instagram").removeClass('is-active')
		$("#toggle-email").removeClass('is-active')
		$("#toggle-whatsapp").removeClass('is-active')
	})
	$(".js-section-toggle-email").click((e)=>{
		$("#email-card").addClass('is-active')
		$("#toggle-email").addClass('is-active')

		$("#index-card").removeClass('is-active')
		$("#instagram-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
		$("#whatsapp-card").removeClass('is-active')


		$("#toggle-index").removeClass('is-active')
		$("#toggle-instagram").removeClass('is-active')
		$("#toggle-linkedin").removeClass('is-active')
		$("#toggle-whatsapp").removeClass('is-active')
	})
	$(".js-section-toggle-whatsapp").click((e)=>{
		$("#whatsapp-card").addClass('is-active')
		$("#toggle-whatsapp").addClass('is-active')

		$("#index-card").removeClass('is-active')
		$("#instagram-card").removeClass('is-active')
		$("#linkedin-card").removeClass('is-active')
		$("#email-card").removeClass('is-active')

		$("#toggle-index").removeClass('is-active')
		$("#toggle-instagram").removeClass('is-active')
		$("#toggle-linkedin").removeClass('is-active')
		$("#toggle-email").removeClass('is-active')
	})
})

