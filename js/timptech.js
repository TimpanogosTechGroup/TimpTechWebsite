function _(id) { return document.getElementById(id);}

function submitFeedback() {
    _("submitFeedbackbtn").disabled = true;
    _("submitFeedbackbtn").innerHTML = "Submitting, please wait...";
    var formData = new FormData();
    formData.append("name", _("name").value);
    formData.append("email", _("email").value);
    formData.append("feedback", _("textFeedback").value);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "../scripts/sendFeedback.php");
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            if (ajax.responseText === "success") {
                _("feedbackForm").innerHTML = "<h2> Successfully sent :)</h2>";
                _("submitFeedbackbtn").innerHTML = ajax.responseText;
            } else {
                _("submitFeedbackbtn").disabled = false;
            }
        }
    };
    ajax.send(formData);
}