<?php
namespace App;

use App\Models\Category;
use App\Models\Sidebar;
use App\Models\Entry;
use App\Models\HeaderContent;
use App\Models\FunctionSetting;
use Illuminate\Support\Facades\DB;

class Helper
{
    public function mainMenusData()
    {
        $mainManu = Sidebar::select(
            'mid',
            'mname',
            'menu_url',
            'permission',
            'mparentid',
            'multilevel',
            'child_id',
            'icon_class'
        )
            ->where('mparentid', 0)
            ->orderBy('priority', 'ASC')
            ->get();
        // dd($mainManu);
        return $mainManu;
    }

    public function entryCategories()
    {
        $cat = Category::select(
            'mid',
            'mname',
            'menu_url',
            'permission',
            'mparentid',
            'multilevel',
            'child_id',
            'icon_class'
        )
            ->where([
                'status' => '2',
                'parent_id' => '0',
                'cat_type' => 'cat',
            ])
            ->get();
        // dd($mainManu);
        return $mainManu;
    }
    public function mainCategories()
    {
        $categoryData = Category::select(
            'category_id',
            'parent_id',
            'partner_id',
            'cat_name',
            'fullname',
            'fullids',
            'direct_sub_categories_count',
            'status',
            'priority',
            'direct_entries_count',
            'created_at'
        )
            ->where([['status', 2], ['parent_id', '!=', '0']])
            ->orWhereNull('parent_id')
            // ->orderBy('priority', 'ASC')
            ->get();
        // dd($categoryData);
        return $categoryData;
    }

    public function getCategoryLevel()
    {
        $category_level = DB::table('filter_setting')
            ->select('value')
            ->where(['status' => '1', 'tag' => 'category_level'])
            ->first();
        return $category_level->value;
    }

    public function headerMenu(){
        
       return $headerContent = HeaderContent::select('hid','header_name')->where('header_status','1')->where('menu_type','h')->orderBy('header_name','ASC')->get();
    }

    public function FunctionSetting()
    {
      return $functionSetting = FunctionSetting::select('*')->where('function_name','live_language')->where('status','1')->orderBy('created_at','DESC')->get();   
    }
    function create_slug($string){
            $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }
    //comment

    public function filterEntries()
    {
        return $selectEntries = Entry::select('entryid')
            ->where(['status' => '2', 'video_status' => 'active'])
            ->get();
    }
}
