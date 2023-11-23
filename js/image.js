
var selDiv = "";
var storedFiles = [];
$(document).ready(function () {
  $("#img").on("change", handleFileSelect);
  selDiv = $("#selectedBanner");
});

function handleFileSelect(e) {
  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  filesArr.forEach(function (f) {
    if (!f.type.match("image.*")) {
      return;
    }
    storedFiles.push(f);

    var reader = new FileReader();
    reader.onload = function (e) {
      var html =
        '<img src="' +
        e.target.result +
        "\" data-file='" +
        f.name +
        "' style='border-radius: 50%; border: 1px solid cyan; padding: 3px;' class='avatar rounded lg' alt='Category Image' height='150px' width='150px'>";
      selDiv.html(html);
    };
    reader.readAsDataURL(f);
  });
}