

<?php

function insert_my_data() {

    global $wpdb;
    $tablename = $wpdb->prefix.'new_db';

    $my_person = $_POST['username']; 
    $my_email = $_POST['useremail'];
    $my_phone = $_POST['userphone'];
    $my_contact = $_POST['via'];
    $my_comment = $_POST['usertext'];

    if(isset($_POST['submit'])) {
        
        $data = array('person' => $my_person, 'email' => $my_email, 'phone' => $my_phone, 'contact' => $my_contact, 'comment' => $my_comment );
        $format =  array( '%s', '%s', '%d', '%s', '%s');
        $wpdb->insert($tablename, $data, $format);

    }
}

function show_result() {

    global $wpdb;
    $res_email = trim($_POST['useremail']);
    $table_result = $wpdb->prefix.'new_db';
    $results = $wpdb->get_row( "SELECT * FROM $table_result WHERE email = '$res_email' ;");

    echo '<p>Уважаемый(-ая):'.$results->person.'</p><p>Ваш запрос: '.$results->comment.'<br>уже обрабатывается.</p>
        <p>По результатам обработки менеджер свяжится с Вами по '.$results->contact.' </p>';
    echo '<p>----</p>
        <p>Спасибо за обращение и хорошего дня!</p><p>Для оформления нового запроса пройдите по <a href="?page_id=23">ссылке</a></p>';

}

?>