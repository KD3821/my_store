<?php
/*
Template Name: Результат Формы
*/
?>
<?php
get_header();
?>

<div class="contact">

<?php
    include_once("contact-form-res.php");
    insert_my_data();
    show_result();

?>

</div>

<?php  get_footer(); ?>