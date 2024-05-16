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
                                //for (i = 0; i < data.length; i++) {
                                    student = data[0];
                                    console.log(student);
                                    var e = $(
                                            // '<div class="modal" id="myModal">\
                                            //     <div class="modal-dialog">\
                                            //         <div class="modal-content">\
                                            //         <div class="modal-header">\
                                            //             <h4 class="modal-title">Modal Heading</h4>\
                                            //             <button type="button" class="btn-close" data-bs-dismiss="modal"></button>\
                                            //         </div>\
                                            //         <div class="modal-body">\
                                            //             Modal body..\
                                            //         </div>\
                                            //         <div class="modal-footer">\
                                            //             <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>\
                                            //         </div>\
                                            //         </div>\
                                            //     </div>\
                                            // </div>'
                                            '<p>Modal</p>'
                                        );
                
                                    $(e).attr('href', '/blog/' + student['id']);
                                    $('#brandname', e).html(student['brandname']); 
                                    
                                    $('#student').append(e);
                
                                    
                               // }
                
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                alert('Ajax request failed.');
                            }
                        });
            });
            
        });
      
