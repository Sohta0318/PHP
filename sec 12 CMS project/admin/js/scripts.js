$(document).ready(function () {
  $("#summernote").summernote({
    height: 200,
  });

  $("#selectAllBoxes").click(function (event) {
    if (this.checked) {
      $(".checkBoxes").each(function () {
        this.checked = true;
      });
    } else {
      $(".checkBoxes").each(function () {
        this.checked = false;
      });
    }
  });

  const div_box = "<div id='load-screen'><div id='loading'></div></div>";
  $("body").prepend(div_box);
  $("#load-screen")
    .delay(700)
    .fadeOut(600, function () {
      $(this).remove();
    });

  function loadUserOnline() {
    $.get("functions.php?onlineusers=result", function (data) {
      $(".usersonline").text(data);
    });
  }

  setInterval(() => {
    loadUserOnline();
  }, 500);
});
