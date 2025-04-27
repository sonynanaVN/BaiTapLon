document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("container");
    const registerBtn = document.getElementById("register");
    const loginBtn = document.getElementById("login");
    const guestLogin = document.getElementById("guestLogin"); // Đảm bảo tồn tại

    registerBtn.addEventListener("click", () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
    });

    let checkLogin = 0;
    let checkRegister = 0;
    let adminLoginAttempts = 0; // Biến đếm riêng cho Admin
    const maxError = 3; // Giới hạn số lần nhập sai

// Xử lý đăng nhập
const loginForm = document.getElementById("loginform");
if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const email = document.querySelector('.sign-in input[type="email"]').value.trim();
        const password = document.querySelector('.sign-in input[type="password"]').value.trim();

        if (email && password) {
            const formData = new FormData();
            formData.append("email", email);
            formData.append("password", password);

            fetch("login.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                if (data.includes("Đăng nhập thành công")) {
                    window.location.href = "/main/Main.html"; 
                }
            })
            .catch(error => {
                console.error(error);
                alert("Có lỗi xảy ra. Vui lòng thử lại!");
            });
        } else {
            alert("Vui lòng nhập đầy đủ email và mật khẩu!");
        }
    });
}



    // Xử lý đăng ký
    const registerForm = document.getElementById("registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function (e) {
            e.preventDefault();
    
            const name = this.querySelector("input[name='name']").value.trim();
            const email = this.querySelector("input[name='email']").value.trim();
            const password = this.querySelector("input[name='password']").value.trim();
    
            if (name && email && password) {
                const formData = new FormData();
                formData.append("name", name);
                formData.append("email", email);
                formData.append("password", password);
    
                fetch("register.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data.includes("Đăng ký thành công,vui lòng đăng nhập lại trên cổng login")) {
                        window.location.href = "/main/Main.html"; 
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert("Có lỗi xảy ra. Vui lòng thử lại!");
                });
            } else {
                alert("Vui lòng điền đầy đủ thông tin!");
            }
        });
    }
    

    // Xử lý đăng nhập admin
    const adminLoginForm = document.getElementById("adminLogin");
    if (adminLoginForm) {
        adminLoginForm.addEventListener("click", function (e) {
            e.preventDefault();

            const username = document.querySelector('.sign-in input[type="email"]').value.trim();
            const password = document.querySelector('.sign-in input[type="password"]').value.trim();

            if (username === "admin@gmail.com" && password === "admin") {
                alert("Đăng nhập thành công, chuyển tới trang quản lý với tư cách admin");
                setTimeout(() => {
                    window.location.href = "/Manager/manager.html";
                }, 1800);
            } else {
                adminLoginAttempts++;
                alert(`Thông tin đăng nhập với tư cách Admin không đúng. Lần thử: ${adminLoginAttempts}/${maxError}`);
                if (adminLoginAttempts >= maxError) {
                    alert("Bạn đã nhập sai quá nhiều lần!");
                    window.location.href = "/Error Page/index.html"; // Chuyển tới trang lỗi
                }
            }
        });
    }

    // Xử lý đăng nhập tư cách khách
    if (guestLogin) {
        guestLogin.addEventListener("click", function (e) {
            e.preventDefault();
            alert("Đang chuyển tới trang chủ với tư cách khách, vui lòng chờ trong vài giây");
            setTimeout(() => {
                window.location.href = "/main/Main.html";
            }, 3000);
        });
    }
});
