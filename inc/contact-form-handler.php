<?php
/**
 * Contact Form AJAX Handler
 */
function belsks_handle_contact_form_submission() {
	// Sanitize inputs
	$name    = sanitize_text_field( $_POST['name'] ?? '' );
	$contact = sanitize_text_field( $_POST['contact'] ?? '' );
	$message = sanitize_textarea_field( $_POST['message'] ?? '' );

	// Validation
	$errors = array();

	if ( empty( $name ) ) {
		$errors[] = 'Введите ваше имя';
	}

	if ( empty( $contact ) ) {
		$errors[] = 'Укажите телефон или e-mail';
	} elseif ( ! is_valid_contact( $contact ) ) {
		$errors[] = 'Введите корректный телефон или e-mail';
	}

	if ( empty( $message ) ) {
		$errors[] = 'Введите комментарий';
	}

	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'message' => implode(', ', $errors) ) );
	}

	// Get admin email
	$admin_email = get_option( 'admin_email' );

	// Prepare email
	$to      = $admin_email;
	$subject = 'Новая заявка с сайта БелСКС';
	$body    = "Имя: {$name}\n";
	$body   .= "Связь: {$contact}\n";
	$body   .= "Комментарий: {$message}\n";
	$body   .= "\n---\nОтправлено с: " . home_url();

	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	// Send email
	if ( wp_mail( $to, $subject, $body, $headers ) ) {
		wp_send_json_success( array( 'message' => 'Заявка отправлена' ) );
	} else {
		wp_send_json_error( array( 'message' => 'Ошибка отправки. Попробуйте позже.' ) );
	}
}
add_action( 'wp_ajax_belsks_contact_submit', 'belsks_handle_contact_form_submission' );
add_action( 'wp_ajax_nopriv_belsks_contact_submit', 'belsks_handle_contact_form_submission' );

/**
 * Validate phone or email
 */
function is_valid_contact( $contact ) {
	$contact = trim( $contact );
	
	// Check if email
	if ( is_email( $contact ) ) {
		return true;
	}
	
	// Check if Belarus phone (+375 XX XXX-XX-XX)
	if ( prefix_is_valid_phone( $contact ) ) {
		return true;
	}
	
	// Check if international phone
	$digits = preg_replace( '/[^\d]/', '', $contact );
	if ( strlen( $digits ) >= 7 && strlen( $digits ) <= 15 ) {
		return true;
	}
	
	return false;
}

/**
 * Validate Belarus phone number (+375 XX XXX-XX-XX)
 */
function prefix_is_valid_phone( $phone ) {
	$phone  = trim( (string) $phone );
	$digits = preg_replace( '/[^\d]/', '', $phone );

	return strlen( $digits ) === 12 && strpos( $digits, '375' ) === 0;
}
