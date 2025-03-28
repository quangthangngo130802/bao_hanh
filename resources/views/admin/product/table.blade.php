<table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid"
    aria-describedby="basic-datatables_info">
    <thead>
        <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Tên sản phầm</th>
            <th>Thời gian bảo hành</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @if ($sanpham->count() > 0)
            @foreach ($sanpham as $key => $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->masp  }}</td>
                    <td>{{ $product->name  }}</td>
                    <td>{{ $product->warranty_period }} Tháng</td>
                    <td>
                        <a class="btn btn-warning btn-edit-product" href="javascript:void(0)" data-id="{{ $product->id }}"
                            data-name="{{ $product->name }}" data-masp="{{ $product->masp }}" data-warranty_period="{{ $product->warranty_period }}">
                            <i class="fa-solid fa-wrench"></i>
                        </a>
                        <a class="btn btn-danger btn-delete" data-id="{{ $product->id }}" href="#"><i
                                class="fa-solid fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">
                    Chưa có sản phẩm nào
                </td>
            </tr>
        @endif
    </tbody>
</table>
