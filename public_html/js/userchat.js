
$(function () {

    let pusher = new Pusher($("#pusher_app_key").val(), {
        cluster: $("#pusher_cluster").val(),
        encrypted: false
    });

    let channel = pusher.subscribe('UPI-acd-001');



    // on click on any chat btn render the chat box
    $(".chat-toggle").on("click", function (e) {
        e.preventDefault();

        let ele = $(this);

        let cert_id = $('#cert_id').val();

        cloneChatBox( cert_id, function () {

            let chatBox = $("#chat_box");
            loadLatestMessages(chatBox,cert_id);
            let chat_area = chatBox.find(".chat-area");
            chat_area.scrollTop = chat_area.scrollHeight;
        });
    });


    /**
     * on change chat input text toggle the chat btn disabled state
     */
    $(".chat_input").on("change keyup", function (e) {
        if($(this).val() != "") {
            $(this).parents(".chat-app-form").find(".btn-chat").prop("disabled", false);
        } else {
            $(this).parents(".chat-app-form").find(".btn-chat").prop("disabled", true);
        }
    });


    // on click the btn send the message
    $(".btn-chat").on("click", function (e) {
        sendchat($(this).attr('data-from-user'), $("#chat_box").find(".chat_input").val(),$(this).attr('data-cert'));
    });

    // listen for the send event, this event will be triggered on click the send btn
    channel.bind('message.send', function(data) {
        displayReplayMessage(data);
    });



    // handle the scroll top of any chat box
    // the idea is to load the last messages by date depending of last message
    // that's already loaded on the chat box
    let lastScrollTop = 0;

    $(".chat-area").on("scroll", function (e) {
        let st = $(this).scrollTop();

        if(st < lastScrollTop) {

            fetchOldMessages($(this).parents(".active-chat").find("#from_user_id").val(), $(this).find(".msg_container:first-child").attr("data-message-id"));
        }

        lastScrollTop = st;
    });

    // listen for the oldMsgs event, this event will be triggered on scroll top
    channel.bind('oldMsgs', function(data) {
        displayOldMessages(data);
    });
    channel.bind('Message.Replay', function(data) {
        let cert_id = $('#cert_id').val();

        cloneChatBox( cert_id, function () {

            let chatBox = $("#chat_box");
            loadLatestMessages(chatBox,cert_id);
            let chat_area = chatBox.find(".chat-area");
            chat_area.scrollTop = chat_area.scrollHeight;
        });
    });
});

/**
 * loaderHtml
 *
 * @returns {string}
 */
function loaderHtml() {
    return '<i class="glyphicon glyphicon-refresh loader"></i>';
}

/**
 * cloneChatBox
 *
 * this helper function make a copy of the html chat box depending on receiver user
 * then append it to 'chat-overlay' div
 *
 * @param user_id
 * @param cert_id
 * @param callback
 */
function cloneChatBox( cert_id, callback)
{
    if($("#chat_box").length == 0) {

        let cloned = $("#chat_box").clone(true);

        // change cloned box id
        cloned.attr("id", "chat_box");




        $("#chat-overlay").append(cloned);
    }

    callback();
}

/**
 * loadLatestMessages
 *
 * this function called on load to fetch the latest messages
 *
 * @param container
 * @param user_id
 */
var base_url = window.location.origin;

function loadLatestMessages(container,cert_id)
{
    let chat_area = container.find(".chat-area");

    chat_area.html("");

    $.ajax({
        url: base_url + "/user/chat/messages/"+cert_id ,
        method: "GET",
        dataType: "json",
        beforeSend: function () {
            if(chat_area.find(".loader").length  == 0) {
                chat_area.html(loaderHtml());
            }
        },
        success: function (response) {
            if(response.state == 1) {
                response.messages.map(function (val, index) {
                    $(val).appendTo(chat_area);
                });
            }
        },
        complete: function () {
            chat_area.find(".loader").remove();
            chat_area.scrollTop = chat_area.scrollHeight;
        }
    });
}

