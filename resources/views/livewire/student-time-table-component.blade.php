    <div x-data="{ sort: 'study' }" class="grid gap-8 relative">
        <div class=" overflow-hidden w-full">
            <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap">
                <ul
                    class="  p-1 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider cent gap-2 font-semibold my-2 w-fit  whitespace-nowrap  ">
                    <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                        @click="sort='study'" :class="sort === 'study' ? 'bg-red-50 text-red-900' : ''">
                        الدراسى الاسبوعى</li>
                    <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                        @click="sort='weekly'" :class="sort === 'weekly' ? 'bg-red-50 text-red-900' : ''">
                        الاختبارات الأسبوعى الدورى</li>
                    <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                        @click="sort='semi_final'" :class="sort === 'semi_final' ? 'bg-red-50 text-red-900' : ''">
                        الاختبارات الدورية</li>
                    <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 "
                        @click="sort='final'" :class="sort === 'final' ? 'bg-red-50 text-red-900' : ''">
                        جدول الاختبارات النهائية</li>
                </ul>
            </div>
        </div>
        <div x-show=" sort==='study'" class=" overflow-hidden w-full ">
            <div class=" overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap table-container">
                <table
                    class=" whitespace-nowrap w-[110%] md:w-full text-sm text-gray-500 dark:text-gray-400
                border-spacing-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <thead
                        class="uppercase sm:rounded-lg bg-primary text-white dark:text-gray-400 font-semibold text-start">
                        <tr>
                            <th scope="col" class="px-4 py-2"></th>
                            <th scope="col" class="px-4 py-2">101 الدراسات الإسلامية - مستوي اول</th>
                            <th scope="col" class="px-4 py-2">مبادئ المحاسبة - 101 محسب - Level 1
                            </th>
                            <th scope="col" class="px-4 py-2">تحليل وتقييم الوظائف - بشري 111 - Level
                                1
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                    السبت
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class=" p-2  w-full h-full rounded-2xl bg-yellow-50 border-yellow-400 border-2 ">
                                    <div class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                        محاضرة</div>
                                    <div class="flex gap-1 items-center ">
                                        <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                        <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                            م - 02:00 م
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    الأحد
                                </div>
                            </th>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">
                                <div class=" p-2  w-full h-full rounded-2xl bg-green-50 border-green-400 border-2 ">
                                    <div class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                        محاضرة</div>
                                    <div class="flex gap-1 items-center ">
                                        <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                        <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                            م - 02:00 م
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    الاثنين
                                </div>
                            </th>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    الثلاثاء
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div class=" p-2  w-full h-full rounded-2xl bg-yellow-50 border-yellow-400 border-2 ">
                                    <div class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                        محاضرة</div>
                                    <div class="flex gap-1 items-center ">
                                        <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                        <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                            م - 02:00 م
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    الأربعاء
                                </div>
                            </th>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">
                                <div class=" p-2  w-full h-full rounded-2xl bg-green-50 border-green-400 border-2 ">
                                    <div class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                        محاضرة</div>
                                    <div class="flex gap-1 items-center ">
                                        <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                        <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                            م - 02:00 م
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class=" p-2  w-full h-full rounded-2xl bg-purple-50 border-purple-400 border-2 ">
                                    <div class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                        محاضرة</div>
                                    <div class="flex gap-1 items-center ">
                                        <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                        <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                            م - 02:00 م
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    الخميس
                                </div>
                            </th>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                    الجمعة
                                </div>
                            </th>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                            <td class="px-6 py-4">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div x-show=" sort==='weekly'" class=" overflow-hidden w-full">
                <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap">
                    <table
                        class=" whitespace-nowrap w-full md:w-full text-sm text-gray-500 dark:text-gray-400
                                    border-spacing-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <thead
                            class="uppercase sm:rounded-lg bg-primary text-white dark:text-gray-400 font-semibold text-start">
                            <tr>
                                <th scope="col" class="px-4 py-2"></th>
                                <th scope="col" class="px-4 py-2">101 الدراسات الإسلامية - مستوي اول
                                </th>
                                <th scope="col" class="px-4 py-2">مبادئ المحاسبة - 101 محسب - Level 1
                                </th>
                                <th scope="col" class="px-4 py-2">تحليل وتقييم الوظائف - بشري 111 -
                                    Level
                                    1
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                        السبت
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-yellow-50 border-yellow-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            محاضرة</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        الأحد
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-green-50 border-green-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            محاضرة</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        الاثنين
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        الثلاثاء
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-yellow-50 border-yellow-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            محاضرة</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        الأربعاء
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-green-50 border-green-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            محاضرة</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-purple-50 border-purple-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            محاضرة</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        الخميس
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        الجمعة
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div x-show=" sort==='semi_final'" class=" overflow-hidden w-full">
                <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap">
                    <table
                        class=" whitespace-nowrap w-full md:w-full text-sm text-gray-500 dark:text-gray-400
                                    border-spacing-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <thead
                            class="uppercase sm:rounded-lg bg-primary text-white dark:text-gray-400 font-semibold text-start">
                            <tr>
                                <th scope="col" class="px-4 py-2"></th>
                                <th scope="col" class="px-4 py-2">101 الدراسات الإسلامية - مستوي اول
                                </th>
                                <th scope="col" class="px-4 py-2">مبادئ المحاسبة - 101 محسب - Level 1
                                </th>
                                <th scope="col" class="px-4 py-2">تحليل وتقييم الوظائف - بشري 111 -
                                    Level
                                    1
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                        يناير
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-yellow-50 border-yellow-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            اختبار دورى</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        فبراير
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-green-50 border-green-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            اختبار دورى</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        مارس
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div x-show=" sort==='final'" class=" overflow-hidden w-full">
                <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap">
                    <table
                        class=" whitespace-nowrap w-full md:w-full text-sm text-gray-500 dark:text-gray-400
                                                    border-spacing-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <thead
                            class="uppercase sm:rounded-lg bg-primary text-white dark:text-gray-400 font-semibold text-start">
                            <tr>
                                <th scope="col" class="px-4 py-2">اليوم</th>
                                <th scope="col" class="px-4 py-2">101 الدراسات الإسلامية - مستوي اول
                                </th>
                                <th scope="col" class="px-4 py-2">مبادئ المحاسبة - 101 محسب - Level 1
                                </th>
                                <th scope="col" class="px-4 py-2">تحليل وتقييم الوظائف - بشري 111 -
                                    Level
                                    1 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide  ">
                                        2023/1/2
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-yellow-50 border-yellow-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            اختبار دورى</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        2023/1/8
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-green-50 border-green-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            اختبار دورى</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                                    <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                        2023/1/16
                                    </div>
                                </th>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div
                                        class=" p-2  w-full h-full rounded-2xl bg-purple-50 border-purple-400 border-2 ">
                                        <div
                                            class="text-start text-neutral-700 text-sm font-semibold capitalize leading-7">
                                            محاضرة</div>
                                        <div class="flex gap-1 items-center ">
                                            <span><img src="{{ asset('assets/img/time.png') }}" alt=""></span>
                                            <span class="text-zinc-600 text-sm font-normal leading-7">12:00
                                                م - 02:00 م
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div x-show=" sort==='study'">
                <div class=" text-neutral-700 text-lg font-bold capitalize leading-[70px] mt-4">
                    المواد الدراسية
                </div>
                <div class=" grid gap-4 ">
                    <div
                        class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/table-image.png') }}" alt="" class=" rounded-lg w-[80px]   ">
                            <div class=" grid gap-4">
                                <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                    مبادئ إدارة الموارد البشريه - بشري 101
                                </div>
                            </div>
                        </div>
                        <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                        </div>
                        <div class="flex items-center justify-around gap-4">
                            <div>
                                <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                    تاريخ البداية</div>
                                <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                    2023-11-22
                                </div>
                            </div>
                            <div>
                                <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                    تاريخ النهاية</div>
                                <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                    2023-11-22
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/table-image.png') }}" alt="" class=" rounded-lg w-[80px]   ">
                            <div class=" grid gap-4">
                                <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                    مبادئ إدارة الموارد البشريه - بشري 101
                                </div>
                            </div>
                        </div>
                        <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                        </div>
                        <div class="flex items-center justify-around gap-4">
                            <div>
                                <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                    تاريخ البداية</div>
                                <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                    2023-11-22
                                </div>
                            </div>
                            <div>
                                <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                    تاريخ النهاية</div>
                                <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                    2023-11-22
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/table-image.png') }}" alt="" class=" rounded-lg w-[80px]   ">
                            <div class=" grid gap-4">
                                <div class="  text-neutral-800 text font-semibold  capitalize leading-[18px]">
                                    مبادئ إدارة الموارد البشريه - بشري 101
                                </div>
                            </div>
                        </div>
                        <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                        </div>
                        <div class="flex items-center justify-around gap-4">
                            <div>
                                <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                    تاريخ البداية</div>
                                <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                    2023-11-22
                                </div>
                            </div>
                            <div>
                                <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                                    تاريخ النهاية</div>
                                <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                                    2023-11-22
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show=" sort==='final'">
                <div class=" text-neutral-700 text-lg font-bold capitalize leading-[70px] mt-4">
                    نظام الاختبار
                </div>
                <div class=" h-[229px] bg-white rounded-2xl border border-neutral-200">
                    <div class="text-start text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[27px] p-4">
                        يتم
                        تطبيق اختبارات الفترة التدريبية لبرامج التأهيل و الدبلوم الواردة فى دليل
                        تعليمات التدريب التابع
                        للمؤسسة العامة للتدريب التقنى و المهنى<br />1. الدرجة النهائية لكل مادة 100
                        درجة<br />2. درجة
                        الاختبار 50 درجة<br />3.علامة النجاح هى 60%<br />4. تجري الاختبارات النهائية
                        فى
                        أسبوع الاختبارات
                        لكل ربع دراسى حسب التقويم الأكاديمى الرسمى الصادر من المؤسسة العامة للتدريب
                        التقنى و
                        المهنى<br />5. لا يسمح بدخول الاختبارات النهائية لمن عليها أى رسوم مالية
                        مستحقة<br />6. عند
                        الغياب عن اليوم المحدد للاختبارات بدون عذر مقبول تعتبر المتدربة راسبة و
                        عليها
                        إعادة تسجيل المادة
                    </div>

                </div>
            </div>

        </div>
