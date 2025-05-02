
function validateForm() {
    var pass = document.querySelector('input[name="password"]').value;
    var repass = document.querySelector('input[name="repassword"]').value;
    var terms = document.querySelector('input[name="terms"]').checked;

    if (!terms) {
        alert("Bạn phải đồng ý với điều khoản sử dụng.");
        return false;
    }

    if (pass !== repass) {
        alert("Mật khẩu nhập lại không khớp.");
        return false;
    }

    return true;
}