/**
 * send
 *
 * this function is the main function of chat as it send the message
 *
 * @param from_user
 * @param message
 * @param cert_id
 */
function sendchat(from_user, message, cert_id)
{
    let chat_box = $("#chat_box");
    let chat_area = chat_box.find(".chat-area");
    console.log('base_url')

    $.ajax({
        url: base_url + "/user/chat/send",
        data: {from_user: from_user, cert: cert_id, message: message, _token: $("meta[name='csrf-token']").attr("content")},
        method: "POST",
        dataType: "json",
        beforeSend: function () {
            if(chat_area.find(".loader").length  == 0) {
                chat_area.append(loaderHtml());
            }
        },
        success: function (response) {
        },
        complete: function () {
            chat_area.find(".loader").remove();
            chat_box.find(".btn-chat").prop("disabled", true);
            chat_box.find(".chat_input").val("");
            chat_area.scrollTop = chat_area.scrollHeight;        },
        error: function(xhr,textStatus,err)
        {
            console.log("readyState: " + xhr.readyState);
            console.log("responseText: "+ xhr.responseText);
            console.log("status: " + xhr.status);
            console.log("text status: " + textStatus);
            console.log("error: " + err);
        }
    });
}

/**
 * fetchOldMessages
 *
 * this function load the old messages if scroll up triggerd
 *
 * @param from_user
 * @param old_message_id
 */
// function fetchOldMessages(from_user, old_message_id)
// {
//     let chat_box = $("#chat_box_" + from_user);
//     let chat_area = chat_box.find(".chat-area");
//
//     $.ajax({
//         url: base_url + "/fetch-old-messages",
//         data: {from_user: from_user, old_message_id: old_message_id, _token: $("meta[name='csrf-token']").attr("content")},
//         method: "GET",
//         dataType: "json",
//         beforeSend: function () {
//             if(chat_area.find(".loader").length  == 0) {
//                 chat_area.prepend(loaderHtml());
//             }
//         },
//         success: function (response) {
//         },
//         complete: function () {
//             chat_area.find(".loader").remove();
//         }
//     });
// }

/**
 * getMessageSenderHtml
 *
 * this is the message template for the sender
 *
 * @param message
 * @returns {string}
 */
function getMessageSenderHtml(message)
{
    return `
<div class="chat">
        <div class="chat-body">
            <div class="chat-content">
                <p>${message.message}</p>
            </div>
        </div>
    </div>
    `;
}

/**
 * getMessageReceiverHtml
 *
 * this is the message template for the receiver
 *
 * @param message
 * @returns {string}
 */
function getMessageReceiverHtml(message)
{
    return `
           <div class="chat">
        <div class="chat-body">
            <div class="chat-content">
                <p>${message.message}</p>
            </div>
        </div>
    </div>

    `;
}

/**
 * This function called by the send event triggered from pusher to display the message
 *
 * @param message
 */
function displayReplayMessage(message)
{
    console.log(message);

    let alert_sound = document.getElementById("chat-alert-sound");

    if($("#current_user").val() == message.user.id) {

        let messageLine = getMessageSenderHtml(message.message);

        $("#chat_box").find(".chat-area").append(messageLine);

        let chat_area = $("#chat_box").find(".chat-area");
        chat_area.scrollTop = chat_area.scrollHeight;
    } else if($("#current_user").val() == message.message.to_user) {

        alert_sound.play();

        // for the receiver user check if the chat box is already opened otherwise open it
        cloneChatBox(message.message.certificate_descriptions_id, function () {
            let chatBox = $("#chat_box");
            loadLatestMessages(chatBox, message.message.certificate_descriptions_id);
            let chat_area = chatBox.find(".chat-area");
            chat_area.scrollTop = chat_area.scrollHeight;

        });
    }
}

function displayOldMessages(data)
{
    if(data.data.length > 0) {

        data.data.map(function (val, index) {
            $("#chat_box").find(".chat-area").prepend(val);
        });
    }
}
