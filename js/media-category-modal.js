jQuery(document).ready(function(){
	var media = wp.media;
	if ( media ) {
		media.view.AttachmentFilters[mcm.taxonomy_name] = media.view.AttachmentFilters.extend({
			className: mcm.taxonomy_name,
			createFilters: function() {
				var filters = {};
				_.each( mcm.terms || {}, function( term ) {
					var query = {};
					query[mcm.taxonomy_name] = {
						taxonomy: mcm.taxonomy_name,
						term_id: parseInt( term.id, 10 ),
						term_slug: term.slug
					};
					filters[ term.slug ] = {
						text: term.label,
						props: query
					};
				});
				this.filters = filters;
			}
		});
		var myDrop = media.view.AttachmentsBrowser;
		media.view.AttachmentsBrowser = media.view.AttachmentsBrowser.extend({
			createToolbar: function() {
				media.model.Query.defaultArgs.filterSource = 'filter-media-taxonomies';
				myDrop.prototype.createToolbar.apply(this,arguments);
				this.toolbar.set( mcm.taxonomy_name, new media.view.AttachmentFilters[mcm.taxonomy_name]({
					controller: this.controller,
					model:      this.collection.props,
					priority:   -80
					}).render()
				);
			}
		});
	}
	jQuery('html').delegate( '.media-terms input', 'change', function(){
		var obj = jQuery(this),
			container = jQuery('.media-terms'),
			row = container.parent(),
			data = {
				action: 'save-media-terms',
				term_ids: [],
				attachment_id: container.data('id'),
				taxonomy: container.data('taxonomy')
			};
		container.find('input:checked').each(function(){
			data.term_ids.push( jQuery(this).val() );
		});
		row.addClass('media-save-terms');
		container.find('input').prop('disabled', 'disabled');
		jQuery.post( ajaxurl, data, function( response ){
			row.removeClass('media-save-terms');
			container.find('input').removeProp('disabled');
		});
	});
});
