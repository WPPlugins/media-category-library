        <table>
                <thead>
                        <tr>
				<th class="col-title">Title</th>
				<th class="col-name">File Name</th>
				<th class="col-caption">Caption</th>
				<th class="col-date">Date</th>
			</tr>
                </thead>
                <tbody>
<?php foreach ( $posts as $post ): ?>
<?php $link = wp_get_attachment_url( $post->ID ); ?>
<?php $time_format = get_option( 'date_format' ) . ' ' .  get_option( 'time_format' ); ?>
                        <tr>
                                <td class="cell-title"><a target="_BLANK" href="<?php echo $link; ?>"><?php echo get_the_title( $post->ID ); ?></a></td>
                                <td class="cell-name"><?php echo basename( $link ); ?></td>
                                <td class="cell-caption"><?php echo $post->post_excerpt; ?></td>
                                <td class="cell-date"><?php echo get_the_time( $time_format, $post->ID ); ?></td>
                        </tr>
<?php endforeach; ?>
                </tbody>
        </table>
