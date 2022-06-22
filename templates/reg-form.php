<form action="?page_id=55" method="post" name="reg" onsubmit="return ConfirmReg()"> <!--action="" прописать свой url-->
    <H3>Форма регистрации</H3>
    
    <p><input type="text" name="user_name" id="user_name" placeholder="Имя"></p>
    <p><input type="text" name="user_email" id="user_email" placeholder="Email"></p>
    <p><input type="password" name="user_pass" id="user_pass" placeholder="Пароль"></p>
    <p><input type="password" name="user_pass2" id="user_pass2" placeholder="Пароль еще раз"></p>
    <button type="submit" name="submit">Зарегистрироваться</button>
</form>


<?php


function create_visitors_db() {

    global $wpdb;
    $new_tablename = $wpdb->prefix."visitors_db"; //wp_visitors_db

    if ($wpdb->get_var("SHOW TABLES LIKE '$new_tablename'") != $new_tablename) {
        
        $charset_collate = $wpdb->get_charset_collate();

        $newdb_query="CREATE TABLE $new_tablename(
            id int(10) NOT NULL AUTO_INCREMENT,
            visitor varchar(255),
            email varchar(255),
            pass varchar(255),
            PRIMARY KEY (id),
            UNIQUE (email)          
        )  $charset_collate;";

        require_once( ABSPATH ."wp-admin/includes/upgrade.php" );
        dbDelta( $newdb_query );
    } else {

    }
}


?>
