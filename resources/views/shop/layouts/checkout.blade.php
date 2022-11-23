{{--
    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title">Thông Tin Cơ Bản</h4>
                            <form class="checkout-form" method="POST"  >
                                @csrf
                                @if (isset(
        Auth()->guard('customers')->user()->name,
    ))
                                    <div class="form-group">
                                        <label for="full_name">Họ Và Tên</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ Auth()->guard('customers')->user()->name }}" id="full_name"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_address">Địa Chỉ Giao Hàng</label>
                                        <input name="address" type="text" class="form-control"
                                            value="{{ Auth()->guard('customers')->user()->address }}" id="user_address"
                                            placeholder="">
                                    </div>
                                    <div class="checkout-country-code clearfix">
                                        <div class="form-group">
                                            <label for="user_post_code">Số điện thoại</label>
                                            <input name="phone" type="text" class="form-control"
                                                value="{{ Auth()->guard('customers')->user()->phone }}" id="user_post_code">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_city">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth()->guard('customers')->user()->email }}" id="user_city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_country">Ghi chú*</label>
                                        <input type="text" class="form-control" id="user_country" name="note">
                                    </div>

                                        <a href="{{ route('checkOuts') }}" class="btn btn-main pull-right">Checkout</a>
                                      <button type="submit" class="btn btn-main mt-20">Đặt Hàng</button>
                                @else
                                <h4>Vui lòng đăng nhập trước khi thanh toán nhé</h4>
                                <a href="{{ route('viewlogin') }}" class="btn btn-main">Đăng Nhập</a>
                                @endif

                        </div>
                    </div>

                    @php $totalAll = 0 @endphp

                    <div class="block">
                        <h4 class="widget-title">Tóm Tắt</h4>
                        <div class="media product-card">
                            <div class="media-body">
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php
                                            $total = $details['price'] * $details['amount'];
                                            $totalAll += $total;
                                        @endphp
                                            <input type="hidden" value="{{ $id }}"
                                            name="product_id[]">{{ $details['nameVi'] ?? '' }} x
                                            <input type="hidden" value="{{ $details['amount'] }}"
                                            name="amount[]">{{ $details['amount'] ?? '' }}
                                        <p class="price">Số Lượng: {{ $details['amount'] }}</p>
                                        <p class="">Giá: {{ number_format($details['price']) }}</p>
                                        <td><input type="hidden" value="{{ $total }}"
                                            name="total[]">{{ number_format($total) }}.vnd</td>
                                    @endforeach
                                @endif
                                <hr>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><input type="hidden" name="totalAll"
                                            value="{{ $totalAll }}">{{ number_format($totalAll) }}.vnd</td>
                                </tr>
                            </div>
                        </div>
                        <div class="discount-code">

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> --}}





