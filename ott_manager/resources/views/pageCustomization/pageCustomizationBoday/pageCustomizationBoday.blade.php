
<header>
    <div class="top-hdr-wppr">
        <div class="rsp-tab">
            <div class="title">
                <ul>
                    <li data-mode-typ="0" class="actv-mode">
                        <img src="assets/images/pageCustomization/icon/web_grey.svg" alt="" class="gry-icn">
                        <img src="assets/images/pageCustomization/icon/web_blue.svg" alt="" class="blue-icn">
                    </li>
                    <li data-mode-typ="1">
                        <img src="assets/images/pageCustomization/icon/tab_grey.svg" alt="" class="gry-icn">
                        <img src="assets/images/pageCustomization/icon/tab_blue.svg" alt="" class="blue-icn">
                    </li>
                    <li data-mode-typ="2">
                        <img src="assets/images/pageCustomization/icon/mobile_grey.svg" alt="" class="gry-icn">
                        <img src="assets/images/pageCustomization/icon/mobile_blue.svg" alt="" class="blue-icn">
                    </li>
                </ul>
            </div>
        </div>
        <div class="pblc-edt-wppr">
            <button class="edt-btn">Edit</button>
            <button class="pblc-btn">Publish</button>
        </div>
    </div>
</header>
<div class="main usrsite" id="categoryTable" >
	<div class="orvly-Shdw"></div>
    <div class="comn-sctn cstm-hdr-wppr">
        <!-- <button type="button" class="cls-sctn-btn">+</button> -->
        <div class="hdr-bg-kclr"></div>
        <div class="container">
            <div class="row">
            <input type="hidden" id="headerById" name="headerById">
                <div class="hdr-wppr">
                    <div class="logo-wppr">
                        <a href="">
                            <img id="imgPreview" src="{{$logoPC->host_url_logo.$logoPC->original_url_logo}}" alt="pic" />
                        </a>
                    </div>
                   <div class="burg-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav>
                        <button type="button" class="cls-menu">+</button>
                        <span class="logo-ovrly">
                            <img src="{{$logoPC->host_url_logo.$logoPC->original_url_logo}}" alt="">
                        </span>
                        <div class="menu_logo">
                            <a href="">
                                <img src="{{$logoPC->host_url_logo.$logoPC->original_url_logo}}" alt="">
                            </a>
                        </div>
                        <ul>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="comn-sctn cstm-ldr-bnnr-wppr " id="mydiv">
        <!-- <button type="button" class="cls-sctn-btn">+</button> -->
        <div class="ld-bnnr-wppr owl-carousel owl-theme ">
            @foreach($bannerImg as $img)
            <div class="bnnr-itm">
                <div class="sld-img">
                    <img src="{{$img->host_url . $img->img_url}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End Here -->
    <!-- Live TV Section html -->
    <div class="live_vdo_wppr ">
        <div class="vdo_wppr">
            <div class="lv_logo">
                <img src="assets/images/pageCustomization/news_logo.svg" alt="">
            </div>
            <div class="lv_txt">
                <p>Live</p>
            </div>
            <div class="lv_vdo_plyr_wppr">
                <video  controls >
                    <source src="https://www.shutterstock.com/shutterstock/videos/1049592784/preview/stock-footage-global-earth-rotating-digital-world-breaking-news-studio-background-for-news-report-and-breaking.webm" type="video/mp4" />
                </video>
            </div>
        </div>
        <div class="lv_vdo_dtl_wppr">
            <div class="title">
                <h4>Live TV</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo nisi sit saepe sapiente perspiciatis adipisci vel at. Laudantium distinctio amet doloremque vel labore id sapiente optio placeat deserunt quo repellendus quibusdam alias totam quae, dolore incidunt corporis? Ratione vitae eius soluta quis sunt dolore animi quia! Maiores, odit reiciendis velit sunt quae repellendus veritatis molestiae omnis iste quaerat aut obcaecati incidunt, beatae excepturi cum ullam.</p>
            </div>
        </div>
    </div>
    <!-- End Here -->
    <!-- categoryData According to header menus -->
    <div class="cstm-ctgry-wppr"></div>
    <!-- End Here -->
    <!-- Add Bnner Pop Design html -->
    <div class="add-pop-wppr">
        <div class="pop-hdng-wppr">
            <div class="title">
                <h6>Change Banner</h6>
            </div>
            <button class="pop-cls-btn">+</button>
        </div>
        <form id="pcBannerForm" method="post" name="pcBannerForm" enctype="multipart/form-data" class="form-horizontal h-100">
        <div class="pop-cntct-wppr">
            <div class="pop-lft-cntct-wppr">
                <div class="upld-mdia-btn">
                    <input type="file" name="myfile" class="fil-upld upld_img">
                    <lable class="upld-btn">+ Upload Media</lable>
                </div>
                <div class="pop-cntct-hdng-wppr">
                    <div class="title">
                        <h6>Explore</h6>
                    </div>
                    <div class="mdia-lst">
                        <ul>
                            <li>Media from OTT PLAY</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pop-rght-cntct-wppr">
                <div class="srch-wppr">
                    <div class="srch-icn">
                        <img src="assets/images/pageCustomization/icon/search.svg" alt="search">
                    </div>
                    <fieldset>
                        <input type="text" id="searchBanner" placeholder="Search image & video Banner & thumbnail" name="text" class="srch-txt-bx">
                    </fieldset>
                </div>
                <div class="mdia-cntct-wppr">
                    <div class="mdia-hdng-wppr">
                        <h6>Media from OTT PLAY</h6>
                    </div>
                    <div class="fltr-cntcnt-wppr">
                        <div class="flt-hdng">
                            <small>fillter by</small>
                        </div>
                        <div class="slctr-txt-wppr">
                            <span class="slct-txt">Select...</span>
                            <ul>
                                <li>Select...</li>
                                <li>Images</li>
                                <li>Videos</li>
                            </ul>
                        </div>
                        <div class="slctr-txt-wppr">
                            <span class="slct-txt">Sort by</span>
                            <ul>
                                <li>Asc</li>
                                <li>Desc</li>
                            </ul>
                        </div>
                        <div class="slctr-txt-wppr">
                            <span class="slct-txt">Select...</span>
                            <ul>
                                <li>All</li>
                                <li>Active</li>
                                <li>Inactive</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mdia-itm-wppr">
                        @foreach($bannerImg as $img)
                        <div class="col-4">
                            <span>
                                <img src="{{$img->host_url . $img->img_url}}" alt="Banner">
                            </span>
                            <div class="title">
                                <p>{{$img->img_name}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="upld-img-btn">
                        <button class="upload-btn">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- End Here -->
    <!-- Edit Banner Pop Section Design html -->
    <form method="post"id="pcUpdateForm">
    @csrf
    <div class="edt_bnnr_wppr">
        <div class="edt_hdng">
            <div class="title">
                <h6>Edit Banner Details</h6>
            </div>
            <button class="pop-cls-btn">+</button>
        </div>
        @php
            $filterEntry = \App\helper::filterEntries();
            $headerMenus = \App\helper::headerMenu();
            @endphp
        <div class="edt_frm_wppr">
            <input type="hidden" id="img_id"name="img_id">
            <fieldset>
                <label for="">Video Type</label>
                <div class="slctr-txt-wppr vdo_slctr">
                    <input type="hidden" id="edit_video_id" name="theme">
                    <span class="slct-txt"id="edit_videoType"name="theme">...Select...</span>
                    <ul>
                        <li class="lst_itm" data-id-name="no_video">...Select...</li>
                        <li class="lst_itm" data-id-name="no_video">no_video</li>
                        <li class="lst_itm" data-id-name="internal">internal</li>
                        <li class="lst_itm" data-id-name="external">external</li>
                    </ul>
                </div>
            </fieldset>
            <fieldset class="vdo_url">
                <label for="">Video Entry URL</label>
                <input type="text" pattern="https://.*" name="videoUrl" id="edit_url" placeholder="https://example.com" class="txtara_inpt h-auto">
            </fieldset>
            <fieldset class="vdo_id">
                <label for="">Select Video Entry ID</label>
                <div class="slctr-txt-wppr">
                    <input type="hidden" id="edit_entrid" name="ventryid" value="">
                    <span class="slct-txt"id="edit_ventryid" name="ventryid">...Select...</span>
                    <ul>
                        <li>
                            <input type="text" class="lst_srch" placeholder="Search..." />
                        </li>
                        @foreach($filterEntry as $entryData)
                        <li class="lst_itm" value="{{ $entryData->entryid }}">{{ $entryData->entryid }}</li>
                        @endforeach
                        <li>
                            <input type="text" class="lst_srch" placeholder="Search..." />
                        </li>
                    </ul>
                </div>
            </fieldset>
            <fieldset>
                <label for="">Select Header Menu </label>
                <div class="slctr-txt-wppr">
                    <input type="hidden" id="edit_hdr_id" name="header_id">
                    <span class="slct-txt"id="edit_header_id" name="header_id">...Select...</span>
                    <ul>
                        <li>...Select...</li>
                        @foreach($headerMenus as $headerM)
                            <li class="lst_itm" data-val="{{ $headerM->hid }}">{{ $headerM->header_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </fieldset>
            <fieldset>
                <label >Description</label>
                <textarea type="text"placeholder="Type Here...." name="description" id="edit_description" class="txtara_inpt"></textarea>
            </fieldset>
        </div>
        <div class="frm_sbmt_Wppr">
            <button type="submit" class="updt_bnnr_btn" >Update Banner</button>
        </div>
    </div>
    </form>
    <!-- End Here -->
    <!-- Foter Section html -->
    <footer>
        <div class="ftr_wppr">
            <div class="container">
                <div class="row">
                    <div class="ftr_clm_wppr">
                        <div class="col-5 p-0">
                            <div class="ftr_abt_wppr">
                                <div class="title">
                                    <span>
                                        <a href="">
                                            <img id="fotrlogo" src="https://d299omnc29smln.cloudfront.net/v1/webp_compress/ott615/logo/728621832test2.png" alt="">
                                        </a>
                                    </span>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex non ad quae saepe dolorem voluptatibus error, aperiam, a alias consequuntur quaerat aliquid incidunt culpa reiciendis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="ftr_Menu_wppr">
                                <div class="title">
                                    <h6>Menu</h6>
                                    <ul>
                                        <li><a href="">About the App</a></li>
                                        <li><a href="">Terms & Conditions</a></li>
                                        <li><a href="">FAQ</a></li>
                                        <li><a href="">Careers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 p-0">
                            <div class="app_str_wppr">
                                <a href=""> <img src="assets/images/pageCustomization/google_play.svg" alt=""> </a>
                                <a href=""> <img src="assets/images/pageCustomization/app_store.svg" alt=""> </a>
                            </div>
                            <div class="cntct_wppr">
                                <div class="title">
                                    <h6>Connect with Us On</h6>
                                    <ul>
                                        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                        <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="ovrly_wppr"></div>

@include('pageCustomization.pageCustomizationBoday.scripties')

@include('pageCustomization.pageCustomizationBoday.script')
