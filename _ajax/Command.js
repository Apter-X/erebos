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

    if(e.keyCode == 13 && thisValue != ''){
        e.preventDefault();

        if(thisValue == 'clear'){
            output = [];
            $('.msg-group').html(output);
            Command.entry.val('');
            // Command.request(); //Leave the welcome message when clear
        }

        else if(thisValue == 'vim') {
            $('.msg-group').replaceWith('<textarea id="vim" class="msg-group"></textarea>');
            $('#vim').focus();
            $("#vim").css("background-color", "#152238");
            $("#vim").css('color', 'white');
            $("#vim").css("resize",'none');
            $("#vim").val('');
            
            $('.msg-group').bind('keydown',function(e){
                if(e.keyCode == 13 && $(this).val() != '' && e.shiftKey == true){
                    var command = thisValue.split(' ');
                    var content = $(this).val();

                    console.log(content + command[1] + command[2])

                    Command.vim(content, command[1], command[2]);
                    Command.entry.val('');
                    $('.msg-group').html(output);
                } 
            });
        } else {
            Command.request(thisValue);
        }
    }
});

Command.request();
