// Search bar animation
$(".btn-search").click(function(){
  $(".input-search").toggleClass("active").focus();
  $(this).toggleClass("animate");
  $(".input-search").val("");
});

// Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}

// Admin manual password
var form = $('#editUserForm'),
radio = $('#manualPass'),
inputActive = $('#manualPassInput');

inputActive.hide();

radio.on('click', function() {
    if($(this).is(':checked')) {
        inputActive.show();
        inputActive.find('input').attr('required', true);
    } else {
        inputActive.hide();
        inputActive.find('input').attr('required', false);
    }
})

// Hide or show crud permission option
function text(x) {
    if (x == 0) {
        document.getElementById("basicPer").style.display = "block";
        document.getElementById("crudPer").style.display = "none";
    }
    if (x == 1) {
        document.getElementById("crudPer").style.display = "block";
        document.getElementById("basicPer").style.display = "none";
    }
}

// Hide or show manual password option in create user option
function passUser(x) {
    if (x == 0)
        document.getElementById("passUserInput").style.display = "block";
    else
        document.getElementById("passUserInput").style.display = "none";
}