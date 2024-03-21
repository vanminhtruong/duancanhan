class Slide {
    static handleSlide(){
        $(document).ready(function() {

            $("#btnLogout").click(function(e) {
                e.preventDefault();
                logout();
                // checkCookie('username');
                // if ($.cookie('username') !== null) {
                //     // Nếu tồn tại, xóa cookie 'username'
                //     $.cookie('username', null, { path: '/jquery/java/login/', expires: -1 });
                // }
            });
        
            $("#btnLogin").click(function() {
                redirectToLogin();
            });
        
            function redirectToLogin() {
                // Chuyển hướng đến trang login.html
                window.location.href = "http://localhost:8081/QuanLyThuVien/login/";
                // console.log("hello world")
            }
        
            function logout() {
                $.ajax({
                    url: "http://localhost:8081/QuanLyThuVien/login/logout.php", // Tạo một file logout.php để xử lý đăng xuất
                    method: "POST",
                    success: function() {
                        // Chuyển hướng sau khi đăng xuất
                        alert("Đăng xuất thành công");
                        window.location.href = "http://localhost:8081/QuanLyThuVien/home/home/";
                        localStorage.removeItem("validatedCard");
                        localStorage.removeItem("isLogin");
                        
        
                    },
                    error: function() {
                        alert("An error occurred during the logout process.");
                    }
                });
            }
        
            var currentIndex = 0;
            var slideWidth = $('.slide').width();
            var totalSlides = $('.slide').length;
        
            $('#nextBtn').click(function() {
                if (currentIndex < totalSlides - 1) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateSlider();
            });
        
            $('#prevBtn').click(function() {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalSlides - 1;
                }
                updateSlider();
            });
        
            function updateSlider() {
                var translateValue = -currentIndex * slideWidth;
                $('#slider').css('transform', 'translateX(' + translateValue + 'px)');
            }
        });        
    }
}


export default Slide;

