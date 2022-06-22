

<form action="?page_id=45" method="post" name="order" onsubmit="return ConfirmOrder()"> <!--action="" прописать свой url-->
    <H3>Форма обратной связи</H3>
    
    <p><input type="text" name="username" id="username" placeholder="Имя" ></p>
    <p><input type="text" name="useremail" id="useremail" placeholder="Email" ></p>
    <p><input type="text" name="userphone" id="userphone" placeholder="Телефон" ></p>
    <p>Способ получения сообщений:  
    <select name="via" id="via">
    <option selected value="0">--------</option>
    <option value="e-mail">email</option>
    <option value="sms">SMS</option>
    <option value="whatsapp">WhatsApp</option>
    </select></p>
    <p><input type="text" name="usertext" id="usertext" placeholder="Сообщение" ></p>
    <button type="submit" name="submit">Отправить запрос</button>
</form>


<?php


function create_my_db() {

    global $wpdb;
    $new_tablename = $wpdb->prefix."new_db"; //wp_new_db

    if ($wpdb->get_var("SHOW TABLES LIKE '$new_tablename'") != $new_tablename) {

        $charset_collate = $wpdb->get_charset_collate();

        $newdb_query="CREATE TABLE $new_tablename(
            id int(10) NOT NULL AUTO_INCREMENT,
            person varchar(100) DEFAULT '',
            email varchar(100) DEFAULT '',
            phone varchar(100) DEFAULT '',
            contact varchar(100) DEFAULT '',
            comment varchar(100) DEFAULT '',
            PRIMARY KEY (id)          
        ) $charset_collate;";

        require_once( ABSPATH ."wp-admin/includes/upgrade.php" );
        dbDelta( $newdb_query );
    } else {

    }
}


?>







