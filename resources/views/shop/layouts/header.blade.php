<header id="header" class="header header-full-width has-sticky sticky-jump">
    <div class="header-wrapper">

        <div class="hot-news-cont">
            <div class="hot-news-slide">
                <div class="cont-item">
                    <a href="">
                        HÀNG 1 TUẦN NHẬN ĐỔI - V SINH/BẢO HÀNH GIÀY 1 NĂM</a>
                </div>
                <div class="cont-item">
                    <a href="">
                        HỖ TRỢ COD TOÀN QUỐC</a>
                </div>
                <div class="cont-item">
                    <a
                        href="">
                        FREE SHIPPING CHO ĐƠN HÀNG THANH TOÁN TRƯỚC</a>
                </div>
                <div class="cont-item">
                    <a
                        href="">
                        TÍCH LY HẠN MỨC ƯU ĐÃI CHO KHCH HÀNG THÂN THIẾT</a>
                </div>

            </div>
        </div>

        <div id="masthead" class="header-main show-logo-center hide-for-sticky">
            <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">

                <!-- Logo -->
                <div id="logo" class="flex-col logo">

                    <!-- Header logo -->
                    <a href="" title="Sneakerholic Vietnam - Live Your Passion"
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
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay"
                                data-color="" class="is-small" aria-label="Menu" aria-controls="main-menu"
                                aria-expanded="false">

                                <i class="icon-menu"></i>
                            </a>
                        </li>
                        <li class="header-search header-search-dropdown has-icon has-dropdown menu-item-has-children">
                            <a href="#" aria-label="Tìm kiếm" class="is-small"><i class="icon-search"></i></a>
                            <ul class="nav-dropdown nav-dropdown-simple">
                                <li class="header-search-form search-form html relative has-icon">
                                    <div class="header-search-form-wrapper">
                                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                            <form role="search" method="get" class="searchform"
                                                action="">
                                                <div class="flex-row relative">
                                                    <div class="flex-col flex-grow">
                                                        <label class="screen-reader-text"
                                                            for="woocommerce-product-search-field-0">Tìm kiếm:</label>
                                                        <input type="search" id="woocommerce-product-search-field-0"
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
                        </li>
                    </ul>
                </div>

                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                        <li class="html custom html_topbar_left">
                            <ul class="vts-custom-header header-nav header-nav-main nav nav-left  nav-uppercase">
                                <li class="header-contact-wrapper">
                                    <ul id="header-contact" class="nav nav-divided nav-uppercase header-contact">
                                        <li class="">
                                            <a target="_blank" rel="noopener noreferrer"
                                                href="https://maps.google.com/?q=425/16 Nguyễn Đình Chiểu P.5, Q.3, Tp.HCM"
                                                class="tooltip tooltipstered">
                                                <i class="icon-map-pin-fill" style="font-size:16px;"></i> <span>
                                                    425/16 Nguyễn Đình Chiểu P.5, Q.3, Tp.HCM </span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a target="_blank" href=""
                                                class="tooltip tooltipstered">
                                                <i class="icon-phone" style="font-size:16px;"></i> <span>Liên hệ</span>
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
                                @if (isset(Auth()->guard('customers')->user()->name))
                                {{Auth()->guard('customers')->user()->name}}
                                <a href="{{route('viewlogin')}}" title="Đăng nhập"
                                    class="header-cart-link icon button circle is-outline is-small">
                                    Đăng Xuất
                                </a>
                                @else
                                <a href="{{route('viewlogin')}}" title="Đăng nhập"
                                    class="header-cart-link icon button circle is-outline is-small">
                                    Đăng nhập
                                </a>
                                @endif

                            </div>

                        </li>
                        <li class="header-divider"></li>
                        <li class="cart-item has-icon has-dropdown">
                            <div class="header-button">
                                <a href="{{route('shop.cart')}}" title="Giỏ hàng"
                                    class="header-cart-link icon button circle is-outline is-small">



                                   Giỏ hàng
                                </a>
                            </div>

                        </li>
                    </ul>
                </div>

                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right">
                        <li class="account-item has-icon">
                            <div class="header-button"> <a href=""
                                    class="account-link-mobile icon button circle is-outline is-small"
                                    title="Tài khoản">
                                    <i class="icon-user"></i> </a>
                            </div>
                        </li>
                        <li class="cart-item has-icon">

                            <div class="header-button"> <a href=""
                                    class="header-cart-link off-canvas-toggle nav-top-link icon button circle is-outline is-small"
                                    data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng"
                                    data-pos="right">

                                    <i class="icon-shopping-bag" data-icon-label="0">
                                    </i>
                                </a>
                            </div>

                            <!-- Cart Sidebar Popup -->
                            <div id="cart-popup" class="mfp-hide widget_shopping_cart">
                                <div class="cart-popup-inner inner-padding">
                                    <div class="cart-popup-title text-center">
                                        <h4 class="uppercase">Giỏ hàng</h4>
                                        <div class="is-divider"></div>
                                    </div>
                                    <div class="widget_shopping_cart_content">


                                        <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ
                                            hàng.</p>


                                    </div>
                                    <div class="cart-sidebar-content relative"></div>
                                </div>
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
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-31259 current_page_item menu-item-37365 active menu-item-design-default">
                            <a href="" aria-current="page"
                                class="nav-top-link">HOME</a></li>
                        <li id="menu-item-37366"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37366 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">GIÀY</a></li>
                        <li id="menu-item-37360"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37360 menu-item-design-default">

                        <li id="menu-item-37358"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37358 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">PHỤ KIỆN</a></li>
                        <li id="menu-item-39602"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-39602 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">ÁO QUẦN</a></li>
                        <li id="menu-item-37361"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37361 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">KÍNH</a></li>
                        <li id="menu-item-37362"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37362 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">OUTLET</a></li>
                        <li id="menu-item-37359"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-37359 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">SNEAKERS CLEANER</a></li>
                        <li id="menu-item-62027"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-62027 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">USED</a></li>
                        <li id="menu-item-45670"
                            class="menu-item menu-item-type-post_type menu-item-object-post menu-item-45670 menu-item-design-default">
                            <a href=""
                                class="nav-top-link">KÝ GỬI</a></li>
                        <li class="header-search-form search-form html relative has-icon">
                            <div class="header-search-form-wrapper">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                    <form role="search" method="get" class="searchform"
                                        action="">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <label class="screen-reader-text"
                                                    for="woocommerce-product-search-field-1">Tìm kiếm:</label>
                                                <input type="search" id="woocommerce-product-search-field-1"
                                                    class="search-field mb-0"
                                                    placeholder="Tìm kiếm sản phẩm, thương hiệu,..." value=""
                                                    name="s" />
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
