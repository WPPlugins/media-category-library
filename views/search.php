                <h1 id="mediacat-library-search-details"><?php _e( 'Search', self::nspace ); ?></h1>
	        <form id="mediacat-library-search-form" action="<?php echo get_site_url(); ?>/<?php if ( get_option( 'permalink_structure' ) ): ?><?php echo $this->settings_data['rewrite_url']; ?><?php else: ?>?mediacat_library=1<?php endif; ?>" method="post">
	                <div class="cols two-cols">
	                        <fieldset class="col first-col">
	                                <legend><?php _e( 'Category', self::nspace ); ?></legend>
	                        	<div class="radio-group">
	                        		<label>
	                                		<input type="checkbox" id="mediacatcheckall">
	                                		Check All
	                                	</label>
<?php foreach ( $this->get_media_categories() as $slug => $name ): ?>
	                                	<label>
	                                		<input type="checkbox" name="media-categories[]" value="<?php echo $slug; ?>"<?php if ( in_array( $slug, $_REQUEST['media-categories'] ) ): ?> checked<?php endif; ?>>
	                                		<?php echo $name; ?>
	                        		</label>
<?php endforeach; ?>

					</div>
				</fieldset>
				<fieldset class="col">
	                        	<legend><?php _e( 'Keyword', self::nspace ); ?></legend>
                                        <p class="form-row" id="mediacat-library-keyword">
                                                <label for="keyword"><?php _e( 'Keyword', self::nspace ); ?></label>
                                                <input type="text" name="keyword" id="keyword" value="<?php if ( isset( $_REQUEST['keyword'] ) ) echo $_REQUEST['keyword']; ?>">
                                        </p>                                                               
	                        </fieldset>
	                        <fieldset class="col">
	                        	<legend><?php _e( 'Order By', self::nspace ); ?></legend>
	                        	<p class="form-row" id="mediacat-library-orderby">
                                                <select name="orderby" id="orderby">
                                                	<option value="post_title"<?php if ( $_REQUEST['orderby'] == 'post_title' ): ?> selected<?php endif; ?>><?php _e( 'File Name', self::nspace ); ?></option>
                                                	<option value="post_date"<?php if ( $_REQUEST['orderby'] == 'post_date' ): ?> selected<?php endif; ?>><?php _e( 'File Date', self::nspace ); ?></option>
                                                </select>
                                                <select name="order" id="order">
                                                	<option value="ASC"<?php if ( $_REQUEST['order'] == 'ASC' ): ?> selected<?php endif; ?>><?php _e( 'Ascending', self::nspace ); ?></option>
                                                	<option value="DESC"<?php if ( $_REQUEST['order'] == 'DESC' ): ?> selected<?php endif; ?>><?php _e( 'Descending', self::nspace ); ?></option>
                                                </select>
                                        </p>                                      
	                        </fieldset>
	                </div>
	                <input type="hidden" name="mediacat_library_submit" value="1">
	                <input type="submit" value="<?php _e( 'Search', self::nspace ); ?>">
	        </form>
<?php if ( isset( $_REQUEST['keyword'] ) || isset( $_REQUEST['media-categories'] ) ) $this->mediacat_library( true ); ?>
