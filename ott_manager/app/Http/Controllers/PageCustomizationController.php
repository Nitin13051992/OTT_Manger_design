<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryThumb;
use App\Models\HeaderContent;
use App\Models\HomeSettings;
use App\Models\ImageResolution;
use App\Models\ImgLogo;
use App\Models\ManageAds;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class PageCustomizationController extends Controller
{
    public function getData(Request $request)
    {
        $header_id = $request->header_id;
        // dd(count($bannerImg));
        $getEpisodes = HomeSettings::select(
            'tags_id',
            'header_id',
            'category_id',
            'title_tag_name'
        )
            ->with(['episodeEntries:entryid,name,categoryid'])
            ->whereHas('episodeEntries', function ($query) {
                $query->whereNotNull(
                    'categoryid'
                    // ->where('video_status', 'active')
                );
            })
            ->where(['tag_status' => 1, 'header_id' => $header_id])
            ->paginate(10);
        $raw = $getEpisodes->getCollection()->transform(function ($item) {
            $item->episodeEntries = $item
                ->episodeEntries()
                ->with(
                    'entryThumbnail:thumb_id,entryid,host_url,img_name,ir_id'
                )
                ->paginate(20);
            return $item;
        });
        // dd($getEpisodes);
        // $sliders = HeaderContent::select('hid', 'header_name', 'menu_type')
        //     ->with([
        //         'headerSlider:img_id,header_id,host_url,img_url,ventryid,priority,img_name,start_time,end_time',
        //     ])
        //     ->where([
        //         'hid' => $header_id,
        //         'menu_type' => 'h',
        //         'header_status' => '1',
        //     ])
        //     ->paginate(5);
        // dd(count($sliders));
        $getEpisodes = HomeSettings::select(
            'tags_id',
            'header_id',
            'category_id',
            'title_tag_name'
        )
            ->with(['episodeEntries:entryid,name,categoryid'])
            ->whereHas('episodeEntries', function ($query) {
                $query->whereNotNull(
                    'categoryid'
                    // ->where('video_status', 'active')
                );
            })
            ->where(['tag_status' => 1, 'header_id' => $header_id])
            ->paginate(5);
        $raw = $getEpisodes->getCollection()->transform(function ($item) {
            $item->episodeEntries = $item
                ->episodeEntries()
                ->with(
                    'entryThumbnail:thumb_id,entryid,host_url,img_name,ir_id'
                )
                ->paginate(20);
            return $item;
        });
        // $bannerImg = SliderImage::select(
        //     'img_id',
        //     'host_url',
        //     'img_url',
        //     'ventryid',
        //     'priority',
        //     'img_name',
        //     'header_id',
        //     'start_time',
        //     'end_time'
        // )
        //     ->with('imageByHeaderCategory:hid,header_name')
        //     ->whereHas('imageByHeaderCategory', function ($query) {
        //         $query->whereNotNull('header_id');
        //     })
        //     ->where([
        //         'img_status' => '1',
        //         'img_type' => 'w',
        //         'header_id' => $header_id,
        //     ])
        //     ->paginate(5);
        // $raw = $bannerImg->getCollection()->transform(function ($item) {
        //     $item->imageByHeaderCategory = $item
        //         ->imageByHeaderCategory()
        //         ->get();
        //     return $item;
        // });
        // dd(count($raw));
        return json_encode($raw);
    }
    public function index(Request $request)
    {
        // $categoryPCThumb = HeaderContent::select(
        //     'hid',
        //     'header_name',
        //     'menu_type'
        // )
        //     ->with([
        //         'headerMenus:tags_id,header_id,category_id,title_tag_name',
        //         'headerMenus.headerCategory:category_id,cat_name,cat_type',
        //         'headerMenus.headerCategory.getEntriesRelation:entryid,name,categoryid',
        //         'headerMenus.headerCategory.getEntriesRelation.entryThumbnail:thumb_id,entryid,host_url,img_name,ir_id',
        //     ])
        //     ->where([
        //         'menu_type' => 'h',
        //         'header_status' => '1',
        //         // 'hid' => '60',
        //     ])
        //     ->paginate(5);
        // dd($categoryPCThumb);
        // if ($request->ajax()) {
        //     $data = Category::select('category_id', 'cat_name')
        //         ->with([
        //             'getEntriesRelation:entryid,name,categoryid',
        //             'getEntriesRelation.entryThumbnail:thumb_id,entryid,host_url,img_name',
        //         ])
        //         ->where([
        //             'status' => '2',
        //             'parent_id' => '0',
        //             'cat_type' => 'cat',
        //         ])
        //         ->whereHas('getEntriesRelation.entryThumbnail', function ($q) {
        //             $q->where('status', '1');
        //         })
        //         ->take(10);
        //     return Datatables::of($data)
        //         // ->addIndexColumn()
        //         ->addColumn('host', function ($row) {
        //             if (isset($row->getEntriesRelation)) {
        //                 // dd($row->getEntriesRelation);
        //                 foreach ($row->getEntriesRelation->take(10) as $data1) {
        //                     if (
        //                         isset($data1->entryThumbnail) ||
        //                         $value->entryThumbnail->ir_id == '6'
        //                     ) {
        //                         $urlMerge =
        //                             $data1->entryThumbnail->host_url .
        //                             '/' .
        //                             Auth::user()->publisherID .
        //                             '/' .
        //                             $data1->entryThumbnail->entryid .
        //                             '/' .
        //                             $data1->entryThumbnail->img_name;
        //                         $imgurl = "<a data-fancybox='gallery' href='javascript:void(0)' data-toggle='tooltip' data-id='{$urlMerge}'>
        //                         <img src='{$urlMerge}' width='100' height='50'class='img-responsive'>
        //                         </a>";
        //                         return $imgurl;
        //                     }
        //                 }
        //             }
        //         })
        //         ->rawColumns(['host'])
        //         ->make(true);
        // }
        $categoryPCThumb = Category::with([
            'getEntriesRelation',
            'getEntriesRelation.entryThumbnail',
        ])
            ->where([
                'status' => '2',
                'parent_id' => '0',
                'cat_type' => 'cat',
            ])
            ->whereHas('getEntriesRelation.entryThumbnail', function ($q) {
                $q->where('status', '1');
            })
            ->paginate(5);
        $imageReslv = ImageResolution::select('id', 'name')
            ->where('status', '1')
            ->get();
        // dd($imageReslv);
        $headerMenu = HeaderContent::select(
            'hid',
            'header_name',
            'header_status'
        )
            ->where('header_status', '!=', '3')
            ->where('menu_type', 'h')
            ->get();
        // dd($headerMenu);
        $logoPC = ImgLogo::select('*')->first();
        // $data = Thumbnail::select()
        //     ->with('thumbnailResolution')
        //     ->where('ir_id', 6)
        //     // ->first();
        //     ->paginate(5);
        // dd($data);

        // dd($categoryPCThumb);
        $seriesPCThumb = Category::with([
            'getEntriesRelation',
            'getEntriesRelation.entryThumbnail',
        ])
            ->where(['status' => '2', 'cat_type' => 'ser'])
            ->whereHas('getEntriesRelation.entryThumbnail', function ($q) {
                $q->where('status', '1');
            })
            ->paginate(5);
        // dd($categoryPCThumb);
        // dd($seriesPCThumb);
        $bannerImg = SliderImage::select(
            'img_id',
            'host_url',
            'img_url',
            'ventryid',
            'priority',
            'img_name',
            'start_time',
            'end_time',
            'img_status'
        )
            ->where(['img_status' => '1', 'img_type' => 'w','p_type_id'=>'11'])
            ->get();
        // dd(count($bannerImg));
        $thumbnailImg = CategoryThumb::select(
            'category_id',
            'host_url_thumb',
            't_original_url',
            't_img_dimension'
        )
            ->where('t_status', '1')
            ->get();
        // dd($thumbnailImg);
        return view(
            'pageCustomization.page_customization',
            compact(
                'bannerImg',
                'thumbnailImg',
                'categoryPCThumb',
                'logoPC',
                'headerMenu',
                'seriesPCThumb',
                'imageReslv'
            )
        );
    }

    public function editSlider($id)
    {
        // dd($id);
        $sliderData = SliderImage::where('img_id', $id)->first();
        dd($sliderData);
        return response()->json($sliderData);
    }

    public function updateSlider(Request $request,$id)
    {        
        // dd($request->all());
        return response()->json(["update successfully"]);
    }

    public function show(Request $request)
    {
        dd($request->all());
        // return response()->json($request->text);
        // if ($request->text != '') {
        // $searchData = $request->text;
        $searchCat = Category::with([
            'getEntriesRelation',
            'getEntriesRelation.entryThumbnail',
        ])
            ->where([
                'status' => '2',
                'parent_id' => '0',
                'cat_type' => 'cat',
            ])
            ->where('cat_name', 'LIKE', '%' . $request->cat_name . '%')
            ->whereHas('getEntriesRelation.entryThumbnail', function ($q) {
                $q->where('status', '1');
            })
            ->get();
        $arr = [];
        foreach ($searchCat as $cat) {
            $entryArray = [];
            foreach ($cat->getEntriesRelation as $entry) {
                $entryArray['name'] = $entry->name;
                return response()->json($entryArray);
            }
            $arr['cat_name'] = $cat->cat_name;
            return response()->json($arr);
        }
    }
    public function edit($id)
    {
        // dd($id);
        $imgLogo = ImgLogo::where('id', $id)->first();
        return response()->json($imgLogo);
    }

    public function update(Request $request, $id)
    {
        //echo '<pre>';
        //print_r($request->photoimg);
        dd($request->all());
        $pid = Auth::user()->publisherID;
        $entryid = $request->id;
        $img_D = $request->image_dimension;
        $img_ext = $request->file('photoimg')->getClientOriginalExtension();
        $fileName = $entryid . '_' . time() . '.' . $img_ext;
        $path_url = '/amritatv-demo/upload_thumb';
        $image = getimagesize($request->photoimg);
        $pathname = Storage::disk('s3')->put(
            $path_url,
            $request->file('photoimg')
        );
        $db_filename = explode('/', $pathname);
        //print_r($db_filename);
        $path = Storage::disk('s3')->url($pathname);
        $width = $image[0];
        $height = $image[1];
        $imgR = new ImageResolution();
        $dbArray = $imgR->getImageDimension($img_D);
        if ($path) {
            if ($dbArray['height'] == $height && $dbArray['width'] == $width) {
                $data = CdnDetail::select('front_url')
                    ->where('publisherID', $pid)
                    ->get()
                    ->toArray();
                $image_host_url = $data[0]['front_url'];
                imgLogo::where('id', $id)->update([
                    'entryid' => $entryid,
                    'host_url' => $image_host_url,
                    'img_name' => $db_filename[2],
                    'img_ext' => $img_ext,
                    'ir_id' => $img_D,
                    'created_at' => Carbon::now(),
                ]);
                $status = '200';
                $msg = 'Image Logo updated successfully';
                $arr = ['msg' => $msg, 'status' => $status];
                return json_encode($arr);
            } else {
                $status = '3';
                $msg =
                    'Height should be ' .
                    $dbArray['height'] .
                    ' Width should be ' .
                    $dbArray['width'];
                $arr = ['msg' => $msg, 'status' => $status];
                return json_encode($arr);
            }
        }
        // dd($request->all());
        // $request->validate([
        //     'file' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        // ]);
        // $fileName = time() . '.' . $request->file->extension();
        // $pathName = Storage::disk('s3')->put('upload_logo', $request->file);
        // $path = Storage::disk('s3')->url($path);
        // if (!empty(($user = Auth::user()))) {
        //     $planDetails = imgLogo::where('id', $id)->update([
        //         'name' => $request->logo_name,
        //         'host_url_logo' =>
        //             'https://d21mjo1j06ps0t.cloudfront.net/v1/webp_compress/' .
        //             $user->publisherID .
        //             '/logo/',
        //         'original_url_logo' => $fileName,
        //         'logo_size' => $request->logo_size,
        //         'bg_color' => $request->bg_color,
        //         'bg_color_optacity' => $request->bg_color_optacity,
        //         'text_color' => $request->text_color,
        //         'text_color_optacity' => $request->text_color_optacity,
        //         'alignment' => 'top_right',
        //     ]);

        //     HeaderContent::update([
        //         'header_name' => $request->menu_name,
        //         'menu_type' => 'h',
        //         'header_status' => '1',
        //     ]);
        // }
        // return response()->json([
        //     'status' => 200,
        //     'message' => 'Logo Image updated successfully',
        // ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);
        $fileName = time() . '.' . $request->file->extension();
        $pathName = Storage::disk('s3')->put('upload_logo', $request->file);
        $path = Storage::disk('s3')->url($path);
        if (!empty(($user = Auth::user()))) {
            ImgLogo::create([
                'name' => $request->logo_name,
                'host_url_logo' =>
                    'https://d21mjo1j06ps0t.cloudfront.net/v1/webp_compress/' .
                    $user->publisherID .
                    '/logo/',
                'original_url_logo' => $fileName,
                'logo_size' => $request->logo_size,
                'bg_color' => $request->bg_color,
                'bg_color_optacity' => $request->bg_color_optacity,
                'text_color' => $request->text_color,
                'text_color_optacity' => $request->text_color_optacity,
                'alignment' => 'top_right',
            ]);
        }
        HeaderContent::create([
            'header_name' => $request->menu_name,
            'menu_type' => 'h',
            'header_status' => '1',
        ]);
        return response()->json([
            'success' => 'Logo Upload successfully.',
        ]);
    }
    public function bannerStore(Request $request)
    {
        $request->validate([
            'myfile' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);
        $fileName = time() . '.' . $request->myfile->extension();
        // dd($fileName);
        $pathName = Storage::disk('s3')->put(
            '/amritatv-demo/upload_slider',
            $request->myfile
        );
        // dd($pathName);
        $path = Storage::disk('s3')->url($pathName);
        // dd($path);
        if (!empty(($user = Auth::user()))) {
            SliderImage::create([
                'img_name' => $fileName,
                'host_url' =>
                    'https://d21mjo1j06ps0t.cloudfront.net/v1/webp_compress/',
                'img_url' => $user->publisherID . '/upload_slider/' . $fileName,
                'img_type' => 'w',
                'slider_type' => 'I',
                'theme' => 'internal',
                'slider_category' => '001',
                'img_status' => '1',
                'header_id' => '60',
            ]);
        }
        return response()->json([
            'success' => 'Banner Upload successfully.',
        ]);
    }
    public function goggleAdsData(Request $request)
    {
        $data = ManageAds::latest();
        dd($data);
    }

    // bannerSearch
    public function showEmployee(Request $request)
    {
        $employees = SliderImage::select(
            'img_id',
            'host_url',
            'img_url',
            'ventryid',
            'priority',
            'img_name',
            'start_time',
            'end_time'
        )
            ->where(['img_status' => '1', 'img_type' => 'w'])
            ->get();
        if ($request->keyword != '') {
            $employees = SliderImage::where(
                'img_name',
                'LIKE',
                '%' . $request->keyword . '%'
            )->get();
            // dd($employees);
        }
        return response()->json([
            'employees' => $employees,
        ]);
    }

    public function headerMenuStatus(Request $request)
    {
        dd($request->all());
        $checkData = HeaderContent::where('hid', $request->hid)->first();
        if ($checkData->header_status == 1) {
            HeaderContent::where('hid', $request->hid)->update([
                'header_status' => '0',
            ]);
            return response()->json([
                'success' => 'Header Menu Inactive successfully.',
            ]);
        }
        if ($checkData->header_status == 0) {
            HeaderContent::where('hid', $request->hid)->update([
                'header_status' => '1',
            ]);
            return response()->json([
                'success' => 'Header Menu Active successfully.',
            ]);
        }
    }
}
