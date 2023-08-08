<script>
$(document).on('click','.headerID',function(){
    const getHeaderId = $(this).data('menu-id');
    //set header id into hidden field and give unique id to this fieldset
    var inputData= $('#headerById').val(getHeaderId);
    const params = {
        header_id: getHeaderId
    };
    var html = '';
    fetch(`get-page-data?header_id=${getHeaderId}`,{
        method:'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'route': 'get-page-data',
            "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        const publisherId = "{{Auth::user()->publisherID}}"
        data.forEach(el =>{
            console.log(el.episodeEntries);
            html +=  `<div class="ctgry-sld-wppr">
                        <button type="button" class="cls-sctn-btn">+</button>
                        <div class="ctgry-sld-hdng-wppr">
                            <h4>${el.title_tag_name}</h4>
                            <div class="sldr-edt-wppr">
                                <button class="edt-btn">...</button>
                                <ul>
                                    <li class="ctgr-sldr">Slider</li>
                                    <li class="edt-img-sld">Categories Edit</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ctgry-sldr-wppr">
                            <div class="ctgry-sld-sldr owl-carousel owl-theme">`;
                            var slide = '';
                            el.episodeEntries.data.forEach(el => {
                                if(!!el.entry_thumbnail){
                                    var imgsrc = el.entry_thumbnail.host_url+'/'+publisherId+'/'+el.entry_thumbnail.entryid+'/'+el.entry_thumbnail.img_name;
                                slide += `
                                <div class="ctgry-sld-itm">
                                    <span>
                                    <img src="${imgsrc}" alt="Slide">
                                    </span>
                                </div>
                                `
                                }
                            })
                html+= `${slide}</div>
                        </div> </div>`;
        })
        return html;
    }).then((html)=>{
        $('.cstm-ctgry-wppr').html(html);
    });
})
var page = 1;
var html2 = '';
$("#categoryTable").scroll(function () {
    const getHeaderId = $('#headerById').val();
    let div = $(this).get(0);
    if(div.scrollTop + div.clientHeight >= div.scrollHeight) {
            page++;
            fetch(`get-page-data?header_id=${getHeaderId}&page=${page}`,{
                method:'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'url': '/get-page-data',
                    "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr('content')
                }
            })
            .then((response) => response.json())
            .then((data) => {
                const publisherId = "{{Auth::user()->publisherID}}"
                data.forEach(el =>{
                    console.log(el.episodeEntries);
                    html2 +=  `<div class="ctgry-sld-wppr">
                                <button type="button" class="cls-sctn-btn">+</button>
                                <div class="ctgry-sld-hdng-wppr">
                                    <h4>${el.title_tag_name}</h4>
                                    <div class="sldr-edt-wppr">
                                        <button class="edt-btn">...</button>
                                        <ul>
                                            <li class="ctgr-sldr">Slider</li>
                                            <li class="edt-img-sld">Categories Edit</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ctgry-sldr-wppr">
                                    <div class="ctgry-sld-sldr owl-carousel owl-theme">`;
                                    var slide = '';
                                    // console.log('Ammu',slide);
                                    el.episodeEntries.data.forEach(el => {
                                        if(!!el.entry_thumbnail){
                                            var imgsrc = el.entry_thumbnail.host_url+'/'+publisherId+'/'+el.entry_thumbnail.entryid+'/'+el.entry_thumbnail.img_name;
                                        slide += `
                                        <div class="ctgry-sld-itm">
                                            <span>
                                            <img src="${imgsrc}" alt="Slide">
                                            </span>
                                        </div>
                                        `
                                        }
                                    })
                        html2+= `${slide}</div>
                                </div>
                            </div>`;
                })
            return html2;
            }).then((html2)=>{
                console.log('ammSSS',html2);                
                    $('.cstm-ctgry-wppr').append(html2);                
            });
    }
});
</script>
