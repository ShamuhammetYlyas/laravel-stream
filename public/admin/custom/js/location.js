$(function() {

    // get country welayatlar
    $('#country').on('change', function(e){
        var country=e.target.value;
        if(country == "null" || country == "")
        {
            $('#welayat').empty();
            $('#welayat').append('<option value=""></option>');
            $('#welayat').attr("disabled", true);
        }
        else{
            try {
                $.get('/admin/get/welayat/' + country, function (data, status){
                    if(data.length > 0)
                    {
                        $('#welayat').attr("disabled", false);
                        $('#welayat').empty();
                        $('#welayat').append('<option value ="" selected></option>');                    
                        for (let i = 0; i < data.length; i++) {
                            $('#welayat').append('<option value ="'+data[i]['id']+'">'+data[i]['name_tk']+'</option>');
                        }
                    }
                    else
                    {
                        $('#welayat').empty();
                        $('#welayat').append('<option value=""></option>');
                        $('#welayat').attr("disabled", true);
                    }
                });    
            } catch (error) {
                console.log(error);
            }
        }

    });
    //get country welayatlar
})