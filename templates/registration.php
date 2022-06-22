<?php
/*
Template Name: Регистрация
*/
?>

<?php
get_header();
?>

<div class="register">
    
<?php
    include_once("reg-form.php");
    create_visitors_db();
?>

</div>


<?php  get_footer(); ?>