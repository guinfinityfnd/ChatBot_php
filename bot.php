<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatbot</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Online Chat Bot</h2>
        </div>
        <div class="form">
            <div class="inbox">
                <div class="icon bot-icon">
                    <i class="fa fa-user pe-2"></i>
                </div>
                <div class="replyer">
                    <div class="bot-inbox text">
                        <p>I am ready now!. </p>
                    </div>
                </div>
            </div>
            <!-- <div class="user-field inbox">
                <div class="mes-sender">
                    <p>Hi anyone is there,how are you?. </p>
                </div>
            </div> -->
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input type="text" id="data" placeholder="Type here........" required>
                <button id="send">Send</button>
            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function() {
    $('#data').on('keyup', function() {
        if (event.keyCode === 13) {
            $val = $('#data').val();
            $message = ` <div class="user-field inbox">
                    <div class="mes-sender">
                        <p>` + $val + `</p>
                    </div>
                </div>`;
            $('.form').append($message);
            $('#data').val("");

            $.ajax({
                url: 'message.php',
                type: 'post',
                data: 'text=' + $val,
                success: function(result) {
                    $reply = `<div class="inbox">
                    <div class="icon bot-icon">
                        <i class="fa fa-user pe-2"></i>
                    </div>
                    <div class="replyer">
                        <div class="bot-inbox text">
                            <p>` + result + `</p>
                        </div>
                    </div>
                </div>`;
                    $('.form').append($reply);
                    //scrolling form to top
                    $('.form').scrollTop($('.form')[0].scrollHeight);
                }
            });
        }
    });
    return;
    $('#send').on('click', function() {
        $val = $('#data').val();
        $message = ` <div class="user-field inbox">
                    <div class="mes-sender">
                        <p>` + $val + `</p>
                    </div>
                </div>`;
        $('.form').append($message);
        $('#data').val("");

        $.ajax({
            url: 'message.php',
            type: 'post',
            data: 'text=' + $val,
            success: function(result) {
                $reply = `<div class="inbox">
                    <div class="icon bot-icon">
                        <i class="fa fa-user pe-2"></i>
                    </div>
                    <div class="replyer">
                        <div class="bot-inbox text">
                            <p>` + result + `</p>
                        </div>
                    </div>
                </div>`;
                $('.form').append($reply);
                //scrolling form to top
                $('.form').scrollTop($('.form')[0].scrollHeight);
            }
        });
    });
});
</script>

</html>