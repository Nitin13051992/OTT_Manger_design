@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script>

$(document).on('click','.headerID',function(){
    const getHeaderId = $(this).data('menu-id');
    // alert(getHeaderId);
    $(this).siblings().removeClass('actv_tab');
    $(this).addClass('actv_tab')
    //set header id into hidden field and give unique id to this fieldset
    var inputData=    $('#headerById').val(getHeaderId);
    // console.log("Ammu",inputData)
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
        $('.ctgry-sldr').addClass('owl-carousel');
        const publisherId = "{{Auth::user()->publisherID}}"
        data.forEach(el =>{
            html += `  <div class="ctgry-lst-itm">
            <div class="ctgry-hdng">
                <h3>Latest & Trending</h3>
                <div class="ctgry-sldr-edt-btn">
                    <button class="edt-btn">...</button>
                    <ul>
                        <li>Horizontal Thumbnail</li>
                        <li>Vertical Thumbnail</li>
                        <li class="ctgry-edt-btn">Category Edit</li>
                    </ul>
                </div>
            </div>
            <div class="ctgry-sld-wppr">
                <div class="ctgry-sldr-bx">
                    <div class="ctgry-sldr">
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-1.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-2.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-3.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-4.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-5.png" alt="Slide">
                            </span>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- <div class="edit-sldr-wppr">
                <div class="edt-hdng">
                    <div class="title">
                        <small>Edit Categories</small>
                        <h6>Popular Shows</h6>
                    </div>
                    <buttton type="button" class="cls-edt-btn">Close</buttton>
                </div>
                <div class="nmbr-crd-wppr">
                    <small>Number of  Card in Rail -</small>
                    <div class="slctr-txt-wppr">
                        <span class="slct-txt">7</span>
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>                            
                            <li>5</li> 
                            <li>6</li>
                            <li>7</li>
                            <li>8</li>
                            <li>9</li>                            
                            <li>10</li>                            
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>`;
        })
       
        return html;
        
    }).then((html)=>{
        $('.ctgry-lst-itm-wppr').html(html);
    });
    
})

//         $(function() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//         var table = $('.catgoryNameData').DataTable({
//         scrollX: true,
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('page_customization.index') }}",
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         dataType:'json',
//         columns: [
//             {
              
//                 data: 'cat_name',
//                 name: 'cat_name'
//             },
//         ]
//     });
// });
    // $('body').on('click', '#filter_thumb', function(e) {
    //     e.preventDefault();
    //     var id = $(this).attr("id");
    //     alert("Ammu",id);
    // });
    // $('.edt-btn').click(function(){
        $('body').on('click', '#cat_h', function(e) {
            e.preventDefault();
            // var id = $(this).attr("id");
           
        // $('#cat_h').val(res.cat_h).trigger('change');
        var id = $('#cat_h').children("li:selected").val();
        alert(id);
        $('form#filter_thumb').html();
        // return 1;
    });
    $(document).ready(function(){

$('#search_cat').on('keyup', function(){
    var text = $('#search_cat').val();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    // alert(text);
    // var urlRaw = '{{ route("catSearch") }}';
    // console.log('NIN',{{ route("catSearch") }});
    $.ajax({
        type:"POST",
        url: "{{ route('catSearch') }}",
        data: {cat_name: text},
        async: false,        
        beforeSend: (xhr) => {
            if (xhr && xhr.overrideMimeType) {
            xhr.overrideMimeType('application/json;charset=utf-8');
            }
        },
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        dataType:'json',
        success: function(data) {
            var dataArray = data;
            console.log('nitin');
            console.log(data.name);
            for (i = 0; i < data.length; i++) {
//   console.log("Ammu",numbers[i]);
} 
            // dataArray.forEach(value ,index => {
            //     console.log(index);
            // });
            // var data1 = $.json.parse(data).
            // console.log(data1);
         },
        // error:function(error){
        //     console.log("error");
        //  }
    });
});

});
//     $('#search_cat').on('keyup',function(){
// $value=$(this).val();
// $.ajax({
// type : 'get',
// url : '{{URL::to('search')}}',
// data:{'search':$value},
// success:function(data){
// $('tbody').html(data);
// }
// });
// })
   </script>
@endpush