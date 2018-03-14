<?php 

$documents = get_field('meeting_documents');
$docsexist = false;

foreach($documents as $document) : 
	if ( $document['file_for_review'] ) $docsexist = true;
endforeach; 

if ( $docsexist == true || get_field('zip_file') ) : ?>

	<h3><span>Meeting Documents</span></h3>

	<ul class="meetingdocs">

	<?php foreach($documents as $document) : ?>

		<?php if ( $document['file_for_review'] ) : ?>

			<li><a href="<?php echo $document['file_for_review']['url'] ?>" target="_blank"><span class="link"><?php echo $document['file_for_review']['title']; ?></span> <span class="foldericon <?php the_format($document['file_for_review']['mime_type']); ?>"></span> <span class="filesize"><?php echo size_format(filesize( get_attached_file( $document['file_for_review']['id'] ) ) ); ?></span></a></li>

		<?php endif; ?>

	<?php endforeach; ?>

	<?php if ( get_field('zip_file') ) : ?>

		<?php $thezip = get_field('zip_file'); ?>

		<li class="downloadall"><a href="<?php echo $thezip['url'] ?>" target="_blank"><span class="link">Download All</span> <span class="foldericon <?php the_format($thezip['mime_type']); ?>"></span> <span class="filesize"><?php echo size_format(filesize( get_attached_file( $thezip['id'] ) ) ); ?></span></a></li>

	<?php endif; ?>

	</ul>

<?php endif; ?>