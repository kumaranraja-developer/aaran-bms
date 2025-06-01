<?php

namespace Aaran\Blog\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Blog\Models\BlogCategory;
use Aaran\Blog\Models\BlogTag;
use Aaran\Blog\Models\BlogComment;
use Aaran\Blog\Models\BlogPost;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    use ComponentStateTrait, TenantAwareTrait;

    public $post;
    public $blog_category_name;
    public $blog_tag_name;

    public string $vname = '';
    public string $body;
    public $users;
    public $image;
    public $old_image;
    public $BlogCategories;
    public $category_id;
    public $tags;
    public $tagfilter = [];
    public $visibility = false;
    public $active_id = true;
    public function mount($id): void
    {
        $this->post = BlogPost::findOrFail($id);
        $this->BlogCategories = BlogCategory::get();
        $this->tags = BlogTag::get();
        $this->blog_category_name = $this->post->blog_category_id
            ? BlogCategory::find($this->post->blog_category_id)?->vname
            : '';

        $this->blog_tag_name = $this->post->blog_tag_id
            ? BlogTag::find($this->post->blog_tag_id)?->vname
            : '';
    }
    public function getObj($id)
    {
        if ($id) {
            $obj = BlogPost::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->body = $obj->body;
            $this->blog_category_id = $obj->blogcategory_id;
            $this->blog_category_name = $obj->blogcategory_id?BlogCategory::find($obj->blogcategory_id)->vname:'';
            $this->blog_tag_id = $obj->blogtag_id;
            $this->blog_tag_name = $obj->blogtag_id?BlogTag::find($obj->blogtag_id)->vname:'';
            $this->active_id = $obj->active_id;
            $this->old_image = $obj->image;
            $this->visibility = $obj->visibility;
            return $obj;
        }
        return null;
    }

    public function clearFields(): void
    {
        $this->vid = null;
        $this->vname = '';
        $this->active_id = true;
        $this->body = '';
        $this->blog_category_id = '';
        $this->blog_category_name = '';
        $this->blog_tag_id = '';
        $this->blog_tag_name = '';
        $this->old_image = '';
        $this->image = '';
        $this->visibility = false;
    }
    public function getList()
    {
        return BlogPost::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function getBlogcategoryList(): void
    {

        $this->blogcategoryCollection = DB::table('blog_categories')
            ->when($this->blog_category_name, fn($query) => $query->where('vname', 'like',  "%{$this->blog_category_name}%"))
            ->get();
    }



    public function getBlogTagList(): void
    {

        $this->blogtagCollection = DB::table('blog_tags')
            ->when($this->blog_tag_name, fn($query) => $query->where('vname', 'like', "%{$this->blog_tag_name}%"))
            ->get();
    }
    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('blog::show', [
            'list' => $this->getList(),
            'firstPost' => BlogPost::latest()
                ->take(3)
                ->when($this->tagfilter, function ($query, $tagfilter) {
                    return $query->whereIn('blog_tag_id', $tagfilter);
                })
                ->get(),
        ]);
    }
}
