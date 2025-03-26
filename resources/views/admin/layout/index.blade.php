<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <title>{{ isset($title) ? $title : 'Document' }} của  {{ Auth::user()->name }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('sgovn.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script src="{{ asset('asset/js/plugin/webfont/webfont.min.js') }} "></script>
    <script src="{{ asset('validator/validator.js') }} "></script>

    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('asset/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />
</head>
<style>
    /* Đặt cấu trúc cơ bản cho header *

        /* Đảm bảo rằng logo và các nút trong header không bị ẩn */

    /* Định dạng cho navbar */

    /* Media query cho màn hình nhỏ */
    /* @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column !important;
                /* Đảm bảo các mục trong navbar xếp theo hàng */


    /* Đảm bảo các nút không bị ẩn
        .nav-item {
             display: block !important;
             width: 100%;
         }
     } */

    .collapse {
        display: none;
    }

    .collapse.show {
        display: block;
    }

    #button-contact-vr {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 99999;
        /* Đảm bảo z-index cao hơn các phần tử khác */
    }

    #button-contact-vr .button-contact .phone-vr {
        position: relative;
        visibility: visible;
        background-color: transparent;
        /* width: 90px; */
        /* height: 90px; */
        cursor: pointer;
        z-index: 11;
        -webkit-backface-visibility: hidden;
        -webkit-transform: translateZ(0);
        transition: visibility .5s, transform 0.3s ease;
        left: 0;
        bottom: 0;
        display: block;
    }

    #button-contact-vr .button-contact .phone-vr:hover {
        transform: scale(1.1);
        /* Hiệu ứng phóng to khi hover */
    }

    #button-contact-vr .button-contact .phone-vr .phone-vr-img-circle {
        background: linear-gradient(135deg, #1dcaff 0%, #0a74da 100%);
        /* Thêm gradient cho nền nút */
        border-radius: 50%;
        padding: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        /* Hiệu ứng shadow */
    }

    #button-contact-vr .button-contact .phone-vr .phone-vr-img-circle img {
        width: 100%;
        /* Đảm bảo icon Zalo phù hợp với kích thước */
        height: auto;
    }

    #button-contact-vr .button-contact .phone-vr .phone-vr-circle-fill {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(29, 202, 255, 0.2);
        border-radius: 50%;
        animation: pulse 1.5s infinite;
        /* Hiệu ứng nhấp nháy */
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    #button-contact-vr .button-contact {
        position: relative;
        margin-top: -5px;
    }

    #floating-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        /* Màu xanh */
        color: white;
        border: none;
        border-radius: 50px;
        width: 60px;
        height: 60px;
        text-align: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        display: none;
        /* Ẩn nút ban đầu */
        z-index: 9999;
    }

    #floating-button i {
        font-size: 24px;
        line-height: 60px;
    }

    .phone-vr-img-circle img {
        width: 50px;
        /* Hoặc điều chỉnh kích thước theo ý bạn */
        height: auto;
        /* Giữ tỉ lệ */
    }
