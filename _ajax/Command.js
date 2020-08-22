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

            var spaceChar = entry.indexOf(" ");
            var cmd = entry.substring(0,spaceChar);

            if(cmd == "debug"){
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

Command.vim = function() {
    $('.msg-group').replaceWith('<textarea id="vim" class="msg-group"></textarea>');
    $('#vim').focus();
    $("#vim").css("background-color", "#152238");
    $("#vim").css('color', 'white');
    $("#vim").css("resize",'none');
    $("#vim").val('');

    $('.msg-group').bind('keydown',function(e){
        if(e.keyCode == 13 && $(this).val() != '' && e.shiftKey == true){
            e.preventDefault();
            val = $(this).val()

            $.ajax({
                type : 'POST',
                url : '_ajax/command.php',
                data: {
                    isTxt: true,
                    command: "vim" + " " + val + " " + "name" + " " + "doc3";
                },
                success : function(response){
                    console.log(response);
                    $('.msg-group').replaceWith('<div class="msg-group"></div>');
                    $('.input-group .form-control').focus();
                    output.push(response);

                    $('.msg-group').html(output);
                    $('.msg-group').animate({ scrollTop: 9999*9999 /* Temporary Solution */ }, 'fast');
                }
            });
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
            Command.vim();
            Command.entry.val('');
            $('.msg-group').html(output);
        } else {
            Command.request(thisValue);
        }
    }
});

Command.request();
