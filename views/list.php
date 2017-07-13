<?php if ( $_REQUEST['mediacat_document_id'] ): ?>
<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Document date updated successfully.</strong></p></div>
<?php endif; ?>
<?php if ( ! $frontend ): ?>
<br clear="all">
<div class="wrap">
        <div class="icon32" id="icon-upload"><br></div>
        <h2><?php _e( self::pname, self::nspace ); ?> <a href="<?php echo get_admin_url(); ?>media-new.php" class="add-new-h2"><?php _e( 'Add New', self::nspace ); ?></a></h2>
        <div class="tablenav top">
                <form id="doc-library-search-form">
                <div class="alignleft actions">
                        <select name="doc-library-cat" id="doc-library-cat">
                                <option value=""><?php _e( 'Show all media categories', self::nspace ); ?></option>
<?php foreach ( $this->get_media_categories() as $slug => $name ): ?>
                                <option value="<?php echo $slug; ?>"<?php if ( $slug == $_REQUEST['cat'] ): ?> selected<?php endif; ?>><?php echo $name; ?></option>
<?php endforeach; ?>
                        </select>
                </div>
                <div class="alignleft actions">
                        <input type="text" id="doc-library-keyword" name="doc-library-keyword" value="<?php echo $_REQUEST['keyword']; ?>"> <input type="button" id="doc-library-search" class="button button-secondary action" value="<?php _e( 'Search', self::nspace ); ?>">
        </div>
           </form>
<?php endif; ?>
<?php if ( $total_records > 0 ): ?>
<?php if ( $frontend ): ?>
<?php if ( $pagination ): ?>
        <div class="pagination docs-pagination">
                <div class="pagination-details">
                        <?php echo $this->get_mediacat_library_pagination_details( $start_record, $posts_per_page, $total_records, $total_pages, $pagination ); ?>

                </div>
        </div>
<?php endif; ?>
<?php else: ?>
        <div class="tablenav-pages pagination-records">
                <span class="displaying-num"><?php echo $total_records; ?> <?php _e( 'document(s) found', self::nspace ); ?></span>
<?php if ( $pagination ): ?>
                <span class="pagination-links">
                        <?php echo $pagination; ?>
                </span>
<?php endif; ?>
        </div>
<?php endif; ?>
        <table class="widefat responsive">
                <thead>
                        <tr>
                                <th></th>
                                <th><?php _e( 'File', self::nspace ); ?></th>
                                <th><?php _e( 'Category', self::nspace ); ?></th>
                                <th><?php _e( 'Caption', self::nspace ); ?></th>
                                <th><?php _e( 'Date', self::nspace ); ?></th>
                                <?php if ( ! $frontend ): ?><th><?php _e( 'Options', self::nspace ); ?></th><?php endif; ?>
                        </tr>
                </thead>
                <tbody>
<?php foreach ( $results as $result ): ?>
                        <tr>
<?php $link = wp_get_attachment_url( $result['ID'] ); ?>
<?php list( $url, $width, $height ) = wp_get_attachment_image_src( $result['ID'], 'thumbnail', true ); ?>
                                <td width="61">
                                        <a target="_BLANK" href="<?php echo $link; ?>"><img src="<?php echo $url; ?>" border="0" width="60" height="60"></a>
                                </td>
                                <td>
                                        <a target="_BLANK" href="<?php echo $link; ?>"><?php echo $result['post_title']; ?></a><br>
                                        <?php echo strtoupper( preg_replace( "/.*\//", "", $result['post_mime_type'] ) ); ?>
                                </td>
<?php
        $mediacats = array();
        $terms = wp_get_object_terms( $result['ID'], $this->settings_data['taxonomy_name'] );
        foreach ( $terms as $term ) $mediacats[] = $term->name;
        $time_format = get_option( 'date_format' ) . ' ' .  get_option( 'time_format' );
?>
                                <td><?php echo implode( ', ', $mediacats ); ?></td>
                                <td><?php echo $result['post_excerpt']; ?></td>
                                <td width="200">
<?php $date = get_the_time( 'm/d/Y', $result['ID'] ); ?>
<?php if ( $frontend ): ?>
                                        <abbr title="<?php echo get_the_time( 'M j, Y', $result['ID'] ); ?>"><?php echo $date; ?></abbr>
<?php else: ?>
<?php list ( $month, $day, $year ) = explode( "/", $date ); ?>
                                        <form action="<?php echo $this->get_mediacat_library_admin_url(); ?>" method="post">
                                                <select name="month">
                                        <?php for( $i = 1; $i <= 12; $i++ ): ?>
                                        <?php $months = array( '01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sept','10'=>'Oct','11'=>'Nov','12'=>'Dec' ); ?>
                                        <?php if ( $i < 10 ) $i = '0' . $i; ?>
                                                        <option value="<?php echo $i; ?>"<?php if ( $month == $i ): ?> selected<?php endif; ?>><?php echo $months[$i]; ?></option>
                                        <?php endfor; ?>
                                                </select>
                                                <select name="day">
                                        <?php for( $i = 1; $i <= 31; $i++ ): ?>
                                        <?php if ( $i < 10 ) $i = '0' . $i; ?>
                                                        <option value="<?php echo $i; ?>"<?php if ( $day == $i ): ?> selected<?php endif; ?>><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                                </select>
                                                <select name="year">
                                        <?php for( $i = ( date( 'Y' ) - 20 ); $i <= ( date( 'Y' ) + 1 ); $i++ ): ?>
                                        <?php if ( $i < 10 ) $i = '0' . $i; ?>
                                                        <option value="<?php echo $i; ?>"<?php if ( $year == $i ): ?> selected<?php endif; ?>><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                                </select>
                                                <input type="hidden" name="mediacat_document_id" value="<?php echo $result['ID']; ?>">
                                                <input type="submit" value="<?php _e( 'Change Date', self::nspace ); ?>">
                                        </form>
<?php endif; ?>
                                </td>
<?php if ( ! $frontend ): ?>
                                <td>
                                        <ul>
                                                <li><a href="<?php echo get_admin_url(); ?>post.php?post=<?php echo $result['ID']; ?>&amp;action=edit"><?php _e( 'Edit', self::nspace ); ?></a></li>
                                                <li><a href="<?php echo get_delete_post_link( $result['ID'], '', true ); ?>"><?php _e( 'Delete', self::nspace ); ?></a></li>
                                                <li><a class="thickbox" href="../?mediacat_pages=1&amp;attachment_id=<?php echo $result['ID']; ?>"><?php _e( 'Pages', self::nspace ); ?></a></li>
                                        </ul>
                                </td>
<?php endif; ?>
                        </tr>
<?php endforeach; ?>
                </tbody>
        </table>
<?php if ( $frontend ): ?>
        <div class="pagination-details">
                <?php echo $this->get_mediacat_library_pagination_details( $start_record, $posts_per_page, $total_records, $total_pages, $pagination ); ?>

        </div>
<?php else: ?>
        <div class="tablenav-pages pagination-records">
                <span class="displaying-num"><?php echo $total_records; ?> <?php _e( 'document(s) found', self::nspace ); ?></span>
<?php if ( $pagination ): ?>
                <span class="pagination-links">
                        <?php echo $pagination; ?>
                </span>
<?php endif; ?>

        </div>
<?php endif; ?>
<?php else: ?>
	<p style="clear:both"><?php _e( 'No results found.', self::nspace ); ?></p>
<?php endif; ?>
