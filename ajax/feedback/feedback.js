/**
 * Created by kilohertz on 09.03.17.
 */
var feedback = {
    send: function() {
        let query = 'name=' + document.querySelector('#ajax_name').value +
                    '&email=' + document.querySelector('#ajax_email').value +
                    '&phone=' + document.querySelector('#ajax_phone').value +
                    '&text=' + document.querySelector('#ajax_comment').value;
        let xhr = ajax.ini();
        ajax.send(xhr, 'POST', '/ajax/feedback/feedback.php', query, feedback.handler);
    },
    handler: function(param) {
        let response = eval("(" + param.responseText + ")");//
        if (response.status == 'true') {alert('Ваш комментарий добавлен. Он появится в списке после проверки.');}
    }
}