<div>
    <x-Ui::menu.web.top-banner
        description="Plan Comparison"
        slogan="All the software you need to run your business."
    />

    <div class="bg-white dark:text-dark-9 dark:bg-dark scrollbar-hide">

        <div class="text-white dark:text-dark-9">
            <div class="lg:m-15 m-2 py-5 flex justify-center">
                <div class="overflow-x-auto">
                    <div class="min-w-[800px] inline-block p-2">
                        <table class="w-full border border-gray-300 border-collapse">
                            <thead class="border border-gray-300 dark:bg-purple-900 dark:text-white text-white bg-red-500 border-collapse">
                            <tr>
                                <th class="text-lg">All Plans</th>
                                <th class="border border-gray-300 border-collapse p-2 text-lg">Starter</th>
                                <th class="border border-gray-300 border-collapse p-2 text-lg">Small Business</th>
                                <th class="border border-gray-300 border-collapse p-2 text-lg">Enterprise</th>
                                <th class="border border-gray-300 border-collapse p-2 text-lg">Elite</th>
                            </tr>
                            <tr>
                                <th class="flex justify-center items-center py-5 gap-2 h-full">
                                    <span>Monthly</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input
                                            type="checkbox"
                                            class="sr-only peer"
                                            id="priceToggle"
                                            onclick="handlePrice()"
                                        >
                                        <div class="w-12 h-7 bg-dark-2 rounded-full peer border dark:border-orange-600 border-purple-800  transition-colors duration-300"></div>
                                        <div class="absolute left-1 top-1 w-5 h-5 bg-purple-800 dark:bg-orange-600 rounded-full transition-transform duration-300 peer-checked:translate-x-5"></div>
                                    </label>
                                    <span>Yearly</span>
                                </th>
                                <th class="border border-gray-300 border-collapse py-5 text-2xl font-normal" id="starterPrice">
                                    $9
                                </th>
                                <th class="border border-gray-300 border-collapse py-5 text-2xl font-normal" id="smallPrice">
                                    $19
                                </th>
                                <th class="border border-gray-300 border-collapse py-5 text-2xl font-normal" id="enterprisePrice">
                                    $49
                                </th>
                                <th class="border border-gray-300 border-collapse py-5 text-2xl font-normal" id="elitePrice">
                                    $10
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($table as $data)
                                <tr  class="even:dark:bg-dark-3 text-black dark:text-white even:bg-gray-100 hover:bg-yellow-100 dark:hover:bg-dark-4">
                                    <td class="border border-gray-300 border-collapse p-2 text-md text-center">{{$data['col1']}}</td>
                                    <td class="border border-gray-300 border-collapse p-2 text-md text-center">{{$data['col2']}}</td>
                                    <td class="border border-gray-300 border-collapse p-2 text-md text-center">{{$data['col3']}}</td>
                                    <td class="border border-gray-300 border-collapse p-2 text-md text-center">{{$data['col4']}}</td>
                                    <td class="border border-gray-300 border-collapse p-2 text-md text-center">{{$data['col5']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <x-Ui::web.common.footer-address/>
            <x-Ui::web.common.copyright/>
        </div>


    </div>
</div>
<script>
    function handlePrice() {
        const isYearly = document.getElementById('priceToggle').checked;
        const prices = {
            monthly: {
                starter: "$9",
                small: "$19",
                enterprise: "$49",
                elite: "$10"
            },
            yearly: {
                starter: "$60",
                small: "$70",
                enterprise: "$90",
                elite: "$130"
            }
        };
        const type = isYearly ? 'yearly' : 'monthly';
        document.getElementById('starterPrice').textContent = prices[type].starter;
        document.getElementById('smallPrice').textContent = prices[type].small;
        document.getElementById('enterprisePrice').textContent = prices[type].enterprise;
        document.getElementById('elitePrice').textContent = prices[type].elite;
    }
</script>


git config user.email "kumaranraja46248@gmail.com"
git config user.name "kumaranraja"
