@php
$version = $basicInfo->theme_version;

@endphp
@extends("frontend.layouts.layout-dashboard-v$version")


@section('content')
<!-- Body main wrapper start -->
<main>

    <!-- wishlist-area area start -->
    <div class="bd-wishlist-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-table-content table-responsive wow bdFadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Add to cart</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlists as $key => $wishlist)

                                @php
                                $property_content = $wishlist->property->getContent($language->id);
                                if (is_null($property_content)) {
                                $property_content = $property
                                ->propertyContents()
                                ->first();
                                }
                                @endphp
                                <tr>
                                    <td class="product-thumbnail"><a href="product-details.html">

                                            <img src="{{asset('assets/img/property/featureds/' . $wishlist->property->featured_image) }}" alt="img"></a></td>

                                    <td>
                                        <a href="{{ route('frontend.property.propertydetails', ['id' => $wishlist->property->id]) }}">
                                            {{ strlen(@$property_content->title) > 100 ? mb_substr(@$property_content->title, 0, 100, 'utf-8') . '...' : @$property_content->title }}

                                        </a>
                                    </td>

                                    <td>${{$wishlist->property->sqrPrice}}</td>

                                    <td><a href="cart.html" class="bd-btn btn-style btn-hover-x">Add
                                            to Cart</a></td>

                                    <td>${{$wishlist->property->expectedPrice}}</td>

                                    <td><button class="removeRow"><i class="fa fa-times"></i>
                                            Remove</button></td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-50 wow bdFadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                        <a class="bd-btn btn-style btn-hover-x" href="cart.html">Go To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist-area area end -->


</main>
<!-- Body main wrapper end -->
@endsection
