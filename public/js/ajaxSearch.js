    // var student;
    // var i;

    // function readyFn(jQuery) {
    //     console.log("work");
    //     var qID = $(this).attr('id');

    //     if (qID == null) {
    //         // @ts-ignore
    //         qID = 1;
    //     }

    //     console.log(qID,"qid ");

    //     $.ajax({
    //         url: '/',
    //         type: 'POST',
    //         dataType: 'json',
    //         data: {
    //             'get_variable': qID
    //         },

    //         success: function (data, status) {
    //             $("#student a").remove();
    //             for (i = 0; i < data.length; i++) {
    //                 student = data[i];
    //                 console.log(student);
    //                 var e = $(
    //                     '<a>\
    //                         <div class="bg-white rounded mt-4 box">\
    //                             <div class="row">\
    //                                     <div class="col-4 d-block justify-content-center">\
    //                                         <div class="d-flex justify-content-start p-3">\
    //                                             <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-currency-euro my-auto" viewBox="0 0 16 16">\
    //                                             <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936q-.002-.165.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.6 6.6 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z"/>\
    //                                             </svg>\
    //                                             <span id="price" class="ms-4 "></span>\
    //                                         </div>\
    //                                     <ul class="list-group list-group-flush my-auto ">\
    //                                         <li class="list-group-item">\
    //                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">\
    //                                         <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>\
    //                                         </svg>\
    //                                         <span id="brandname" class="ms-4 "></span><span> </span><span id="model" ></span>\
    //                                         </li>\
    //                                         <li class="list-group-item">\
    //                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">\
    //                                                 <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>\
    //                                                 </svg>\
    //                                                 <span id="modelyear" class="ms-4"></span>\
    //                                         </li>\
    //                                         <li class="list-group-item">\
    //                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">\
    //                                                 <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>\
    //                                                 <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>\
    //                                                 </svg>\
    //                                                 <span id="milage" class="ms-4"></span>\
    //                                         </li>\
    //                                         <li class="list-group-item">\
    //                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">\
    //                                                 <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>\
    //                                                 <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>\
    //                                                 </svg>\
    //                                                 <span id="status" class="ms-4"></span>\
    //                                         </li>\
    //                                     </ul>\
    //                                 </div>\
    //                                 <div class="col-8 d-flex justify-content-center">\
    //                                     <img id="image" src="" class="img-fluid " alt="Responsive image" style="height: 100%; width: auto;">\
    //                                 </div>\
    //                             </div>\
    //                         </div>\
    //                     </div>\
    //                     </a>'
    //                     );

    //                 $(e).attr('href', '/blog/' + student['id']);
    //                 $('#brandname', e).html(student['brandname']); 
    //                 $('#model', e).html(student['model']); 
    //                 $('#modelyear', e).html(student['modelyear']); 
    //                 $('#milage', e).html(student['milage']); 
    //                 $('#price', e).html(student['price']); 
    //                 $('#status', e).html(student['status']); 
    //                 $('#image', e).attr('src', student['image']);
    //                 $('#student').append(e);

                    
    //             }

    //         },
    //         error: function (xhr, textStatus, errorThrown) {
    //             alert('Ajax request failed.');
    //         }
    //     });

    // };

    // $(document).ready(readyFn);

    // $(".loadpage").on("click", readyFn);