</style>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.layout.sidebar')

        <!-- End Sidebar -->

        <div class="main-panel">
            @include('admin.layout.header')


            <div class="container">
                <div id="button-contact-vr">
                    <div id="gom-all-in-one"><!-- v3 -->
                        <!-- zalo -->
                        <div id="zalo-vr" class="button-contact">
                            <div class="phone-vr">
                                <div class="phone-vr-img-circle">
                                    <a href="https://zalo.me/0981185620" target="_blank"
                                        style="display: inline-block;width: 100%;height: 100%;text-align: center;">
                                        <img alt="Zalo" style="width: 35px; height: auto;"
                                            src="{{ asset('zalo.png') }}">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- end zalo -->
                    </div><!-- end v3 class gom-all-in-one -->
                </div>
                @yield('content')
            </div>

            @include('admin.layout.footer')


        </div>

        <!-- Custom template | don't include it in your project! -->
        {{-- sss --}}
        <!-- End Custom template -->
    </div>

    <script src="{{ asset('asset/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('asset/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('asset/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('asset/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('asset/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('asset/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('asset/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('asset/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('asset/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('asset/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('asset/js/setting-demo.js') }}"></script>
    <script src="{{ asset('asset/js/demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#client_close').click(function() {
                $('#addClientModal').modal('hide');
            });

            $('#oa_close').click(function() {
                $('#addOAModal').modal('hide');
            });

            $('#toggleButton').click(function() {
                // Sử dụng jQuery để toggle (hiện/ẩn) container-fluid với hiệu ứng trượt
                $('#dropdownContent').slideToggle('fast'); // 'fast' hoặc 'slow' để điều chỉnh tốc độ
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Kiểm tra zalo oa

            $('#open-add-oa-modal').on('click', function() {
                $('#add-oa-form')[0].reset(); // Thay đổi thành id chính xác
                $('.invalid-feedback').hide();
                $('#addOAModal').modal('show');
            });
            // Sự kiện khi nhấn vào nút mở modal
            $('#open-add-modal').on('click', function() {
                $('#add-client-form')[0].reset();
                $('.invalid-feedback').hide(); // Ẩn tất cả các thông báo lỗi
                $('#addClientModal').modal('show'); // Hiển thị modal
            });

            // Sự kiện submit form
            $('#add-client-form').on('submit', function(e) {
                let username = "{{ Auth::user()->username }}";
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.{username}.store.store', ['username' => '__USERNAME__']) }}"
                        .replace('__USERNAME__', username),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response); // Kiểm tra phản hồi từ server
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công!',
                                text: 'Thêm khách hàng thành công',
                                showConfirmButton: false,
                                timer: 1500,
                                position: 'top-end',
                                toast: true
                            }).then(() => {
                                location.reload(); // Reload lại trang sau khi thông báo đóng
                            });

                            $('#addClientModal').modal('hide'); // Đóng modal khi thành công
                        } else {
                            console.log('Response failed:', response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi!',
                                text: response.message ||
                                    'Có lỗi xảy ra, vui lòng thử lại',
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.name) {
                                $('#name').addClass('is-invalid');
                                $('#name-error').text(errors.name[0]).show();
                            }
                            if (errors.phone) {
                                $('#phone').addClass('is-invalid');
                                $('#phone-error').text(errors.phone[0]).show();
                            }
                            if (errors.address) {
                                $('#address').addClass('is-invalid');
                                $('#address-error').text(errors.address[0]).show();
                            }
                            if (errors.email) {
                                $('#email').addClass('is-invalid');
                                $('#email-error').text(errors.email[0]).show();
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Thất bại!',
                                text: 'Thêm khách hàng thất bại',
                            });
                        }
                    }
                });
            });

            // Sự kiện submit form thêm oa
            $('#add-oa-form').on('submit', function(e) {
                let username = "{{ Auth::user()->username }}";
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.{username}.zalo.store', ['username' => Auth::user()->username]) }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công!',
                                text: 'Thêm OA mới thành công',
                                showConfirmButton: false,
                                timer: 1500,
                                position: 'top-end',
                                toast: true
                            });
                            $('#addOAModal').modal('hide');
                        } else {
                            console.log('Response Failed: ', response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Thất bại',
                                text: response.message ||
                                    'Có lỗi xảy ra, vui lòng thử lại',
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            if (errors.name) {
                                $('#oa_name').addClass('is-invalid');
                                $('#oa_name-error').text(errors.name[0]).show();
                            }

                            if (errors.oa_id) {
                                $('#oa_id').addClass('is-invalid');
                                $('#oa_id-error').text(errors.oa_id[0]).show();
                            }

                            if (errors.access_token) {
                                $('#access_token').addClass('is-invalid');
                                $('#access_token-error').text(errors.access_token[0]).show();
                            }

                            if (errors.refresh_token) {
                                $('#refresh_token').addClass('is-invalid');
                                $('#refresh_token-error').text(errors.refresh_token[0]).show();
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Thất bại!',
                                text: 'Thêm OA thất bại',
                            });
                        }
                    }
                });
            });
            // $('#zalo-vr .phone-vr-img-circle a').on('click', function(e) {
            //     e.preventDefault(); // Ngăn chặn hành động mặc định
            //     alert('Đã nhấn vào Zalo!'); // Hiển thị thông báo
            // });
        });
    </script>
</body>

</html>
