<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = \App\Models\Page::paginate(25);
        $grid = new Datagrid($pages, $request->get('f', []));

        $grid->setColumn('title', 'Titulok')
            ->setColumn('menu_title', 'Titulok v menu')
            ->setActionColumn([
                'wrapper' => function ($value, $row) {
                    $returnVal = '<a href="' . route('page.edit', [$row->id]) . '" title="Edit" class="btn btn-sm btn-primary">Upraviť</a>
                <a href="' . route('page.show', [$row->id]) . '" title="Show" class="btn btn-sm btn-secondary">Zobraziť</a>
                <a href="' . route('page.delete', $row->id) . '" title="Delete" data-method="DELETE" class="btn btn-sm btn-danger">Vymazať</a> ';

                    if ($row->published) {
                        $returnVal .= '<a href="' . route('page.publish', [$row->id]) . '" title="Hide" class="btn btn-sm btn-secondary">Skryť</a>';
                    } else {
                        $returnVal .= '<a href="' . route('page.publish', [$row->id]) . '" title="Publish" class="btn btn-sm btn-secondary">Publikovať</a>';
                    }
                    return $returnVal;
                }
            ]);
        return view('page.index', ['grid' => $grid
        ]);
    }

    public function create()
    {
        return view('page.create', ['action' => route('page.store'),
            'method' => 'post']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'menu_title' => 'required'
        ]);

        $page = Page::create($request->all());
        $page->user_id = Auth::user()->getAuthIdentifier();
        $page->save();
        return redirect()->route('page.index');
    }

    public function edit(Request $request, Page $page)
    {
        return view('page.edit', [
            'action' => route('page.update', $page->id),
            'method' => 'put',
            'model' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'menu_title' => 'required',
            'text' => 'required'
        ]);

        $page->update($request->all());
        return redirect()->route('page.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(Page $page)
    {
        if($page->published == false && Auth::user() == null ) {
            return redirect()->route('login');
        }
        if($page->published == false && Auth::user() != null) {
            if(Auth::user()->can('viewAny', $page)) {
                return view('page.show', [
                    'page' => $page
                ]);
            }
        }
        if($page->published == true) {
            return view('page.show', [
                'page' => $page
            ]);

        }
        return redirect()->route('login');
    }

    public function publish(Page $page)
    {
        if ($page->published == true) {
            $page->published = false;
        } else {
            $page->published = true;
        }
        $page->save();
        return redirect()->route('page.index');
    }
}
