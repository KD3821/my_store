
function ConfirmOrder() {
    let Confirm = "";
    let Help = "";
    with(document.forms.order) {

        if (document.forms.order.via.value==0 || document.forms.order.username.value.length==0 || document.forms.order.usertext.value.length==0 ||
            document.forms.order.userphone.value.length==0 ||document.forms.order.useremail.value.indexOf('@')==-1) {
            if (document.forms.order.useremail.value.indexOf('@')==-1) {
                alert("Здравствуйте! Для оформления заявки,\nпожалуйста, укажите корректный email.");
                return false;
            } else {
                alert("Здравствуйте! Для оформления заявки,\nпожалуйста, заполните все поля.");
                return false;
            }
        } else {
            if (document.forms.order.via.value=="e-mail") {
                Confirm = "Ваш запрос получен. Ожидайте ответа на эл.почту.";
                Help = "Если письма с ответом нет в течение 24 часов - проверьте папку СПАМ.";
            } else if (document.forms.order.via.value=="sms") {
                Confirm = "Ваш запрос получен. Ожидайте SMS на указанный номер.";
                Help = "Если СМС с ответом нет в течение 24 часов - отправьте СМС с текстом '1' на номер 2345. Сообщение бесплатное.";
            } else {
                Confirm = "Ваш запрос получен. Ожидайте сообщения в WhatsApp на указанный номер.";
                Help = "Если сообщения нет в течение 24 часов - отправьте в WhatsApp сообщение с текстом '1' на номер +74955552345.";
            }
            alert("Уважаемый(-ая) "+ document.forms.order.username.value +"\n" + Confirm+"\n" + Help);
            return true;
        }
    }
}
