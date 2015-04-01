<?php
/*

This file is the Admin backend options form.
Author: noitrangbanhcuon
Version: 1.0
*/
$qnrb_social = array('linkedin','googleplus','instagram','facebook','behance','youtube','vimeo','tumblr','blogger','twitter','pinterest');
$arr_social = array();
if($_POST['qnrb_hidden'] == 'Y') {

    //Form data sent
	foreach ($qnrb_social as $value) {
		$post_value = $_POST['qnrb_'.$value];
    	update_option('qnrb_'.$value, $post_value);
	}

    ?>
    <div class="updated" xmlns="http://www.w3.org/1999/html"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php
} else {
    //Normal page display
	foreach ($qnrb_social as $value) {
		$arr_social['qnrb_'.$value] = get_option('qnrb_'.$value);
	}
	$qnrb_feedback = get_option('qnrb_feedback');

}
?>

<div class="wrap">
			<?php    echo "<h2>" . __( 'Quick Navigation Right Bar Options', 'qnrb_trdom' ) . "</h2>"; ?>

<form name="qnrb_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="qnrb_hidden" value="Y">
    <?php    echo "<h4>" . __( 'Quick Navigation Right Bar Options', 'qnrb_trdom' ) . "</h4>"; ?>
    <?php foreach ($qnrb_social as $value) { ?>
    <p>
		<?php echo ucfirst($value) . ' url:'; ?>
        <input type="text" name="qnrb_<?php echo $value; ?>" value="<?php echo $arr_social['qnrb_'.$value]; ?>" size="20">			    </p>
    <?php }//end foreach ?>
    <hr />
    <p>
		Feedback URL:
        <input type="text" name="qnrb_feedback; ?>" value="<?php echo $qnrb_feedback; ?>" size="20">			    </p>
    <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'qnrb_trdom' ) ?>" />
    </p>
</form>
</div>
