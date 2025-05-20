<div>
    <x-Ui::menu.web.top-banner
        description="Apps"
        slogan="All the software you need to run your business."
    />

    <div class="bg-white dark:bg-dark scrollbar-hide">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-[80%] h-max mx-auto gap-4 p-4 items-stretch">
            @foreach($featured as $featuredApps)
                <x-Ui::web.project.featured-apps
                    :icon="$featuredApps->icon"
                    :title="$featuredApps->title"
                    :description="$featuredApps->description"
                />
            @endforeach
        </div>

        <div class="my-15 text-4xl text-center">Upcoming Apps</div>

        <div class="grid grid-cols-1 sm:grid-cols-2 mx-auto w-[80%] lg:grid-cols-3 gap-4 h-max p-4 ">
            @foreach($upcoming as $upcomingApps)
                <x-Ui::web.project.featured-apps
                    :icon="$upcomingApps->icon"
                    :title="$upcomingApps->title"
                    :description="$upcomingApps->description"
                    :btn="'text-green-500'"
                    btn_text="upcoming"
                />
            @endforeach
        </div>
        <x-Ui::web.common.footer-address />
        <x-Ui::web.common.copyright/>
    </div>

</div>
