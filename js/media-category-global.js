jQuery(document).ready(function() {
        var link = '<li';
        if(media_category_global.is_category_page) link += ' class="current"';
        link += '><a href="' + media_category_global.admin_url + 'edit-tags.php?taxonomy=' + media_category_global.taxonomy_name + '"';
        if(media_category_global.is_category_page) link += ' class="current"';
        link += '>' + media_category_global.category_page_name + '</a>'; 
        jQuery('#menu-media div.wp-submenu-wrap ul').append(link + '</li>');
        if(media_category_global.is_category_page) {
                jQuery('li#menu-posts').addClass('wp-not-current-submenu');
                jQuery('li#menu-posts').removeClass('wp-has-current-submenu');
                jQuery('li#menu-posts').removeClass('wp-menu-open');
                jQuery('li#menu-media').removeClass('wp-not-current-submenu');
                jQuery('li#menu-media').addClass('wp-has-current-submenu');
                jQuery('li#menu-media a.menu-icon-media').addClass('wp-has-current-submenu');
        }
});
