<section class="section hide-for-small" id="section_1759100511">
    <div class="bg section-bg fill bg-fill  bg-loaded">
    </div>
    <div class="section-content relative">

        <div class="woocommerce columns-4">
            <div
                class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights equalize-box">
                @foreach ($products as $product)
                <div
                    class="product-small col has-hover product type-product post-31618 status-publish first instock product_cat-giay product_cat-men product_cat-women product_tag-air-force-1-low-white product_tag-giay-sneaker product_tag-giay-sneaker-chinh-hang product_tag-nike has-post-thumbnail shipping-taxable purchasable product-type-variable">
                    <div class="col-inner">
                        <div class="isb_variable_group isb_left"></div>
                        <div class="product-small box">
                            <div class="box-image">
                                <div class="image-fade_in_back">
                                    <a href=""
                                        aria-label="">
                                            <img width="300" height="300" src="{{asset('public/uploads/product/' . $product->image)}}"   />
                                </div>
                                <div class="image-tools is-small top right show-on-hover">
                                </div>
                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                </div>
                                <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    <a href="{{route('shop.store',$product->id)}}" id="{{ $product->id }}"
                                        data-quantity="1"
                                        class="add-to-cart-grid no-padding is-transparent wp-element-button product_type_variable add_to_cart_button"
                                        data-product_id="31618"
                                        data-product_sku="905435-100 | 905435-101 | 315115-112 | CW2288-111 | DH2920-111"
                                        aria-label=""
                                        rel="nofollow">
                                        <div class="cart-icon tooltip is-small" title="Thêm vào giỏ hàng">
                                            <strong>+</strong></div>
                                    </a>
                                </div>
                            </div>
                            <div class="box-text box-text-products text-center grid-style-2">
                                <div class="title-wrapper">
                                    <p class="name product-title woocommerce-loop-product__title"><a
                                            href="{{route('showsanpham', [$product->id])}}"
                                            class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{$product->name}}</a></p>
                                </div>
                                <div class="price-wrapper">
                                    <span class="price"><span
                                           class="woocommerce-Price-amount amount"><bdi><del>{{number_format($product->price +100000) }}</del> VNĐ<span
                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                                        &ndash; <span class="woocommerce-Price-amount amount"><bdi> <td>{{number_format($product->price) }} VNĐ</td><span
                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- {{ $products->appends(request()->query()) }} --}}
            </div><!-- row -->
        </div>
    </div>


    <style>
        #section_1759100511 {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        #section_1759100511 .ux-shape-divider--top svg {
            height: 150px;
            --divider-top-width: 100%;
        }

        #section_1759100511 .ux-shape-divider--bottom svg {
            height: 150px;
            --divider-width: 100%;
        }
    </style>
</section>
