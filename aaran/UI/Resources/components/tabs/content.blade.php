<section
    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
    role="tabpanel"
    class=" p-4 space-y-2 dark:bg-dark dark:text-dark-9"
    x-cloak
>
    {{$slot}}
</section>
