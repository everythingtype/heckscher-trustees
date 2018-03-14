<?php $projects = get_field('projects_for_review'); ?>

<?php if ( $projects ) : ?>

	<h3><span>Projects for Review</span></h3>

	<?php foreach($projects as $project) : ?>

		<div class="meetingitem">

			<?php if ( $project['organization'] ) : ?>
				<h4>Organization</h4>
				<p><?php echo $project['organization']; ?></p>
			<?php endif; ?>

		<?php if ( $project['project'] ) : ?>
			<h4>Project</h4>
			<p><?php echo $project['project']; ?></p>
		<?php endif; ?>

		<?php if ( $project['recommended_amount'] ) : ?>
			<h4>Recommended Amount</h4>
			<p><?php echo $project['recommended_amount']; ?></p>
		<?php endif; ?>

		<?php if ( $project['file_for_review'] ) : ?>
			<h4>File for Review</h4>
			<p><a href="<?php echo $project['file_for_review']['url'] ?>" target="_blank"><span class="link"><?php echo $project['file_for_review']['title']; ?></span> <span class="foldericon <?php the_format( $project['file_for_review']['mime_type'] ); ?>"></span> <span class="filesize"><?php echo size_format(filesize( get_attached_file( $project['file_for_review']['id'] ) ) ); ?></span></a></p>
		<?php endif; ?>

		</div>

	<?php endforeach; ?>

<?php endif; ?>