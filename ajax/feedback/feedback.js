/**
 * Created by kilohertz on 09.03.17.
 */
var feedback = {
    send: function() {
        let query = 'name=' + document.querySelector('#ajax_name') +
                    '&email=' + document.querySelector('#ajax_email') +
                    '&phone=' + document.querySelector('#ajax_phone') +
                    '&text=' + document.querySelector('#ajax_comment');
        let xhr = ajax.ini();
        ajax.send(xhr, 'POST', '/ajax/feedback/feedback.php', query, feedback.handler);
    },
    handler: function(params) {
        console.log(params);
    }
}