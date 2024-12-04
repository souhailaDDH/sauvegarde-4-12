$(function() {

$('.titre').on('click', function(event) { 
               
               $('.message1').show();
});

$('.message1').on('click', function(event) { 
    
               $('.titre').css("background", "red");
               $('#h1').css("color", "white");
               $('#h2').css("color", "blue");       
               $('.message2').show();
});

$('.message2').on('click', function(event) { 
    
               $('.body').css("background-color", "orange");
               $('.message3').show();
});

$('.message3').on('click', function(event) {
               $('.titre').css("background", "maroon");
               $('#h1').css("color", "red");
               $('#h2').css("color", "white");   
               $("<p class='message1b'>JOYEUX ANNIVERSAIRE</p>").replaceAll(".message1");
               $("<p class='message2b'>HAPPY BIRTHDAY</p>").replaceAll(".message2");
               $("<p class='message3b'>ZUM GEBURSTAG</p>").replaceAll(".message3");
               $('#image').show();
});

});