$('#calendar').datepicker({
		});

!function ($) {
    $(document).on("click","ul.nav li.parent > a ", function(){
        $(this).find('em').toggleClass("fa-minus");
    });
    $(".sidebar span.icon").find('em:first').addClass("fa-plus");
}

(window.jQuery);


// $(window).on('resize', function () {
//   if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
// })
// $(window).on('resize', function () {
//   if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
// })

$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-up').addClass('fa-toggle-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('em').removeClass('fa-toggle-down').addClass('fa-toggle-up');
	}
})


$('.main-nav .dropdown-toggle').click(function () {
    // $(this).siblings('ul').slideToggle()
    $(this).parents('.dropdown').toggleClass('open')
})

$('.main-nav-toggle').click(function () {
    // $('body').toggleClass('close-menu');
    if ($('body').hasClass('close-menu')) {
        $('body').removeClass('close-menu');
        localStorage.setItem('alerted', 'no');
    } else {
        $('body').addClass('close-menu');
        localStorage.setItem('alerted', 'yes');
    }
})



if (localStorage.getItem('alerted') == 'yes') {
    $('body').addClass('close-menu');
}



$('.form-group').on('change keyup focus blur mousedown', '.form-control', function(){
    checker(this);
});



$(document).ready(function () {
    $('.form-control').each(function () {
        checker(this);
    });
});


window.onload = function () {
    $('.form-control').each(function () {
        checker(this);
    });
}


function checker(elemnt){
    if ($(elemnt).val())
        $(elemnt).addClass("focus")
    else
        $(elemnt).removeClass('focus');
}



setTimeout(() => {
    $('.alert').removeClass('show');
}, 5000);