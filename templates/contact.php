<?php
/*
Template Name: Форма связи
*/
?>

<?php
get_header();
?>

<div class="contact">
    
<?php
    include_once("contact-form.php");
    create_my_db();
?>

</div>


<?php  get_footer(); ?>