var student;


$(document).ready(function () {
    $(".bi-floppy2-fill").click(function () {
        $(this).addClass("saved");

        var qID = $(this).attr('id');

        $.ajax({
            url: '/ajaxSave',
            type: 'POST',
            dataType: 'json',
            data: {
                'get_variable': qID
            },

            success: function (data, status) {

                student = data[0];
                
                var e = $(
                    '<div id="myModal" class="modal">\
                        <div class="modal-content">\
                            <div class="col">\
                                <button type="button" id="myBtn" class="btn btn-danger btn-sm float-end" style=" float:right">\
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">\
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>\
                                    </svg>\
                                </button >\
                            </div>\
                            <p class="mt-4 pt-4 border-top">Some text in the Modal..</p>\
                        </div>\
                    </div>'
                );

                $(e).attr('href', '/blog/' + student['id']);
                $('#brandname', e).html(student['brandname']);
                $('#student').append(e);

                $("#myBtn").click(function () {
                    $("#myModal").remove();
                });

            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });

});