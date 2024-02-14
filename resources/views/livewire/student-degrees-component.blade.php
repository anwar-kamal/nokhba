
<div x-data="{ sort: 'empty', open: false }">
    <div class=" w-full  flex justify-center md:justify-between items-center  flex-wrap gap-x-2">
        <form action="" class="my-5 relative   min-w-[250px]">
            <input type="search" class=" w-full drop-shadow-xl ltr:-mr-10 rtl:-ml-10" name="" id=""
                placeholder="ابحث هنا...">
            <button class=" button-search z-40 absolute top-0 bottom-0  ltr:right-0 rtl:left-0">
                <img src="{{ asset('assets/img/search-normal.png') }}" alt="" class=""></button>
        </form>
        <div class=" relative">
            <div class="px-4 py-2 gap-4 bg-white rounded-2xl border border-neutral-200 justify-between items-center inline-flex cursor-pointer"
                @click="open =!open">
                <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                    الفصول
                    الدراسية
                </div>
                <div>
                    <i class="fa-solid fa-chevron-down" x-show="!open"></i>
                    <i class="fa-solid fa-chevron-up" x-show="open"></i>
                </div>
            </div>
            <ul class=" absolute top-9 right-0 left-0  z-30 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider grid sm:gap-1  my-2"
                x-show="open">

                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer  whitespace-nowrap sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                    @click="sort='empty'" :class="sort === 'empty' ? 'bg-red-50 text-red-900' : ''">
                    دورات اليوم</li>
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer  whitespace-nowrap sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                    @click="sort='finished'" :class="sort === 'finished' ? 'bg-red-50 text-red-900' : ''">
                    دورات مكتملة</li>
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer  whitespace-nowrap sm:text-base px-2 text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px] "
                    @click="sort='all'" :class="sort === 'all' ? 'bg-red-50 text-red-900' : ''">
                    جميع </li>

            </ul>
        </div>

    </div>
    <div class="grid gap-8 py-8">
        <div x-show=" sort==='empty'|| sort==='all'">
            <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px]">
            </div>
            <div class=" flex items-center justify-center gap-8 flex-wrap">
                <img src="{{ asset('assets/img/no-daragt.png') }}" alt="">
            </div>
        </div>
        <div x-show=" sort==='finished' || sort==='all'">
            <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px]">
            </div>
            <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap hidden md:block">
                <table
                    class="whitespace-nowrap w-full md:w-full text-sm  text-gray-500  dark:text-black border-spacing-1 overflow-x-auto ">
                    <thead
                        class=" uppercase  sm:rounded-lg bg-primary  text-white dark:text-gray-400   font-semibold text-start ">
                        <tr>
                            <th scope="col" class="px-4 py-2 border ">
                                اسم الدورة
                            </th>
                            <th scope="col" class="px-4 py-2 border">
                                الدرجة
                            </th>
                            <th scope="col" class="px-4 py-2 border">
                                التقدير
                            </th>
                            <th scope="col" class="px-4 py-2 border">
                                ناجح / راسب
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <img src="{{ asset('assets/img/table-image.png') }}" alt="" width="50" height="50"
                                    class=" rounded-lg">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    لغة انجليزية (1) - مستوي اول</div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    89.5%
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    جيد مرتفع (C+)
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="w-[42px] h-[30px] p-2 bg-blue-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                    <div
                                        class="text-center text-blue-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                        ناجح</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <img src="{{ asset('assets/img/table-image.png') }}" alt="" width="50" height="50"
                                    class=" rounded-lg">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    لغة انجليزية (1) - مستوي اول</div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    89.5%
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    جيد مرتفع (C+)
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="w-[42px] h-[30px] p-2 bg-blue-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                    <div
                                        class="text-center text-blue-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                        ناجح</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <img src="{{ asset('assets/img/table-image.png') }}" alt="" width="50" height="50"
                                    class=" rounded-lg">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    لغة انجليزية (1) - مستوي اول</div>
                            </th>
                            <td class="px-6 py-4">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    89.5%
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    جيد مرتفع (C+)
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="w-[42px] h-[30px] p-2 bg-blue-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                    <div
                                        class="text-center text-blue-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                        ناجح</div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class=" grid gap-4 md:hidden">
                <div
                    class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                    <div class="flex items-center gap-4">

                        <div class=" grid gap-4">
                            <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                مبادئ إدارة الموارد البشريه - بشري 101
                            </div>
                            <div
                                class="w-[42px] h-[30px] p-2 bg-blue-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div
                                    class="text-center text-blue-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                    ناجح</div>
                            </div>
                        </div>
                    </div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                الدرجة</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                89.5 %
                            </div>
                        </div>
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                التقدير</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                جيد مرتفع (C+)
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                    <div class="flex items-center gap-4">

                        <div class=" grid gap-4">
                            <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                مبادئ إدارة الموارد البشريه - بشري 101
                            </div>
                            <div
                                class="w-[42px] h-[30px] p-2 bg-blue-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div
                                    class="text-center text-blue-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                    ناجح</div>
                            </div>
                        </div>
                    </div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                الدرجة</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                89.5 %
                            </div>
                        </div>
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                التقدير</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                جيد مرتفع (C+)
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                    <div class="flex items-center gap-4">

                        <div class=" grid gap-4">
                            <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                مبادئ إدارة الموارد البشريه - بشري 101
                            </div>
                            <div
                                class="w-[42px] h-[30px] p-2 bg-blue-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div
                                    class="text-center text-blue-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                    ناجح</div>
                            </div>
                        </div>
                    </div>
                    <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                الدرجة</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                89.5 %
                            </div>
                        </div>
                        <div>
                            <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                التقدير</div>
                            <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                جيد مرتفع (C+)
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div x-show=" sort==='finished' || sort==='all'">
            <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px]">
            </div>
        </div>

    </div>


</div>
