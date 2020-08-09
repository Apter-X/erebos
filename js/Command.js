var Command = {}; //literal object

Command.response = function()
{
    $.ajax({ 
        type : 'POST',
        url : '_ajax/command.php',
        data : {method: 'response'},
        success : function(response)
        {
            $('.msg-group').html(response);
        }
    })
};

Command.request = function(){
    Command.entry.val('');
}

Command.entry = $('.input-group .form-control');

Command.entry.bind('keydown',function(e){
    if(e.keyCode == 13)
    {
        e.preventDefault();
        Command.request();
    }
});

Command.response();