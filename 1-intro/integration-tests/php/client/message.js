let SERVER_URL = "http://172.22.0.2/";

function load_messages() {
    $.getJSON( SERVER_URL, function( data ) {
        var items = [];
        $.each( data, function( key, val ) {
            if ("user" in val && "user" in val && "message" in val) {
                items.push( "<div id='" + val["id"] + "' class='list-group-item d-flex justify-content-between'><div class='user'>[" + val["user"] + "]:</div><div class='message'>" +  val["message"] + "</div></div>" );
            }
        });

        $("#messages").empty();

        $( "<ul/>", {
          "class": "message",
          html: items.join( "" )
        }).appendTo( "#messages" );
      });
}

function send_message(autor, message) {
    let url = SERVER_URL + "?url=Messenger/create/" + "user=" + autor + ":message=" + message;

    console.log(url);

    $.post(url, function( data ) {
        console.log('message send successfully.');
        load_messages();
    });
}

$( document ).ready(function() {
    $( "#message button" ).click(function() {
        send_message(
            $('#message_user').val(),
            $('#message_text').val(),
        );
    });
    load_messages();
});
