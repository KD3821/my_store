<?php
/*
Template Name: Выход
*/
?>

<?php
get_header();
?>

<div class="logout">
    
<?php
    end_session();
    include_once("auth-form.php");
?>

</div>


<?php  get_footer(); ?>