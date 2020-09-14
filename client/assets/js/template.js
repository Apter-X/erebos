var Template = {};

Template.execute = function()
{
    $.ajax({
        type : 'POST',
        url : '_ajax/template.php',
        data: {
            isOn: true,
        },
        success : function(response)
        {
            quot = response.replace(/&quot;/g, '"');
            esp = quot.replace(/&esp;/g, ' ');
            $('.template').html(esp);
        }
    })
};