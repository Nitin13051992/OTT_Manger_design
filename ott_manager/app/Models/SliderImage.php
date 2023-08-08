<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'slider_image_detail';
    protected $primaryKey = 'img_id';
    protected $fillable = [
        'img_id',
        'img_name',
        'host_url',
        'img_url',
        'small_img_url',
        'medium_img_url',
        'large_img_url',
        'custom_img_url',
        'slider_msg',
        'img_type',
        'img_status',
        'start_time',
        'end_time',
        'slider_category',
        'ventryid',
        'theme',
        'slider_type',
        'p_type_id',
    ];

    public function imageByHeaderCategory()
    {
        return $this->belongsTo(HeaderContent::class, 'header_id', 'hid');
    }

    function syncPriority($categoryid){
        
        $selectData = SliderImage::select(
                    'img_id',
                    'header_id',
                    'priority'
                )->where('header_id',$categoryid)
                ->orderBy('priority', 'ASC')
                ->get();
        $totalEntry = count($selectData);
           
        $jj=1;
        foreach($selectData as $datas){
            if($jj<=($totalEntry+100)){ 
                 $newcpriority =$jj;
            }
            
                if(is_numeric($newcpriority)){

                    SliderImage::where(['header_id'=>$categoryid,'p_type_id'=>'11','img_id'=>$datas->img_id])->update([
                        'priority' => $newcpriority,

                    ]);
                }
          $jj++;   
        }
      return 1;                   
    }
    function setPrioritySlider($ids,$cat_id){
        //dd($ids);

        $explode_ids = explode(',',$ids);
        $j =1;
        for ($i=0; $i <count($explode_ids) ; $i++) { 
            //echo $explode_ids[$i].'<br>';

            SliderImage::where(['header_id'=>$cat_id,'p_type_id'=>'11','img_id'=>$explode_ids[$i]])->update([
                        'priority' => $j,

            ]);

            $j++;
        }
        return 1;
    }
}
