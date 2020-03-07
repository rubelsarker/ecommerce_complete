<div class="cart_container d-flex flex-row align-items-center justify-content-end">
        <div class="dropdown">
            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </button>
            <div class="dropdown-menu" style="width: 400px; max-height: 600px; overflow-y: scroll">
                <div class="container-fluid">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>

                        <?php
                        $total = 0 ;
                        ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    <hr>

                    @if(session('cart'))
                        @foreach((array) session('cart') as $id => $details)
                            <div class="row p-3">
                                <div class="col-lg-4 col-sm-4 col-4">
                                    <img src="{{ URL::to($details['photo']) }}" width="75" height="60" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 ">
                                    <p class="m-0">{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span>
                                    <span class="text-muted"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
