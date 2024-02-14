<div class="">
    <div class=" flex md:justify-end justify-evenly md:gap-4 gap-2 " x-data="{ filter1: false, filter2: false }">
        <div class=" relative">
            <div class="px-4 py-2 md:gap-4 gap-1 bg-white rounded-2xl border border-neutral-200 justify-between items-center inline-flex cursor-pointer"
                @click="filter1 =!filter1">
                <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                    الفصول
                    الدراسية
                </div>
                <div>
                    <i class="fa-solid fa-chevron-down" x-show="!filter1"></i>
                    <i class="fa-solid fa-chevron-up" x-show="filter1"></i>
                </div>
            </div>
            <ul class=" absolute top-9 right-0 left-0  z-30 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider grid sm:gap-1  my-2"
                x-show="filter1" x-data="{ sort: 'empty' }">

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
        <div class=" relative">
            <div class="px-4 py-2 md:gap-4 gap-1 bg-white rounded-2xl border border-neutral-200 justify-between items-center inline-flex cursor-pointer"
                @click="filter2 =!filter2">
                <div class="text-neutral-700 text-sm font-normal font-['Somar Sans'] leading-[14px]">
                    الفصول
                    الدراسية
                </div>
                <div>
                    <i class="fa-solid fa-chevron-down" x-show="!filter2"></i>
                    <i class="fa-solid fa-chevron-up" x-show="filter2"></i>
                </div>
            </div>
            <ul class=" absolute top-9 right-0 left-0  z-30 bg-white border rounded-xl drop-shadow-md  text-zinc-900 overflow-hidden tracking-wider grid sm:gap-1  my-2"
                x-show="filter2" x-data="{ sort: 'empty' }">

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
    <div class=" grid 2xl:grid-cols-3 md:grid-cols-2 gap-4 py-8">
        <div class="    bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
            <div class="cent gap-2">
                <img src="./assets/pdf.png" alt="">
                <div class=" text-neutral-800 text-xs lg:text-sm font-semibold font-['Somar Sans'] capitalize leading-6">
                    مبادئ إدارة الموارد البشريه - بشري 101 - مستوي اول (المحاضرة التانية)
                    مستند</div>
            </div>
            <a href="" download="your-file-name.pdf">
                <i class="fa-solid fa-download text-primary fa-lg "></i>
            </a>
        </div>
        <div class="    bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
            <div class="cent gap-2">
                <img src="./assets/pdf.png" alt="">
                <div class=" text-neutral-800 text-xs lg:text-sm font-semibold font-['Somar Sans'] capitalize leading-6">
                    واجب المحاضره الخامسه</div>
            </div>
            <a href="" download="your-file-name.pdf">
                <i class="fa-solid fa-download text-primary fa-lg "></i>
            </a>
        </div>
        <div class="    bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
            <div class="cent gap-2">
                <img src="./assets/pdf.png" alt="">
                <div class=" text-neutral-800 text-xs lg:text-sm font-semibold font-['Somar Sans'] capitalize leading-6">
                    واجب المحاضره الخامسه</div>
            </div>
            <a href="" download="your-file-name.pdf">
                <i class="fa-solid fa-download text-primary fa-lg "></i>
            </a>
        </div>
        <div class="    bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
            <div class="cent gap-2">
                <img src="./assets/pdf.png" alt="">
                <div class=" text-neutral-800 text-xs lg:text-sm font-semibold font-['Somar Sans'] capitalize leading-6">
                    واجب المحاضره الخامسه</div>
            </div>
            <a href="" download="your-file-name.pdf">
                <i class="fa-solid fa-download text-primary fa-lg "></i>
            </a>
        </div>
        <div class="    bg-white rounded-2xl border border-neutral-200 p-4 flex justify-between items-center">
            <div class="cent gap-2">
                <img src="./assets/pdf.png" alt="">
                <div class=" text-neutral-800 text-xs lg:text-sm font-semibold font-['Somar Sans'] capitalize leading-6">
                    واجب المحاضره الخامسه</div>
            </div>
            <a href="" download="your-file-name.pdf">
                <i class="fa-solid fa-download text-primary fa-lg "></i>
            </a>
        </div>
    </div>

</div>
