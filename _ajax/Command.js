var Command = {}; //literal object
var output = [];

Command.request = function(command)
{
    $.ajax({
        type : 'POST',
        url : '_ajax/command.php',
        data: {
            isOn: true,
            command: command
        },
        success : function(response)
        {
            entry = Command.entry.val();
            Command.entry.val('');

            var cmd = entry.split(' ');

            if(cmd[0] == "debug"){
                output.push(`
                <div class="card-body" id="padding">
                    <p class="card-text float-left">
                        ${command}
                    </p>
                `);

                $('.debug').html(response);
                $('.msg-group').html(output);
                $('.msg-group').animate({ scrollTop: 9999*9999 /* Temporary Solution */ }, 'fast');
            } 
            else 
            {
                output.push(response);

                $('.msg-group').html(output);
                $('.msg-group').animate({ scrollTop: 9999*9999 /* Temporary Solution */ }, 'fast');
            }
        }
    })
};

Command.vim = function(content, refKey, refValue) {
    $.ajax({
        type : 'POST',
        url : '_ajax/command.php',
        data: {
            isTxt: true,
            command: "vim" + " " + content + " " + refKey + " " + refValue
        },
        success : function(response){
            $('.msg-group').replaceWith('<div class="msg-group"></div>');
            $('.input-group .form-control').focus();
            output.push(response);

            $('.msg-group').html(output);
            $('.msg-group').animate({ scrollTop: 9999*9999 /* Temporary Solution */ }, 'fast');
        }
    });
}

Command.entry = $('.input-group .form-control');
Command.entry.bind('keydown',function(e){
    thisValue = $(this).val();
    splitValue = thisValue.split(' ');

    if(e.keyCode == 13 && thisValue != ''){
        e.preventDefault();

        if(splitValue[0] == 'clear'){
            output = [];
            $('.msg-group').html(output);
            Command.entry.val('');
            // Command.request(); //Leave the welcome message when clear
        }

        else if(splitValue[0] == 'vim') {
            $('.msg-group').replaceWith('<textarea id="vim" class="msg-group" placeholder="<Shift + Enter> to save OR <Ctrl + Enter> to cancel." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>');
            $('#vim').focus();
            $("#vim").css("background-color", "#152238");
            $("#vim").css('color', 'white');
            $("#vim").css("resize",'none');
            $("#vim").val('');
            Command.entry.val('');

            $.ajax({
                type : 'POST',
                url : '_ajax/command.php',
                data: {
                    isFetch: true,
                    command: "fetch content files " + splitValue[1] + " " + splitValue[2]
                },
                success : function(response)
                {
                    $("#vim").val(response.replace(/\s/g,''));
                    console.log(response);
                }
            });

            $('.msg-group').bind('keydown',function(e){
                if(e.keyCode == 13 && e.shiftKey == true){
                    var content = $(this).val();

                    Command.vim(content.replace(/\s/g,''), splitValue[1], splitValue[2]);
                    Command.entry.val('');
                    $('.msg-group').html(output);
                }
                else if(e.keyCode == 13 && e.ctrlKey == true){
                    $('.msg-group').replaceWith('<div class="msg-group"></div>');
                    $('.input-group .form-control').focus();

                    $('.msg-group').html(output);
                    $('.msg-group').animate({ scrollTop: 9999*9999 /* Temporary Solution */ }, 'fast');
                }
            });

        } else {
            Command.request(thisValue);
        }
    }
});

Command.request();
