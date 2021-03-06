/**
 * Created by kilohertz on 09.03.17.
 */
var feedback = {
    send: function () {
        let query = 'name=' + document.querySelector('#ajax_name').value +
            '&email=' + document.querySelector('#ajax_email').value +
            '&phone=' + document.querySelector('#ajax_phone').value +
            '&text=' + document.querySelector('#ajax_comment').value;
        let xhr = ajax.ini();

        if (!document.querySelector('#ajax_name').value) {
            document.querySelector('#ajax_email_span').style.visibility = 'hidden';
            document.querySelector('#ajax_phone_span').style.visibility = 'hidden';

            document.querySelector('#ajax_name_span').style.visibility = 'visible';
            document.querySelector('#ajax_name_span').innerHTML ='Введите Ваше имя';
        }/*
        else if (!document.querySelector('#ajax_email').value) {
            document.querySelector('#ajax_name_span').style.visibility = 'hidden';
            document.querySelector('#ajax_phone_span').style.visibility = 'hidden';

            document.querySelector('#ajax_email_span').style.visibility = 'visible';
            document.querySelector('#ajax_email_span').innerHTML ='Введите Ваш адрес';
        }*/
        else if (!document.querySelector('#ajax_phone').value) {
            document.querySelector('#ajax_name_span').style.visibility = 'hidden';
            document.querySelector('#ajax_email_span').style.visibility = 'hidden';

            document.querySelector('#ajax_phone_span').style.visibility = 'visible';
            document.querySelector('#ajax_phone_span').innerHTML ='Введите номер телефона';
        }
        else if (!document.querySelector('#ajax_comment').value) {
            document.querySelector('#ajax_comment_span').style.visibility = 'hidden';
            document.querySelector('#ajax_comment_span').style.visibility = 'hidden';

            document.querySelector('#ajax_comment_span').style.visibility = 'visible';
            document.querySelector('#ajax_comment_span').innerHTML ='Введите сообщение';
        }
        else {
            ajax.send(xhr, 'POST', '/ajax/feedback/feedback.php', query, feedback.handler);
        }


    },
    handler: function (param) {
        let response = eval("(" + param.responseText + ")");//
        if (response.status == true) {
            alert('Ваш комментарий добавлен. Он появится в списке после проверки.');
            window.location.reload();
        }
    }
}