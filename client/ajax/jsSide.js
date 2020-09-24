function execute()
{
    $.ajax({
        type : 'POST',
        url : 'ajax/phpSide.php',
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