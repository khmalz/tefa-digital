$(document).ready(function () {
    let inputs = $("#input-limit, #description-limit");

    inputs.on("input", function () {
        let inputId = $(this).attr("id");
        let inputType = inputId === "input-limit" ? "inp" : "desc";
        runCalcs(inputId, inputType);
    });

    inputs.trigger("input");
});
let runCalcs = (id, type) => {
    let input = $(`#${id}`);
    let counter = $(`.counter-${type}`);
    let limit = input.data("limit");
    let remaining = limit - input.val().length;

    counter.text(Math.abs(remaining));
    input.toggleClass("is-over", remaining < 0);
    $(".submit").prop("disabled", remaining < 0);
};
