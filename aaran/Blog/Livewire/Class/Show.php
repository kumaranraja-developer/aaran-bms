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
use Aaran\Devops\Models\TaskImage;
use Livewire\WithFileUploads;

use Aaran\Assets\Services\ImageService;

class Show extends Component
{
    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

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
    public $tagFilter = [];
    public $visibility = false;
    public $active_id = true;
    public $blog_tag_id = '';

    public $blog_category_id = '';
    public $blogcategoryCollection;
    public $highlightBlogCategory = 0;
    public $blogcategoryTyped = false;
    public $blogtagCollection;

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
        $this->blogcategoryCollection = BlogCategory::get();
        $this->blogtagCollection = BlogTag::get();
    }

    public function getSave(): void
    {
        $imageService = app(ImageService::class);

        $this->post = BlogPost::updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => $this->vname,
                'body' => $this->body,
                'blog_category_id' => $this->blog_category_id,
                'blog_tag_id' => $this->blog_tag_id,
                'image' => $imageService->save($this->image, $this->old_image),
                'visibility' => $this->visibility,
                'active_id' => $this->active_id,
            ]);
        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }

    public function getObj($id)
    {
        if ($id) {
            $obj = BlogPost::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->body = $obj->body;
            $this->blog_category_id = $obj->blogcategory_id;
            $this->blog_category_name = $obj->blogcategory_id ? BlogCategory::find($obj->blogcategory_id)->vname : '';
            $this->blog_tag_id = $obj->blogtag_id;
            $this->blog_tag_name = $obj->blogtag_id ? BlogTag::find($obj->blogtag_id)->vname : '';
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

    public function decrementBlogcategory(): void
    {
        if ($this->highlightBlogCategory === 0) {
            $this->highlightBlogCategory = count($this->blogcategoryCollection) - 1;
            return;
        }
        $this->highlightBlogcategory--;
    }

    public function incrementBlogcategory(): void
    {
        if ($this->highlightBlogCategory === count($this->blogcategoryCollection) - 1) {
            $this->highlightBlogCategory = 0;
            return;
        }
        $this->highlightBlogCategory++;
    }

    public function getList()
    {
        return BlogPost::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function setBlogcategory($name, $id): void
    {
        $this->blog_category_name = $name;
        $this->blog_category_id = $id;
        $this->getBlogcategoryList();
    }

    public function enterBlogcategory(): void
    {
        $obj = $this->blogcategoryCollection[$this->highlightBlogCategory] ?? null;

        $this->blog_category_name = '';
        $this->blogcategoryCollection = Collection::empty();
        $this->highlightBlogCategory = 0;

        $this->blog_category_name = $obj['vname'] ?? '';
        $this->blog_category_id = $obj['id'] ?? '';
    }

    public function refreshBlogcategory($v): void
    {
        $this->blog_category_id = $v['id'];
        $this->blog_category_name = $v['name'];
        $this->blogcategoryTyped = false;
    }

    public function blogcategorySave($name)
    {
        $obj = BlogCategory::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshBlogcategory($v);
    }

    public function getBlogcategoryList(): void
    {

        $this->blogcategoryCollection = DB::table('blog_categories')
            ->when($this->blog_category_name, fn($query) => $query->where('vname', 'like', "%{$this->blog_category_name}%"))
            ->get();
    }

    public function decrementBlogtag(): void
    {
        if ($this->highlightBlogtag === 0) {
            $this->highlightBlogtag = count($this->blogtagCollection) - 1;
            return;
        }
        $this->highlightBlogtag--;
    }

    public function incrementBlogtag(): void
    {
        if ($this->highlightBlogtag === count($this->blogtagCollection) - 1) {
            $this->highlightBlogtag = 0;
            return;
        }
        $this->highlightBlogtag++;
    }

    public function getBlogTagList(): void
    {

        $this->blogtagCollection = DB::table('blog_tags')
            ->when($this->blog_tag_name, fn($query) => $query->where('vname', 'like', "%{$this->blog_tag_name}%"))
            ->get();
    }

    public function setBlogTag($name, $id): void
    {
        $this->blog_tag_name = $name;
        $this->blog_tag_id = $id;
        $this->getBlogtagList();
    }

    public function enterBlogtag(): void
    {
        $obj = $this->blogtagCollection[$this->highlightBlogtag] ?? null;

        $this->blog_tag_name = '';
        $this->blogtagCollection = Collection::empty();
        $this->highlightBlogtag = 0;

        $this->blog_tag_name = $obj['vname'] ?? '';
        $this->blog_tag_id = $obj['id'] ?? '';
    }

    public function refreshBlogtag($v): void
    {
        $this->blog_tag_id = $v['id'];
        $this->blog_tag_name = $v['name'];
        $this->blogtagTyped = false;
    }

    public function gettags()
    {
        $this->tags = BlogTag::where('blog_category_id', '=', $this->category_id)->get();
    }

    public function blogtagSave($name)
    {
        $obj = BlogTag::create([
            'blog_category_id' => $this->blog_category_id,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshBlogTag($v);
    }

    #endregion

    public function getCategory_id($id)
    {
        $this->category_id = $id;
        $this->gettags();
    }

    public function getFilter($id)
    {
        if (!in_array($id, $this->tagFilter, true)) {
            return array_push($this->tagFilter, $id);
        }
    }


    public function clearFilter()
    {
        $this->tagFilter = [];
    }


    public function removeFilter($id)
    {
        unset($this->tagFilter[$id]);
    }

    public function getRoute()
    {
        return route('posts');
    }

    public function deleteFunction($id)
    {
        $obj = BlogPost::find($id);
        if ($obj) {
            $obj->delete();
        }

        $this->redirect(route('posts'), navigate: true);
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('blog::show', [
            'list' => $this->getList(),
            'firstPost' => BlogPost::latest()
                ->take(3)
                ->when($this->tagFilter, function ($query, $tagFilter) {
                    return $query->whereIn('blog_tag_id', $tagFilter);
                })
                ->get(),
        ]);
    }
}
