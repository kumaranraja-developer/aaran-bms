<div>
    <x-Ui::menu.web.top-banner
        description="Apps"
        slogan="All the software you need to run your business."
    />

    <div class="bg-bg-1 pt-10 dark:bg-bg-4 scrollbar-hide">

        <div class="grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 w-[80%] h-max mx-auto gap-4 p-4 items-stretch">
            @foreach($featured as $featuredApps)
                <x-Ui::web.project.featured-apps
                    :icon="$featuredApps->icon"
                    :title="$featuredApps->title"
                    :description="$featuredApps->description"
                    :btn_bg="'bg-orange-600'"
                />
            @endforeach
        </div>
        <div class="my-15 text-4xl text-center">Upcoming Apps</div>

        <div class="grid grid-cols-1 pb-10 sm:grid-cols-2 mx-auto w-[80%] lg:grid-cols-3 gap-4 h-max p-4 pointer-events-none">
            @foreach($upcoming as $upcomingApps)
                <x-Ui::web.project.featured-apps
                    :icon="$upcomingApps->icon"
                    :title="$upcomingApps->title"
                    :description="$upcomingApps->description"
                    :btn="'text-green-500'"
                    :btn_text="'UPCOMING'"
                    :btn_bg="'bg-green-600'"
                />
            @endforeach
        </div>
        <x-Ui::web.common.footer-address />
        <x-Ui::web.common.copyright/>
    </div>

</div>
