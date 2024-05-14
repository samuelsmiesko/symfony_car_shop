$(document).ready(function(){
    $(".bi-floppy2-fill").click(function(){
        $(this).addClass("saved");
        
        var qID = $(this).attr('id');

        // if (qID == null) {
        //     // @ts-ignore
        //     qID = 1;
        // }

        console.log(qID,"qid ");
        
            
            $.ajax({
                        url: '/ajaxSearch',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'get_variable': qID
                        },
            
                        success: function (data, status) {
                            
                                var e = $(
                                    '<div class="modal" tabindex="-1">\
                                        <div class="modal-dialog">\
                                            <div class="modal-content">\
                                            <div class="modal-header">\
                                                <h5 class="modal-title">Modal title</h5>\
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>\
                                            </div>\
                                            <div class="modal-body">\
                                                <p>Modal body text goes here.</p>\
                                            </div>\
                                            <div class="modal-footer">\
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>\
                                                <button type="button" class="btn btn-primary">Save changes</button>\
                                            </div>\
                                            </div>\
                                        </div>\
                                        </div>'
                                    );
            
                                
                                $('body').append(e);
            
                        },
                        // error: function (xhr, textStatus, errorThrown) {
                        //     alert('Ajax request failed.');
                        // }
                    });
            
                });
                

                
        });
