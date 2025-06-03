<?php

namespace Aaran\Blog\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Blog\Models\BlogCategory;
use Aaran\Blog\Models\BlogLike;
use Aaran\Blog\Models\BlogTag;
use Aaran\Blog\Models\BlogComment;
use Aaran\Blog\Models\BlogPost;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Aaran\Assets\Services\ImageService;

class Show extends Component
{
    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

    public $post;
    public $blog_category_name;
    public $blog_tag_name;

    public ?int $vid = null; // Added vid property
    public string $vname = '';
    public string $body = '';
    public $users;
    public $image;
    public $old_image;
    public $BlogCategories;
    public $category_id;
    public $tags;
    public $tagFilter = [];
    public bool $visibility = false;
    public bool $active_id = true;
    public $blog_tag_id = '';

    public $blog_category_id = '';
    public $blogcategoryCollection;
    public int $highlightBlogCategory = 0;
    public bool $blogcategoryTyped = false;
    public $blogtagCollection;

    public $comments;
    public $commentMsg;
    public int $highlightBlogTag = 0;
    public bool $blogtagTyped = false;
    public $likeCount = 0;
    public $userLiked = false;

    public function mount($id): void
    {
        $userId = auth()->id();

        $this->post = BlogPost::findOrFail($id);

        $existingLike = BlogLike::where('blog_post_id', $id)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
            $this->userLiked = true;
        } else {
            $this->userLiked = false;
        }

        $this->likeCount = BlogLike::where('blog_post_id', $id)->count();

