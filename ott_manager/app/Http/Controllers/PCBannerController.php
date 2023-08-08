<?php

namespace App\Http\Controllers;
use App\Models\SliderImage;
use Illuminate\Http\Request;

class PCBannerController extends Controller
{
    public function edit($id)
    {
        // dd($id);
        $sliderData = SliderImage::where('img_id', $id)->first();
        // dd($sliderData);
        return response()->json($sliderData);
    }

    public function update(Request $request, $id)
    {
        if ($request->theme == 'internal') {
            $finalData = $request->ventryid;
        } 
        if ($request->theme == 'external') {
            $finalData = $request->videoUrl;
        } if($request->theme == 'no_video') {
            $finalData = null;
        }
        if(isset($request->strtDate)){
            $webpop = SliderImage::where('img_id', $id)->update([
                'start_time' => $request->strtDate, 
                'end_time' => $request->endDate            
            ]);
        }else{
            $entryData = $finalData;
            $webpop = SliderImage::where('img_id', $id)->update([
                'slider_msg' => $request->description,
                'ventryid' => $entryData,
                'theme' => $request->theme,
                'header_id' => $request->header_id,           
            ]);
        }        
        return response()->json([
            'status' => 200,
            'message' => 'Slider updated successfully',
        ]);
    }

}
