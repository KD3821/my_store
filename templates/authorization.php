<?php
/*
Template Name: Вход
*/
?>

<?php
get_header();
?>

<div class="authorize">
    
<?php
    end_session();
    include_once("auth-form.php");
    // create_visitors_db();
?>

</div>


<?php  get_footer(); ?>