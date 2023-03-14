
    <script type="text/javascript" src="{$base_uri}js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="{$base_uri}js/admin/tinymce.inc.js"></script>

    
    <script type="text/javascript">
            var iso = '{$isoTinyMCE}';
            var pathCSS = '{$theme_css_dir}' ;
            var ad = '{$ad}' ;
            function tinyMCEInit(element, selector)
            {
                    tinyMCE.init({
                            selector: selector,
                            mode : element != "textarea"?"exact":"textareas",
                            theme : "advanced",
                            skin:"cirkuit",
                            plugins : "colorpicker link image filemanager table media placeholder",
                            // Theme options
                            theme_advanced_toolbar_location : "top",
                            theme_advanced_toolbar_align : "left",
                            theme_advanced_statusbar_location : "bottom",
                            theme_advanced_resizing : false,
                            content_css : pathCSS+"theme.css",
                            document_base_url : ad,
                            width: "600",
                            height: "auto",
                            font_size_style_values : "8pt, 10pt, 12pt, 14pt, 18pt, 24pt, 36pt",
                            browser_spellcheck : true,
                            toolbar1 : "colorpicker,bold,italic,underline",
                            toolbar2: "strikethrough,blockquote,link,alignleft",
                            toolbar3: "aligncenter,alignright,alignjustify",
                            toolbar4: "bullist,numlist,image",
                            external_filemanager_path: baseAdminDir+"filemanager/",
                            filemanager_title: "File manager" ,
                            external_plugins: { "filemanager" : baseAdminDir+"filemanager/plugin.min.js"},
                            language: iso_user,
                            skin: "prestashop",
                            entity_encoding: "raw",
                            convert_urls : false,
                            language : iso,
                    });
            }

           
    </script>
