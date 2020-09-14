function execute()
{
    $.ajax({
        type : 'POST',
        url : '_ajax/template.php',
        data: {
            isOn: true,
        },
        success : function(response)
        {
            $('.template').html(response);
        }
    })
};

execute();