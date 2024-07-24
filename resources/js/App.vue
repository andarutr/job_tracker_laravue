<template>
    <div class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
        <div class="h-full flex items-center">
            <router-link to="/" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                <img alt="Midone - HTML Template" class="logo__image w-6" src="/assets/images/logo.svg">
                <span class="logo__text text-white text-lg ml-3"> Enigma </span> 
            </router-link>
            <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
            </nav>
            <div class="intro-x relative mr-3 sm:mr-6">
            </div>
        </div>
    </div>

    <div class="flex overflow-hidden">
        <!-- Sidebar -->
        <nav class="side-nav">
            <ul>
                <li>
                    <router-link to="/" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="gauge"></i> </div>
                        <div class="side-menu__title">Dashboard</div>
                    </router-link>
                </li>
                <li>
                    <router-link to="/applied" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file-check-2"></i> </div>
                        <div class="side-menu__title">Applied</div>
                    </router-link>
                </li>
            </ul>
        </nav>
        <router-view></router-view>
    </div>
</template>