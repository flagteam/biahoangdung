<?php  
global $current_user, $post, $dwqa_options;
$question_id = get_the_ID();
$question = get_post( $question_id );
$best_answer_id = dwqa_get_the_best_answer( $question_id );

$status = array( 'publish', 'private' );
$args = array(
	'post_type' 		=> 'dwqa-answer',
	'posts_per_page' 	=> 40,
	'order'      		=> 'ASC',
	'meta_query' 		=> array(
		array(
			'key' => '_question',
			'value' => array( $question_id ),
			'compare' => 'IN',
		),
	),
   'post_status' => $status,
);

$answers = new WP_Query( $args );
$count = 0;

foreach ( $answers->posts as $answer ) {
	if ( $answer->post_status == 'private' ) {
		if ( dwqa_current_user_can( 'edit_answer', $answer->ID ) ) {
			$count++;
		}
	} elseif ( $answer->post_status == 'publish' ) {
		$count++;   
	}
}
$drafts = dwqa_get_drafts( $question_id );

if ( $count > 0 || ! empty( $drafts ) ) { 
	?>
	<h3 class="dwqa-headline">
		<?php 
			printf( '<span class="answer-count"><span class="digit">%d</span> %s</span>',
				$count,
				_n( 'answer', 'answers', $count, 'dwqa' )
			);
		?>
	</h3>
	
	<div class="dwqa-list-answers">
	<?php
	if ( $best_answer_id ) {
		global $post;
		$best_answer = get_post( $best_answer_id );
		$post = $best_answer;
		setup_postdata( $post );
		dwqa_load_template( 'content', 'answer' );
	}
	global $position; $position = 1;
	while ( $answers->have_posts() ) { $answers->the_post();
		$answer = get_post( get_the_ID() );
		if ( $best_answer_id && $best_answer_id == get_the_ID() ) {
			continue;
		}
		if ( get_post_status( get_the_ID() ) == 'private' ) {
			if ( is_user_logged_in() && ( dwqa_current_user_can( 'edit_answer' ) || $current_user->ID == $answer->post_author || $current_user->ID == $question->post_author ) ) {
				dwqa_load_template( 'content', 'answer' );
			}
		} else {
			dwqa_load_template( 'content', 'answer' );
		}
		$position++;
	} 
	unset( $position );
	//Drafts
	if ( current_user_can( 'edit_posts' ) ) {
		global $post;
		if ( ! empty( $drafts ) ) {
			foreach ( $drafts as $post ) {
				setup_postdata( $post );
				dwqa_load_template( 'content', 'answer' );
			}
		}
	} 

	?>
	</div>

	<?php 

} else {
	if ( ! dwqa_current_user_can( 'read_answer' ) ) {
		echo '<div class="alert">'.__( 'You do not have permission to view answers','dwqa' ).'</div>';
	}
}
wp_reset_query();

//Create answer form
if ( dwqa_is_closed( $question_id ) ) {
	echo '<p class="alert">'.__( 'This question is now closed','dwqa' ).'</p>';
	return false;
}

if ( is_user_logged_in() ) {
//    if ( dwqa_current_user_can( 'post_answer' ) ) {
	dwqa_submit_answer_form();
}