        // Other initialization logic...
        $this->comments = $this->getComments();
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
        $this->updateHighlights();
    }


    public function getSave(): void
    {
        $imageService = app(ImageService::class);

        $this->post = BlogPost::updateOrCreate(
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
            ]
        );
        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
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

    public function getObj($id)
    {
        if ($id) {
            $obj = BlogPost::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->body = $obj->body;
            $this->blog_category_id = $obj->blog_category_id;
            $this->blog_category_name = $obj->blog_category_id ? BlogCategory::find($obj->blog_category_id)->vname : '';
            $this->blog_tag_id = $obj->blog_tag_id;
            $this->blog_tag_name = $obj->blog_tag_id ? BlogTag::find($obj->blog_tag_id)->vname : '';
            $this->active_id = $obj->active_id;
            $this->old_image = $obj->image;
            $this->visibility = $obj->visibility;
            return $obj;
        }
        return null;
    }

    public function getList()
    {
        return BlogPost::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function blogcategorySave($name): void
    {
        $name = trim($name);

        if ($name === '') {
            $this->dispatch('notify', ...['type' => 'error', 'content' => 'Category name is required.']);
            return;
        }

        $existing = BlogCategory::whereRaw('LOWER(vname) = ?', [strtolower($name)])->first();
        if ($existing) {
            $this->setBlogcategory($existing->vname, $existing->id);
            return;
        }

        $category = BlogCategory::create([
            'vname' => $name,
            'active_id' => 1,
        ]);

        $this->setBlogcategory($category->vname, $category->id);
        $this->getBlogcategoryList();

        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Blog category created successfully.']);
    }

    public function setBlogcategory($name, $id): void
    {
        $this->blog_category_name = $name;
        $this->blog_category_id = $id;
        $this->getBlogcategoryList();
        $this->updateHighlights();
    }

    public function updatedBlogCategoryName()
    {
        $this->getBlogcategoryList();
    }

    public function getCategory_id($id)
    {
        $this->category_id = $id;
        $this->gettags();
    }

    public function getBlogcategoryList(): void
    {
        $this->blogcategoryCollection = DB::table('blog_categories')
            ->when($this->blog_category_name, fn($query) => $query->where('vname', 'like', "%{$this->blog_category_name}%"))
            ->get();
    }

    public function blogtagSave($name): void
    {
        $name = trim($name);

        if ($name === '') {
            $this->dispatch('notify', ...['type' => 'error', 'content' => 'Tag name is required.']);
            return;
        }

        if (!$this->blog_category_id) {
            $this->dispatch('notify', ...['type' => 'error', 'content' => 'Please select a category before creating a tag.']);
            return;
        }

        $existing = BlogTag::whereRaw('LOWER(vname) = ?', [strtolower($name)])
            ->where('blog_category_id', $this->blog_category_id)
            ->first();

        if ($existing) {
            $this->refreshBlogTag(['name' => $existing->vname, 'id' => $existing->id]);
            return;
        }

        $tag = BlogTag::create([
            'blog_category_id' => $this->blog_category_id,
            'vname' => $name,
            'active_id' => 1,
        ]);
        $this->refreshBlogTag(['name' => $tag->vname, 'id' => $tag->id]);
        $this->getBlogTagList();
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Blog tag created successfully.']);
    }

    public function refreshBlogTag($v): void
    {
        $this->blog_tag_id = $v['id'];
        $this->blog_tag_name = $v['name'];
        $this->blogtagTyped = false;
        $this->getBlogTagList(); // refresh dropdown
    }

    public function getBlogTagList(): void
    {
        $this->blogtagCollection = DB::table('blog_tags')
            ->when($this->blog_tag_name, fn($query) => $query->where('vname', 'like', "%{$this->blog_tag_name}%"))
            ->get();
        $this->highlightBlogTag = 0;
    }

    public function updatedBlogTagName()
    {
        $this->getBlogTagList();
    }

    public function setBlogTag($name, $id): void
    {
        $this->blog_tag_name = $name;
        $this->blog_tag_id = $id;
        $this->getBlogTagList();
        $this->updateHighlights();
    }

    public function gettags()
    {
        $this->tags = BlogTag::where('blog_category_id', '=', $this->category_id)->get();
    }

    public function deleteFunction($id): void
    {
        $obj = BlogPost::find($id);
        if ($obj) {
            $obj->delete();
        }
        $this->redirect(route('posts'), navigate: true);
    }

    public function getSaveComment()
    {
        BlogComment::updateOrCreate(
            ['id' => $this->vid],
            [
                'blog_post_id' => $this->post->id,
                'body' => $this->commentMsg,
                'user_id' => auth()->id(),
            ],
        );

        $this->comments = $this->getComments();

        $this->commentMsg = null;
        $this->vid = null;  // Reset vid here

        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Comments Added Successfully']);
    }

    public function getComments()
    {
        return $this->post->comments()->orderBy('created_at', 'desc')->get();
    }

    public function deleteComment($id): void
    {
        $obj = BlogComment::find($id);
        if ($obj) {
            $obj->delete();
        }

        $this->comments = $this->getComments();
        $this->dispatch('notify', ...['type' => 'error', 'content' => 'Comments removed Successfully']);
    }

    private function updateHighlights(): void
    {
        $this->highlightBlogCategory = $this->blogcategoryCollection->search(function ($item) {
            return $item->id == $this->blog_category_id;
        }) ?? 0;

        $this->highlightBlogTag = $this->blogtagCollection->search(function ($item) {
            return $item->id == $this->blog_tag_id;
        }) ?? 0;
    }

    public function editActivity($id)
    {
        $comment = BlogComment::find($id);
        if ($comment) {
            $this->vid = $comment->id;
            $this->commentMsg = $comment->body;
        }
    }

    public function updateLike($postId): void
    {
        $userId = auth()->id();

        $existingLike = BlogLike::where('blog_post_id', $postId)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
            // User already liked it, so unlike
            $existingLike->delete();
            $this->userLiked = false;
        } else {
            // User hasn't liked it yet, so like
            BlogLike::create([
                'blog_post_id' => $postId,
                'user_id' => $userId,
            ]);
            $this->userLiked = true;
        }

        // Update like count
        $this->likeCount = BlogLike::where('blog_post_id', $postId)->count();
    }


    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        $commonQuery = BlogPost::with('user')->latest()
            ->when($this->tagFilter, function ($query, $tagFilter) {
                return $query->whereIn('blog_tag_id', $tagFilter);
            });

        return view('blog::show', [
            'list' => $this->getList(),
            'firstPost' => (clone $commonQuery)->take(3)->get(),
            'recentPost' => (clone $commonQuery)->take(5)->get(),
        ]);
    }
}
