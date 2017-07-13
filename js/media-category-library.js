jQuery(document).ready(function(){
        jQuery('#doc-library-cat').live('change', function() {
                location.href = media_category_library.admin_url + 'upload.php?page=mediacatlib-library&cat=' + jQuery(this).val();
        });
        jQuery('#doc-library-search').live('click', function() {
                var keyword = jQuery('#doc-library-keyword').val();
                if(keyword.length) location.href = media_category_library.admin_url + 'upload.php?page=mediacatlib-library&keyword=' + keyword;
                else alert('Please enter a keyword.');
        });
        jQuery("#doc-library-search-form").unbind('submit').bind('submit', function () {
                jQuery('#doc-library-search').click();
                return false;
        });
});
