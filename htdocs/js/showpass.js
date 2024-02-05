function ShowMe() {
  var get = document.getElementById("Password");
  if (get.type === "password") {
    get.type = "text";
  } else {
    get.type = "password";
  }
}
