<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: ../assets/vendor/php-email-form/php-email-form.php
  * 
  * IMPORTANT: This script will NOT work unless you purchase the pro version or replace it
  * with a free alternative (e.g., Formspree, Netlify Forms, or a simple mail() script).
  * 
  * For a free alternative, you can use Formspree by changing the form's action attribute to:
  *   <form action="https://formspree.io/f/your-formspree-id" method="POST">
  * 
  * For now, the email address has been updated to your address.
  */

  // Replace with your real receiving email address
  $receiving_email_address = 'mahmoud.kamel104@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library. This feature requires the pro version of the template.' );
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment and fill in your SMTP credentials if you have them (e.g., Gmail SMTP)
  /*
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'mahmoud.kamel104@gmail.com',
    'password' => 'your-app-password',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
