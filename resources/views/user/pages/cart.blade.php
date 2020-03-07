@extends('user.layout.app')
@section('title','| Cart')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/frontend/styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/frontend/styles/cart_responsive.css">
@endsection
@section('content')
    <!-- Cart -->
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>
                        <span id="status"></span>
                        <div class="cart_items">
                            <table id="cart" class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:18%" class="text-center">Subtotal</th>
                                    <th style="width:14%"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $total = 0 ?>

                                @if(session('cart'))
                                    @foreach((array) session('cart') as $id => $details)

                                        <?php $total += $details['price'] * $details['quantity'] ?>

                                        <tr class="cancel-tr">
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">${{ $details['price'] }}</td>
                                            <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                                            </td>
                                            <td data-th="Subtotal" class="text-center">$<span class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span></td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <i class="fas fa-spinner btn-loading" style="font-size:24px; display: none"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount cart-total">${{ $total }}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <a href="{{url('/')}}" role="button" class="btn btn-secondary">Add to Cart</a>
                            <a href="javascript:void(0);" onclick="cancel()"  class="btn btn-danger">Cancel Cart</a>
                            <button type="button" class="button cart_button_checkout">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('')}}/public/frontend/js/cart_custom.js"></script>
    <script type="text/javascript">
        function cancel(){
            swal({
                title: "Do you Want to cancel cart?",
                text: "Once You Delete, This will be Permanently Deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    var cart_total = $(".cart-total");
                    var calcen_tr= $('.cancel-tr');
                    console.log(calcen_tr);
                    if (willDelete) {
                        $.ajax({
                            url: '{{ url('cancel-cart') }}',
                            type: "GET",
                            dataType: "json",
                            success: function (response) {
                                $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                                $("#header-bar").html(response.data);
                                cart_total.text(response.total);
                                calcen_tr.remove();
                            }
                        });
                    } else {
                        swal("Safe Data!");
                    }
                });
        }

        $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            var parent_row = ele.parents("tr");
            var quantity = parent_row.find(".quantity").val();
            var product_subtotal = parent_row.find("span.product-subtotal");
            var cart_total = $(".cart-total");
            var loading = parent_row.find(".btn-loading");
            loading.show();
            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            var parent_row = ele.parents("tr");
            var cart_total = $(".cart-total");
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>
@endsection