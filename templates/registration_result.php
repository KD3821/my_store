<?php
/*
Template Name: Результат Рег-ции
*/
?>
<?php
get_header();
?>

<div class="register">

<?php
    $wpdb->hide_errors();
    include_once("form-funcs.php");
    insert_visitor();
    show_reg_result();
?>

</div>

<?php  get_footer(); ?>