<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Auth;
use Request;
use DB;
use Session;
use Validator;

class CategoriesController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        $this->isUserAdmin();
        return view('admin.categories.index', array(
        ));
    }

    public function add()
    {
        $this->isUserAdmin();

        return view('admin.categories.add', array(
            'categories' => json_encode($this->_getParentCategory())
        ));
    }

    public function addPost()
    {
        $data = Request::input();
        $rules = array(
            'category_name' => 'required',
            'type' => 'required'
        );
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return \Redirect::to('/admin/add/category')->withInput()->withErrors($validator);
        }

        $categories = $this->_getParentCategory();
        $usageType = ($data['type'] == "INCOME") ? "INCOME" : "EXPENSE";
        $parentCategoryRequestId = (!empty($data['parent_type_id']) && $this->_isValidParentId($data['parent_type_id'])) ? $data['parent_type_id'] : 0;
        
        $categoriesModel = new \App\Model\Categories();
        $categoriesModel->name = $data['category_name'];
        $categoriesModel->parent_id = $parentCategoryRequestId;
        $categoriesModel->user_id = 0;
        $categoriesModel->type = "DEFAULT";
        $categoriesModel->usage_type = $usageType;
        $categoriesModel->is_deleted = 0;
        $categoriesModel->save();
     
        Session::flash('success', 'New Category Added.');
        return redirect('/admin/category');
    }

    private function _isValidParentId($parent_id)
    {
        $category = DB::table('categories')
                ->where('type', 'DEFAULT')
                ->where('is_deleted', 0)
                ->where('parent_id', 0)
                ->where('id', $parent_id)
                ->get();
        
        return (!empty($category)) ? true : false;
    }

    /**
     * 
     * @return array
     */
    private function _getParentCategory()
    {
        $allCategories = DB::table('categories')
                ->where('type', 'DEFAULT')
                ->where('is_deleted', 0)
                ->where('parent_id', 0)
                ->get();

        $categories = array();
        if (!empty($allCategories)) {
            foreach ($allCategories as $category) {
                $categories[$category->usage_type][$category->id] = $category->name;
            }
        }
        return $categories;
    }

}
