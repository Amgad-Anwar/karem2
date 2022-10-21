
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

        let user_id = ele.attr("data-id");

        let cert_id = ele.attr("data-cert");

        cloneChatBox(user_id, cert_id, function () {

            let chatBox = $("#chat_box_" + user_id);
            let activChat = $('.active-chat');
            if(activChat != null) {
                activChat.removeClass('active-chat');
                activChat.addClass("d-none");
            }

            if(!chatBox.hasClass("active-chat")) {

                chatBox.addClass("active-chat").slideDown("fast");
                chatBox.removeClass("d-none").slideDown("fast");

                loadLatestMessages(chatBox, user_id,cert_id);

                chatBox.find(".chat-area").animate({scrollTop: chatBox.find(".chat-area").offset().top + chatBox.find(".chat-area").outerHeight(true)}, 800, 'swing');
            }
        });
    });


    // on change chat input text toggle the chat btn disabled state
    $(".chat_input").on("change keyup", function (e) {
        if($(this).val() != "") {
            $(this).parents(".chat-app-form").find(".btn-chat").prop("disabled", false);
        } else {
            $(this).parents(".chat-app-form").find(".btn-chat").prop("disabled", true);
        }
    });


    // on click the btn send the message
    $(".btn-chat").on("click", function (e) {
        sendchat($(this).attr('data-to-user'), $("#chat_box_" + $(this).attr('data-to-user')).find(".chat_input").val(),$(this).attr('data-cert'));
    });

    // listen for the send event, this event will be triggered on click the send btn
    channel.bind('Message.Replay', function(data) {
        displayReplayMessage(data);
    });
    channel.bind('message.send', function(data) {
        let user_id = data.user.id;
        let cert_id = data.message.certificate_descriptions_id;
        cloneChatBox(user_id, cert_id, function () {

            let chatBox = $("#chat_box_" + user_id);
            let activChat = $('.active-chat');
            if(activChat != null) {
                activChat.removeClass('active-chat');
                activChat.addClass("d-none");
            }

            if(!chatBox.hasClass("active-chat")) {

                chatBox.addClass("active-chat").slideDown("fast");
                chatBox.removeClass("d-none").slideDown("fast");

                loadLatestMessages(chatBox, user_id,cert_id);

                chatBox.find(".chat-area").animate({scrollTop: chatBox.find(".chat-area").offset().top + chatBox.find(".chat-area").outerHeight(true)}, 800, 'swing');
            }
        });
    });


    // handle the scroll top of any chat box
    // the idea is to load the last messages by date depending of last message
    // that's already loaded on the chat box
    let lastScrollTop = 0;

    $(".chat-area").on("scroll", function (e) {
        let st = $(this).scrollTop();

        if(st < lastScrollTop) {

            fetchOldMessages($(this).parents(".active-chat").find("#to_user_id").val(), $(this).find(".msg_container:first-child").attr("data-message-id"));
        }

        lastScrollTop = st;
    });

    // listen for the oldMsgs event, this event will be triggered on scroll top
    channel.bind('oldMsgs', function(data) {
        displayOldMessages(data);
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
function cloneChatBox(user_id, cert_id, callback)
{
    if($("#chat_box_" + user_id).length == 0) {

        let cloned = $("#chat_box").clone(true);

        // change cloned box id
        cloned.attr("id", "chat_box_" + user_id);


        cloned.find(".btn-chat").attr("data-to-user", user_id);

        cloned.find("#to_user_id").val(user_id);

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

function loadLatestMessages(container, user_id,cert_id)
{
    let chat_area = container.find(".chat-area");

    chat_area.html("");

    $.ajax({
        url: base_url + "/admin/chat/messages/"+user_id+'/'+cert_id ,
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
 * @param to_user
 * @param message
 * @param cert_id
 */
function sendchat(to_user, message, cert_id)
{
    let chat_box = $("#chat_box_" + to_user);
    let chat_area = chat_box.find(".chat-area");
    console.log('base_url')

    $.ajax({
        url: base_url + "/admin/chat/send",
        data: {to_user: to_user, cert: cert_id, message: message, _token: $("meta[name='csrf-token']").attr("content")},
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
            chat_area.animate({scrollTop: chat_area.offset().top + chat_area.outerHeight(true)}, 800, 'swing');
        },
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
 * @param to_user
 * @param old_message_id
 */
function fetchOldMessages(to_user, old_message_id)
{
    let chat_box = $("#chat_box_" + to_user);
    let chat_area = chat_box.find(".chat-area");

    $.ajax({
        url: base_url + "/fetch-old-messages",
        data: {to_user: to_user, old_message_id: old_message_id, _token: $("meta[name='csrf-token']").attr("content")},
        method: "GET",
        dataType: "json",
        beforeSend: function () {
            if(chat_area.find(".loader").length  == 0) {
                chat_area.prepend(loaderHtml());
            }
        },
        success: function (response) {
        },
        complete: function () {
            chat_area.find(".loader").remove();
        }
    });
}

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

        $("#chat_box_" + message.message.to_user).find(".chat-area").append(messageLine);

        $("#chat_box_" + message.message.to_user).find(".chat-area").scrollTop = $("#chat_box_" + message.message.to_user).find(".chat-area").scrollHeight;
    } else if($("#current_user").val() == message.message.to_user) {

        alert_sound.play();

        // for the receiver user check if the chat box is already opened otherwise open it
        cloneChatBox(message.message.to_user, message.user.name, function () {

            let chatBox = $("#chat_box_" + message.message.to_user);

            if(!chatBox.hasClass("active-chat")) {

                chatBox.addClass("active-chat").slideDown("fast");

                loadLatestMessages(chatBox, message.message.to_user, message.message.certificate_descriptions_id);

                chatBox.find(".chat-area").scrollIntoView();
            } else {

                let messageLine = getMessageReceiverHtml(message.message);

                // append the message for the receiver user
                $("#chat_box_" + message.message.to_user).find(".chat-area").append(messageLine);
            }
        });
    }
}

function displayOldMessages(data)
{
    if(data.data.length > 0) {

        data.data.map(function (val, index) {
            $("#chat_box_" + data.to_user).find(".chat-area").prepend(val);
        });
    }
}
