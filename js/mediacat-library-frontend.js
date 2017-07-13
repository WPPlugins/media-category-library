jQuery(document).ready(function(){
        jQuery('#mediacatcheckall').click(function () {
                jQuery(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
        });       
});
