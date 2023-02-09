<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\CategoryMenu;
use App\Models\Post;
use App\Models\SubMenu;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{

    public function index(DataTables $datatables, Request $request)
    {
       
        if ($request->ajax()) {
            return $datatables->of(CategoryMenu::from('category_menus as a')->leftJoin('menus as b',function($q){
                $q->on('a.id','=','b.category_menu_id');
            })->leftJoin('sub_menus as c',function($y){
                $y->on('b.id','=','c.menu_id');
            })
            ->select('a.name as cm_name','a.id as cm_id','b.name as m_name','b.id as m_id','c.name as sm_name','c.id as sm_id','a.deleted_at as deleted_at')
            ->withTrashed())
                ->addColumn('category_menu_name', function (CategoryMenu $menu) {
                    return $menu->cm_name;
                    
                })
                ->addColumn('menu_name', function (CategoryMenu $menu) {
                    return $menu->m_name;                
                })
                ->addColumn('submenu_name', function (CategoryMenu $menu) {
                   return $menu->sm_name;
                    
                })
                ->addColumn('action', function (CategoryMenu $menu) {
                    if($menu->m_name){
                        $menu['deleted_at'] = $menu->delete_at;
                        $menu['id'] = $menu->m_id;
                        $param = 'menu';
                    }
                    if($menu->sm_name){
                        $menu = $menu->sm_id;
                        $param = 'submenu';
                    }
                    else{
                        $menu = $menu->cm_id;
                        $param = 'category_menu';
                    }
                    return \view('backend.menu.button_action', compact('menu','param'));
                })
                ->addColumn('status', function (CategoryMenu $menu) {
                    if ($menu->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {

            return view('backend.menu.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'param' => 'required',
        ]);
        $param = $request->param;
        if (!$param) {
            return back()->with('success', 'In Corect Parameter');
        }

        switch ($param) {
            case 'menu':
                $data = CategoryMenu::pluck('name', 'id')->all();
                $route = Route::getRoutes();
                $url_target = Post::pluck('slug', 'id')->all();
                if ($data) {
                    return view('backend.menu.create', \compact('param', 'data', 'url_target'));
                } else {
                    return \redirect()->route('dash.menu.create', ['param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                }
                break;
            case 'submenu':
                $data = CategoryMenu::pluck('name', 'id')->all();
                $data1 = Menu::pluck('name', 'id')->all();
                $url_target = Post::pluck('slug', 'id')->all();
                if (!$data) {
                    return \redirect()->route('dash.menu.create', ['param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                } elseif (!$data1) {
                    return \redirect()->route('dash.menu.create', ['param' => 'menu'])->with('success', 'Create Menu Before Create Menu');
                } else {
                    return view('backend.menu.create', \compact('param', 'data', 'data1', 'url_target'));
                }
                break;
            default:
                $url_target = Post::pluck('slug', 'id')->all();
                return view('backend.menu.create', \compact('param', 'url_target'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'url_target' => 'required|string',

        ]);
        switch ($request->param) {
            case 'category_menu':
                $input = $request->only(['name', 'url_target']);
                $input['slug'] = Str::slug($input['name']);
                CategoryMenu::create($input);
                break;
            case 'menu':
                $input = $request->only(['category_menu_id', 'name', 'url_target']);
                $input['category_menu_id'] = implode("", $input['category_menu_id']);
                $input['slug'] = Str::slug($input['name']);
                Menu::create($input);
                break;
            case 'submenu':
                $input = $request->only(['category_menu_id', 'menu_id', 'name', 'url_target']);
                $input['category_menu_id'] = implode("", $input['category_menu_id']);
                $input['menu_id'] = implode("", $input['menu_id']);
                $input['slug'] = Str::slug($input['name']);
                SubMenu::create($input);
                break;
        }
        return back()->with('success', $request->param . ' Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $param = $request->param;
       
        if (!$param) {
            return back()->with('success', 'In Corect Parameter');
        }

        switch ($param) {
            case 'menu':
                $page = Menu::with([
                    'categoryMenu' => function ($query) {
                        return $query->withTrashed();
                    }
                ])->find($id);
                $data = CategoryMenu::pluck('name', 'id')->all();
                $route = Route::getRoutes();
                $url_target = Post::pluck('slug', 'id')->all();
                if ($data) {
                    return view('backend.menu.edit', \compact('param', 'data', 'page'));
                } else {
                    return \redirect()->route('dash.menu.edit', [$id,'param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                }
                break;
            case 'submenu':
                $page = SubMenu::with([
                    'menu' => function ($query) {
                        return $query->withTrashed();
                    }
                ])->find($id);
                $data = CategoryMenu::pluck('name', 'id')->all();
                $data1 = Menu::pluck('name', 'id')->all();
                $url_target = Post::pluck('slug', 'id')->all();
                if (!$data) {
                    return \redirect()->route('dash.menu.edit', [$id,'param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                } elseif (!$data1) {
                    return \redirect()->route('dash.menu.edit', [$id,'param' => 'menu'])->with('success', 'Create Menu Before Create Menu');
                } else {
                    return view('backend.menu.edit', \compact('param', 'data', 'data1', 'page'));
                }
                break;
            default:
                $page = CategoryMenu::with([
                    'categoryMenu' => function ($query) {
                        return $query->withTrashed();
                    }
                ])->find($id);

                return view('backend.menu.edit', \compact('param', 'page'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'url_target' => 'required|string',
            'param' => 'required|string',

        ]);
        switch ($request->param) {
            case 'category_menu':
                $input = $request->only(['name', 'url_target']);
                $input['slug'] = Str::slug($input['name']);
                CategoryMenu::find($id)->update($input);
            case 'menu':
                $input = $request->only(['category_menu_id', 'name', 'url_target']);
                $input['slug'] = Str::slug($input['name']);
                Menu::find($id)->update($input);
            case 'submenu':
                $input = $request->only(['category_menu_id', 'menu_id', 'name', 'url_target']);
                $input['slug'] = Str::slug($input['name']);
                SubMenu::find($id)->update($input);
        }
        return back()->with('success', $request->param . ' Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('dash.menu.index')->with('success', 'Menu deleted successfully');
    }
    public function forceDestroy($id)
    {
        Tag::withTrashed()->find($id)->forceDelete();
        return redirect()->route('dash.menu.index')->with('success', 'Menu Permanently Deleted successfully');
    }
    public function restore($id)
    {
        Tag::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.menu.index')->with('success', 'Menu restored successfully');
    }
}
