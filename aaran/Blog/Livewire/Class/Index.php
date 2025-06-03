<?php

namespace Aaran\Blog\Livewire\Class;

use Aaran\Assets\Services\ImageService;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Blog\Models\BlogCategory;
use Aaran\Blog\Models\BlogLike;
use Aaran\Blog\Models\BlogPost;
use Aaran\Blog\Models\BlogTag;
use Aaran\Devops\Models\TaskImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use ComponentStateTrait;

    use WithFileUploads;

    #region[properties]
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
    #endregion
    public bool $showForm = false;
    public $currentUser;
    public int $likeCount = 0;
    public ?int $currentPostId = null;
    public function mount()
    {
        $this->BlogCategories = BlogCategory::get();
        $this->currentUser = auth()->id();
        $this->likeCount = 0;
    }

    public function getSave(): void
    {
        $imageService = app(ImageService::class);

        BlogPost::updateOrCreate(
            ['id' => $this->vid],
        [
            'vname' => $this->vname,
            'body' => $this->body,
            'user_id' => auth()->id(),
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
            $this->blog_category_name = $obj->blogcategory_id?BlogCategory::find($obj->blogcategory_id)->vname:'';
            $this->blog_tag_id = $obj->blogtag_id;
            $this->blog_tag_name = $obj->blogtag_id?BlogTag::find($obj->blogtag_id)->vname:'';
            $this->active_id = $obj->active_id;
            $this->old_image = $obj->image;
            $this->visibility = $obj->visibility;

            $this->likeCount = BlogLike::where('blog_post_id', $id)->count();

            return $obj;
        }
        return null;
    }
    #endregion

    #region[Clear-Fields]
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

    public $blog_category_id = '';
    public $blog_category_name = '';
    public $blogcategoryCollection;
    public $highlightBlogCategory = 0;
    public $blogcategoryTyped = false;

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
            ->when($this->blog_category_name, fn($query) => $query->where('vname', 'like',  "%{$this->blog_category_name}%"))
            ->get();
    }

    #endregion

    #region[blogTag]
    public $blog_tag_id = '';
    public $blog_tag_name = '';
    public $blogtagCollection;
    public $highlightBlogtag = 0;
    public $blogtagTyped = false;

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

    public function getBlogTagList(): void
    {

        $this->blogtagCollection = DB::table('blog_tags')
            ->when($this->blog_tag_name, fn($query) => $query->where('vname', 'like', "%{$this->blog_tag_name}%"))
            ->get();
    }

    #endregion

    public function getCategory_id($id)
    {
        $this->category_id = $id;
        $this->gettags();
    }

    public function gettags()
    {
        $this->tags = BlogTag::where('blog_category_id', '=', $this->category_id)->get();
    }

    public function getFilter($id)
    {
        if (!in_array($id,$this->tagFilter,true)) {
            return array_push($this->tagFilter, $id);
        }
    }

    public function clearFilter()
    {
        $this->tagFilter=[];
    }

    public function removeFilter($id)
    {
        unset($this->tagFilter[$id]);
    }

    public function getRoute()
    {
        return route('posts');
    }

    public function getList()
    {
        return BlogPost::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    public function getLikeCount(int $postId): int
    {
        return BlogLike::where('blog_post_id', $postId)->count();
    }

    public function loadPost(int $postId)
    {
        $this->currentPostId = $postId;
        $this->likeCount = $this->getLikeCount($postId);
    }




    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        $this->getBlogcategoryList();
        $this->getBlogtagList();

        return view('blog::index', [
            'list' => $this->getList(),
            'firstPost' => BlogPost::latest()
                ->take(6)
                ->when($this->tagFilter, function ($query, $tagFilter) {
                    return $query->whereIn('blog_tag_id', $tagFilter);
                })
                ->get(),
        ]);
    }

    #endregion
}
