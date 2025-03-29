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
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên khách hàng"
                        name="name">
                    <div class="error-message" id="nameError"></div>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="phone" placeholder="Số điện thoại bảo hành"
                        name="phone">
                    <div class="error-message" id="phoneError"></div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="address" rows="3" placeholder="Địa chỉ" name="address"></textarea>
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
    <script>
        document.getElementById("warrantyForm").addEventListener("submit", async function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let response = await fetch("http://127.0.0.1:8000/api/bao-hanh", {
                method: "POST",
                headers: {
                    "Accept": "application/json"
                },
                body: formData
            });

            if (response.ok) {
                alert("Thành công!");
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                alert("Có lỗi xảy ra: " + (result.message || "Không thể kích hoạt bảo hành."));
            }

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
