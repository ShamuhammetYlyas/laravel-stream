$(function() {

    // get service categories
    $('#service').on('change', function(e){
        var service=e.target.value;
        if(service == "null")
        {
            $('#category').empty();
            $('#category').append('<option value=""></option>');
            $('#category').attr("disabled", true);

            $('#image').empty();
            $('#image').attr("disabled", true);
        }
        else{
            $.get('/admin/get/service-categories/' + service, function (data){
                if(data.length > 0)
                {
                    $('#category').attr("disabled", false);
                    $('#category').empty();
                    $('#category').append('<option value ="" selected></option>');

                    $("#order").empty();
                    $("#order").append('<option value ="" selected></option>');
                    
                    for (let i = 0; i < data.length; i++) {
                        let order = i+1;
                        $('#category').append('<option value ="'+data[i]['id']+'">'+data[i]['name_tk']+'</option>');
                        $('#order').append('<option value="'+data[i]['order']+'">'+order+'</option>');
                    }
                }
                else
                {
                    $('#category').empty();
                    $('#category').append('<option value=""></option>');
                    $('#category').attr("disabled", true);
    
                    $('#image').empty();
                    $('#image').attr("disabled", true);
                }
            });
        }

    });
    //get service categories


    //remove disable attr from file input
    $('#category').on('change', function(e){
        $('#image').attr("disabled", false);
        var category=e.target.value;
        $.get('/admin/get/category-subs/' + category, function (data){
            // console.log(data);
            if(data.length > 0)
            {
                $("#order").empty();
                $("#order").append('<option value ="" selected></option>');
                for (let i = 0; i < data.length; i++) {
                    let order = i+1;
                    $('#order').append('<option value="'+data[i]+'">'+order+'</option>');
                }
            }
            else
            {
                $("#order").empty();
                $("#order").append('<option value ="" selected></option>');
            }
        });
    });
    //remove disable attr from file input

})