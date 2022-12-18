$(".delete").on("click", function () {
    $.ajax({
        method: "DELETE",
        url: "http://127.0.0.1:8000/users/" + $(this).data("id"),
    })
        .done(function (response) {
            alert("success");
            window.location.reload();
        })
        .fail(function (response) {
            alert("error");
        });
});

$(".delete1").on("click", function () {
    $.ajax({
        method: "DELETE",
        url: "http://127.0.0.1:8000/users/todolist/" + $(this).data("id"),
    })
        .done(function (response) {
            alert("success");
            window.location.reload();
        })
        .fail(function (response) {
            alert("error");
        });
});
