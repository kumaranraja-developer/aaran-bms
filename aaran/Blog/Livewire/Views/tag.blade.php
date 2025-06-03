<div>
    <x-slot name="header">Blog Tag</x-slot>

    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification />


        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <x-Ui::table.caption :caption="'Blog Tag'">
            {{$list->count()}}
        </x-Ui::caption>

         <x-Ui::table.form>
            <x-slot:table_header name="table_header">

                <x-Ui::table.header-serial width="20%"/>

                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}">
                    Name
                </x-Ui::table.header-text>

                <x-Ui::table.header-text wire:click.prevent="sortBy('blog_category_id')" sortIcon=false>Blog
                    Category
                </x-Ui::table.header-text>
                <x-Ui::table.header-action/>

            </x-slot:table_header>

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)

                   <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text>{{$row->vname}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text>
{{--                            {{\Aaran\Blog\Models\BlogTag::common($row->blogcategory_id)}}--}}
                            {{ optional($row->blogCategory)->vname ?? '-' }}
                        </x-Ui::table.cell-text>
                        <x-Ui::table.cell-action id="{{$row->id}}"/>
                    </x-Ui::table.row>

                @endforeach
            </x-slot:table_body>

        </x-Ui::table.form>
        <!-- Delete Modal --------------------------------------------------------------------------------------------->
        <x-Ui::modal.confirm-delete/>

        <x-Ui::forms.create :id="$vid">

            <div class="flex flex-col  gap-3">

                <div>
                    <x-Ui::input.floating wire:model="vname" label="Tag Name"/>
                    <x-Ui::input.error-text wire:model="vname" />
                </div>


                <x-Ui::dropdown.wrapper label="Blog Category" type="blogcategoryTyped">
                    <div class="relative ">
                        <x-Ui::dropdown.input label="Blog Category" id="blog_category_name"
                                          wire:model.live="blog_category_name"
                                          wire:keydown.arrow-up="decrementBlogcategory"
                                          wire:keydown.arrow-down="incrementBlogcategory"
                                          wire:keydown.enter="enterBlogcategory"/>
                        <x-Ui::dropdown.select>
                            @if($blogcategoryCollection)
                                @forelse ($blogcategoryCollection as $i => $blogcategory)
                                    <x-Ui::dropdown.option highlight="{{$highlightBlogCategory === $i  }}"
                                                       wire:click.prevent="setBlogcategory('{{$blogcategory->vname}}','{{$blogcategory->id}}')">
                                        {{ $blogcategory->vname }}
                                    </x-Ui::dropdown.option>
                                @empty
                                    <button
                                        wire:click.prevent="blogcategorySave('{{$blog_category_name}}')"
                                        class="text-white bg-green-500 text-center w-full">
                                        create
                                    </button>
                                @endforelse
                            @endif
                        </x-Ui::dropdown.select>
                    </div>
                    <div>
                        <x-Ui::input.error-text wire:model="blog_category_id" />
                    </div>
                </x-Ui::dropdown.wrapper>

            </div>
        </x-Ui::forms.create>
     </x-Ui::forms.m-panel>
</div>
