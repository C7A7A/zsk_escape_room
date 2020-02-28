// $(document).ready(function(){
//     // Add smooth scrolling to all links
//     $("a").on('click', function(event) {
  
//       // Make sure this.hash has a value before overriding default behavior
//       if (this.hash !== "") {
//         // Prevent default anchor click behavior
//         event.preventDefault();
  
//         // Store hash
//         var hash = this.hash;
  
//         // Using jQuery's animate() method to add smooth page scroll
//         // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//         $('html, body').animate({
//           scrollTop: $(hash).offset().top
//         }, 800, function(){
     
//           // Add hash (#) to URL when done scrolling (default click behavior)
//           window.location.hash = hash;
//         });
//       } // End if
//     });
//   });

// document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//     anchor.addEventListener('click', function (e) {
//         e.preventDefault();

//         document.querySelector(this.getAttribute('href')).scrollIntoView({
//             behavior: 'smooth'
//         });
//     });
// });

// //Smooth scrolling with links
// $('a[href*=\\#]').on('click', function(event){     
//     event.preventDefault();
//     $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
// });

// // Smooth scrolling when the document is loaded and ready
// $(document).ready(function(){
//   $('html,body').animate({scrollTop:$(location.hash).offset().‌​top}, 500);
// });

// $('a[href*=#]').click(function(event){
//     $('html, body').animate({
//         scrollTop: $( $.attr(this, 'href') ).offset().top
//     }, 500);
//     event.preventDefault();
// });

//CALENDAR
$(document).ready(function(){
    var winHeight = $(window).height()/2;
    var height = ( winHeight * 16 ) / 100;
    var lineHeight = height + "px";

    $("#calendar li").css("line-height", lineHeight);
    $("#calendar li").css("height", height);
})



