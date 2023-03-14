/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    if ($("#uploadBtn").length > 0) {
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    }

    /* Fixing height and width for left / right column */
    $(".columns").each(function(){
        var
            $this = $(this),
            $leftColumn = $this.find(".left_column"),
            $rightColumn = $this.find(".right_column"),
            heightLeftColumn = $leftColumn.height(),
            heightRightColumn = $rightColumn.height();

        $leftColumn.add($rightColumn).css("height", function () {
            return heightLeftColumn > heightRightColumn ? heightLeftColumn : heightRightColumn;
        });

        if ($leftColumn.find("a.info_alert").length <= 0)
            $leftColumn.css("padding-right", function () {
                return $this.closest("#advanced_settings").length > 0 ? "0px" : "25px";
            });
    });
    
    $(document).on("click", "#main_menu .menu_item", function() {

        /* Add style to selected menu item */
        var $this = $(this);

        $this
            .siblings(".menu_item.selected").removeClass("selected")
            .end()
            .addClass("selected");
        
        /* Show / hide secondary menu */
        var secondaryMenu = $(this).attr('data-left-menu');        
        $('#secondary_menu .menu').hide();        
        $('#secondary_menu #' + secondaryMenu).show();
        
        var noOfVisibleMenu = false;
        $('#left_menu #secondary_menu .menu').each(function(){
            if ($(this).is(":visible"))
                noOfVisibleMenu = true;
        });

        var $secondaryMenu = $('#left_menu #secondary_menu');
        if (noOfVisibleMenu) {
            $('#left_menu #secondary_menu').css({
                "padding-top" : 0,
                "border" : "1px solid #d7dbde",
                "margin-top" : 30
            });
        } else {
            $('#left_menu #secondary_menu').css({
                "padding-top" : 15,
                "border" : "0px solid #d7dbde",
                "margin-top" : 0
            });
            
            var contentId = $(this).attr('data-content');
            $('.po_main_content').hide();
            $('#' + contentId).show();
        }
        
        $('.instructions_block').hide();
        
        /* Load secondary Menu functionality */
        var secondary_menu_item = $('#secondary_menu #' + secondaryMenu).find('.secondary_menu_item').first().attr('id');
        $('#'+secondary_menu_item).click();
        
        /* Display Left Contact US */
        $('.contact_form_left_menu').hide();
        if ($(this).attr('data-contact-us') == '1')
            $('.contact_form_left_menu').show();    
            
    });
    
    $(document).on('click', '#secondary_menu .secondary_menu_item' ,function() {        
        var leftMenuItemId = $(this).attr('id');
        leftMenuItemId = leftMenuItemId.replace('secondary_menu_item', '');
        
        /* Add style to selected menu item */
        $('#secondary_menu .secondary_menu_item').removeClass('selected');
        $(this).addClass('selected');
        
        /* Hide / Show Instructions */
        $('.instructions_block').hide();
        var instructionsId = $(this).attr('data-instructions');
        $('#' + instructionsId).show();
        
        /* Hide / Show Block contents */
        var contentId = $(this).attr('data-content');
        console.log(contentId);
        $('.po_main_content').hide();
        $('#' + contentId).show();
    });
    
    $('#main_menu .menu_item').first().click();
    
    $(document).on('click', '.menu_header' ,function() {
        var classArrow = $(this).find('#left_menu_arrow').attr('class');
        if (classArrow == 'arrow_up') {
            $(this).find('span.arrow_up').attr('class', 'arrow_down');
            $(this).parent().find('.secondary_submenu').slideToggle('slow');
        } else if (classArrow == 'arrow_down') {
            $(this).find('span.arrow_down').attr('class', 'arrow_up');
            $(this).parent().find('.secondary_submenu').slideToggle('slow');
        
        }
    });

     $('#open_module_upgrade').fancybox({
            helpers : {
                overlay : {
                    locked : false,
                    css : {
                        'background' : 'transparent'
                    }
                }
            },
            'padding': 0,
            'closeBtn': true,
            'autoScale': true,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 500,
            'speedOut': 300,
            'autoDimensions': true
    }).click();
    
    $('.info_alert').fancybox({
            helpers : {
                overlay : {
                    locked : false,
                    css : {
                        'background' : 'transparent'
                    }
                }
            },
            'padding': 0,
            'closeBtn': false,
            'autoScale': true,
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 500,
            'speedOut': 300,
            'autoDimensions': true
    });
});