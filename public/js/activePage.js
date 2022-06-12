window.onload = function() {
    let loc = window.location.href;
    
    console.log(loc);
    $('.header-right').find('a').each(
        function() { 
            console.log($(this).attr('href'));
            $(this).toggleClass('active', $(this).attr('href') == loc);
        }
    )
}