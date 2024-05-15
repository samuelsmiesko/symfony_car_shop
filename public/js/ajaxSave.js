var student;
var i;

$(document).ready(function(){
    $(".bi-floppy2-fill").click(function(){
        $(this).addClass("saved");
        
        var qID = $(this).attr('id');

        console.log(qID,"qid ");

            $.ajax({
                url: '/ajaxSave',
                type: 'POST',
                dataType: 'json',
                data: {
                    'get_variable': qID
                },
    
                success: function (data, status) {
                                //$("#student a").remove();
                                for (i = 0; i < data.length; i++) {
                                    student = data[i];
                                    console.log(student);
                                    var e = $(
                                        '<a>\
                                            <p>The id</p>\
                                        </a>'
                                        );
                
                                    $(e).attr('href', '/blog/' + student['id']);
                                    $('#brandname', e).html(student['brandname']); 
                                    
                                    $('#student').append(e);
                
                                    
                                }
                
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                alert('Ajax request failed.');
                            }
                        });
            });
            
        });
      
