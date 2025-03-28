<table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
    <thead>
        <tr>
            <th style="width: 5%;">STT</th>
            <th style="width: 17%;">Mã khách hàng</th>
            <th style="width: 25%;">Họ Tên</th>
            <th style="width: 20%;">Sản phẩm</th>
            <th style="width: 12%;">Thời gian</th>
            <th style="width: 20%; text-align: center;">Hành động</th>
        </tr>

    </thead>
    <tbody>
        @if ($stores && $stores->count() > 0)
            @php
                $stt = ($stores->currentPage() - 1) * $stores->perPage();
            @endphp
            @foreach ($stores as $value)
                @if (is_object($value))
                    <tr>
                        <td>{{ ++$stt }}</td>
                        <td>{{ $value->code ?? '' }}</td>
                        <td>{{ $value->name ?? '' }} <p>{{ $value->phone ?? '' }}</p></td>
                        <td>{{ $value->sanpham->name ?? ''}}</td>
                        <td>{{ $value->sanpham->warranty_period ?? '' }} Tháng</td>
                        {{-- <td>{{ $value->source ?? 'Thêm thủ công' }}</td> --}}

                        <td style="text-align:center">
                            <a class="btn btn-warning" href="javascript:void(0)" id="customer-detail"
                                data-id="{{ $value->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-danger btn-delete" data-id="{{ $value->id }}" href="#"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="9">
                    <div class="">
                        Chưa có khách hàng
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>
