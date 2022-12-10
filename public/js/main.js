$(".delete").on("click", function () {
    $.ajax({
        method: "DELETE",
        url: "http://127.0.0.1:8000/users/" + $(this).data("id"),
    })
        .done(function (response) {
            alert("success");
        })
        .fail(function (response) {
            alert("error");
        });
});
