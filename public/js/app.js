// Hide or show manual password option in create user option
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        if($(this).attr("value")=="autoPass"){
            $(".manualPass").toggle();
        }
    });
});

// Hide or show manual password option in edit user option
function manualPassInput(x) {
    if (x == 0) {
        document.getElementById("manualPassInput").style.display = "none";
    }
    if (x == 1) {
        document.getElementById("manualPassInput").style.display = "block";
    }
}

// Hide or show birthday option in edit contact option
function createDOB(x) {
    if (x == 0) {
        document.getElementById("exactDOB").style.display = "none";
    }
    if (x == 1) {
        document.getElementById("exactDOB").style.display = "block";
    }
}
// Datatable
$(document).ready(function() {
    $('#contactDataTable').DataTable( {
        select: true
    } );
} );

// Datepicker
$(function () {
    $('.datepicker').datepicker({
        format: "d MM yyyy",
        endDate: "now",
        clearBtn: true,
    });
})

$(function () {
    $('.datepicker-reminder').datepicker({
        format: "d MM yyyy",
        startDate: "now",
        clearBtn: true,
    });
})

$(function () {
    $('.datepicker-lifeEvent').datepicker({
        format: "d MM yyyy",
        endDate: "now",
        clearBtn: true,
    });
})

// Custom upload button
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
// End of custom upload button

// Dynamic timeline
// $(document).ready(function(){
//     jQuery('.timeline').timeline({
//         //mode: 'horizontal',
//         visibleItems: 2
//     });
// });

$(function () {
    $('.timeline').timeline({
        //mode: 'horizontal',
        visibleItems: 2
    });
})
// End of dynamic timeline

// Retain scroll position after page refresh
window.addEventListener('scroll', (event) => {
    console.log('Scrolled');
});