<!DOCTYPE html>
<!--[if IE 9 ]> <html lang="vi" prefix="og: https://ogp.me/ns#" class="ie9 loading-site no-js"> <![endif]-->
<!--[if IE 8 ]> <html lang="vi" prefix="og: https://ogp.me/ns#" class="ie8 loading-site no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="vi" prefix="og: https://ogp.me/ns#" class="loading-site no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <script>
        (function(html) {
            html.className = html.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement);
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Search Engine Optimization by Rank Math - https://s.rankmath.com/home -->
    <title>Cart</title>
    <meta name="robots" content="noindex, follow" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Cart" />
    <meta property="og:url" content="https://sneakerholicvietnam.vn/cart-2/" />
    <meta property="og:site_name" content="Sneakerholic Vietnam" />
    <meta property="article:publisher" content="https://www.facebook.com/sneakerholicvn" />
    <meta property="og:image"
        content="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png" />
    <meta property="og:image:secure_url"
        content="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:image:alt" content="sneakerholic logo" />
    <meta property="og:image:type" content="image/png" />
    <meta property="article:published_time" content="2015-11-19T10:40:52+07:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Cart" />
    <meta name="twitter:image"
        content="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png" />
    <meta name="twitter:label1" content="Time to read" />
    <meta name="twitter:data1" content="Less than a minute" />
    <script type="application/ld+json" class="rank-math-schema">{"@context":"https://schema.org","@graph":[{"@type":"Place","@id":"https://sneakerholicvietnam.vn/#place","address":{"@type":"PostalAddress","streetAddress":"425/16 Nguy\u1ec5n \u0110\u00ecnh Chi\u1ec3u","addressLocality":"Ph\u01b0\u1eddng 5, Qu\u1eadn 3","addressRegion":"TP.HCM","postalCode":"700000","addressCountry":"Vi\u1ec7t Nam"}},{"@type":"Organization","@id":"https://sneakerholicvietnam.vn/#organization","name":"Sneakerholic Vietnam","url":"https://sneakerholicvietnam.vn","address":{"@type":"PostalAddress","streetAddress":"425/16 Nguy\u1ec5n \u0110\u00ecnh Chi\u1ec3u","addressLocality":"Ph\u01b0\u1eddng 5, Qu\u1eadn 3","addressRegion":"TP.HCM","postalCode":"700000","addressCountry":"Vi\u1ec7t Nam"},"logo":{"@type":"ImageObject","@id":"https://sneakerholicvietnam.vn/#logo","url":"https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/Logo.-SneakerHolic.-RGB-07.jpg","contentUrl":"https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/Logo.-SneakerHolic.-RGB-07.jpg","caption":"Sneakerholic Vietnam","inLanguage":"vi","width":"1182","height":"1183"},"contactPoint":[{"@type":"ContactPoint","telephone":"0705185731","contactType":"customer support"}],"location":{"@id":"https://sneakerholicvietnam.vn/#place"}},{"@type":"WebSite","@id":"https://sneakerholicvietnam.vn/#website","url":"https://sneakerholicvietnam.vn","name":"Sneakerholic Vietnam","publisher":{"@id":"https://sneakerholicvietnam.vn/#organization"},"inLanguage":"vi"},{"@type":"ImageObject","@id":"https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png","url":"https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png","width":"600","height":"315","caption":"sneakerholic logo","inLanguage":"vi"},{"@type":"WebPage","@id":"https://sneakerholicvietnam.vn/cart-2/#webpage","url":"https://sneakerholicvietnam.vn/cart-2/","name":"Cart","datePublished":"2015-11-19T10:40:52+07:00","dateModified":"2015-11-19T10:40:52+07:00","isPartOf":{"@id":"https://sneakerholicvietnam.vn/#website"},"primaryImageOfPage":{"@id":"https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png"},"inLanguage":"vi"},{"@type":"Person","@id":"https://sneakerholicvietnam.vn/author/user/","name":"user","url":"https://sneakerholicvietnam.vn/author/user/","image":{"@type":"ImageObject","@id":"https://secure.gravatar.com/avatar/b58996c504c5638798eb6b511e6f49af?s=96&amp;d=mm&amp;r=g","url":"https://secure.gravatar.com/avatar/b58996c504c5638798eb6b511e6f49af?s=96&amp;d=mm&amp;r=g","caption":"user","inLanguage":"vi"},"sameAs":["https://sneakerholicvietnam.vn/"],"worksFor":{"@id":"https://sneakerholicvietnam.vn/#organization"}},{"@type":"Article","headline":"Cart","datePublished":"2015-11-19T10:40:52+07:00","dateModified":"2015-11-19T10:40:52+07:00","author":{"@id":"https://sneakerholicvietnam.vn/author/user/"},"publisher":{"@id":"https://sneakerholicvietnam.vn/#organization"},"name":"Cart","@id":"https://sneakerholicvietnam.vn/cart-2/#richSnippet","isPartOf":{"@id":"https://sneakerholicvietnam.vn/cart-2/#webpage"},"image":{"@id":"https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/sneakerholic-logo.png"},"inLanguage":"vi","mainEntityOfPage":{"@id":"https://sneakerholicvietnam.vn/cart-2/#webpage"}}]}</script>
    <!-- /Rank Math WordPress SEO plugin -->

    <link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />
    <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />

    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/cart-frontend.js?ver=6d77f57ad4d2f28e9fae7e9327b354c9'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/react.min.js?ver=17.0.1' as='script'
        rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0' as='script'
        rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/blocks-checkout.js?ver=1aeb3f9cd2b4952d3b7c658c3ac54767'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-registry.js?ver=b6339851784e6ad947a8015afb8847ff'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/data.min.js?ver=d8cf5b24f99c64ae47d6' as='script'
        rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/compose.min.js?ver=37228270687b2a94e518'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/deprecated.min.js?ver=6c963cb9494ba26b77eb'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/dom.min.js?ver=133a042fbbef48f38107' as='script'
        rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/element.min.js?ver=47162ff4492c7ec4956b'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/react-dom.min.js?ver=17.0.1' as='script'
        rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/escape-html.min.js?ver=03e27a7b6ae14f7afaa6'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/is-shallow-equal.min.js?ver=20c2b06ecf04afb14fee'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/keycodes.min.js?ver=6e0aadc0106bd8aadc89'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/priority-queue.min.js?ver=99e325da95c5a35c7dc2'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/redux-routine.min.js?ver=c9ea6c0df793258797e6'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-settings.js?ver=7b2188da90828d22e68dae2a8129bd03'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/api-fetch.min.js?ver=bc0029ca2c943aec5311'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/primitives.min.js?ver=ae0bece54c0487c976b1'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/warning.min.js?ver=4acee5fc2fd9a24cefc2'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-data.js?ver=7318f17e99fb56cda4dd7e6fbc16db3c'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/data-controls.min.js?ver=e10d473d392daa8501e8'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/html-entities.min.js?ver=36a4a255da7dd2e1bf8e'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/notices.min.js?ver=9c1575b7a31659f45a45'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-middleware.js?ver=cfefc68c23f627155c81d4aa8d2dbf3c'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-shared-context.js?ver=65e3c38669e82f3ed75ea378b29997f0'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-shared-hocs.js?ver=55647c9b478bc30776b5c52dc41b4954'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/price-format.js?ver=e99bed7a5cf7f43aadbce4396ccbcc5e'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/a11y.min.js?ver=ecce20f002eda4c19664'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/dom-ready.min.js?ver=392bdd43726760d1f3ca'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/autop.min.js?ver=43197d709df445ccf849'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/block-editor.min.js?ver=0c7c9b9a74ceb717d6eb'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/blob.min.js?ver=a078f260190acf405764'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/blocks.min.js?ver=69022aed79bfd45b3b1d'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-includes/js/dist/block-serialization-default-parser.min.js?ver=eb2cdc8cd7a7975d49d9'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/shortcode.min.js?ver=7539044b04e6bca57f2e'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/components.min.js?ver=4b876f1ff2e5c93b8fb1'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/date.min.js?ver=ce7daf24092d87ff18be'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/moment.min.js?ver=2.29.4' as='script'
        rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/rich-text.min.js?ver=c704284bebe26cf1dd51'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/keyboard-shortcuts.min.js?ver=b696c16720133edfc065'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/style-engine.min.js?ver=10341d6e6decffab850e'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/token-list.min.js?ver=f2cf0bb3ae80de227e43'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/wordcount.min.js?ver=feb9569307aec24292f2'
        as='script' rel='prefetch' />
    <link href='https://sneakerholicvietnam.vn/wp-includes/js/dist/plugins.min.js?ver=0d1b90278bae7df6ecf9'
        as='script' rel='prefetch' />
    <link
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/checkout-frontend.js?ver=a4392447bf571a544c579a23dd39b854'
        as='script' rel='prefetch' />
    <link rel='prefetch'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/chunk.countup.js?ver=3.16.0' />
    <link rel='prefetch'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/chunk.sticky-sidebar.js?ver=3.16.0' />
    <link rel='prefetch'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/chunk.tooltips.js?ver=3.16.0' />
    <link rel='prefetch'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/chunk.vendors-popups.js?ver=3.16.0' />
    <link rel='prefetch'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/chunk.vendors-slider.js?ver=3.16.0' />
    <link rel="alternate" type="application/rss+xml" title="Dòng thông tin Sneakerholic Vietnam &raquo;"
        href="https://sneakerholicvietnam.vn/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Dòng phản hồi Sneakerholic Vietnam &raquo;"
        href="https://sneakerholicvietnam.vn/comments/feed/" />
    <link rel='stylesheet' id='classic-theme-styles-css'
        href='https://sneakerholicvietnam.vn/wp-includes/css/classic-themes.min.css?ver=1' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wpa-css-css'
        href='https://sneakerholicvietnam.vn/wp-content/plugins/honeypot/includes/css/wpa.css?ver=2.0.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='dwas_styles-css'
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woo-vietnam-checkout/assets/css/devvn_dwas_style.css?ver=2.0.4'
        type='text/css' media='all' />
    <link rel='stylesheet' id='select2-css'
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/css/select2.css?ver=7.1.0'
        type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='theme-slick-css-css'
        href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css?ver=6.1.1' type='text/css'
        media='all' />
    <link rel='stylesheet' id='flatsome-swatches-frontend-css'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/extensions/flatsome-swatches-frontend.css?ver=3.16.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='isb-style-css'
        href='https://sneakerholicvietnam.vn/wp-content/plugins/improved-sale-badges/assets/css/styles.css?ver=4.4.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='woo_discount_pro_style-css'
        href='https://sneakerholicvietnam.vn/wp-content/plugins/woo-discount-rules-pro/Assets/Css/awdr_style.css?ver=2.5.2'
        type='text/css' media='all' />
    <link rel='stylesheet' id='flatsome-main-css'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/flatsome.css?ver=3.16.0'
        type='text/css' media='all' />
    <style id='flatsome-main-inline-css' type='text/css'>
        @font-face {
            font-family: "fl-icons";
            font-display: block;
            src: url(https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/icons/fl-icons.eot?v=3.16.0);
            src:
                url(https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/icons/fl-icons.eot#iefix?v=3.16.0) format("embedded-opentype"),
                url(https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/icons/fl-icons.woff2?v=3.16.0) format("woff2"),
                url(https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/icons/fl-icons.ttf?v=3.16.0) format("truetype"),
                url(https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/icons/fl-icons.woff?v=3.16.0) format("woff"),
                url(https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/icons/fl-icons.svg?v=3.16.0#fl-icons) format("svg");
        }
    </style>
    <link rel='stylesheet' id='flatsome-shop-css'
        href='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/css/flatsome-shop.css?ver=3.16.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='prdctfltr-css'
        href='https://sneakerholicvietnam.vn/wp-content/plugins/prdctfltr/includes/css/styles.css?ver=8.3.0'
        type='text/css' media='all' />
    <script type='text/javascript' src='https://sneakerholicvietnam.vn/wp-includes/js/jquery/jquery.min.js?ver=3.6.1'
        id='jquery-core-js'></script>
    <script type='text/javascript' id='wp-i18n-dependency-error-js-after'>
        console.error(
            "Payment gateway with handle 'wc-payment-method-cheque' has been deactivated in Cart and Checkout blocks because its dependency 'wp-i18n' is not registered. Read the docs about registering assets for payment methods: https://github.com/woocommerce/woocommerce-blocks/blob/060f63c04f0f34f645200b5d4da9212125c49177/docs/third-party-developers/extensibility/checkout-payment-methods/payment-method-integration.md#registering-assets"
        );
        console.error(
            "Payment gateway with handle 'wc-payment-method-bacs' has been deactivated in Cart and Checkout blocks because its dependency 'wp-i18n' is not registered. Read the docs about registering assets for payment methods: https://github.com/woocommerce/woocommerce-blocks/blob/060f63c04f0f34f645200b5d4da9212125c49177/docs/third-party-developers/extensibility/checkout-payment-methods/payment-method-integration.md#registering-assets"
        );
        console.error(
            "Payment gateway with handle 'wc-payment-method-cod' has been deactivated in Cart and Checkout blocks because its dependency 'wp-i18n' is not registered. Read the docs about registering assets for payment methods: https://github.com/woocommerce/woocommerce-blocks/blob/060f63c04f0f34f645200b5d4da9212125c49177/docs/third-party-developers/extensibility/checkout-payment-methods/payment-method-integration.md#registering-assets"
        );
    </script>
    <link rel='shortlink' href='https://sneakerholicvietnam.vn/?p=31260' />
    <style>
        .bg {
            opacity: 0;
            transition: opacity 1s;
            -webkit-transition: opacity 1s;
        }

        .bg-loaded {
            opacity: 1;
        }
    </style><!-- Global site tag (gtag.js) - Google Ads: 10902020729 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10902020729"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-10902020729');
    </script>
    <!-- Event snippet for Website sale conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-10902020729/kgzvCOPTzb4DEPnEvs4o',
            'transaction_id': ''
        });
    </script> <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <link rel="icon"
        href="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/cropped-Logo.-SneakerHolic.-Blackkk-32x32.png"
        sizes="32x32" />
    <link rel="icon"
        href="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/cropped-Logo.-SneakerHolic.-Blackkk-192x192.png"
        sizes="192x192" />
    <link rel="apple-touch-icon"
        href="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/cropped-Logo.-SneakerHolic.-Blackkk-180x180.png" />
    <meta name="msapplication-TileImage"
        content="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/cropped-Logo.-SneakerHolic.-Blackkk-270x270.png" />
    <meta name="generator"
        content="XforWooCommerce.com - Product Filter for WooCommerce - Improved Badges for WooCommerce" />
    <style id="custom-css" type="text/css">
        :root {
            --primary-color: #202020;
        }

        .header-main {
            height: 76px
        }

        #logo img {
            max-height: 76px
        }

        #logo {
            width: 200px;
        }

        #logo img {
            padding: 10px 0;
        }

        .header-bottom {
            min-height: 50px
        }

        .header-top {
            min-height: 30px
        }

        .transparent .header-main {
            height: 90px
        }

        .transparent #logo img {
            max-height: 90px
        }

        .has-transparent+.page-title:first-of-type,
        .has-transparent+#main>.page-title,
        .has-transparent+#main>div>.page-title,
        .has-transparent+#main .page-header-wrapper:first-of-type .page-title {
            padding-top: 140px;
        }

        .header.show-on-scroll,
        .stuck .header-main {
            height: 70px !important
        }

        .stuck #logo img {
            max-height: 70px !important
        }

        .search-form {
            width: 100%;
        }

        .header-bg-color {
            background-color: #ffffff
        }

        .header-bottom {
            background-color: #ffffff
        }

        .stuck .header-main .nav>li>a {
            line-height: 50px
        }

        .header-bottom-nav>li>a {
            line-height: 16px
        }

        @media (max-width: 549px) {
            .header-main {
                height: 70px
            }

            #logo img {
                max-height: 70px
            }
        }

        .nav-dropdown-has-arrow.nav-dropdown-has-border li.has-dropdown:before {
            border-bottom-color: #FFFFFF;
        }

        .nav .nav-dropdown {
            border-color: #FFFFFF
        }

        .nav-dropdown-has-arrow li.has-dropdown:after {
            border-bottom-color: #FFFFFF;
        }

        .nav .nav-dropdown {
            background-color: #FFFFFF
        }

        .header-top {
            background-color: #202020 !important;
        }

        /* Color */
        .accordion-title.active,
        .has-icon-bg .icon .icon-inner,
        .logo a,
        .primary.is-underline,
        .primary.is-link,
        .badge-outline .badge-inner,
        .nav-outline>li.active>a,
        .nav-outline>li.active>a,
        .cart-icon strong,
        [data-color='primary'],
        .is-outline.primary {
            color: #202020;
        }

        /* Color !important */
        [data-text-color="primary"] {
            color: #202020 !important;
        }

        /* Background Color */
        [data-text-bg="primary"] {
            background-color: #202020;
        }

        /* Background */
        .scroll-to-bullets a,
        .featured-title,
        .label-new.menu-item>a:after,
        .nav-pagination>li>.current,
        .nav-pagination>li>span:hover,
        .nav-pagination>li>a:hover,
        .has-hover:hover .badge-outline .badge-inner,
        button[type="submit"],
        .button.wc-forward:not(.checkout):not(.checkout-button),
        .button.submit-button,
        .button.primary:not(.is-outline),
        .featured-table .title,
        .is-outline:hover,
        .has-icon:hover .icon-label,
        .nav-dropdown-bold .nav-column li>a:hover,
        .nav-dropdown.nav-dropdown-bold>li>a:hover,
        .nav-dropdown-bold.dark .nav-column li>a:hover,
        .nav-dropdown.nav-dropdown-bold.dark>li>a:hover,
        .header-vertical-menu__opener,
        .is-outline:hover,
        .tagcloud a:hover,
        .grid-tools a,
        input[type='submit']:not(.is-form),
        .box-badge:hover .box-text,
        input.button.alt,
        .nav-box>li>a:hover,
        .nav-box>li.active>a,
        .nav-pills>li.active>a,
        .current-dropdown .cart-icon strong,
        .cart-icon:hover strong,
        .nav-line-bottom>li>a:before,
        .nav-line-grow>li>a:before,
        .nav-line>li>a:before,
        .banner,
        .header-top,
        .slider-nav-circle .flickity-prev-next-button:hover svg,
        .slider-nav-circle .flickity-prev-next-button:hover .arrow,
        .primary.is-outline:hover,
        .button.primary:not(.is-outline),
        input[type='submit'].primary,
        input[type='submit'].primary,
        input[type='reset'].button,
        input[type='button'].primary,
        .badge-inner {
            background-color: #202020;
        }

        /* Border */
        .nav-vertical.nav-tabs>li.active>a,
        .scroll-to-bullets a.active,
        .nav-pagination>li>.current,
        .nav-pagination>li>span:hover,
        .nav-pagination>li>a:hover,
        .has-hover:hover .badge-outline .badge-inner,
        .accordion-title.active,
        .featured-table,
        .is-outline:hover,
        .tagcloud a:hover,
        blockquote,
        .has-border,
        .cart-icon strong:after,
        .cart-icon strong,
        .blockUI:before,
        .processing:before,
        .loading-spin,
        .slider-nav-circle .flickity-prev-next-button:hover svg,
        .slider-nav-circle .flickity-prev-next-button:hover .arrow,
        .primary.is-outline:hover {
            border-color: #202020
        }

        .nav-tabs>li.active>a {
            border-top-color: #202020
        }

        .widget_shopping_cart_content .blockUI.blockOverlay:before {
            border-left-color: #202020
        }

        .woocommerce-checkout-review-order .blockUI.blockOverlay:before {
            border-left-color: #202020
        }

        /* Fill */
        .slider .flickity-prev-next-button:hover svg,
        .slider .flickity-prev-next-button:hover .arrow {
            fill: #202020;
        }

        /* Focus */
        .primary:focus-visible,
        .submit-button:focus-visible,
        button[type="submit"]:focus-visible {
            outline-color: #202020 !important;
        }

        /* Background Color */
        [data-icon-label]:after,
        .secondary.is-underline:hover,
        .secondary.is-outline:hover,
        .icon-label,
        .button.secondary:not(.is-outline),
        .button.alt:not(.is-outline),
        .badge-inner.on-sale,
        .button.checkout,
        .single_add_to_cart_button,
        .current .breadcrumb-step {
            background-color: #202020;
        }

        [data-text-bg="secondary"] {
            background-color: #202020;
        }

        /* Color */
        .secondary.is-underline,
        .secondary.is-link,
        .secondary.is-outline,
        .stars a.active,
        .star-rating:before,
        .woocommerce-page .star-rating:before,
        .star-rating span:before,
        .color-secondary {
            color: #202020
        }

        /* Color !important */
        [data-text-color="secondary"] {
            color: #202020 !important;
        }

        /* Border */
        .secondary.is-outline:hover {
            border-color: #202020
        }

        /* Focus */
        .secondary:focus-visible,
        .alt:focus-visible {
            outline-color: #202020 !important;
        }

        .success.is-underline:hover,
        .success.is-outline:hover,
        .success {
            background-color: #446084
        }

        .success-color,
        .success.is-link,
        .success.is-outline {
            color: #446084;
        }

        .success-border {
            border-color: #446084 !important;
        }

        /* Color !important */
        [data-text-color="success"] {
            color: #446084 !important;
        }

        /* Background Color */
        [data-text-bg="success"] {
            background-color: #446084;
        }

        body {
            font-size: 100%;
        }

        @media screen and (max-width: 549px) {
            body {
                font-size: 100%;
            }
        }

        body {
            font-family: "Roboto Condensed", sans-serif
        }

        body {
            font-weight: 400;
            font-style: normal;
        }

        .nav>li>a {
            font-family: "Roboto Condensed", sans-serif;
        }

        .mobile-sidebar-levels-2 .nav>li>ul>li>a {
            font-family: "Roboto Condensed", sans-serif;
        }

        .nav>li>a,
        .mobile-sidebar-levels-2 .nav>li>ul>li>a {
            font-weight: 700;
            font-style: normal;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font,
        .off-canvas-center .nav-sidebar.nav-vertical>li>a {
            font-family: "Roboto Condensed", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font,
        .banner h1,
        .banner h2 {
            font-weight: 700;
            font-style: normal;
        }

        .alt-font {
            font-family: "Dancing Script", sans-serif;
        }

        .alt-font {
            font-weight: 400 !important;
            font-style: normal !important;
        }

        a {
            color: #446084;
        }

        .has-equal-box-heights .box-image {
            padding-top: 100%;
        }

        @media screen and (min-width: 550px) {
            .products .box-vertical .box-image {
                min-width: 300px !important;
                width: 300px !important;
            }
        }

        .footer-2 {
            background-color: #ffffff
        }

        .page-title-small+main .product-container>.row {
            padding-top: 0;
        }

        button[name='update_cart'] {
            display: none;
        }

        .nav-vertical-fly-out>li+li {
            border-top-width: 1px;
            border-top-style: solid;
        }

        /* Custom CSS */
        .page-title-inner,
        .product_meta .posted_in,
        .product_meta .tagged_as,
        .page-description,
        .term-description,
        .woocommerce-breadcrumb,
        .product-page-accordian .accordion .accordion-item:first-child {
            display: none !important
        }

        .product-summary form {
            float: left;
            padding-top: 15px
        }

        #sbw_wc-adding-button {
            background: #0C75CA;
        }

        .accordion {
            clear: both
        }

        //fix CLS flatsome.flickity-enabled {display: block;overflow-x: visible;}.woocommerce-widget-layered-nav-list li{line-height: 48px;margin-bottom: 0;border: 1px solid #e6e6e6;display: inline-block;width: 33.33%;text-align: center!important;font-size: 18px;font-weight: 500;}/*-- Header - Menu --*/.header-bg-container{display:none}.hot-news-cont a{color:red;}/*-- Header - Menu --*/.hot-news-cont {background-color: #f1f1f1;display: block;width: 100%;}.hot-news-slide {width: 50%;height: 50px;/* margin-bottom: 2px; *//* border: #f00 1px solid; */left: 50%;-webkit-transform: translateX(-50%);-moz-transform: translateX(-50%);-ms-transform: translateX(-50%);-o-transform: translateX(-50%);transform: translateX(-50%);}.hot-news-slide .cont-item {text-align: center;height: 50px;font-size: 14px;color: #000;padding-top: 15px;display: none;}.hot-news-slide .cont-item a {color: #000;text-decoration: none;}.slick-slider{position:relative;display:block;box-sizing:border-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-touch-callout:none;-khtml-user-select:none;-ms-touch-action:pan-y;touch-action:pan-y;-webkit-tap-highlight-color:transparent;}.slick-list{position:relative;display:block;overflow:hidden;margin:0;padding:0;}.slick-track{position:relative;top:0;left:0;display:block;margin-left:auto;margin-right:auto;}.slick-slide{display:none;float:left;min-height:1px;}.slick-initialized .slick-slide{display:block;}.slick-prev:before, .slick-next:before {font-family: 'slick';font-size: 20px;line-height: 1;opacity: .75;color: #7a95a561!important;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}@media only screen and (max-width: 992px) {.hot-news-slide{width:90%;margin-bottom:2px;height:10vw;}.hot-news-slide .cont-item{font-size:2.5vw;padding-top:3vw;}.hot-news-cont .slick-next,.hot-news-cont .slick-prev{display:none!important;}.slick-prev{left:10px!important;}.slick-next{right:10px!important;}}/*Flat contact*/svg:not(:root){overflow:hidden;}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}:after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}.hidden{display:none!important;}@media (max-width:767px){.hidden-xs{display:none!important;}}@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none!important;}}.arcontactus-widget.arcontactus-message{transition:all .3s;}.arcontactus-widget.arcontactus-message{right:10px;bottom:75px;}.arcontactus-widget.arcontactus-message{z-index:10000;right:10px;bottom:140px;position:fixed!important;}.arcontactus-widget{line-height:1;}.arcontactus-widget .messangers-block.show-messageners-block{-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1);}.arcontactus-widget.md .messangers-block{bottom:70px;}.arcontactus-widget .messangers-block{background:center no-repeat #fff;box-shadow:0 0 10px rgba(0,0,0,.6);width:235px;position:absolute;bottom:80px;right:0;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;padding:14px 0;-webkit-box-sizing:border-box;box-sizing:border-box;border-radius:7px;-webkit-transform-origin:80% 105%;-ms-transform-origin:80% 105%;transform-origin:80% 105%;-webkit-transform:scale(0);-ms-transform:scale(0);transform:scale(0);-webkit-transition:ease-out .12s all;-o-transition:ease-out .12s all;transition:ease-out .12s all;z-index:10000;}.arcontactus-widget.md.right .messangers-block:before{right:21px;}.arcontactus-widget .messangers-block:before{position:absolute;bottom:-7px;right:25px;left:auto;display:inline-block!important;border-right:8px solid transparent;border-top:8px solid #fff;border-left:8px solid transparent;content:'';}.arcontactus-widget .messanger{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin:0;cursor:pointer;width:100%;padding:8px 20px 8px 60px;position:relative;min-height:54px;text-decoration:none;}.arcontactus-widget .messanger span{position:absolute;left:10px;top:50%;margin-top:-20px;display:block;width:40px;height:40px;border-radius:50%;margin-right:10px;color:#fff;text-align:center;vertical-align:middle;}.arcontactus-widget .messanger p{margin:0;font-size:14px;color:rgba(0,0,0,.87);padding:0;}.arcontactus-widget .messanger span svg{width:24px;height:24px;vertical-align:middle;text-align:center;display:block;position:absolute;top:50%;left:50%;margin-top:-12px;margin-left:-12px;}.arcontactus-widget .arcontactus-message-button .static{position:absolute;top:50%;left:50%;margin-top:-19px;margin-left:-26px;width:52px;height:52px;text-align:center;}.arcontactus-widget .arcontactus-message-button .static.hidden{display:none;}.arcontactus-widget .static{transition:.2s all;}.arcontactus-widget .arcontactus-message-button .static svg{width:24px;height:24px;color:#fff;}.arcontactus-widget .arcontactus-message-button p{color:#fff;font-weight:700;font-size:10px;line-height:11px;margin:0;}.arcontactus-widget .arcontactus-close{color:#fff;}.arcontactus-widget .arcontactus-close.show-messageners-block svg{-webkit-transform:rotate(0) scale(1);-ms-transform:rotate(0) scale(1);transform:rotate(0) scale(1);}.arcontactus-widget .arcontactus-close svg{-webkit-transform:rotate(180deg) scale(0);-ms-transform:rotate(180deg) scale(0);transform:rotate(180deg) scale(0);-webkit-transition:ease-in .12s all;-o-transition:ease-in .12s all;transition:ease-in .12s all;display:block;}.arcontactus-widget.md .arcontactus-message-button,.arcontactus-widget.md.arcontactus-message{width:60px;height:60px;}.arcontactus-widget .arcontactus-message-button{width:70px;position:absolute;height:70px;right:0;background-color:red;border-radius:50px;-webkit-box-sizing:border-box;box-sizing:border-box;text-align:center;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;cursor:pointer;}.arcontactus-widget .messanger:hover{background-color:#eee;}.st0{fill:#fdfefe;}.st1{fill:#0180c7;}.st2{fill:#0172b1;}.st3{fill:none;stroke:#0180c7;stroke-width:2;stroke-miterlimit:10;}.arcontactus-widget .messanger.zaloIcon span svg{width:100%;height:100%;top:0;left:0;margin:0;border-radius:50%;}.arcontactus-widget .messanger.zaloIcon span{background:0 0;}.arcontactus-widget.md .arcontactus-message-button .pulsation{width:74px;height:74px;}.arcontactus-widget .arcontactus-message-button .pulsation{width:84px;height:84px;background-color:red;border-radius:50px;position:absolute;left:-7px;top:-7px;z-index:-1;-webkit-transform:scale(0);-ms-transform:scale(0);transform:scale(0);-webkit-animation:arcontactus-pulse 2s infinite;animation:arcontactus-pulse 2s infinite;}.arcontactus-widget .pulsation:nth-of-type(2n){-webkit-animation-delay:.5s;animation-delay:.5s;}.recent_products h2{margin-right: 15px;padding-bottom: 7.5px;border-bottom: 2px solid rgba(0,0,0,.1);margin-bottom: -2px;font-size: 1.25em;}.rvpscarousel .slick-prev:before {content: "←";font-size: 29px;font-weight: 300px;}.rvpscarousel .slick-next:before { content: '→';font-size: 29px;font-weight: 300px;}.prdctfltr_pa_thuong-hieu .prdctfltr_checkboxes,.prdctfltr_2_columns.prdctfltr_filter .prdctfltr_checkboxes{overflow: auto;max-height: 201px;}.pf_rngstyle_thin .irs-from, .pf_rngstyle_thin .irs-to, .pf_rngstyle_thin .irs-single {background: #546d8e;}#woocommerce_layered_nav-17 ul li{width: 100%}.live-your-passion{float: right;position: absolute;top: 42%;right: 9%;}.footer-wrapper .ux-menu-link__icon+.ux-menu-link__text {font-size: .8em;}.footer-wrapper input{width:100%}.rvpscarousel .slick-prev {left: -14px;}.rvpscarousel .slick-next {right: -14px;}.isb_style_arrow_alt.isb_left{height: 57px;}.isb_style_arrow_alt .isb_sale_text {font-size: 11px;}.bo-loc-mobile{display:none}#boxCarrier a{display:none}#boxCarrier .card-header{margin: 10px 10px 0 10px ;}ul.filter-items{overflow: auto; max-height:205px;padding-top: 10px!important ; text-align: center;}#filter_54990_3 ul, #filter_54990_2 ul{text-align:left!important;}.yith-wcan-reset-filters{display:none}#woocommerce_layered_nav-3 .count, #woocommerce_layered_nav-2 .count{display:none}#woocommerce_layered_nav-3 ul, #woocommerce_layered_nav-2 ul {overflow: auto;max-height: 205px;padding-top: 10px!important;text-align: center;}#woocommerce_layered_nav-2 li{margin: 0 auto;}#woocommerce_layered_nav_filters-2 .is-divider, #woocommerce_layered_nav-3 .is-divider, #woocommerce_layered_nav-2 .is-divider{display:none;} .vi-wpvs-variation-wrap.vi-wpvs-variation-wrap-vi_wpvs_button_design .vi-wpvs-option-wrap.vi-wpvs-option-wrap-default {color: rgba(33, 33, 33, 1);background: #ffffff;border-radius: 4px;}.vi-wpvs-variation-wrap.vi-wpvs-variation-wrap-vi_wpvs_button_design .vi-wpvs-option-wrap.vi-wpvs-option-wrap-hover,.vi-wpvs-variation-wrap.vi-wpvs-variation-wrap-vi_wpvs_button_design .vi-wpvs-option-wrap.vi-wpvs-option-wrap-selected{border-radius: 4px;box-shadow: none;background:#f44336;}.prdctfltr_wc .prdctfltr_instock,.prdctfltr_filter_title{display: none!important;}.prdctfltr_filter label {font-weight: normal;}.variations .label{margin-right: 0;padding-right: 0;width: 10%;}.ux-swatch--label {min-width: 43px;margin-right: 16px;padding: 7px 25px;font-size: 14px;}.product-summary .out-of-stock{background-color: #202020;float: left;opacity: .6;position: relative;display: inline-block;text-transform: uppercase;font-size: .97em;letter-spacing: .03em;cursor: pointer;font-weight: bolder;text-align: center;text-decoration: none;border: 1px solid transparent;vertical-align: middle;border-radius: 6px;margin-right: 1em;text-shadow: none;line-height: 2.4em;padding: 0 1.2em;-o-transition: transform .3s,border .3s,background .3s,box-shadow .3s,opacity .3s,color .3s;transition: transform .3s,border .3s,background .3s,box-shadow .3s,opacity .3s,color .3s;transition: transform .3s,border .3s,background .3s,box-shadow .3s,opacity .3s,color .3s,-webkit-transform .3s,-webkit-box-shadow .3s;text-rendering: optimizeLegibility;box-sizing: border-box;shape-rendering: geometricprecision;color: red;margin-top: 16px;}.single-product .variations th{border:none}.vts-custom-header a{font-size: 13px!important;}/* Custom CSS Mobile */@media (max-width: 549px){ .sticky-add-to-cart button{display: block; float:left}.product-summary .quantity {margin-bottom: 1em;float: left;width: 100%;}#sbw_wc-adding-button {margin-left: 2%;}.live-your-passion{display:none}.footer-wrapper .social-icons {text-align: left;}.bo-loc-mobile{display:block}.yith-wcan-filters-opener {display: block;margin-bottom: 10%;width: 100%;float: left;}.woocommerce-info, .woocommerce-notices-wrapper{clear:both}.yith-wcan-filters.filters-modal {top: 0px!important;}.yith-wcan-filters.filters-modal .main-modal-button{color:#fff}.filter-price-range .active span{color:red}.shop-container>.yith-wcan-filters-opener{position: absolute;top: -72px;float: left;width: 48%;left: 5px;text-align: left;}.woocommerce-ordering, .woocommerce-ordering select {margin: 5px 0;display: inline-block;border-radius: 4px;}.yith-wcan-filter{text-align:left}.woocommerce-ordering:after {content: "";width: 30px;height: 30px;top: 10px;right: 5px;position: absolute;display: inline-block;}.filter-content{display:block!important}.yith-wcan-filters.filters-modal .yith-wcan-filter {border: 1px solid #d7d7d754border-radius: 4px;margin-bottom: 15px;padding: 15px;}.yith-wcan-filters.filters-modal .yith-wcan-filter h4.collapsable:after {display:none;}#bo-loc-mobile{display:block!important}#bo-loc-mobile .filter-items li:before{display: inline-block;width: 15px;height: 15px;margin-right: 5px;padding: 0;border: 1px solid #e6e6e6;}#bo-loc-mobile .filter-price-range li {list-style-type: disclosure-closed!important;text-align:left}#bo-loc-mobile .filter-price-range .filter-items{margin-left:6%}.filter-content ul{text-align:left!important}#filter_56753_0 ul{text-align:center!important;}.woocommerce-ordering{float: right;width: 100%;background: #fff;height: 40px;justify-content: space-between;}.page-title-inner{display:block!important}.page-title {margin-bottom: 2%;}.page-title-inner>.flex-col{width: 49% !important;float: left!important;text-align: left!important;margin-right: 1%;}.category-filtering, .category-filtering a {padding: 8px;margin-top: 0;padding-left: 12px;}.category-filtering{ padding: 0;margin: 0;border: 1px solid #ddd;border-radius: 4px;margin-top: 5px;background: #fdfdfd;}.html_topbar_right{display:none!important}}.label-new.menu-item > a:after{content:"New";}.label-hot.menu-item > a:after{content:"Hot";}.label-sale.menu-item > a:after{content:"Sale";}.label-popular.menu-item > a:after{content:"Popular";}
    </style>
    <style type="text/css" id="wp-custom-css">
        #woocommerce_layered_nav-17 li {
            width: 50%
        }

        .vi-wpvs-variation-wrap.vi-wpvs-variation-wrap-vi_wpvs_button_design .vi-wpvs-option-wrap {
            padding: 10px;
            min-width: 55px;
        }
    </style>
    <style id="flatsome-swatches-css" type="text/css"></style>
    <style id="kirki-inline-styles">
        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-19-7Cwk6YvNkeg.woff) format('woff');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-19a7Cwk6YvNkeg.woff) format('woff');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-1967Cwk6YvNkeg.woff) format('woff');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-19G7Cwk6YvNkeg.woff) format('woff');
            unicode-range: U+0370-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-1927Cwk6YvNkeg.woff) format('woff');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-19y7Cwk6YvNkeg.woff) format('woff');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVl2ZhZI2eCN5jzbjEETS9weq8-19K7Cwk6YvM.woff) format('woff');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCkYadlecyVC4A.woff) format('woff');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCAYadlecyVC4A.woff) format('woff');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCgYadlecyVC4A.woff) format('woff');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCcYadlecyVC4A.woff) format('woff');
            unicode-range: U+0370-03FF;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCsYadlecyVC4A.woff) format('woff');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCoYadlecyVC4A.woff) format('woff');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/roboto-condensed/ieVi2ZhZI2eCN5jzbjEETS9weq8-32meGCQYadlecyU.woff) format('woff');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Dancing Script';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/dancing-script/If2cXTr6YS-zF4S-kcSWSVi_sxjsohD9F50Ruu7BMSo3Rep6hNX6pmRMjLo.woff) format('woff');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Dancing Script';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/dancing-script/If2cXTr6YS-zF4S-kcSWSVi_sxjsohD9F50Ruu7BMSo3ROp6hNX6pmRMjLo.woff) format('woff');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Dancing Script';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://sneakerholicvietnam.vn/wp-content/fonts/dancing-script/If2cXTr6YS-zF4S-kcSWSVi_sxjsohD9F50Ruu7BMSo3Sup6hNX6pmRM.woff) format('woff');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
    <style id="yellow-pencil">
        /*
 The following CSS codes are created by the YellowPencil plugin.
 https://yellowpencil.waspthemes.com/
*/
        #wide-nav .flex-center ul {
            padding-bottom: 1.5%;
        }

        #footer .section .section-content {
            padding-top: 2%;
        }

        #wrapper #footer .section .section-bg {
            -webkit-box-shadow: 0px 0px 15px 0px rgba(119, 119, 119, 0.4) !important;
            box-shadow: 0px 0px 15px 0px rgba(119, 119, 119, 0.4) !important;
        }

        .products .box .out-of-stock-label {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            top: 0px;
            bottom: 0px;
            padding-bottom: 0px;
            padding-top: 40%;
        }

        #wrapper #main .category-page-row .col .shop-container .products .product .col-inner .box .box-image .out-of-stock-label {
            background-color: rgba(0, 0, 0, 0.) !important;
            height: 100% !important;
        }

        .slider-nav-reveal div .isb_sk_material {
            height: 53px;
        }

        .slider-nav-reveal div .isb_sale_percentage {
            font-weight: 700;
        }

        .slider-nav-reveal div .isb_sale_text {
            line-height: 1.3em;
            font-size: 11px;
        }

        #content .section .isb_sk_material {
            height: 53px;
        }

        #content .section .isb_sale_percentage {
            font-weight: 700;
        }

        #content .section .isb_sale_text {
            line-height: 1.3em;
            font-size: 11px;
        }

        .woocommerce-product-gallery .isb_sk_material .isb_sale_percentage {
            font-weight: 700;
        }

        .woocommerce-product-gallery .isb_sk_material .isb_sale_text {
            font-size: 11px;
        }

        .products .product .isb_sk_material {
            height: 53px;
        }

        .products .product .isb_sale_percentage {
            font-weight: 700;
        }

        .products .product .isb_sale_text {
            line-height: 1.3em;
            font-size: 11px;
        }

        .slider-nav-reveal div .out-of-stock-label {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            top: 0px;
            bottom: 0px;
            padding-bottom: 0px;
            padding-top: 40%;
        }

        .nav-spacing-xlarge .menu-item:nth-child(7) .nav-top-link {
            color: #f44336;
        }

        .nav-spacing-xlarge .flex-col input[type=search] {
            text-align: center;
        }

        #product-search-form-1 input[type=text] {
            text-align: center;
        }

        #section_1369388271 .product .isb_sk_material {
            height: 53px;
        }

        #section_990023102 .product .isb_sk_material {
            height: 53px;
        }

        .slider-nav-reveal .isb_variable_group .isb_sk_material {
            height: 53px;
        }

        .slider-nav-reveal .isb_variable_group .isb_sale_text {
            font-size: 11px;
        }

        .woocommerce-product-gallery .isb_variable_group .isb_sk_material {
            height: 53px;
        }

        .products ins .woocommerce-Price-amount {
            color: #ff2419;
        }

        .product_list_widget ins .woocommerce-Price-amount {
            color: #ff2419;
        }

        #top-link {
            bottom: 10%;
        }

        .product-page-price ins .woocommerce-Price-amount {
            color: #ff2419;
        }

        .slider-nav-reveal ins .woocommerce-Price-amount {
            color: #ff2419;
        }

        .single_variation_wrap .woocommerce-variation .woocommerce-variation-availability {
            color: #ff131f;
            font-weight: 600;
            font-size: 20px;
        }

        #wrapper #main #content #section_1968332456 .section-content .woocommerce .products .product .col-inner .product-small .box-text-products .label-wrap {
            top: -320% !important;
        }

        #section_1968332456 .product .label-wrap {
            text-align: center;
        }

        .products .product .isb_scheduled_start {
            opacity: 0;
        }

        .woocommerce-product-gallery .isb_sale_badge .isb_sale_text {
            line-height: 1.3em;
        }

        .product-gallery .woocommerce-product-gallery .isb_sale_badge {
            height: 55px;
        }

        .woocommerce-product-gallery .isb_sale_badge .isb_scheduled_sale {
            visibility: hidden;
        }

        .products .product .isb_scheduled_sale {
            visibility: hidden;
        }

        .woosalescountdown-single .ob_product_detail h3 {
            margin-top: 30px;
        }

        #wrapper #main .shop-container .product .product-container .product-main .content-row .product-summary .woosalescountdown-single .ob_product_detail h3 {
            font-weight: 700 !important;
        }

        #myCounter .counter-block .counter-caption {
            text-transform: uppercase;
            font-weight: 700;
        }

        @media (max-width:549px) {
            .accordion .accordion-item a {
                text-align: center;
                font-weight: 700;
            }

            #wrapper #main #content .row-collapse .col .col-inner .accordion .accordion-item a {
                color: #202020 !important;
            }
        }

        @media (min-width:550px) {
            .woosalescountdown-single .ob_product_detail h3 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body data-rsssl=1
    class="page-template-default page page-id-31260 theme-flatsome non-logged-in woocommerce-cart woocommerce-page woocommerce-no-js lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow nav-dropdown-has-border">


    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    <div id="wrapper">


        <header id="header" class="header header-full-width has-sticky sticky-jump">
            <div class="header-wrapper">

                <div class="hot-news-cont">
                    <div class="hot-news-slide">
                        <div class="cont-item">
                            <a
                                href="https://sneakerholicvietnam.vn/chinh-sach-doi-tra-hoan-tien-san-pham-tai-the-sneakerholic/">
                                HÀNG 1 TUẦN NHẬN ĐỔI - V SINH/BẢO HÀNH GIÀY 1 NĂM</a>
                        </div>
                        <div class="cont-item">
                            <a
                                href="https://sneakerholicvietnam.vn/chinh-sach-doi-tra-hoan-tien-san-pham-tai-the-sneakerholic/">
                                HỖ TRỢ COD TOÀN QUỐC</a>
                        </div>
                        <div class="cont-item">
                            <a
                                href="https://sneakerholicvietnam.vn/chinh-sach-doi-tra-hoan-tien-san-pham-tai-the-sneakerholic/">
                                FREE SHIPPING CHO ĐƠN HÀNG THANH TOÁN TRƯỚC</a>
                        </div>
                        <div class="cont-item">
                            <a
                                href="https://sneakerholicvietnam.vn/the-sneakerholic-rewards-dac-quyen-danh-rieng-cho-khach-hang-than-thiet/">
                                TÍCH LY HẠN MỨC ƯU ĐÃI CHO KHCH HÀNG THÂN THIẾT</a>
                        </div>

                    </div>
                </div>

                <div id="masthead" class="header-main show-logo-center hide-for-sticky">
                    <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">

                        <!-- Logo -->
                        <div id="logo" class="flex-col logo">

                            <!-- Header logo -->
                            <a href="https://sneakerholicvietnam.vn/" title="Sneakerholic Vietnam - Live Your Passion"
                                rel="home">
                                <img width="945" height="361"
                                    src="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/Logo.-SneakerHolic.-Black-04.png"
                                    class="header_logo header-logo" alt="Sneakerholic Vietnam" /><img width="945"
                                    height="361"
                                    src="https://sneakerholicvietnam.vn/wp-content/uploads/2018/07/Logo.-SneakerHolic.-Black-04.png"
                                    class="header-logo-dark" alt="Sneakerholic Vietnam" /></a>
                        </div>

                        <!-- Mobile Left Elements -->
                        <div class="flex-col show-for-medium flex-left">
                            <ul class="mobile-nav nav nav-left">
                                <li class="nav-icon has-icon">
                                    <a href="#" data-open="#main-menu" data-pos="left"
                                        data-bg="main-menu-overlay" data-color="" class="is-small"
                                        aria-label="Menu" aria-controls="main-menu" aria-expanded="false">

                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                                <li
                                    class="header-search header-search-dropdown has-icon has-dropdown menu-item-has-children">
                                    <a href="#" aria-label="Tìm kiếm" class="is-small"><i
                                            class="icon-search"></i></a>
                                    <ul class="nav-dropdown nav-dropdown-simple">
                                        <li class="header-search-form search-form html relative has-icon">
                                            <div class="header-search-form-wrapper">
                                                <div
                                                    class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                                    <form role="search" method="get" class="searchform"
                                                        action="">
                                                        <div class="flex-row relative">
                                                            <div class="flex-col flex-grow">
                                                                <label class="screen-reader-text"
                                                                    for="woocommerce-product-search-field-0">Tìm
                                                                    kiếm:</label>
                                                                <input type="search"
                                                                    id="woocommerce-product-search-field-0"
                                                                    class="search-field mb-0"
                                                                    placeholder="Tìm kiếm sản phẩm, thương hiệu,..."
                                                                    value="" name="s" />
                                                                <input type="hidden" name="post_type"
                                                                    value="product" />
                                                            </div>
                                                            <div class="flex-col">
                                                                <button type="submit" value="Tìm kiếm"
                                                                    class="ux-search-submit submit-button secondary button icon mb-0"
                                                                    aria-label="Submit">
                                                                    <i class="icon-search"></i> </button>
                                                            </div>
                                                        </div>
                                                        <div class="live-search-results text-left z-top"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Left Elements -->
                        <div class="flex-col hide-for-medium flex-left">
                            <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                                <li class="html custom html_topbar_left">
                                    <ul
                                        class="vts-custom-header header-nav header-nav-main nav nav-left  nav-uppercase">
                                        <li class="header-contact-wrapper">
                                            <ul id="header-contact"
                                                class="nav nav-divided nav-uppercase header-contact">
                                                <li class="">
                                                    <a target="_blank" rel="noopener noreferrer"
                                                        href="https://maps.google.com/?q=425/16 Nguyễn Đình Chiểu P.5, Q.3, Tp.HCM"
                                                        class="tooltip tooltipstered">
                                                        <i class="icon-map-pin-fill" style="font-size:16px;"></i>
                                                        <span>
                                                            425/16 Nguyễn Đình Chiểu P.5, Q.3, Tp.HCM </span>
                                                    </a>
                                                </li>

                                                <li class="">
                                                    <a target="_blank"
                                                        href="https://beacons.ai/thesneakerholicvietnam"
                                                        class="tooltip tooltipstered">
                                                        <i class="icon-phone" style="font-size:16px;"></i> <span>Liên
                                                            hệ</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Right Elements -->
                        <div class="flex-col hide-for-medium flex-right">
                            <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                                <li class="account-item has-icon">
                                    <div class="header-button">
                                        <a href="https://sneakerholicvietnam.vn/my-account/"
                                            class="nav-top-link nav-top-not-logged-in icon button circle is-outline is-small">
                                            <i class="icon-user"></i>
                                        </a>

                                    </div>

                                </li>
                                <li class="header-divider"></li>
                                <li class="cart-item has-icon">
                                    <div class="header-button">
                                        <a href="https://sneakerholicvietnam.vn/cart-2/" title="Giỏ hàng"
                                            class="header-cart-link icon button circle is-outline is-small">



                                            <i class="icon-shopping-bag" data-icon-label="1">
                                            </i>
                                        </a>
                                    </div>

                                </li>
                            </ul>
                        </div>

                        <!-- Mobile Right Elements -->
                        <div class="flex-col show-for-medium flex-right">
                            <ul class="mobile-nav nav nav-right">
                                <li class="account-item has-icon">
                                    <div class="header-button"> <a href="https://sneakerholicvietnam.vn/my-account/"
                                            class="account-link-mobile icon button circle is-outline is-small"
                                            title="Tài khoản">
                                            <i class="icon-user"></i> </a>
                                    </div>
                                </li>
                                <li class="cart-item has-icon">

                                    <div class="header-button"> <a href="https://sneakerholicvietnam.vn/cart-2/"
                                            title="Giỏ hàng"
                                            class="header-cart-link icon button circle is-outline is-small">

                                            <i class="icon-shopping-bag" data-icon-label="1">
                                            </i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="container">
                        <div class="top-divider full-width"></div>
                    </div>
                </div>
                <div id="wide-nav" class="header-bottom wide-nav flex-has-center hide-for-medium">
                    <div class="flex-row container">


                        <div class="flex-col hide-for-medium flex-center">
                            <ul
                                class="nav header-nav header-bottom-nav nav-center  nav-line-bottom nav-size-medium nav-spacing-xlarge">
                                <li id="menu-item-37365"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-37365 menu-item-design-default">
                                    <a href="" class="nav-top-link">HOME</a>
                                </li>
                                <li id="menu-item-37366"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37366 menu-item-design-default">
                                    <a href="" class="nav-top-link">GIÀY</a>
                                </li>
                                <li id="menu-item-37360"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37360 menu-item-design-default">
                                    <a href="" class="nav-top-link">DÉP</a>
                                </li>
                                <li id="menu-item-37358"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37358 menu-item-design-default">
                                    <a href="" class="nav-top-link">PHỤ KIỆN</a>
                                </li>
                                <li id="menu-item-39602"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-39602 menu-item-design-default">
                                    <a href="https://sneakerholicvietnam.vn/product-category/clothing/"
                                        class="nav-top-link">ÁO QUẦN</a>
                                </li>
                                <li id="menu-item-37361"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37361 menu-item-design-default">
                                    <a href="https://sneakerholicvietnam.vn/product-category/kinh/"
                                        class="nav-top-link">KÍNH</a>
                                </li>
                                <li id="menu-item-37362"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37362 menu-item-design-default">
                                    <a href="https://sneakerholicvietnam.vn/product-category/outlet/"
                                        class="nav-top-link">OUTLET</a>
                                </li>
                                <li id="menu-item-37359"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37359 menu-item-design-default">
                                    <a href="https://sneakerholicvietnam.vn/product-category/crep-protect/"
                                        class="nav-top-link">SNEAKERS CLEANER</a>
                                </li>
                                <li id="menu-item-62027"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-62027 menu-item-design-default">
                                    <a href="https://sneakerholicvietnam.vn/product-category/used/"
                                        class="nav-top-link">USED</a>
                                </li>
                                <li id="menu-item-45670"
                                    class="menu-item menu-item-type-post_type menu-item-object-post menu-item-45670 menu-item-design-default">
                                    <a href="https://sneakerholicvietnam.vn/thong-tin-ve-chuong-trinh-ky-gui-san-pham/"
                                        class="nav-top-link">KÝ GỬI</a>
                                </li>
                                <li class="header-search-form search-form html relative has-icon">
                                    <div class="header-search-form-wrapper">
                                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                            <form role="search" method="get" class="searchform"
                                                action="https://sneakerholicvietnam.vn/">
                                                <div class="flex-row relative">
                                                    <div class="flex-col flex-grow">
                                                        <label class="screen-reader-text"
                                                            for="woocommerce-product-search-field-1">Tìm kiếm:</label>
                                                        <input type="search" id="woocommerce-product-search-field-1"
                                                            class="search-field mb-0"
                                                            placeholder="Tìm kiếm sản phẩm, thương hiệu,..."
                                                            value="" name="s" />
                                                        <input type="hidden" name="post_type" value="product" />
                                                    </div>
                                                    <div class="flex-col">
                                                        <button type="submit" value="Tìm kiếm"
                                                            class="ux-search-submit submit-button secondary button icon mb-0"
                                                            aria-label="Submit">
                                                            <i class="icon-search"></i> </button>
                                                    </div>
                                                </div>
                                                <div class="live-search-results text-left z-top"></div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>



                    </div>
                </div>

                <div class="header-bg-container fill">
                    <div class="header-bg-image fill"></div>
                    <div class="header-bg-color fill"></div>
                </div>
            </div>
        </header>


        <!-- <div class="bo-loc-mobile">
   </div>  -->


        <main id="main" class="">


            <div id="content" class="content-area page-wrapper" role="main">
                <div class="row row-main">
                    <div class="large-12 col">
                        <div class="col-inner">



                            <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <div class="woocommerce row row-large row-divided">
                                    <div class="col large-7 pb-0 cart-auto-refresh">


                                        <form class="woocommerce-cart-form"
                                            action="https://sneakerholicvietnam.vn/cart-2/" method="post">
                                            <div class="cart-wrapper sm-touch-scroll">


                                                <table
                                                    class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                    cellspacing="0">
                                                    <tbody>

                                                        <tr class="woocommerce-cart-form__cart-item cart_item">

                                                            @php $totalAll = 0 @endphp

                                                            <div class="block">
                                                                <h4 class="widget-title">Tóm Tắt</h4>
                                                                <div class="media product-card">
                                                                    <div class="media-body">
                                                                        @if (session('cart'))
                                                                            @foreach (session('cart') as $id => $details)
                                                                                @php
                                                                                    $total = $details['price'] * $details['amount'];
                                                                                    $totalAll += $total;
                                                                                @endphp
                                                                                <input type="hidden"
                                                                                    value="{{ $id }}"
                                                                                    name="product_id[]">{{ $details['nameVi'] ?? '' }}
                                                                                x
                                                                                <input type="hidden"
                                                                                    value="{{ $details['amount'] }}"
                                                                                    name="amount[]">{{ $details['amount'] ?? '' }}
                                                                                <p class="price">Số Lượng:
                                                                                    {{ $details['amount'] }}</p>
                                                                                <p class="">Giá:
                                                                                    {{ number_format($details['price']) }}
                                                                                </p>
                                                                                {{-- <td><input type="hidden" value="{{ $total }}"
                                                                                    name="total[]">{{ number_format($total) }}.vnd</td> --}}
                                                                            @endforeach
                                                                        @endif
                                                                        <hr>
                                                        <tr>
                                                            <td>Tổng tiền</td>
                                                            <td><input type="hidden" name="totalAll"
                                                                    value="{{ $totalAll }}">{{ number_format($totalAll) }}.vnd
                                                            </td>
                                                        </tr>
                                            </div>
                                    </div>
                                    <div class="discount-code">

                                        </form>

                                    </div>
                                </div>
                                </tr>


                                <tr>
                                    <td colspan="6" class="actions clear">


                                        <div class="continue-shopping pull-left text-left">
                                            <a class="button-continue-shopping button primary is-outline"
                                                href="{{ route('shop') }}">
                                                &#8592;&nbsp;Tiếp tục xem sản phẩm </a>
                                        </div>

                                        {{-- <button type="submit"
                                                                    class="button primary mt-0 pull-left small"
                                                                    name="update_cart" value="Cập nhật giỏ hàng">Cập nhật giỏ hàng</button>

                                                                <input type="hidden" id="woocommerce-cart-nonce"
                                                                    name="woocommerce-cart-nonce"
                                                                    value="a713365931" /><input type="hidden"
                                                                    name="_wp_http_referer" value="/cart-2/" /> --}}
                                    </td>
                                </tr>

                                </tbody>
                                </table>
                            </div>
                            </form>
                        </div>


                        <div class="cart-collaterals large-5 col pb-0">
                            <div class="is-sticky-column">
                                <div class="is-sticky-column__inner">
                                    <div class="cart-sidebar col-inner">
                                        <div class="cart_totals">

                                            {{-- <table cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name" colspan="2">Cộng giỏ hàng</th>
                                                                </tr>
                                                            </thead>
                                                        </table> --}}

                                            {{-- <h2>Cộng giỏ hàng</h2>

                                                        <table cellspacing="0"
                                                            class="shop_table shop_table_responsive">

                                                            <tr class="cart-subtotal">
                                                                <th>Tạm tính</th>
                                                                <td data-title="Tạm tính"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>700.000<span
                                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                                                                </td>
                                                            </tr> --}}




                                            {{-- <tr class="woocommerce-shipping-totals shipping">
                                                                <td class="shipping__inner" colspan="2">
                                                                    <table
                                                                        class="shipping__table shipping__table--multiple">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th colspan="2">Giao hàng</th>
                                                                                <td data-title="Giao hàng">
                                                                                    <ul id="shipping_method"
                                                                                        class="shipping__list woocommerce-shipping-methods">
                                                                                        <li
                                                                                            class="shipping__list_item">
                                                                                            <input type="radio"
                                                                                                name="shipping_method[0]"
                                                                                                data-index="0"
                                                                                                id="shipping_method_0_local_pickup1"
                                                                                                value="local_pickup:1"
                                                                                                class="shipping_method"
                                                                                                checked='checked' /><label
                                                                                                class="shipping__list_label"
                                                                                                for="shipping_method_0_local_pickup1">Nhận
                                                                                                tại cửa hàng: 425/16
                                                                                                Nguyễn Đình Chiểu P5,
                                                                                                Q3</label>
                                                                                        </li> --}}
                                            {{-- <li
                                                                                            class="shipping__list_item">
                                                                                            <input type="radio"
                                                                                                name="shipping_method[0]"
                                                                                                data-index="0"
                                                                                                id="shipping_method_0_flat_rate2"
                                                                                                value="flat_rate:2"
                                                                                                class="shipping_method" /><label
                                                                                                class="shipping__list_label"
                                                                                                for="shipping_method_0_flat_rate2">Ship
                                                                                                tận nơi: Phí ship sẽ
                                                                                                được xác nhận qua điện
                                                                                                thoại từ nhân
                                                                                                viên</label>
                                                                                        </li> --}}
                                            {{-- </ul> --}}



                                            {{-- <form
                                                                                        class="woocommerce-shipping-calculator"
                                                                                        action="https://sneakerholicvietnam.vn/cart-2/"
                                                                                        method="post">

                                                                                        <a href="#"
                                                                                            class="shipping-calculator-button">Tính
                                                                                            phí giao hàng</a>
                                                                                        <section
                                                                                            class="shipping-calculator-form"
                                                                                            style="display:none;">

                                                                                            <p class="form-row form-row-wide"
                                                                                                id="calc_shipping_country_field">
                                                                                                <label
                                                                                                    for="calc_shipping_country"
                                                                                                    class="screen-reader-text">Country
                                                                                                    / region:</label>
                                                                                                <select
                                                                                                    name="calc_shipping_country"
                                                                                                    id="calc_shipping_country"
                                                                                                    class="country_to_state country_select"
                                                                                                    rel="calc_shipping_state">
                                                                                                    <option
                                                                                                        value="default">
                                                                                                        Chọn Quốc
                                                                                                        gia/Khu
                                                                                                        vực&hellip;
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="VN"
                                                                                                        selected='selected'>
                                                                                                        Việt Nam
                                                                                                    </option>
                                                                                                </select>
                                                                                            </p>

                                                                                            <p class="form-row form-row-wide"
                                                                                                id="calc_shipping_state_field">
                                                                                                <span>
                                                                                                    <label
                                                                                                        for="calc_shipping_state"
                                                                                                        class="screen-reader-text">State/County:</label>
                                                                                                    <select
                                                                                                        name="calc_shipping_state"
                                                                                                        class="state_select"
                                                                                                        id="calc_shipping_state"
                                                                                                        data-placeholder="Tỉnh">
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Chọn một tùy
                                                                                                            chọn&hellip;
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HANOI">
                                                                                                            Hà Nội
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HOCHIMINH">
                                                                                                            Hồ Chí Minh
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="ANGIANG">
                                                                                                            An Giang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BACGIANG">
                                                                                                            Bắc Giang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BACKAN">
                                                                                                            Bắc Kạn
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BACLIEU">
                                                                                                            Bạc Liêu
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BACNINH">
                                                                                                            Bắc Ninh
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BARIAVUNGTAU">
                                                                                                            Bà Rịa -
                                                                                                            Vũng Tàu
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BENTRE">
                                                                                                            Bến Tre
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BINHDINH">
                                                                                                            Bình Định
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BINHDUONG">
                                                                                                            Bình Dương
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BINHPHUOC">
                                                                                                            Bình Phước
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="BINHTHUAN">
                                                                                                            Bình Thuận
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="CAMAU">
                                                                                                            Cà Mau
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="CANTHO">
                                                                                                            Cần Thơ
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="CAOBANG">
                                                                                                            Cao Bằng
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="DAKLAK">
                                                                                                            Đắk Lắk
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="DAKNONG">
                                                                                                            Đắk Nông
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="DANANG">
                                                                                                            Đà Nẵng
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="DIENBIEN">
                                                                                                            Điện Biên
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="DONGNAI">
                                                                                                            Đồng Nai
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="DONGTHAP">
                                                                                                            Đồng Tháp
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="GIALAI">
                                                                                                            Gia Lai
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HAGIANG">
                                                                                                            Hà Giang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HAIDUONG">
                                                                                                            Hải Dương
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HAIPHONG">
                                                                                                            Hải Phòng
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HANAM">
                                                                                                            Hà Nam
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HATINH">
                                                                                                            Hà Tĩnh
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HAUGIANG">
                                                                                                            Hậu Giang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HOABINH">
                                                                                                            Hòa Bình
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="HUNGYEN">
                                                                                                            Hưng Yên
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="KHANHHOA">
                                                                                                            Khánh Hòa
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="KIENGIANG">
                                                                                                            Kiên Giang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="KONTUM">
                                                                                                            Kon Tum
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="LAICHAU">
                                                                                                            Lai Châu
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="LAMDONG">
                                                                                                            Lâm Đồng
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="LANGSON">
                                                                                                            Lạng Sơn
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="LAOCAI">
                                                                                                            Lào Cai
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="LONGAN">
                                                                                                            Long An
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="NAMDINH">
                                                                                                            Nam Định
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="NGHEAN">
                                                                                                            Nghệ An
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="NINHBINH">
                                                                                                            Ninh Bình
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="NINHTHUAN">
                                                                                                            Ninh Thuận
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="PHUTHO">
                                                                                                            Phú Thọ
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="PHUYEN">
                                                                                                            Phú Yên
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="QUANGBINH">
                                                                                                            Quảng Bình
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="QUANGNAM">
                                                                                                            Quảng Nam
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="QUANGNGAI">
                                                                                                            Quảng Ngãi
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="QUANGNINH">
                                                                                                            Quảng Ninh
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="QUANGTRI">
                                                                                                            Quảng Trị
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="SOCTRANG">
                                                                                                            Sóc Trăng
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="SONLA">
                                                                                                            Sơn La
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="TAYNINH">
                                                                                                            Tây Ninh
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="THAIBINH">
                                                                                                            Thái Bình
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="THAINGUYEN">
                                                                                                            Thái Nguyên
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="THANHHOA">
                                                                                                            Thanh Hóa
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="THUATHIENHUE">
                                                                                                            Thừa Thiên
                                                                                                            Huế</option>
                                                                                                        <option
                                                                                                            value="TIENGIANG">
                                                                                                            Tiền Giang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="TRAVINH">
                                                                                                            Trà Vinh --}}
                                            {{-- </option>
                                                                                                        <option
                                                                                                            value="TUYENQUANG">
                                                                                                            Tuyên Quang
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="VINHLONG">
                                                                                                            Vĩnh Long
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="VINHPHUC">
                                                                                                            Vĩnh Phúc
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="YENBAI">
                                                                                                            Yên Bái
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </span>
                                                                                            </p> --}}

                                            {{-- <p class="form-row form-row-wide"
                                                                                                id="calc_shipping_city_field">
                                                                                                <label
                                                                                                    for="calc_shipping_city"
                                                                                                    class="screen-reader-text">City:</label>
                                                                                                <input type="text"
                                                                                                    class="input-text"
                                                                                                    value=""
                                                                                                    placeholder="Thành phố"
                                                                                                    name="calc_shipping_city"
                                                                                                    id="calc_shipping_city" />
                                                                                            </p>


                                                                                            <p><button type="submit"
                                                                                                    name="calc_shipping"
                                                                                                    value="1"
                                                                                                    class="button wp-element-button">Cập
                                                                                                    nhật</button></p>
                                                                                            <input type="hidden"
                                                                                                id="woocommerce-shipping-calculator-nonce"
                                                                                                name="woocommerce-shipping-calculator-nonce"
                                                                                                value="41cb2c6493" /><input
                                                                                                type="hidden"
                                                                                                name="_wp_http_referer"
                                                                                                value="/cart-2/" />
                                                                                        </section>
                                                                                    </form>

                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr> --}}




                                            {{--

                                                            <tr class="order-total">
                                                                <th>Tổng</th>
                                                                <td data-title="Tổng"><strong><span
                                                                            class="woocommerce-Price-amount amount"><bdi>700.000<span
                                                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></strong>
                                                                </td>
                                                            </tr> --}}


                                            {{-- </table> --}}

                                            {{-- <div class="wc-proceed-to-checkout">

                                                            <a href="https://sneakerholicvietnam.vn/checkout/"
                                                                class="checkout-button button alt wc-forward wp-element-button">
                                                                Tiến hành thanh toán</a>
                                                        </div> --}}


                                        </div>
                                        <form class="checkout_coupon mb-0" method="post">
                                            <div class="coupon">
                                                {{-- <input type="text" name="coupon_code"
                                                                class="input-text" id="coupon_code" value=""
                                                                placeholder="" /> <input type="submit"
                                                                class="is-form expand" name="apply_coupon"
                                                                value="Áp dụng" /> --}}

                                                <div class="page-wrapper">
                                                    <div class="checkout shopping">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="block billing-details">
                                                                        <h4 class="widget-title">Thông Tin Cơ Bản</h4>
                                                                        <form class="checkout-form" method="POST"
                                                                            action="{{ route('order') }}">
                                                                            @csrf
                                                                            @if (isset(Auth()->guard('customers')->user()->name))
                                                                                <div class="form-group">
                                                                                    <label for="full_name">Họ Và
                                                                                        Tên</label>
                                                                                    <input name="name"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        value="{{ Auth()->guard('customers')->user()->name }}"
                                                                                        id="full_name" placeholder="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="user_address">Địa Chỉ
                                                                                        Giao Hàng</label>
                                                                                    <input name="address"
                                                                                        type="text"
                                                                                        class="form-control"
                                                                                        value="{{ Auth()->guard('customers')->user()->address }}"
                                                                                        id="user_address"
                                                                                        placeholder="">
                                                                                </div>
                                                                                <div
                                                                                    class="checkout-country-code clearfix">
                                                                                    <div class="form-group">
                                                                                        <label for="user_post_code">Số
                                                                                            điện thoại</label>
                                                                                        <input name="phone"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            value="{{ Auth()->guard('customers')->user()->phone }}"
                                                                                            id="user_post_code">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="user_city">Email</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="email"
                                                                                            value="{{ Auth()->guard('customers')->user()->email }}"
                                                                                            id="user_city">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="user_country">Ghi
                                                                                        chú*</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="user_country"
                                                                                        name="note">
                                                                                </div>

                                                                                {{-- <a href="{{ route('checkOuts') }}" class="btn btn-main pull-right">Checkout</a> --}}
                                                                                <button type="submit"
                                                                                    class="btn btn-main mt-20">Đặt
                                                                                    Hàng</button>
                                                                            @else
                                                                                <h4>Vui lòng đăng nhập trước khi thanh
                                                                                    toán nhé</h4>
                                                                                <a href="{{ route('shop.viewlogin') }}"
                                                                                    class="btn btn-main">Đăng Nhập</a>
                                                                            @endif

                                                                    </div>
                                                                </div>

                                                                @php $totalAll = 0 @endphp

                                                                <div class="block">
                                                                    <h4 class="widget-title">Tóm Tắt</h4>
                                                                    <div class="media product-card">
                                                                        <div class="media-body">
                                                                            @if (session('cart'))
                                                                                @foreach (session('cart') as $id => $details)
                                                                                    @php
                                                                                        $total = $details['price'] * $details['amount'];
                                                                                        $totalAll += $total;
                                                                                    @endphp
                                                                                    <input type="hidden"
                                                                                        value="{{ $id }}"
                                                                                        name="product_id[]">{{ $details['nameVi'] ?? '' }}
                                                                                    x
                                                                                    <input type="hidden"
                                                                                        value="{{ $details['amount'] }}"
                                                                                        name="amount[]">{{ $details['amount'] ?? '' }}
                                                                                    <p class="price">Số Lượng:
                                                                                        {{ $details['amount'] }}</p>
                                                                                    <p class="">Giá:
                                                                                        {{ number_format($details['price']) }}
                                                                                    </p>
                                                                                    <td><input type="hidden"
                                                                                            value="{{ $total }}"
                                                                                            name="total[]">{{ number_format($total) }}.vnd
                                                                                    </td>
                                                                                @endforeach
                                                                            @endif
                                                                            <hr>
                                                                            <tr>
                                                                                <td>Tổng tiền</td>
                                                                                <td><input type="hidden"
                                                                                        name="totalAll"
                                                                                        value="{{ $totalAll }}">{{ number_format($totalAll) }}.vnd
                                                                                </td>
                                                                            </tr>
                                                                        </div>
                                                                    </div>
                                                                    <div class="discount-code">

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="cart-sidebar-content relative"></div>
    </div>

    </div>
    </div>
    </div>
    </div>

    <div class="cart-footer-content after-cart-content relative"></div>
    </div>


    </div>
    </div>
    </div>
    </div>


    </main>

    <footer id="footer" class="footer-wrapper">

        <section class="section" id="section_547987174">
            <div class="bg section-bg fill bg-fill  bg-loaded">





            </div>



            <div class="section-content relative">


                <div class="row" id="row-1442026409">


                    <div id="col-1964255490" class="col medium-4 small-12 large-4">
                        <div class="col-inner">



                            <h5>LIÊN HỆ</h5>
                            <div class="ux-menu stack stack-col justify-start">


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/contact-us/">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            425/16 Nguyễn Đình Chiểu, Phường 5, Quận 3, TP. HCM </span>
                                    </a>
                                </div>


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/mail.to:sneakerholicvietnam@gmail.com">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Email: sneakerholicvietnam@gmail.com </span>
                                    </a>
                                </div>


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/contact-us/">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Hotline 0705 185 731 </span>
                                    </a>
                                </div>



                            </div>


                        </div>
                    </div>



                    <div id="col-171079686" class="col medium-2 small-12 large-2">
                        <div class="col-inner">



                            <h5>HỖ TRỢ</h5>
                            <div class="ux-menu stack stack-col justify-start">


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/2018/07/16/chinh-sach-doi-tra-hoan-tien-san-pham-tai-the-sneakerholic/">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Chính sách chung </span>
                                    </a>
                                </div>


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/2018/12/10/the-sneakerholic-rewards-dac-quyen-danh-rieng-cho-khach-hang-than-thiet/">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Ưu đãi thành viên </span>
                                    </a>
                                </div>


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/tra-cuu-don-hang/">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Tra cứu đơn hàng </span>
                                    </a>
                                </div>



                            </div>


                        </div>
                    </div>



                    <div id="col-557561412" class="col medium-2 small-12 large-2">
                        <div class="col-inner">



                            <h5>VỀ CÔNG TY</h5>
                            <div class="ux-menu stack stack-col justify-start">


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex" href="https://sneakerholicvietnam.vn">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Tuyển Dụng </span>
                                    </a>
                                </div>


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex" href="https://sneakerholicvietnam.vn">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Liên hệ </span>
                                    </a>
                                </div>


                                <div class="ux-menu-link flex menu-item">
                                    <a class="ux-menu-link__link flex"
                                        href="https://sneakerholicvietnam.vn/2018/07/16/the-sneakerholic-live-your-passion">
                                        <i class="ux-menu-link__icon text-center icon-angle-right"></i> <span
                                            class="ux-menu-link__text">
                                            Về Sneakerholic </span>
                                    </a>
                                </div>



                            </div>


                        </div>
                    </div>



                    <div id="col-1877197599" class="col medium-3 small-12 large-3">
                        <div class="col-inner">



                            <h5>Đăng ký nhận ưu đãi</h5>
                            <div role="form" class="wpcf7" id="wpcf7-f31431-o1" lang="vi" dir="ltr">
                                <div class="screen-reader-response">
                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form action="/cart-2/#wpcf7-f31431-o1" method="post" class="wpcf7-form init"
                                    novalidate="novalidate" data-status="init">
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="31431" />
                                        <input type="hidden" name="_wpcf7_version" value="5.6.4" />
                                        <input type="hidden" name="_wpcf7_locale" value="vi" />
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f31431-o1" />
                                        <input type="hidden" name="_wpcf7_container_post" value="0" />
                                        <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                                    </div>
                                    <p><span class="wpcf7-form-control-wrap" data-name="your-email"><input
                                                type="email" name="your-email" value="" size="40"
                                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Nhập email của bạn" /></span><input type="submit"
                                            value="Gửi và đăng ký"
                                            class="wpcf7-form-control has-spinner wpcf7-submit button" /></p>
                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                </form>
                            </div>

                            <div class="social-icons follow-icons full-width text-center"><span>Follow us:</span><a
                                    href="https://www.facebook.com/sneakerholicvn/" target="_blank"
                                    data-label="Facebook" rel="noopener noreferrer nofollow"
                                    class="icon button circle is-outline facebook tooltip" title="Follow on Facebook"
                                    aria-label="Follow on Facebook"><i class="icon-facebook"></i></a><a
                                    href="https://www.instagram.com/thesneakerholicvn/" target="_blank"
                                    rel="noopener noreferrer nofollow" data-label="Instagram"
                                    class="icon button circle is-outline  instagram tooltip"
                                    title="Follow on Instagram" aria-label="Follow on Instagram"><i
                                        class="icon-instagram"></i></a><a
                                    href="https://www.tiktok.com/@thesneakerholicvn" target="_blank"
                                    rel="noopener noreferrer nofollow" data-label="TikTok"
                                    class="icon button circle is-outline tiktok tooltip" title="Follow on TikTok"
                                    aria-label="Follow on TikTok"><i class="icon-tiktok"></i></a></div>


                        </div>
                    </div>



                </div>

            </div>


            <style>
                #section_547987174 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                    background-color: rgb(255, 255, 255);
                }

                #section_547987174 .ux-shape-divider--top svg {
                    height: 150px;
                    --divider-top-width: 100%;
                }

                #section_547987174 .ux-shape-divider--bottom svg {
                    height: 150px;
                    --divider-width: 100%;
                }
            </style>
        </section>

        <div class="absolute-footer dark medium-text-center text-center">
            <div class="container clearfix">


                <div class="footer-primary pull-left">
                    <div class="copyright-footer">
                        Copyright © 2021 The Sneakerholic. All rights reserved. </div>
                </div>
            </div>
        </div>

        <a href="#top"
            class="back-to-top button icon invert plain fixed bottom z-1 is-outline hide-for-medium circle"
            id="top-link" aria-label="Go to top"><i class="icon-angle-up"></i></a>

    </footer>

    </div>

    <div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">


        <div class="sidebar-menu no-scrollbar">


            <ul class="nav nav-sidebar nav-vertical nav-uppercase" data-tab="1">
                <li class="header-search-form search-form html relative has-icon">
                    <div class="header-search-form-wrapper">
                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                            <form role="search" method="get" class="searchform"
                                action="https://sneakerholicvietnam.vn/">
                                <div class="flex-row relative">
                                    <div class="flex-col flex-grow">
                                        <label class="screen-reader-text" for="woocommerce-product-search-field-2">Tìm
                                            kiếm:</label>
                                        <input type="search" id="woocommerce-product-search-field-2"
                                            class="search-field mb-0" placeholder="Tìm kiếm sản phẩm, thương hiệu,..."
                                            value="" name="s" />
                                        <input type="hidden" name="post_type" value="product" />
                                    </div>
                                    <div class="flex-col">
                                        <button type="submit" value="Tìm kiếm"
                                            class="ux-search-submit submit-button secondary button icon mb-0"
                                            aria-label="Submit">
                                            <i class="icon-search"></i> </button>
                                    </div>
                                </div>
                                <div class="live-search-results text-left z-top"></div>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-37365"><a
                        href="https://sneakerholicvietnam.vn/">HOME</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37366"><a
                        href="https://sneakerholicvietnam.vn/product-category/giay/">GIÀY</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37360"><a
                        href="https://sneakerholicvietnam.vn/product-category/dep/">DÉP</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37358"><a
                        href="https://sneakerholicvietnam.vn/product-category/accessories/">PHỤ KIỆN</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-39602"><a
                        href="https://sneakerholicvietnam.vn/product-category/clothing/">ÁO QUẦN</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37361"><a
                        href="https://sneakerholicvietnam.vn/product-category/kinh/">KÍNH</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37362"><a
                        href="https://sneakerholicvietnam.vn/product-category/outlet/">OUTLET</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37359"><a
                        href="https://sneakerholicvietnam.vn/product-category/crep-protect/">SNEAKERS CLEANER</a></li>
                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-62027"><a
                        href="https://sneakerholicvietnam.vn/product-category/used/">USED</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-45670"><a
                        href="https://sneakerholicvietnam.vn/thong-tin-ve-chuong-trinh-ky-gui-san-pham/">KÝ GỬI</a>
                </li>
                <li class="html header-social-icons ml-0">
                    <div class="social-icons follow-icons"><a href="http://url" target="_blank"
                            data-label="Facebook" rel="noopener noreferrer nofollow"
                            class="icon plain facebook tooltip" title="Follow on Facebook"
                            aria-label="Follow on Facebook"><i class="icon-facebook"></i></a><a href="http://url"
                            target="_blank" rel="noopener noreferrer nofollow" data-label="Instagram"
                            class="icon plain  instagram tooltip" title="Follow on Instagram"
                            aria-label="Follow on Instagram"><i class="icon-instagram"></i></a><a href="http://url"
                            target="_blank" data-label="Twitter" rel="noopener noreferrer nofollow"
                            class="icon plain  twitter tooltip" title="Follow on Twitter"
                            aria-label="Follow on Twitter"><i class="icon-twitter"></i></a><a
                            href="mailto:your@email" data-label="E-mail" rel="nofollow"
                            class="icon plain  email tooltip" title="Send us an email"
                            aria-label="Send us an email"><i class="icon-envelop"></i></a></div>
                </li>
                <li class="html custom html_topbar_right">
                    <div class="hot-news-cont">
                        <div class="hot-news-slide">
                            <div class="cont-item"><a href="#">FREE SHIPPING VỚI HOÁ ĐƠN TỪ 800K !</a></div>
                            <div class="cont-item"><a href="#">HÀNG 2 TUẦN NHẬN ĐỔI - GIÀY NỬA NĂM BẢO
                                    HÀNH</a></div>
                            <div class="cont-item"><a href="#">BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ
                                    KIỆN</a></div>
                            <div class="cont-item"><a href="#">BUY 2 GET 10% OFF - ÁP DỤNG VỚI TẤT CẢ BASIC
                                    TEE</a></div>
                        </div>
                    </div>
                </li>
            </ul>


        </div>


    </div>

    <script>
        jQuery(document).ready(function($) {
            if ($('.search-results').length) {
                var url_string = window.location.href
                var url = new URL(url_string);
                var s = url.searchParams.get("s");
                if (s) {

                    $.each($('.filter-items'), function(index, val) {
                        const parent = $(val).parent();
                        parent.html($(val).clone());
                    });

                    console.log(s)
                    console.log(s)
                    $.each($('.filter-item a'), function(index, val) {
                        $(val).attr('href', $(val).attr('href') + '&s=' + s);
                        $(val).off();
                    });
                    $('.filter-item a').off();
                    $('.filter-item').off();
                    $('.filter-item a').click(function(event) {
                        event.preventDefault();
                        window.location.href = $(val).attr('href')
                    });
                }
            }
        });
    </script>


    <script type="text/javascript">
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>
    <style id='global-styles-inline-css' type='text/css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }
    </style>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/honeypot/includes/js/wpa.js?ver=2.0.2' id='wpascript-js'>
    </script>
    <script type='text/javascript' id='wpascript-js-after'>
        wpa_field_info = {
            "wpa_field_name": "tfeqjk8387",
            "wpa_field_value": 631791,
            "wpa_add_test": "no"
        }
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/select2/select2.full.min.js?ver=4.0.3-wc.7.1.0'
        id='select2-js'></script>
    <script type='text/javascript' id='devvn_tinhthanhpho-js-extra'>
        /* <![CDATA[ */
        var vncheckout_array = {
            "admin_ajax": "https:\/\/sneakerholicvietnam.vn\/wp-admin\/admin-ajax.php",
            "get_address": "https:\/\/sneakerholicvietnam.vn\/wp-admin\/admin-ajax.php",
            "home_url": "https:\/\/sneakerholicvietnam.vn",
            "formatNoMatches": "Kh\u00f4ng c\u00f3 gi\u00e1 tr\u1ecb",
            "phone_error": "S\u1ed1 \u0111i\u1ec7n tho\u1ea1i kh\u00f4ng \u0111\u00fang \u0111\u1ecbnh d\u1ea1ng",
            "loading_text": "\u0110ang ki\u1ec3m tra...",
            "loadaddress_error": "S\u1ed1 \u0111i\u1ec7n tho\u1ea1i kh\u00f4ng t\u1ed3n t\u1ea1i"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woo-vietnam-checkout/assets/js/devvn_tinhthanh.js?ver=2.0.4'
        id='devvn_tinhthanhpho-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.7.1.0'
        id='jquery-blockui-js'></script>
    <script type='text/javascript' id='wc-add-to-cart-js-extra'>
        /* <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
            "i18n_view_cart": "Xem gi\u1ecf h\u00e0ng",
            "cart_url": "https:\/\/sneakerholicvietnam.vn\/cart-2\/",
            "is_cart": "1",
            "cart_redirect_after_add": "no"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=7.1.0'
        id='wc-add-to-cart-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.7.1.0'
        id='js-cookie-js'></script>
    <script type='text/javascript' id='woocommerce-js-extra'>
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=7.1.0'
        id='woocommerce-js'></script>
    <script type='text/javascript' id='wc-country-select-js-extra'>
        /* <![CDATA[ */
        var wc_country_select_params = {
            "countries": "{\"VN\":{\"HANOI\":\"H\\u00e0 N\\u1ed9i\",\"HOCHIMINH\":\"H\\u1ed3 Ch\\u00ed Minh\",\"ANGIANG\":\"An Giang\",\"BACGIANG\":\"B\\u1eafc Giang\",\"BACKAN\":\"B\\u1eafc K\\u1ea1n\",\"BACLIEU\":\"B\\u1ea1c Li\\u00eau\",\"BACNINH\":\"B\\u1eafc Ninh\",\"BARIAVUNGTAU\":\"B\\u00e0 R\\u1ecba - V\\u0169ng T\\u00e0u\",\"BENTRE\":\"B\\u1ebfn Tre\",\"BINHDINH\":\"B\\u00ecnh \\u0110\\u1ecbnh\",\"BINHDUONG\":\"B\\u00ecnh D\\u01b0\\u01a1ng\",\"BINHPHUOC\":\"B\\u00ecnh Ph\\u01b0\\u1edbc\",\"BINHTHUAN\":\"B\\u00ecnh Thu\\u1eadn\",\"CAMAU\":\"C\\u00e0 Mau\",\"CANTHO\":\"C\\u1ea7n Th\\u01a1\",\"CAOBANG\":\"Cao B\\u1eb1ng\",\"DAKLAK\":\"\\u0110\\u1eafk L\\u1eafk\",\"DAKNONG\":\"\\u0110\\u1eafk N\\u00f4ng\",\"DANANG\":\"\\u0110\\u00e0 N\\u1eb5ng\",\"DIENBIEN\":\"\\u0110i\\u1ec7n Bi\\u00ean\",\"DONGNAI\":\"\\u0110\\u1ed3ng Nai\",\"DONGTHAP\":\"\\u0110\\u1ed3ng Th\\u00e1p\",\"GIALAI\":\"Gia Lai\",\"HAGIANG\":\"H\\u00e0 Giang\",\"HAIDUONG\":\"H\\u1ea3i D\\u01b0\\u01a1ng\",\"HAIPHONG\":\"H\\u1ea3i Ph\\u00f2ng\",\"HANAM\":\"H\\u00e0 Nam\",\"HATINH\":\"H\\u00e0 T\\u0129nh\",\"HAUGIANG\":\"H\\u1eadu Giang\",\"HOABINH\":\"H\\u00f2a B\\u00ecnh\",\"HUNGYEN\":\"H\\u01b0ng Y\\u00ean\",\"KHANHHOA\":\"Kh\\u00e1nh H\\u00f2a\",\"KIENGIANG\":\"Ki\\u00ean Giang\",\"KONTUM\":\"Kon Tum\",\"LAICHAU\":\"Lai Ch\\u00e2u\",\"LAMDONG\":\"L\\u00e2m \\u0110\\u1ed3ng\",\"LANGSON\":\"L\\u1ea1ng S\\u01a1n\",\"LAOCAI\":\"L\\u00e0o Cai\",\"LONGAN\":\"Long An\",\"NAMDINH\":\"Nam \\u0110\\u1ecbnh\",\"NGHEAN\":\"Ngh\\u1ec7 An\",\"NINHBINH\":\"Ninh B\\u00ecnh\",\"NINHTHUAN\":\"Ninh Thu\\u1eadn\",\"PHUTHO\":\"Ph\\u00fa Th\\u1ecd\",\"PHUYEN\":\"Ph\\u00fa Y\\u00ean\",\"QUANGBINH\":\"Qu\\u1ea3ng B\\u00ecnh\",\"QUANGNAM\":\"Qu\\u1ea3ng Nam\",\"QUANGNGAI\":\"Qu\\u1ea3ng Ng\\u00e3i\",\"QUANGNINH\":\"Qu\\u1ea3ng Ninh\",\"QUANGTRI\":\"Qu\\u1ea3ng Tr\\u1ecb\",\"SOCTRANG\":\"S\\u00f3c Tr\\u0103ng\",\"SONLA\":\"S\\u01a1n La\",\"TAYNINH\":\"T\\u00e2y Ninh\",\"THAIBINH\":\"Th\\u00e1i B\\u00ecnh\",\"THAINGUYEN\":\"Th\\u00e1i Nguy\\u00ean\",\"THANHHOA\":\"Thanh H\\u00f3a\",\"THUATHIENHUE\":\"Th\\u1eeba Thi\\u00ean Hu\\u1ebf\",\"TIENGIANG\":\"Ti\\u1ec1n Giang\",\"TRAVINH\":\"Tr\\u00e0 Vinh\",\"TUYENQUANG\":\"Tuy\\u00ean Quang\",\"VINHLONG\":\"V\\u0129nh Long\",\"VINHPHUC\":\"V\\u0129nh Ph\\u00fac\",\"YENBAI\":\"Y\\u00ean B\\u00e1i\"}}",
            "i18n_select_state_text": "Ch\u1ecdn m\u1ed9t t\u00f9y ch\u1ecdn\u2026",
            "i18n_no_matches": "Kh\u00f4ng t\u00ecm th\u1ea5y k\u1ebft qu\u1ea3 ph\u00f9 h\u1ee3p",
            "i18n_ajax_error": "Kh\u00f4ng t\u1ea3i \u0111\u01b0\u1ee3c",
            "i18n_input_too_short_1": "Vui l\u00f2ng nh\u1eadp 1 ho\u1eb7c nhi\u1ec1u k\u00fd t\u1ef1",
            "i18n_input_too_short_n": "Vui l\u00f2ng nh\u1eadp %qty% ho\u1eb7c nhi\u1ec1u k\u00fd t\u1ef1",
            "i18n_input_too_long_1": "Vui l\u00f2ng x\u00f3a 1 k\u00fd t\u1ef1",
            "i18n_input_too_long_n": "Vui l\u00f2ng x\u00f3a %qty%  k\u00fd t\u1ef1",
            "i18n_selection_too_long_1": "B\u1ea1n ch\u1ec9 c\u00f3 th\u1ec3 ch\u1ecdn 1 s\u1ea3n ph\u1ea9m",
            "i18n_selection_too_long_n": "B\u1ea1n c\u00f3 th\u1ec3 ch\u1ecdn %qty% s\u1ea3n ph\u1ea9m",
            "i18n_load_more": "T\u1ea3i th\u00eam k\u1ebft qu\u1ea3\u2026",
            "i18n_searching": "T\u00ecm ki\u1ebfm\u2026"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js?ver=7.1.0'
        id='wc-country-select-js'></script>
    <script type='text/javascript' id='wc-address-i18n-js-extra'>
        /* <![CDATA[ */
        var wc_address_i18n_params = {
            "locale": "{\"VN\":{\"state\":{\"label\":\"T\\u1ec9nh\\\/Th\\u00e0nh ph\\u1ed1\",\"priority\":41},\"city\":{\"priority\":42},\"address_1\":{\"priority\":44},\"address_2\":{\"hidden\":false,\"priority\":43}},\"default\":{\"last_name\":{\"label\":\"H\\u1ecd v\\u00e0 t\\u00ean\",\"placeholder\":\"H\\u1ecd t\\u00ean c\\u1ee7a b\\u1ea1n\",\"required\":true,\"class\":[\"form-row-wide\"],\"clear\":true},\"city\":{\"label\":\"Qu\\u1eadn\\\/Huy\\u1ec7n\",\"type\":\"select\",\"required\":true,\"class\":[\"form-row-wide\"],\"priority\":20,\"placeholder\":\"Ch\\u1ecdn qu\\u1eadn huy\\u1ec7n\",\"options\":{\"\":\"\"}},\"address_2\":{\"label\":\"X\\u00e3\\\/Ph\\u01b0\\u1eddng\",\"type\":\"select\",\"class\":[\"form-row-wide\"],\"priority\":30,\"placeholder\":\"Ch\\u1ecdn x\\u00e3\\\/ph\\u01b0\\u1eddng\",\"options\":{\"\":\"\"}},\"country\":{\"type\":\"country\",\"label\":\"Qu\\u1ed1c gia\\\/Khu v\\u1ef1c\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\",\"update_totals_on_change\"],\"autocomplete\":\"country\",\"priority\":40},\"address_1\":{\"label\":\"\\u0110\\u1ecba ch\\u1ec9\",\"placeholder\":\"\\u0110\\u1ecba ch\\u1ec9\",\"required\":true,\"class\":[\"form-row-wide\"],\"autocomplete\":\"address-line1\",\"priority\":50},\"state\":{\"type\":\"state\",\"label\":\"Bang \\\/ H\\u1ea1t\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"state\"],\"autocomplete\":\"address-level1\",\"priority\":80}}}",
            "locale_fields": "{\"address_1\":\"#billing_address_1_field, #shipping_address_1_field\",\"address_2\":\"#billing_address_2_field, #shipping_address_2_field\",\"state\":\"#billing_state_field, #shipping_state_field, #calc_shipping_state_field\",\"postcode\":\"#billing_postcode_field, #shipping_postcode_field, #calc_shipping_postcode_field\",\"city\":\"#billing_city_field, #shipping_city_field, #calc_shipping_city_field\"}",
            "i18n_required_text": "b\u1eaft bu\u1ed9c",
            "i18n_optional_text": "tu\u1ef3 ch\u1ecdn"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min.js?ver=7.1.0'
        id='wc-address-i18n-js'></script>
    <script type='text/javascript' id='wc-cart-js-extra'>
        /* <![CDATA[ */
        var wc_cart_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
            "update_shipping_method_nonce": "852adbb8f1",
            "apply_coupon_nonce": "620fa56963",
            "remove_coupon_nonce": "f8c652ab29"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/frontend/cart.min.js?ver=7.1.0'
        id='wc-cart-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/selectWoo/selectWoo.full.min.js?ver=1.0.9-wc.7.1.0'
        id='selectWoo-js'></script>
    <script type='text/javascript' id='wc-cart-fragments-js-extra'>
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
            "cart_hash_key": "wc_cart_hash_8684a70ccf518a9a41afbc81c6bf2789",
            "fragment_name": "wc_fragments_8684a70ccf518a9a41afbc81c6bf2789",
            "request_timeout": "5000"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=7.1.0'
        id='wc-cart-fragments-js'></script>
    <script type='text/javascript' id='awdr-main-js-extra'>
        /* <![CDATA[ */
        var awdr_params = {
            "ajaxurl": "https:\/\/sneakerholicvietnam.vn\/wp-admin\/admin-ajax.php",
            "nonce": "9a4d2c06c7",
            "enable_update_price_with_qty": "show_when_matched",
            "refresh_order_review": "0",
            "custom_target_simple_product": "",
            "custom_target_variable_product": "",
            "js_init_trigger": "",
            "awdr_opacity_to_bulk_table": "",
            "awdr_dynamic_bulk_table_status": "0",
            "awdr_dynamic_bulk_table_off": "on",
            "custom_simple_product_id_selector": "",
            "custom_variable_product_id_selector": ""
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woo-discount-rules/v2/Assets/Js/site_main.js?ver=2.5.2'
        id='awdr-main-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woo-discount-rules/v2/Assets/Js/awdr-dynamic-price.js?ver=2.5.2'
        id='awdr-dynamic-price-js'></script>
    <script type='text/javascript' id='rocket-browser-checker-js-after'>
        "use strict";
        var _createClass = function() {
            function defineProperties(target, props) {
                for (var i = 0; i < props.length; i++) {
                    var descriptor = props[i];
                    descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in
                        descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key,
                            descriptor)
                }
            }
            return function(Constructor, protoProps, staticProps) {
                return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps &&
                    defineProperties(Constructor, staticProps), Constructor
            }
        }();

        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
        }
        var RocketBrowserCompatibilityChecker = function() {
            function RocketBrowserCompatibilityChecker(options) {
                _classCallCheck(this, RocketBrowserCompatibilityChecker), this.passiveSupported = !1, this
                    ._checkPassiveOption(this), this.options = !!this.passiveSupported && options
            }
            return _createClass(RocketBrowserCompatibilityChecker, [{
                key: "_checkPassiveOption",
                value: function(self) {
                    try {
                        var options = {
                            get passive() {
                                return !(self.passiveSupported = !0)
                            }
                        };
                        window.addEventListener("test", null, options), window.removeEventListener(
                            "test", null, options)
                    } catch (err) {
                        self.passiveSupported = !1
                    }
                }
            }, {
                key: "initRequestIdleCallback",
                value: function() {
                    !1 in window && (window.requestIdleCallback = function(cb) {
                        var start = Date.now();
                        return setTimeout(function() {
                            cb({
                                didTimeout: !1,
                                timeRemaining: function() {
                                    return Math.max(0, 50 - (Date.now() -
                                        start))
                                }
                            })
                        }, 1)
                    }), !1 in window && (window.cancelIdleCallback = function(id) {
                        return clearTimeout(id)
                    })
                }
            }, {
                key: "isDataSaverModeOn",
                value: function() {
                    return "connection" in navigator && !0 === navigator.connection.saveData
                }
            }, {
                key: "supportsLinkPrefetch",
                value: function() {
                    var elem = document.createElement("link");
                    return elem.relList && elem.relList.supports && elem.relList.supports("prefetch") &&
                        window.IntersectionObserver && "isIntersecting" in IntersectionObserverEntry
                        .prototype
                }
            }, {
                key: "isSlowConnection",
                value: function() {
                    return "connection" in navigator && "effectiveType" in navigator.connection && (
                        "2g" === navigator.connection.effectiveType || "slow-2g" === navigator
                        .connection.effectiveType)
                }
            }]), RocketBrowserCompatibilityChecker
        }();
    </script>
    <script type='text/javascript' id='rocket-preload-links-js-extra'>
        /* <![CDATA[ */
        var RocketPreloadLinksConfig = {
            "excludeUris": "\/cart-2\/|\/checkout\/|\/sitemap_index.xml|\/post-sitemap.xml|\/page-sitemap.xml|\/product-sitemap1.xml|\/product-sitemap2.xml|\/product-sitemap3.xml|\/product-sitemap4.xml|\/product-sitemap5.xml|\/product-sitemap6.xml|\/product-sitemap7.xml|\/product-sitemap8.xml|\/product-sitemap9.xml|\/product-sitemap10.xml|\/product-sitemap11.xml|\/product-sitemap12.xml|\/product-sitemap13.xml|\/product-sitemap14.xml|\/category-sitemap.xml|\/product_cat-sitemap.xml|\/pa_thuong-hieu-sitemap.xml|\/(?:.+\/)?feed(?:\/(?:.+\/?)?)?$|\/(?:.+\/)?embed\/|\/checkout\/|\/cart-2\/|\/my-account\/|\/wc-api\/v(.*)|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/refer\/|\/go\/|\/recommend\/|\/recommends\/",
            "usesTrailingSlash": "1",
            "imageExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|pdf|doc|docx|xls|xlsx|php",
            "fileExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|pdf|doc|docx|xls|xlsx|php|html|htm",
            "siteUrl": "https:\/\/sneakerholicvietnam.vn",
            "onHoverDelay": "100",
            "rateThrottle": "3"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' id='rocket-preload-links-js-after'>
        (function() {
            "use strict";
            var r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                    return typeof e
                } : function(e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ?
                        "symbol" : typeof e
                },
                e = function() {
                    function i(e, t) {
                        for (var n = 0; n < t.length; n++) {
                            var i = t[n];
                            i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0),
                                Object.defineProperty(e, i.key, i)
                        }
                    }
                    return function(e, t, n) {
                        return t && i(e.prototype, t), n && i(e, n), e
                    }
                }();

            function i(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }
            var t = function() {
                function n(e, t) {
                    i(this, n), this.browser = e, this.config = t, this.options = this.browser.options, this
                        .prefetched = new Set, this.eventTime = null, this.threshold = 1111, this.numOnHover = 0
                }
                return e(n, [{
                    key: "init",
                    value: function() {
                        !this.browser.supportsLinkPrefetch() || this.browser.isDataSaverModeOn() ||
                            this.browser.isSlowConnection() || (this.regex = {
                                excludeUris: RegExp(this.config.excludeUris, "i"),
                                images: RegExp(".(" + this.config.imageExt + ")$", "i"),
                                fileExt: RegExp(".(" + this.config.fileExt + ")$", "i")
                            }, this._initListeners(this))
                    }
                }, {
                    key: "_initListeners",
                    value: function(e) {
                        -1 < this.config.onHoverDelay && document.addEventListener("mouseover", e
                                .listener.bind(e), e.listenerOptions), document.addEventListener(
                                "mousedown", e.listener.bind(e), e.listenerOptions), document
                            .addEventListener("touchstart", e.listener.bind(e), e.listenerOptions)
                    }
                }, {
                    key: "listener",
                    value: function(e) {
                        var t = e.target.closest("a"),
                            n = this._prepareUrl(t);
                        if (null !== n) switch (e.type) {
                            case "mousedown":
                            case "touchstart":
                                this._addPrefetchLink(n);
                                break;
                            case "mouseover":
                                this._earlyPrefetch(t, n, "mouseout")
                        }
                    }
                }, {
                    key: "_earlyPrefetch",
                    value: function(t, e, n) {
                        var i = this,
                            r = setTimeout(function() {
                                if (r = null, 0 === i.numOnHover) setTimeout(function() {
                                    return i.numOnHover = 0
                                }, 1e3);
                                else if (i.numOnHover > i.config.rateThrottle) return;
                                i.numOnHover++, i._addPrefetchLink(e)
                            }, this.config.onHoverDelay);
                        t.addEventListener(n, function e() {
                            t.removeEventListener(n, e, {
                                passive: !0
                            }), null !== r && (clearTimeout(r), r = null)
                        }, {
                            passive: !0
                        })
                    }
                }, {
                    key: "_addPrefetchLink",
                    value: function(i) {
                        return this.prefetched.add(i.href), new Promise(function(e, t) {
                            var n = document.createElement("link");
                            n.rel = "prefetch", n.href = i.href, n.onload = e, n.onerror =
                                t, document.head.appendChild(n)
                        }).catch(function() {})
                    }
                }, {
                    key: "_prepareUrl",
                    value: function(e) {
                        if (null === e || "object" !== (void 0 === e ? "undefined" : r(e)) || !1 in
                            e || -1 === ["http:", "https:"].indexOf(e.protocol)) return null;
                        var t = e.href.substring(0, this.config.siteUrl.length),
                            n = this._getPathname(e.href, t),
                            i = {
                                original: e.href,
                                protocol: e.protocol,
                                origin: t,
                                pathname: n,
                                href: t + n
                            };
                        return this._isLinkOk(i) ? i : null
                    }
                }, {
                    key: "_getPathname",
                    value: function(e, t) {
                        var n = t ? e.substring(this.config.siteUrl.length) : e;
                        return n.startsWith("/") || (n = "/" + n), this._shouldAddTrailingSlash(n) ?
                            n + "/" : n
                    }
                }, {
                    key: "_shouldAddTrailingSlash",
                    value: function(e) {
                        return this.config.usesTrailingSlash && !e.endsWith("/") && !this.regex
                            .fileExt.test(e)
                    }
                }, {
                    key: "_isLinkOk",
                    value: function(e) {
                        return null !== e && "object" === (void 0 === e ? "undefined" : r(e)) && (!
                            this.prefetched.has(e.href) && e.origin === this.config.siteUrl && -
                            1 === e.href.indexOf("?") && -1 === e.href.indexOf("#") && !this
                            .regex.excludeUris.test(e.href) && !this.regex.images.test(e.href))
                    }
                }], [{
                    key: "run",
                    value: function() {
                        "undefined" != typeof RocketPreloadLinksConfig && new n(
                            new RocketBrowserCompatibilityChecker({
                                capture: !0,
                                passive: !0
                            }), RocketPreloadLinksConfig).init()
                    }
                }]), n
            }();
            t.run();
        }());
    </script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js?ver=6.1.1'
        id='slick-carousel-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9'
        id='regenerator-runtime-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0' id='wp-polyfill-js'>
    </script>
    <script type='text/javascript' src='https://sneakerholicvietnam.vn/wp-includes/js/hoverIntent.min.js?ver=1.10.2'
        id='hoverIntent-js'></script>
    <script type='text/javascript' id='flatsome-js-js-extra'>
        /* <![CDATA[ */
        var flatsomeVars = {
            "theme": {
                "version": "3.16.0"
            },
            "ajaxurl": "https:\/\/sneakerholicvietnam.vn\/wp-admin\/admin-ajax.php",
            "rtl": "",
            "sticky_height": "70",
            "assets_url": "https:\/\/sneakerholicvietnam.vn\/wp-content\/themes\/flatsome\/assets\/js\/",
            "lightbox": {
                "close_markup": "<button title=\"%title%\" type=\"button\" class=\"mfp-close\"><svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"28\" height=\"28\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-x\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"><\/line><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"><\/line><\/svg><\/button>",
                "close_btn_inside": false
            },
            "user": {
                "can_edit_pages": false
            },
            "i18n": {
                "mainMenu": "Main Menu",
                "toggleButton": "Toggle"
            },
            "options": {
                "cookie_notice_version": "1",
                "swatches_layout": false,
                "swatches_box_select_event": false,
                "swatches_box_behavior_selected": false,
                "swatches_box_update_urls": "1",
                "swatches_box_reset": false,
                "swatches_box_reset_extent": false,
                "swatches_box_reset_time": 300,
                "search_result_latency": "0"
            },
            "is_mini_cart_reveal": "1"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/flatsome.js?ver=2138faedd39ec708526d158d5a3d53d7'
        id='flatsome-js-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/extensions/flatsome-swatches-frontend.js?ver=3.16.0'
        id='flatsome-swatches-frontend-js'></script>
    <script type='text/javascript' id='isb-scripts-js-extra'>
        /* <![CDATA[ */
        var isb = {
            "time": null,
            "localization": {
                "d": "d",
                "days": "days"
            }
        };
        /* ]]> */
    </script>
    <script type='text/javascript' id='isb-scripts-js' data-type="lazy" data-src="https://sneakerholicvietnam.vn/wp-content/plugins/improved-sale-badges/assets/js/scripts.js?ver=4.4.1"></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/inc/extensions/flatsome-cart-refresh/flatsome-cart-refresh.js?ver=3.16.0'
        id='flatsome-cart-refresh-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/plugins/woo-discount-rules-pro/Assets/Js/awdr_pro.js?ver=2.5.2'
        id='woo_discount_pro_script-js'></script>
    <script type='text/javascript'
        src='https://sneakerholicvietnam.vn/wp-content/themes/flatsome/assets/js/woocommerce.js?ver=2114c593f5a803e4039d07c9e6fef8b6'
        id='flatsome-theme-woocommerce-js-js'></script>
    <!--[if IE]>
<script type='text/javascript'
    src='https://cdn.jsdelivr.net/npm/intersection-observer-polyfill@0.1.0/dist/IntersectionObserver.js?ver=0.1.0'
    id='intersection-observer-polyfill-js'></script>
<![endif]-->
    <!--[if IE]>
<script type='text/javascript'
    src='https://cdn.jsdelivr.net/gh/nuxodin/ie11CustomProperties@4.0.1/ie11CustomProperties.min.js?ver=4.0.1'
    id='css-vars-polyfill-js'></script>
<![endif]-->
    <script type="text/javascript" id="flying-scripts">
        const loadScriptsTimer = setTimeout(loadScripts, 5 * 1000);
        const userInteractionEvents = ["mouseover", "keydown", "touchstart", "touchmove", "wheel"];
        userInteractionEvents.forEach(function(event) {
            window.addEventListener(event, triggerScriptLoader, {
                passive: !0
            })
        });

        function triggerScriptLoader() {
            loadScripts();
            clearTimeout(loadScriptsTimer);
            userInteractionEvents.forEach(function(event) {
                window.removeEventListener(event, triggerScriptLoader, {
                    passive: !0
                })
            })
        }

        function loadScripts() {
            document.querySelectorAll("script[data-type='lazy']").forEach(function(elem) {
                elem.setAttribute("src", elem.getAttribute("data-src"))
            })
        }
    </script>
    <script type="text/javascript">
        jQuery(".hot-news-slide").slick({
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 500,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    </script>

    <div id="contact" class="arcontactus-widget arcontactus-message right md ui-draggable hidden-xs hidden-sm">
        <div class="messangers-block">
            <a class="messanger" rel="nofollow noopener" href="https://m.me/sneakerholicvn" target="_blank">
                <span>
                    <img width="40" height="40"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2022/05/message.png" alt="messenger">
                </span>
                <p>Messenger</p>
            </a>
            <a class="messanger" rel="nofollow noopener" href="https://www.instagram.com/thesneakerholicvn/"
                target="_blank">
                <span>
                    <img width="40" height="40"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2022/05/instagram.png" alt="instagram">
                </span>
                <p>Instagram</p>
            </a>
            <a class="messanger zaloIcon" rel="nofollow noopener" href="https://zalo.me/2288877121574468762"
                target="_blank">
                <span>
                    <img width="40" height="40"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2022/05/zalo.png" alt="Zalo">
                </span>
                <p>Chat Zalo</p>
            </a>
            <a class="messanger" target="_blank" rel="nofollow noopener"
                href="https://beacons.ai/thesneakerholicvietnam">
                <span>
                    <img width="40" height="40"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2022/05/call.png" alt="Gọi điện">
                </span>
                <p>Liên hệ</p>
            </a>
            <a class="messanger" rel="nofollow noopener"
                href="https://www.google.com/maps/place/The+Sneakerholic/@10.7702067,106.6837252,15z/data=!4m5!3m4!1s0x0:0x409a39727a891be3!8m2!3d10.7702067!4d106.6837252"
                target="_self">
                <span>
                    <img width="40" height="40"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2022/05/vitri.png" alt="Bản đồ">
                </span>
                <p>Chỉ đường</p>
            </a>

        </div>
        <div class="arcontactus-message-button" style="background-color: #185137">
            <div class="static">
                <svg width="20" height="20" viewbox="0 0 20 20" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Canvas" transform="translate(-825 -308)">
                        <g id="Vector">
                            <use xlink:href="#path0_fill0123" transform="translate(825 308)" fill="#FFFFFF"></use>
                        </g>
                    </g>
                    <defs>
                        <path id="path0_fill0123"
                            d="M 19 4L 17 4L 17 13L 4 13L 4 15C 4 15.55 4.45 16 5 16L 16 16L 20 20L 20 5C 20 4.45 19.55 4 19 4ZM 15 10L 15 1C 15 0.45 14.55 0 14 0L 1 0C 0.45 0 0 0.45 0 1L 0 15L 4 11L 14 11C 14.55 11 15 10.55 15 10Z">
                        </path>
                    </defs>
                </svg>
                <p>Liên hệ</p>
            </div>

            <div class="arcontactus-close">
                <svg width="12" height="13" viewbox="0 0 14 14" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Canvas" transform="translate(-4087 108)">
                        <g id="Vector">
                            <use xlink:href="#path0_fill" transform="translate(4087 -108)" fill="currentColor">
                            </use>
                        </g>
                    </g>
                    <defs>
                        <path id="path0_fill"
                            d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z">
                        </path>
                    </defs>
                </svg>
            </div>
            <div class="pulsation" style="background-color: #185137"></div>
            <div class="pulsation" style="background-color: #185137"></div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            jQuery(".arcontactus-message-button").click(function() {
                jQuery(".arcontactus-close").toggleClass('show-messageners-block');
                jQuery(".messangers-block").toggleClass('show-messageners-block');
                jQuery(".static").toggleClass('hidden');
            });
        });
    </script>


    <script>
        jQuery(".term-label br").remove();
        jQuery(".item-count br").remove();
        jQuery(".filter-item>p>a>br").remove();
        jQuery('span:empty:only-child').parent('p').remove();
        jQuery('p:empty').remove();
    </script>
    <style>
        /*Contact mobile*/
        .visible-sm,
        .visible-xs {
            display: none !important;
        }

        @media (max-width:767px) {
            .visible-xs {
                display: block !important;
            }
        }

        @media (min-width:768px) and (max-width:991px) {
            .visible-sm {
                display: block !important;
            }
        }

        @media (max-width:768px) {
            .menuBot {
                background: #fff;
                width: 100%;
                border-radius: 0;
                color: #fff;
                position: fixed;
                bottom: 0;
                left: 0;
                z-index: 999;
                margin: 0;
                box-shadow: 0 4px 10px 0 #000;
                border: 1px solid #f2f2f2;
            }

            .menuBot ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            .menuBot ul li {
                width: 19%;
                height: auto;
                display: inline-block;
                text-align: center;
                padding-top: 8px;
                border-right: 1px solid #c4c4c4a6;
                margin-bottom: 0
            }

            .menuBot ul li a img {
                display: inline-block;
                width: 16px;
                height: 16px;
                margin-bottom: 4px;
                vertical-align: middle;
            }

            .menuBot ul li:last-child {
                border: none;
            }

            .menuBot ul li:last-child a img {
                padding: 2px;
                border-radius: 2px;
            }

            .menuBot ul li a span {
                font-weight: 500;
                line-height: 20px;
                display: block;
                color: #333;
                font-size: 11px;
            }
        }
    </style>
    <div class="menuBot visible-xs visible-sm">
        <ul>
            <li>
                <a rel="noopener"
                    href="https://www.google.com/maps/place/The+Sneakerholic/@10.7702067,106.6837252,15z/data=!4m5!3m4!1s0x0:0x409a39727a891be3!8m2!3d10.7702067!4d106.6837252"
                    target="_blank">
                    <img alt="map" width="16" height="16"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2021/09/map1.png">
                    <span>Chỉ đường</span>
                </a>
            </li>
            <li>
                <a rel="noopener" href="https://beacons.ai/thesneakerholicvietnam">
                    <img alt="Hotline" width="16" height="16"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2021/09/telephone.png">
                    <span class="btn_phone_txt">Liên hệ</span>
                </a>
            </li>
            <li>
                <a rel="noopener" href="https://m.me/sneakerholicvn/" target="_blank">
                    <img alt="Messenger" width="16" height="16"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2021/09/facebook-messenger.png" />
                    <span>Messenger</span>
                </a>
            </li>
            <li>
                <a rel="noopener" href="https://www.instagram.com/thesneakerholicvn/" target="_blank">
                    <img alt="Instagram" width="16" height="16"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2021/09/instagram-new.png" />
                    <span>Instagram</span>
                </a>
            </li>

            <li>
                <a rel="noopener" href="https://zalo.me/2288877121574468762" target="_blank">
                    <img alt="Chat Zalo" width="16" height="16"
                        src="https://sneakerholicvietnam.vn/wp-content/uploads/2021/09/zalo1.jpeg">
                    <span>Chat Zalo</span>
                </a>
            </li>

        </ul>
    </div>

</body>

</html>

<!-- Performance optimized by Redis Object Cache. Learn more: https://wprediscache.com -->
