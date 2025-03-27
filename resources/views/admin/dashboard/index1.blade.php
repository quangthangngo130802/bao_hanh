@extends('admin.layout.index')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .swiper-container {
            width: 100%;
            height: 900px;
            overflow-x: hidden;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Bảng thống kê</h3>
            </div>
            {{-- <div class="ms-md-auto py-2 py-md-0">
          <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
          <a href="#" class="btn btn-primary btn-round">Add Customer</a>
        </div> --}}
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('admin.{username}.message.znsMessage', ['username' => Auth::user()->username]) }}"
                    class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Số tiền chi tiêu</p>
                                    <h4 class="card-title">{{ number_format($toleprice, 0, ',', '.') }} đ</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('admin.{username}.message.status', ['username' => Auth::user()->username, 'status' => 0]) }}"
                    class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">ZNS thất bại</p>
                                    <h4 class="card-title">{{ $fail }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('admin.{username}.message.status', ['username' => Auth::user()->username, 'status' => 1]) }}"
                    class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">ZNS thành công</p>
                                    <h4 class="card-title">{{ $success }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('admin.{username}.zalo.zns', ['username' => Auth::user()->username]) }}"
                    class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-user-tie"></i>

                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">OA</p>
                                    <h4 class="card-title">{{ $oa }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <div class="row">
            {{-- <div class="col-md-4">
          <div class="card card-round">
            <div class="card-body">
              <div class="card-head-row card-tools-still-right">
                <div class="card-title">Khách hàng mới</div>

              </div>
              <div class="card-list py-4">
               @forelse ($clients as $index =>  $item)
                    @if ($index <= 6)
                    <div class="item-list">
                        <div class="avatar">
                          <span
                            class="avatar-title rounded-circle border border-white"
                            >{{ $item->name[0] }}</span
                          >
                        </div>
                        <div class="info-user ms-3">
                          <div class="username">{{ $item->name }}</div>
                          <div class="status">{{ $item->phone }}</div>
                        </div>
                        <button class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </button>
                        <button class="btn btn-icon btn-link btn-danger op-8">
                          <i class="fas fa-ban"></i>
                        </button>
                      </div>
                    @endif
               @empty

               @endforelse
              </div>
            </div>
          </div>
        </div> --}}
            {{-- <div class="col-md-12">
          <div class="card card-round">
            <div class="card-header">
              <div class="card-head-row card-tools-still-right">
                <div class="card-title">Lịch sử liên hệ tư vấn</div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">

                <table class="table align-items-center mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Khách hàng</th>
                      <th scope="col" class="text-end">Ngày tạo</th>
                      <th scope="col" class="text-end">Tên gói</th>
                      <th scope="col" class="text-end" style="width: 140px;"  >Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($clients as $index =>  $item)
                    @if ($index <= 10)
                    <tr>
                        <th scope="row">
                            {{ $item->name }}
                        </th>
                        <td class="text-end">{{ $item->created_at->format('d-m-Y H:i:s') }}
                        </td>
                        <td class="text-end">{{ $item->package_name }}</td>
                        <td class="text-end">
                          <span class="badge badge-success">Completed</span>
                        </td>
                      </tr>
                    @endif
               @empty

               @endforelse

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> --}}
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($banners ?? [] as $banner)
                    <div class="swiper-slide">
                        <img src="{{ $banner }}">
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            {{--<div class="swiper-pagination"></div>--}}
        </div>
    </div>



    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true, // Vòng lặp slider
            autoplay: {
                delay: 3000, // Tự động chuyển slide sau 3 giây
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });
    </script>
@endsection
