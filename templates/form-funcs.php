<?php

//---------------- Функции для обработки формы запроса ---------------------
function insert_my_data() {       //создает новую запись в таблице wp_new_db

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

function show_result() {        //выводит данные из таблицы wp_new_db, записанные во время отправки формы в файле 'contact-form.php'

    global $wpdb;
    $res_email = trim($_POST['useremail']);
    $table_result = $wpdb->prefix.'new_db';
    $results = $wpdb->get_row( "SELECT * FROM $table_result WHERE email = '$res_email' ;");

    echo '<p>Уважаемый(-ая):'.$results->person.'</p><p>Ваш запрос: '.$results->comment.'<br>уже обрабатывается.</p>
        <p>По результатам обработки менеджер свяжится с Вами по '.$results->contact.' </p>';
    echo '<p>----</p>
        <p>Спасибо за обращение и хорошего дня!</p><p>Для оформления нового запроса пройдите по <a href="?page_id=23">ссылке</a></p>';

}
//---------------- Функции для обработки формы запроса ---------------------


//---------------- Функции для обработки формы регистрации нового пользователя --------------------
function insert_visitor() {      //создает новую запись о пользователе в таблице wp_visitors_db

    global $wpdb;
    $tablename = $wpdb->prefix.'visitors_db';

    $new_visitor = $_POST['user_name']; 
    $new_email = $_POST['user_email'];
    $new_pass = $_POST['user_pass'];

    $pass_hashed = password_hash($new_pass, PASSWORD_DEFAULT);

    if(isset($_POST['submit'])) {
        
        $data = array('visitor' => $new_visitor, 'email' => $new_email, 'pass' => $pass_hashed );
        $format =  array( '%s', '%s', '%s');
        if (!$wpdb->insert($tablename, $data, $format)) {
            $_POST['user_email'] = '';
        } else {

        }
    }
}

function show_reg_result() {      //выводит данные из таблицы wp_visitors_db, записанные во время отправки формы в файле 'reg-form.php'

    global $wpdb;
    $reg_email = $_POST['user_email'];
    if ($reg_email !== '') {
        $table_result = $wpdb->prefix.'visitors_db';
        $results = $wpdb->get_row( "SELECT * FROM $table_result WHERE email = '$reg_email' ;");
        $_SESSION['visitor'] = $results->visitor;
        echo '<p>Уважаемый(-ая):'.$results->visitor.'</p><p>Вы успешно зарегистрированы.</p><p>Ваш логин:'.$results->email.'<br>Ваш зашифрованный пароль: '.$results->pass.' ('.$_POST['user_pass'].').</p>';
    } else {
        echo '<p>Пользователь с таким email уже существует</p><p><a href="">Войдите</a> с помощью пароля </p><p>Либо используйте другой email для регистрации.</p>';
    } 
}
//---------------- Функции для обработки формы регистрации нового пользователя --------------------

//---------------- Функция для обработки формы авторизации пользователя --------------------
function show_auth_result() {      //выводит данные из таблицы wp_visitors_db,если данные из формы 'auth-form.php' соответсвуют

    global $wpdb;
    $auth_email = trim($_POST['user_email']);
    $table_result = $wpdb->prefix.'visitors_db';
    $results = $wpdb->get_row( "SELECT * FROM $table_result WHERE email = '$auth_email' ;");

    if ($results) {
        if (password_verify($_POST['user_pass'], $results->pass)) {
            echo '<p>С возвращением, '.$results->visitor.'</p><p>Рады снова видеть Вас!</p>';
            $_SESSION['visitor'] = $results->visitor;
            echo '<h3>'.$_SESSION['visitor'].'</h3>';
        } else {
            echo 'Неправильный пароль!';
        }
    } else {
        echo 'Пользователь не существует!';
    }
}
//---------------- Функция для обработки формы авторизации пользователя --------------------

//---------------- Функция для отображения данных пользователя в личном кабинет (пока такие - надо думать над функционалом ЛК) --------------------
function show_settings() {

    global $wpdb;
    $visitor = $_SESSION['visitor'];
    $table_result = $wpdb->prefix.'visitors_db';
    $results = $wpdb->get_row( "SELECT * FROM $table_result WHERE visitor = '$visitor' ;");
    
    echo '<p>Уважаемый(-ая):'.$results->visitor.'</p><p>Проверьте ваши данные.</p><p>Ваш логин:'.$results->email.'<br>Ваш зашифрованный пароль: '.$results->pass.'.</p>';
    
}

?>