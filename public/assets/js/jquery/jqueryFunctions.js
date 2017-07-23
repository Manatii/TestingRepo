
   $('#region-province').on('change',function(){
            var data = $('#region-province').val();
            //alert(data);
            $.ajax({
               
                type: "GET",
                url:"/ads/loc-search-item-province",
                data: data,
                success: function(data){
                    
                    $('#townships').html(data);
                }
            });
        });