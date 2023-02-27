<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\SubMenu;
use Illuminate\Support\Str;
use App\Models\CategoryMenu;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{

    public function index(DataTables $datatables, Request $request)
    {

        if ($request->ajax()) {
            return $datatables->of(CategoryMenu::from('category_menus as a')
                ->leftJoin('menus as b', function ($q) {
                    $q->on('a.id', '=', 'b.category_menu_id')->leftJoin('sub_menus as c', function ($y) {
                        $y->on('b.id', '=', 'c.menu_id');
                    });
                })
                ->select([
                    'a.name as cm_name',
                    'a.id as cm_id',
                    'b.name as m_name',
                    'b.id as m_id',
                    'c.name as sm_name',
                    'c.id as sm_id',
                    'a.deleted_at as a_d',
                    'b.deleted_at as b_d',
                    'c.deleted_at as c_d'
                ])
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

                    if ($menu->sm_name) {
                        $menu->deleted_at = $menu->c_d;
                        $menu->id = $menu->sm_id;

                        $param = 'submenu';
                    } else if ($menu->m_name) {
                        $menu->deleted_at = $menu->b_d;
                        $menu->id = $menu->m_id;
                        $param = 'menu';
                    } else {
                        $menu->deleted_at = $menu->a_d;
                        $menu->id = $menu->cm_id;

                        $param = 'category_menu';
                    }
                    return \view('backend.menu.button_action', compact('menu', 'param'));
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
        $page = Page::pluck('title', 'id')->all();
        switch ($param) {
            case 'menu':
                $data = CategoryMenu::pluck('name', 'id')->all();
                $route = Route::getRoutes();
                $url_target = Post::pluck('slug', 'id')->all();
                if ($data) {
                    return view('backend.menu.create', \compact('param', 'page', 'data', 'url_target'));
                } else {
                    return \redirect()->route('dash.menu.create', ['param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                }
                break;
            case 'submenu':
                $data1 = Menu::pluck('name', 'id')->all();
                if ($request->ajax()) {
                    $data1 = CategoryMenu::with('menu')->where('id',$request->id)->first()->menu;
                    return response()->json($data1);
                }
                $data = CategoryMenu::pluck('name', 'id')->all();
                
                $url_target = Post::pluck('slug', 'id')->all();
                if (!$data) {
                    return \redirect()->route('dash.menu.create', ['param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                } elseif (!$data1) {
                    return \redirect()->route('dash.menu.create', ['param' => 'menu'])->with('success', 'Create Menu Before Create Menu');
                } else {
                    return view('backend.menu.create', \compact('param', 'page', 'data', 'data1', 'url_target'));
                }
                break;
            default:
                $url_target = Post::pluck('slug', 'id')->all();
                return view('backend.menu.create', \compact('param', 'page', 'url_target'));
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

        ]);
        
        $input = $request->all();
        // dd($input['page_id'][0] == null);
        $input['page_id'] = $input['page_id'][0] ? Page::where('slug', implode("",  $input['page_id']))->first()->id : null;
        switch ($request->param) {
            case 'category_menu':
                $input['slug'] = Str::slug($input['name']);
                CategoryMenu::create($input);
                break;
            case 'menu':
                $input['category_menu_id'] = implode("", $input['category_menu_id']);
                $input['slug'] = Str::slug($input['name']);
                Menu::create($input);
                break;
            case 'submenu':
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
    public function edit($id, Request $request)
    {
        $param = $request->param;

        if (!$param) {
            return back()->with('success', 'In Corect Parameter');
        }
        $page = Page::pluck('title', 'slug')->all();
        switch ($param) {
            case 'menu':
                $old = Menu::with([
                    'categoryMenu' => function ($query) {
                        return $query->withTrashed();
                    },
                    'page' => function ($q) {
                        return $q->withTrashed();
                    }
                ])->find($id);
                // dd($old);
                $data = CategoryMenu::pluck('name', 'id')->all();
                $route = Route::getRoutes();
                $url_target = Post::pluck('slug', 'id')->all();
                if ($data) {
                    return view('backend.menu.edit', \compact('param','old', 'data', 'page'));
                } else {
                    return \redirect()->route('dash.menu.edit', [$id, 'param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                }
                break;
            case 'submenu':
                $old = SubMenu::with([
                    'menu' => function ($query) {
                        return $query->with([
                            'categoryMenu' => function($query){
                                return $query->withTrashed();
                            }
                        ])->withTrashed();
                    },
                    'page' =>function($q){
                        return $q->withTrashed();
                    }
                ])->find($id);
                // dd($old->menu->categoryMenu->id);
                $data = CategoryMenu::pluck('name', 'id')->all();
                $data1 = Menu::pluck('name', 'id')->all();
                $url_target = Post::pluck('slug', 'id')->all();
                if (!$data) {
                    return \redirect()->route('dash.menu.edit', [$id, 'param' => 'category_menu'])->with('success', 'Create Category Menu Before Create Menu');
                } elseif (!$data1) {
                    return \redirect()->route('dash.menu.edit', [$id, 'param' => 'menu'])->with('success', 'Create Menu Before Create Menu');
                } else {
                    return view('backend.menu.edit', \compact('param','old', 'data', 'data1', 'page'));
                }
                break;
            default:
                $old = CategoryMenu::with([
                    'page' => function ($q) {
                        return $q->withTrashed();
                    }
                ])->find($id);

                return view('backend.menu.edit', \compact('param','old', 'page'));
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
            'param' => 'required|string',

        ]);
        $input = $request->all();
        $input['page_id'] = $input['page_id'][0] ? Page::where('slug',implode("",  $input['page_id']))->first()->id : null;
        switch ($request->param) {
            case 'category_menu':
                $input['slug'] = Str::slug($input['name']);
                CategoryMenu::find($id)->update($input);
                break;
            case 'menu':
                $input['category_menu_id'] = implode("", $input['category_menu_id']);
                $input['slug'] = Str::slug($input['name']);
                Menu::find($id)->update($input);
                break;
            case 'submenu':
                $input['category_menu_id'] = implode("", $input['category_menu_id']);
                $input['menu_id'] = implode("", $input['menu_id']);
                $input['slug'] = Str::slug($input['name']);
                SubMenu::find($id)->update($input);
                break;
        }
        return view('backend.menu.index')->with('success', $request->param . ' Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $this->validate($request, [
            'param' => 'required|string',

        ]);
        switch ($request->param) {
            case 'category_menu':
                CategoryMenu::find($id)->delete();
                break;
            case 'menu':

                Menu::find($id)->delete();
                break;
            case 'submenu':

                SubMenu::find($id)->delete();
                break;
        }

        return redirect()->route('dash.menu.index')->with('success', 'Menu deleted successfully');
    }
    public function forceDestroy($id, Request $request)
    {
        $this->validate($request, [
            'param' => 'required|string',

        ]);
        switch ($request->param) {
            case 'category_menu':
                CategoryMenu::withTrashed()->find($id)->forceDelete();
                break;
            case 'menu':

                Menu::withTrashed()->find($id)->forceDelete();
                break;
            case 'submenu':

                SubMenu::withTrashed()->find($id)->forceDelete();
                break;
        }
        return redirect()->route('dash.menu.index')->with('success', 'Menu Permanently Deleted successfully');
    }
    public function restore($id, Request $request)
    {
        $this->validate($request, [
            'param' => 'required|string',

        ]);
        switch ($request->param) {
            case 'category_menu':
                CategoryMenu::withTrashed()->findOrFail($id)->restore();
                break;
            case 'menu':

                Menu::withTrashed()->findOrFail($id)->restore();
                break;
            case 'submenu':

                SubMenu::withTrashed()->findOrFail($id)->restore();
                break;
        }
        Tag::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('dash.menu.index')->with('success', 'Menu restored successfully');
    }
}
