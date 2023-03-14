$(function(){
    // menu tabs
    if(window.location.hash) {
      var tab = window.location.hash;
      tab = tab.substr(1);
    } else {
      var tab = ''; 
    }

    if(tab != '' && $('#secondary_menu .secondary_menu_item[data-content="'+ tab +'"]').length > 0) {
        $('#secondary_menu .secondary_menu_item').removeClass('selected');
        $('#secondary_menu .secondary_menu_item[data-content="'+ tab +'"]').addClass('selected');
        $('.instructions_block').hide();
        var instructionsId = $('#secondary_menu .secondary_menu_item[data-content="'+ tab +'"]').attr('data-instructions');
        $('#' + instructionsId).show();

        $('.po_main_content').hide();
        $('#' + tab).show();
    }
});