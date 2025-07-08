<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('font-sans antialiased'); ?>>
<?php wp_body_open(); ?>

<div class="min-h-screen">
    <!-- Sidebar -->
    <div x-data="{ isExpanded: false, tentangOpen: false }" class="fixed inset-y-0 z-[99] flex bg-background-primary border-r border-white/20"
         :class="{ 'w-64': isExpanded, 'w-16': !isExpanded }">
        
        <div class="flex flex-col flex-grow w-full">
            <!-- Logo dan Judul -->
            <div class="px-5 py-6 space-y-1">
                <button @click="isExpanded = !isExpanded"
                        class="flex items-center space-x-3 hover:text-white/80 transition-colors duration-200">
                    <i class="fa-solid fa-bars text-white/60 w-6 h-6"></i>
                </button>
                <h1 x-show="isExpanded" x-transition:enter="transition-opacity duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="text-white text-xl font-semibold leading-tight">
                    Indonesian<br>Conference<br>of Religion and<br>Peace
                </h1>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 px-3 mt-3 space-y-1">
                <!-- Beranda with tooltip -->
                <div class="relative">
                    <a href="<?php echo home_url(); ?>" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-house w-6 h-6"></i>
                        <span x-show="isExpanded" class="text-sm">Beranda</span>
                    </a>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Beranda
                    </div>
                </div>
                
                <!-- Tentang ICRP dengan Submenu and tooltip -->
                <div class="space-y-1 relative">
                    <button @click="tentangOpen = !tentangOpen" class="flex items-center w-full px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-circle-info w-6 h-6"></i>
                        <div x-show="isExpanded" class="flex items-center justify-between w-full ml-3">
                            <span class="text-sm">Tentang ICRP</span>
                            <i class="fa-solid" :class="tentangOpen ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                        </div>
                    </button>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Tentang ICRP
                    </div>
                    
                    <div x-show="isExpanded && tentangOpen" class="pl-11 space-y-1">
                        <a href="#" class="block py-2 text-sm text-white/60 hover:text-white transition-colors duration-200">Tentang Kami</a>
                        <a href="#" class="block py-2 text-sm text-white/60 hover:text-white transition-colors duration-200">Profil Pendiri ICRP</a>
                        <a href="#" class="block py-2 text-sm text-white/60 hover:text-white transition-colors duration-200">Pengurus ICRP</a>
                        <a href="#" class="block py-2 text-sm text-white/60 hover:text-white transition-colors duration-200">Kontak Kami</a>
                    </div>
                </div>
                
                <!-- Sahabat ICRP with tooltip -->
                <div class="relative">
                    <a href="#" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-users w-6 h-6"></i>
                        <span x-show="isExpanded" class="text-sm">Sahabat ICRP</span>
                    </a>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Sahabat ICRP
                    </div>
                </div>
                
                <!-- Jaringan with tooltip -->
                <div class="relative">
                    <a href="#" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-network-wired w-6 h-6"></i>
                        <span x-show="isExpanded" class="text-sm">Jaringan</span>
                    </a>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Jaringan
                    </div>
                </div>
                
                <!-- Berita & Artikel with tooltip -->
                <div class="relative">
                    <a href="#" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-newspaper w-6 h-6"></i>
                        <span x-show="isExpanded" class="text-sm">Berita & Artikel</span>
                    </a>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Berita & Artikel
                    </div>
                </div>
                
                <!-- Pustaka with tooltip -->
                <div class="relative">
                    <a href="#" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-book w-6 h-6"></i>
                        <span x-show="isExpanded" class="text-sm">Pustaka</span>
                    </a>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Pustaka
                    </div>
                </div>
                
                <!-- Advokasi with tooltip -->
                <div class="relative">
                    <a href="#" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                        <i class="fa-solid fa-comment w-6 h-6"></i>
                        <span x-show="isExpanded" class="text-sm">Advokasi KBB</span>
                    </a>
                    <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                        Advokasi KBB
                    </div>
                </div>
            </nav>
            
            <!-- Login / Register atau User Info -->
            <div class="mt-auto px-3 py-4 border-t border-white/20">
                <?php if (!is_user_logged_in()) : ?>
                    <!-- Jika pengguna belum login -->
                    <div class="space-y-2">
                        <div class="relative">
                            <a href="<?php echo wp_login_url(); ?>" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                                <i class="fa-solid fa-sign-in-alt w-6 h-6"></i>
                                <span x-show="isExpanded" class="text-sm">Login</span>
                            </a>
                            <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                                Login
                            </div>
                        </div>
                        <?php if (get_option('users_can_register')) : ?>
                            <div class="relative">
                                <a href="<?php echo wp_registration_url(); ?>" class="flex items-center space-x-3 px-3 py-2 text-white/60 hover:text-white rounded-lg transition-colors duration-200 peer">
                                    <i class="fa-solid fa-user-plus w-6 h-6"></i>
                                    <span x-show="isExpanded" class="text-sm">Register</span>
                                </a>
                                <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                                    Register
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <!-- Jika pengguna sudah login -->
                    <div class="flex items-center justify-between px-3 py-2 text-white/60 rounded-lg">
                        <div x-show="isExpanded" class="flex items-center space-x-3">
                            <i class="fa-solid fa-user w-6 h-6"></i>
                            <span class="text-sm"><?php echo wp_get_current_user()->display_name; ?></span>
                        </div>
                        <div class="relative">
                            <a href="<?php echo wp_logout_url(); ?>" class="text-white/60 hover:text-white transition-colors duration-200 peer">
                                <i class="fa-solid fa-sign-out-alt w-6 h-6"></i>
                            </a>
                            <div x-show="!isExpanded" class="absolute top-1/2 left-full -translate-y-1/2 ml-4 z-10 whitespace-nowrap rounded-lg bg-background-primary px-2 py-1 text-center text-sm text-white opacity-0 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                                Logout
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <div class="pl-16">
        <header class="pl-16 absolute top-[50px] right-0 left-0 bg-transparent z-50">
            <div class="container mx-auto px-12 py-4">
                <div class="flex items-center justify-center">
                    <img class="h-12" src="<?php echo get_theme_mod('icrp_logo', get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="Logo ICRP">
                </div>
            </div>
        </header>
        
        <main class="min-h-screen">