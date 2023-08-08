<div class="lft-menu">
    <div class="menu-hdng">
        <div class="bck-btn-arro">
            <a href="javascript:void(0)">
                <img src="assets/images/pageCustomization/icon/arrow.svg" alt="" class="arrow">
            </a>
        </div>
        <div class="title">
            <h5>Main Page</h5>
        </div>
    </div>
    <div class="blk-stng-wppr">
        <button class="btn-wppr blck-btn active w-100" type="type">Blocks</button>
        <!-- <button class="btn-wppr stng-btn" id="{{$logoPC->id}}"  type="type">Setting</button> -->
        <button class="btn-wppr ctgry-btn-dsgn ctgry-btn actv" type="type">Category</button>
        <button class="btn-wppr ctgry-btn-dsgn sris-btn" type="type">Series</button>

    </div>
    <div class="left-menu-wppr">
        <div class="title">
            <ul>
                <li class="hdr-clk"> <em> <img src="assets/images/pageCustomization/icon/header.svg" alt=""> </em> Header </li>
                <li class="ld-bnnr-clk"> <em><img src="assets/images/pageCustomization/icon/image.svg" alt=""></em> Lead Banner </li>
                <li class="ctgry-clk"> <em><img src="assets/images/pageCustomization/icon/categories.svg" alt=""></em> Categories</li>
                <li> <em><img src="assets/images/pageCustomization/icon/googleAdd.svg" alt=""></em> Google ads & Native Ads</li>
                <li class="lvtv_clk"> <em><img src="assets/images/pageCustomization/icon/liveTv.svg" alt=""></em> Live Tv </li>
                <li class="ftr_clk"> <em><img src="assets/images/pageCustomization/icon/footer.svg" alt=""></em> Footer</li>
            </ul>
        </div>
    </div>
    <!-- Popup Tab Content Html design    -->
    <div class="all-popup-dsn-wppr">
        <!-- Header section popup design html   -->
        <div class="cmn-pop-sld">
            @include('pageCustomization.mainHeaderSetting.mainHder')
        </div>
        <div class="cmn-pop-sld">
            @include('pageCustomization.leadBnnerSetting.leadbnner')
        </div>
        <div class="cmn-pop-sld">
            @include('pageCustomization.categoriesSetting.categoriesSetting')
        </div>
        <div class="cmn-pop-sld">
            @include('pageCustomization.adsSetting.addsSetting')
        </div>
        <div class="cmn-pop-sld">
            @include('pageCustomization.liveSetting.liveTV')
            @include('pageCustomization.liveSetting.liveSetting')
        </div>
        <div class="cmn-pop-sld">
            @include('pageCustomization.footerSetting.footerSetting')
        </div>
    </div>
</div>
