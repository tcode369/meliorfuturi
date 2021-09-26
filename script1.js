
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

$(document).ready(function (){  
         /* $('.gumbek').click(function (e) {
          e.preventDefault();
          $(this).toggleClass('active');
          $('.rOptionsMobile').slideToggle();
          });
           $('.meny').click(function (e) {
          e.preventDefault();
          $('.gumbek').toggleClass('active');
          $('.rOptionsMobile').slideToggle();
          });*/
          
          $('.tipka').click(function (e) {
          e.preventDefault();
          $('.gumbek').toggleClass('active');
          $('.rOptionsMobile').slideToggle();
          //$('.rOptionsMobile').show();
          //$('.mobileMainMenu').css('transform', 'translateX(0px)');
          });
         
        }); 
  
  