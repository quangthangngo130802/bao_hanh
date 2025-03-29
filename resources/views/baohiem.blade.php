<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Ký Kích Hoạt Bảo Hành</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 30px;
        }

        .form-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
        }

        .form-title::before,
        .form-title::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 20%;
            height: 1px;
            background: #000;
        }

        .form-title::before {
            left: -105px;
        }

        .form-title::after {
            right: -105px;
        }

        .form-control {
            border-radius: 0;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-submit {
            background-color: #ff6600;
            color: #fff;
            font-weight: bold;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 0;
        }

        .btn-submit:hover {
            background-color: #e65c00;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h3 class="form-title">ĐĂNG KÝ KÍCH HOẠT BẢO HÀNH ONLINE</h3>
            <form id="warrantyForm">

                <div class="mb-3">
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên khách hàng" name="name">
                    <div class="error-message" id="nameError"></div>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="phone" placeholder="Số điện thoại bảo hành" name="phone">
                    <div class="error-message" id="phoneError"></div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="address" rows="3" placeholder="Địa chỉ"
                        name="address"></textarea>
                    <div class="error-message" id="addressError"></div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="masp" placeholder="Mã sản phẩm hoặc mã IMEI"
                        name="masp">
                    <div class="error-message" id="maspError"></div>
                </div>

                <div class="mb-3">
                    <select class="form-control" id="address_buy" name="address_buy">
                        <option value="">Nơi mua sản phẩm</option>
                        <option value="store1">Cửa hàng A</option>
                        <option value="store2">Cửa hàng B</option>
                        <option value="store3">Cửa hàng C</option>
                    </select>
                    <div class="error-message" id="addressBuyError"></div>
                </div>
                <button type="submit" class="btn btn-submit">KÍCH HOẠT BẢO HÀNH</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById("warrantyForm").addEventListener("submit", async function (event) {
            event.preventDefault();

            // Xóa thông báo lỗi cũ
            document.querySelectorAll(".error-message").forEach(el => el.textContent = "");

            // Lấy dữ liệu từ input
            let name = document.getElementById("name").value.trim();
            let phone = document.getElementById("phone").value.trim();
            let address = document.getElementById("address").value.trim();
            let masp = document.getElementById("masp").value.trim();
            let addressBuy = document.getElementById("address_buy").value;

            let isValid = true;

            // Validate input
            if (name === "") {
                document.getElementById("nameError").textContent = "Vui lòng nhập họ và tên.";
                isValid = false;
            }

            if (phone === "") {
                document.getElementById("phoneError").textContent = "Vui lòng nhập số điện thoại.";
                isValid = false;
            } else if (!/^\d{10,11}$/.test(phone)) {
                document.getElementById("phoneError").textContent = "Số điện thoại không hợp lệ.";
                isValid = false;
            }

            if (address === "") {
                document.getElementById("addressError").textContent = "Vui lòng nhập địa chỉ.";
                isValid = false;
            }

            if (masp === "") {
                document.getElementById("maspError").textContent = "Vui lòng nhập mã sản phẩm hoặc IMEI.";
                isValid = false;
            }

            if (addressBuy === "") {
                document.getElementById("addressBuyError").textContent = "Vui lòng chọn nơi mua sản phẩm.";
                isValid = false;
            }

            if (!isValid) return;

            // Gửi dữ liệu lên API
            let formData = new FormData(this);
                let response = await fetch("https://baohanh.aicrm.vn/api/bao-hanh", {
                    method: "POST",
                    headers: { "Accept": "application/json" },
                    body: formData
                });

                console.log(response);
                // let result = await response.json(); // Thêm dòng này để lấy dữ liệu phản hồi từ API

                if (response.ok) {
                    // Hiển thị thông báo thành công
                    Swal.fire({
                        icon: "success",
                        title: "Thành công!",
                        text: "Kích hoạt bảo hành thành công.",
                        timer: 1500,
                        showConfirmButton: false
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 1600);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Lỗi!",
                        text:  "Không thể kích hoạt bảo hành."
                    });
                }

        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
