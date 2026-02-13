
function validateForm() {
    let x = document.forms["farm"]["fotonaam[]"];
    if (x.length > 3) {
        alert("Maximaal 3 foto's");
        return false;
    }
}