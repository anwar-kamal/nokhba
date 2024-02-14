<div class="">
    <div class=" grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8 justify-start items-start">

        <div class="w-full h-[90px] bg-white rounded-2xl border border-neutral-200 grid grid-cols-2 p-5 ">
            <div>
                <div class=" text-neutral-800 text-xl font-semibold capitalize leading-tight pb-2">
                    4</div>
                <div class=" text-zinc-600 text-base font-normal  leading-none">
                    الأقساط</div>
            </div>
            <div class=" flex justify-end ">
                <img src="./assets/studen-aksaat.png" alt="">
            </div>
        </div>
        <div class="w-full h-[90px] bg-white rounded-2xl border border-neutral-200 grid grid-cols-2 p-5 ">
            <div>
                <div class=" text-neutral-800 text-xl font-semibold capitalize leading-tight pb-2">
                    0</div>
                <div class=" text-zinc-600 text-base font-normal  leading-none">
                    مدفوعات</div>
            </div>
            <div class=" flex justify-end ">
                <img src="./assets/student-madfo3at.png" alt="">
            </div>
        </div>
        <div class="w-full h-[90px] bg-white rounded-2xl border border-neutral-200 grid grid-cols-2 p-5 ">
            <div>
                <div class=" text-neutral-800 text-xl font-semibold capitalize leading-tight pb-2">
                    4</div>
                <div class=" text-zinc-600 text-base font-normal  leading-none">
                    الدورات</div>
            </div>
            <div class=" flex justify-end ">
                <img src="./assets/dawrat-7alia.png " alt="">
            </div>
        </div>
    </div>

    <div class=" grid gap-8" x-data="{ type: 'eksaat' }">

        <div class=" overflow-hidden w-full md:hidden ">
            <ul
                class=" w-full p-1 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider grid grid-cols-2 font-semibold my-2   whitespace-nowrap  ">
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 text-center "
                    @click="type='eksaat'" :class="type === 'eksaat' ? 'bg-red-50 text-red-900' : ''">
                    الأقساط</li>
                <li class="hover:bg-primary hover:text-white rounded-xl sm:px-6 sm:p-3 cursor-pointer font-semibold  sm:text-base text-xs px-2 text-center "
                    @click="type='madfo3at'" :class="type === 'madfo3at' ? 'bg-red-50 text-red-900' : ''">
                    المدفوعات</li>
            </ul>
        </div>

        <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px]  hidden md:block">
            الأقساط</div>



        <!--  no records -->

        <!-- <div id="no eksaat" class=" min-h-[229px] bg-white rounded-2xl border border-neutral-200 md:p-8 p-4">
                <div  class="cent flex-col items-center justify-center"><img src="./assets/no-eksaat.png" alt="">
                    <div
                        class="text-center text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                        لا
                        يوجد أقساط حتي الان</div>
                </div>
            </div> -->
        <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap hidden md:block">
            <table
                class="whitespace-nowrap w-full md:w-full text-sm  text-gray-500  dark:text-black border-spacing-1 overflow-x-auto ">
                <thead
                    class=" uppercase  sm:rounded-lg bg-primary  text-white dark:text-gray-400   font-semibold text-start ">
                    <tr>
                        <th scope="col" class="px-4 py-2 border ">
                        </th>
                        <th scope="col" class="px-4 py-2 border ">
                            القيمة
                        </th>
                        <th scope="col" class="px-4 py-2 border">
                            تاريخ الاستحقاق
                        </th>
                        <th scope="col" class="px-4 py-2 border">
                            الدفع
                        </th>
                        <th scope="col" class="px-4 py-2 border">
                            تم الدفع فى
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                2023-10-29
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="w-14 h-7 p-2 bg-green-400 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div class="text-center text-green-400 text-xs font-normal font-['Somar Sans'] leading-3">
                                    تم
                                    الدفع</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                2023-10-29
                                17:32:07</div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                2023-10-29
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="w-[74px] h-7 p-2 bg-red-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div class="text-center text-red-600 text-xs font-normal font-['Somar Sans'] leading-3">
                                    لم يتم
                                    الدفع</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                --</div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                2023-10-29
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="w-14 h-7 p-2 bg-green-400 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div class="text-center text-green-400 text-xs font-normal font-['Somar Sans'] leading-3">
                                    تم
                                    الدفع</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                2023-10-29
                                17:32:07</div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                2023-10-29
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="w-[74px] h-7 p-2 bg-red-600 bg-opacity-5 rounded justify-center items-center gap-2.5 inline-flex">
                                <div class="text-center text-red-600 text-xs font-normal font-['Somar Sans'] leading-3">
                                    لم يتم
                                    الدفع</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                --</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=" grid gap-4 md:hidden" x-show="type==='eksaat'">
            <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px]  ">
                الأقساط</div>
            <div
                class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                <div class="flex justify-between items-center">
                    <div class=" grid gap-4">
                        <div class="text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                            القسط الأول</div>
                        <div class="text-neutral-700 text-base font-semibold font-['Somar Sans'] capitalize leading-none">
                            575.00 ر.س</div>
                    </div>
                    <div> <img src="./assets/task-complete.png" alt="" width="40" height="40">
                    </div>
                </div>
                <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                </div>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                            تاريخ الاستحقاق</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            2023-10-29
                        </div>
                    </div>
                    <div>
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                            تم الدفع فى</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            2023-10-29 17:32:07
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                <div class="flex justify-between items-center">
                    <div class=" grid gap-4">
                        <div class="text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                            القسط الأول</div>
                        <div class="text-neutral-700 text-base font-semibold font-['Somar Sans'] capitalize leading-none">
                            575.00 ر.س</div>
                    </div>
                    <div> <img src="./assets/task-complete.png" alt="" width="40" height="40">
                    </div>
                </div>
                <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                </div>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                            تاريخ الاستحقاق</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            2023-10-29
                        </div>
                    </div>
                    <div>
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                            تم الدفع فى</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            2023-10-29 17:32:07
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px] hidden md:block">
            المدفوعات</div>

        <!--  no records -->

        <!-- <div    id="no madfo3at"  class=" min-h-[229px] bg-white rounded-2xl border border-neutral-200 md:p-8 p-4">
                <div class="cent flex-col items-center justify-center">
                    <img src="./assets/no-madfo3at.png" alt="">
                    <div
                        class="text-center text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                        لا
                        يوجد أقساط حتي الان</div>
                </div>
            </div> -->

        <div class="relative overflow-x-auto   shadow-md sm:rounded-lg whitespace-nowrap hidden md:block">
            <table
                class="whitespace-nowrap w-full md:w-full text-sm  text-gray-500  dark:text-black border-spacing-1 overflow-x-auto ">
                <thead
                    class=" uppercase  sm:rounded-lg bg-primary  text-white dark:text-gray-400   font-semibold text-start ">
                    <tr>
                        <th scope="col" class="px-4 py-2 border ">
                        </th>
                        <th scope="col" class="px-4 py-2 border ">
                            القيمة
                        </th>
                        <th scope="col" class="px-4 py-2 border">
                            طريقة الدفع
                        </th>
                        <th scope="col" class="px-4 py-2 border">
                            الدفع
                        </th>
                        <th scope="col" class="px-4 py-2 border">
                            تم الدفع فى
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                Bank Transfer
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                Open</div>
                        </td>
                        <td class="px-6 py-4">
                            13 سبتمبر, 2023, 11:10 ص
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                Bank Transfer
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                Open</div>
                        </td>
                        <td class="px-6 py-4">
                            13 سبتمبر, 2023, 11:10 ص
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                Bank Transfer
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                Open</div>
                        </td>
                        <td class="px-6 py-4">
                            13 سبتمبر, 2023, 11:10 ص
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2 items-center ">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                1</div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                575.00 ر.س
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-800 text-sm font-medium tracking-wide ">
                                Bank Transfer
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                                Open</div>
                        </td>
                        <td class="px-6 py-4">
                            13 سبتمبر, 2023, 11:10 ص
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=" grid gap-4 md:hidden" x-show="type==='madfo3at'">
            <div class=" text-neutral-700 text-lg font-bold font-['Somar Sans'] capitalize leading-[18px] ">
                المدفوعات</div>

            <div
                class="  bg-white rounded-2xl border border-neutral-200 sm:flex-row flex-col flex sm:items-center justify-between gap-4 p-4">
                <div class="flex justify-between items-center">
                    <div class=" grid gap-4">
                        <div class="text-zinc-600 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                            القسط الأول</div>
                        <div class="text-neutral-700 text-base font-semibold font-['Somar Sans'] capitalize leading-none">
                            575.00 ر.س</div>
                    </div>
                    <div> <img src="./assets/task-complete.png" alt="" width="40" height="40">
                    </div>
                </div>
                <div class=" h-0.5 opacity-60 bg-neutral-200 rounded-[100px] md:hidden">
                </div>
                <div class="grid gap-4">
                    <div class="flex justify-between gap-2">
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                            تم الدفع فى</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            2023-10-29 17:32:07
                        </div>
                    </div>
                    <div class="flex justify-between gap-2">
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px] ">
                            تاريخ الاستحقاق</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            2023-10-29
                        </div>
                    </div>
                    <div class="flex justify-between gap-2">
                        <div class="text-zinc-600  text-xs font-medium  leading-[25px]">
                            الحالة</div>
                        <div class="text-zinc-800 text-sm font-semibold capitalize  leading-[25px]">
                            Open
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
