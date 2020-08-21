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
            else if(command == "clear") 
            {
                output = [];
                $('.msg-group').html(output);
                Command.request(); //Leave the welcome message when clear
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

Command.entry = $('.input-group .form-control');
Command.entry.bind('keydown',function(e){
    if(e.keyCode == 13 && $(this).val() != '')
    {
        e.preventDefault();
        Command.request($(this).val());
    }
});

Command.request();
