$(document).ready(function () {

    output = "";
    $.ajax({
        url: "php/contact-list.php",
        type: "POST",
        dataType: "json",
        data: { submit: 'contact-list' },
        success: function (response) {

            if (response.success) {
                response.data.forEach((contact, index) => {
                    output += `
            <tr>
                <td>${index + 1}</td>
                <td class = "user_id"><a href='contact-view.php?contact=${contact.id}'><style>a{
                    color : black;
                }
                a:hover{
                    color : blue;
                }
                </style>
                ${contact.name}</td>
                <td>${contact.email}</td>
                <td>${contact.subject}</td>
                <td>
                <button id='message' data-id=${contact.id} class='btn btn-outline-success mt-2 mx-2' style=' color: #000;' data-bs-toggle='modal' data-bs-target='#MessageModal'><i class='fa-solid fa-envelope'></i></button><button class='btn mt-3 mx-2 mb-2 btn-outline-success' style='color: #000;'data-bs-toggle='modal' data-bs-target='#ReplyModal' data-bs-whatever='@getbootstrap'><i class='fa-solid fa-reply'></i></button><button class='btn btn-outline-danger mt-2 mx-2' style=' color: #000;' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></button>
                </td>
            </tr>

            `;
                });
                $("#contact-data").html(output);
            } else {

            }
        },
        error: function (error) {

        }

    });

    $("#previous-contacts").on("click", function () {
        previous = "";
        $.ajax({
            url: "php/contact-list.php",
            type: "POST",
            dataType: "json",
            data: { submit: 'contact-previous', email: contact_email },
            success: function (response) {
                if (response.success) {
                    response.data.forEach((contact, index) => {
                        previous += `
            <tr>
                <td>${index + 1}</td>
                <td>${contact.name}</td>
                <td>${contact.email}</td>
                <td>${contact.subject}</td>
                <td>${contact.created_at}</td>
               
            </tr>
            `;
                    });
                    $("#previous_data").html(previous);
                } else {

                }
            },
            error: function (error) {
                error = "some error occured";
            }
        });
    });

  
});
// });


