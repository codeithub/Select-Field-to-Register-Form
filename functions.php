add_action( 'woocommerce_register_form', 'codeithub_extra_register_select_field' );
  
function codeithub_extra_register_select_field() {
    
    ?>
  
<p class="form-row form-row-wide">
<label for="find_where"><?php _e( 'Select any Option', 'woocommerce' ); ?>  <span class="required">*</span></label>
<select name="find_where" id="find_where" />
    <option value="goo">Option 1</option>
    <option value="fcb">Option 2</option>
	<option value="twt">Option 3</option>
    <option value="twt">Option 4</option>
</select>
</p>
  
<?php
    
}
 
add_action( 'woocommerce_created_customer', 'codeithub_save_extra_register_select_field' );
   
function codeithub_save_extra_register_select_field( $customer_id ) {
if ( isset( $_POST['find_where'] ) ) {
        update_user_meta( $customer_id, 'find_where', $_POST['find_where'] );
}
}
  
add_action( 'show_user_profile', 'codeithub_show_extra_register_select_field', 30 );
add_action( 'edit_user_profile', 'codeithub_show_extra_register_select_field', 30 ); 
add_action( 'woocommerce_edit_account_form', 'codeithub_show_extra_register_select_field', 30 );
   
function codeithub_show_extra_register_select_field($user){ 
    
  if (empty ($user) ) {
  $user_id = get_current_user_id();
  $user = get_userdata( $user_id );
  }
    
?>    
        
<p class="form-row form-row-wide">
<label for=""><?php _e( 'Select any Option', 'woocommerce' ); ?>  <span class="required">*</span></label>
<select name="find_where" id="find_where" />
    <option disabled value> -- select an option -- </option>
    <option value="1" <?php if (get_the_author_meta( 'find_where', $user->ID ) == "1") echo 'selected="selected" '; ?>>Option 1</option>
    <option value="2" <?php if (get_the_author_meta( 'find_where', $user->ID ) == "2") echo 'selected="selected" '; ?>>Option 2</option>
    <option value="3" <?php if (get_the_author_meta( 'find_where', $user->ID ) == "3") echo 'selected="selected" '; ?>>Option 3</option>
	<option value="4" <?php if (get_the_author_meta( 'find_where', $user->ID ) == "4") echo 'selected="selected" '; ?>>Option 4</option>
</select>
</p>
  
<?php
  
}
   
add_action( 'personal_options_update', 'codeithub_save_extra_register_select_field_admin' );    
add_action( 'edit_user_profile_update', 'codeithub_save_extra_register_select_field_admin' );   
add_action( 'woocommerce_save_account_details', 'codeithub_save_extra_register_select_field_admin' );
   
function codeithub_save_extra_register_select_field_admin( $customer_id ){
if ( isset( $_POST['find_where'] ) ) {
   update_user_meta( $customer_id, 'find_where', $_POST['find_where'] );
}
}
