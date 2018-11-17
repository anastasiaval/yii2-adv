let conn = new WebSocket('ws://localhost:' + wsPort);
let btn = $('#send');
let input = $('#message');
let list = $('#chat');

conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    list.val(list.val() + '\n' + e.data);
};

btn.on('click', function () {
    conn.send(input.val());
});

