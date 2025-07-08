<?php
/**
 * Index Template
 * 
 * The main template file for displaying the homepage
 * 
 * @package ICRP_Theme
 * @since 1.0.0
 */

get_header();

// =============================================================================
// CONFIGURATION & DATA PREPARATION
// =============================================================================

/**
 * Dummy Articles Data
 * Fallback content when no posts exist in database
 */
function get_dummy_articles() {
    return [
        [
            'title' => 'Dialog Antar Agama untuk Perdamaian Indonesia',
            'content' => 'Eksplorasi mendalam tentang pentingnya dialog lintas agama dalam membangun toleransi dan perdamaian di tengah keragaman Indonesia yang kaya akan budaya dan kepercayaan.',
            'category' => 'Dialog Lintas Agama',
            'image' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Membangun Kerukunan Umat Beragama di Indonesia',
            'content' => 'Strategi dan pendekatan dalam membangun kerukunan antar umat beragama melalui pemahaman yang mendalam dan saling menghormati perbedaan keyakinan.',
            'category' => 'Kerukunan Beragama',
            'image' => 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Peran Pemuda dalam Mempromosikan Toleransi',
            'content' => 'Bagaimana generasi muda dapat berkontribusi dalam menciptakan lingkungan yang toleran dan inklusif melalui berbagai inisiatif dan kegiatan sosial.',
            'category' => 'Toleransi',
            'image' => 'https://images.unsplash.com/photo-1544027993-37dbfe43562a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Sejarah Perdamaian Antar Agama di Nusantara',
            'content' => 'Menelisik sejarah panjang toleransi dan perdamaian antar umat beragama di Indonesia dari masa kerajaan hingga era modern.',
            'category' => 'Sejarah',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Workshop Dialog Konstruktif Antar Agama',
            'content' => 'Teknik dan metode dalam memfasilitasi dialog yang konstruktif antar pemeluk agama yang berbeda untuk mencapai pemahaman bersama.',
            'category' => 'Workshop',
            'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Kearifan Lokal dalam Menjaga Harmoni Beragama',
            'content' => 'Peran kearifan lokal dan tradisi masyarakat Indonesia dalam menjaga keharmonisan dan kedamaian antar umat beragama.',
            'category' => 'Kearifan Lokal',
            'image' => 'https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Media dan Perannya dalam Perdamaian',
            'content' => 'Bagaimana media massa dapat berperan aktif dalam mempromosikan perdamaian dan mencegah penyebaran narasi yang memecah belah.',
            'category' => 'Media',
            'image' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Pendidikan Multikultural di Sekolah',
            'content' => 'Implementasi pendidikan multikultural di institusi pendidikan sebagai fondasi pembentukan karakter toleran generasi masa depan.',
            'category' => 'Pendidikan',
            'image' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Festival Keragaman Budaya dan Agama',
            'content' => 'Menyelenggarakan festival yang merayakan keragaman budaya dan agama sebagai cara mempererat persaudaraan antar komunitas.',
            'category' => 'Festival',
            'image' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Resolusi Konflik Berbasis Agama',
            'content' => 'Pendekatan dan strategi dalam menyelesaikan konflik yang melibatkan unsur agama melalui mediasi dan dialog yang konstruktif.',
            'category' => 'Resolusi Konflik',
            'image' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'url' => '#'
        ]
    ];
}

/**
 * Dummy Events Data
 */
function get_dummy_events() {
    return [
        [
            'title' => 'Seminar Dialog Antar Agama',
            'content' => 'Seminar nasional tentang pentingnya dialog konstruktif antar pemeluk agama untuk membangun Indonesia yang damai dan harmonis.',
            'date' => '2025-02-15',
            'time' => '09:00',
            'location' => 'Jakarta Convention Center',
            'image' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Workshop Kerukunan Umat Beragama',
            'content' => 'Workshop praktis untuk para tokoh agama dan pemimpin komunitas dalam membangun kerukunan di tingkat grassroot.',
            'date' => '2025-02-20',
            'time' => '13:00',
            'location' => 'Auditorium ICRP Jakarta',
            'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Festival Toleransi Indonesia',
            'content' => 'Festival budaya dan seni yang merayakan keragaman agama dan budaya Indonesia dengan berbagai pertunjukan dan pameran.',
            'date' => '2025-03-01',
            'time' => '10:00',
            'location' => 'Monas, Jakarta Pusat',
            'image' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
        ]
    ];
}

/**
 * Dummy Libraries Data
 */
function get_dummy_libraries() {
    return [
        [
            'title' => 'Dialog Antar Agama: Teori dan Praktik',
            'author' => 'Dr. Ahmad Syafii Maarif',
            'year' => '2023',
            'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Kerukunan Umat Beragama dalam Perspektif Islam',
            'author' => 'Prof. Dr. Azyumardi Azra',
            'year' => '2023',
            'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'url' => '#'
        ],
        [
            'title' => 'Toleransi dan Pluralisme di Indonesia',
            'author' => 'Dr. Franz Magnis-Suseno',
            'year' => '2022',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'url' => '#'
        ]
    ];
}

// =============================================================================
// DATA FETCHING
// =============================================================================

// Get WordPress posts
$featured_posts = get_posts([
    'numberposts' => 1,
    'meta_key' => 'featured',
    'meta_value' => '1',
    'post_status' => 'publish'
]);

$latest_posts = get_posts([
    'numberposts' => 9,
    'post_status' => 'publish',
    'exclude' => !empty($featured_posts) ? [$featured_posts[0]->ID] : []
]);

$events = get_posts([
    'numberposts' => 6,
    'post_type' => 'events',
    'post_status' => 'publish'
]);

$library_posts = get_posts([
    'numberposts' => 6,
    'post_type' => 'libraries',
    'post_status' => 'publish'
]);

// Prepare data with fallbacks
$dummy_articles = get_dummy_articles();
$dummy_events = get_dummy_events();
$dummy_libraries = get_dummy_libraries();

// =============================================================================
// HERO CAROUSEL DATA
// =============================================================================

$hero_slides = [
    [
        'title' => get_option('icrp_hero_slide1_title', 'Dialog Antar Agama untuk Perdamaian'),
        'description' => get_option('icrp_hero_slide1_description', 'Membangun toleransi dan perdamaian di tengah keragaman Indonesia yang kaya akan budaya dan kepercayaan'),
        'image' => get_option('icrp_hero_slide1_image', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'),
        'cta_text' => get_option('icrp_hero_slide1_cta_text', 'Pelajari Lebih Lanjut'),
        'cta_url' => get_option('icrp_hero_slide1_cta_url', '#tentang')
    ],
    [
        'title' => get_option('icrp_hero_slide2_title', 'Kerukunan Umat Beragama'),
        'description' => get_option('icrp_hero_slide2_description', 'Strategi dan pendekatan dalam membangun kerukunan antar umat beragama melalui pemahaman yang mendalam'),
        'image' => get_option('icrp_hero_slide2_image', 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'),
        'cta_text' => get_option('icrp_hero_slide2_cta_text', 'Bergabung Sekarang'),
        'cta_url' => get_option('icrp_hero_slide2_cta_url', '#agenda')
    ],
    [
        'title' => get_option('icrp_hero_slide3_title', 'Rumah Perdamaian Indonesia'),
        'description' => get_option('icrp_hero_slide3_description', 'Menjadi pusat dialog, edukasi, dan kolaborasi untuk memperkuat persaudaraan lintas iman di Indonesia'),
        'image' => get_option('icrp_hero_slide3_image', 'https://images.unsplash.com/photo-1529390079861-591de354faf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'),
        'cta_text' => get_option('icrp_hero_slide3_cta_text', 'Hubungi Kami'),
        'cta_url' => get_option('icrp_hero_slide3_cta_url', '#kontak')
    ]
];

// =============================================================================
// CTA SECTION DATA
// =============================================================================

$cta_data = [
    'title' => get_option('icrp_cta_title', 'Bergabunglah dengan Misi Perdamaian'),
    'subtitle' => get_option('icrp_cta_subtitle', 'Mari bersama-sama membangun dialog yang bermakna dan memperkuat persaudaraan lintas iman demi Indonesia yang damai dan harmonis'),
    'button_text' => get_option('icrp_cta_button_text', 'Bergabung Sekarang'),
    'image' => get_option('icrp_cta_image', 'https://images.unsplash.com/photo-1529390079861-591de354faf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')
];

// =============================================================================
// ARTICLES DATA PROCESSING
// =============================================================================

// Get all articles data first
$all_articles_data = [];

// Check if we have WordPress posts
if (!empty($featured_posts) || !empty($latest_posts)) {
    // Process featured article
    if (!empty($featured_posts)) {
        $featured = $featured_posts[0];
        $featured_data = [
            'title' => $featured->post_title,
            'content' => $featured->post_content,
            'category' => 'Featured',
            'image' => get_the_post_thumbnail_url($featured->ID, 'large') ?: 'https://images.unsplash.com/photo-1529390079861-591de354faf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
            'url' => get_permalink($featured->ID)
        ];
        $all_articles_data[] = $featured_data;
    }
    
    // Process latest posts for slider
    if (!empty($latest_posts)) {
        foreach ($latest_posts as $article) {
            $categories = get_the_category($article->ID);
            $all_articles_data[] = [
                'title' => $article->post_title,
                'content' => $article->post_content,
                'category' => !empty($categories) ? $categories[0]->name : 'Artikel',
                'image' => get_the_post_thumbnail_url($article->ID, 'medium') ?: 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'url' => get_permalink($article->ID)
            ];
        }
    }
} else {
    // Use dummy data if no WordPress posts
    $all_articles_data = $dummy_articles;
}

// Separate featured and slider articles
if (!empty($all_articles_data)) {
    $featured_data = $all_articles_data[0]; // First article as featured
    $articles_data = array_slice($all_articles_data, 1); // Rest for slider
    
    // Ensure we have at least 9 articles for slider
    if (count($articles_data) < 9) {
        // Fill with dummy data if needed
        $needed_articles = 9 - count($articles_data);
        $dummy_fill = array_slice($dummy_articles, 1, $needed_articles);
        $articles_data = array_merge($articles_data, $dummy_fill);
    }
} else {
    // Fallback to dummy data
    $featured_data = $dummy_articles[0];
    $articles_data = array_slice($dummy_articles, 1);
}

// =============================================================================
// EVENTS DATA PROCESSING
// =============================================================================

if (!empty($events)) {
    $events_data = [];
    foreach ($events as $event) {
        // Get ACF fields
        $event_description = get_field('event_description', $event->ID);
        $event_image = get_field('event_featured_image', $event->ID);
        $event_short_description = get_field('event_short_description', $event->ID);
        
        $events_data[] = [
            'title' => $event->post_title,
            'content' => $event_description ?: $event->post_content,
            'short_description' => $event_short_description ?: wp_trim_words($event_description ?: $event->post_content, 15),
            'date' => get_post_meta($event->ID, 'event_date', true) ?: date('Y-m-d'),
            'time' => get_post_meta($event->ID, 'event_time', true) ?: '10:00',
            'location' => get_post_meta($event->ID, 'event_location', true) ?: 'Jakarta',
            'image' => $event_image ? $event_image['url'] : (get_the_post_thumbnail_url($event->ID, 'medium') ?: 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
            'url' => get_permalink($event->ID)
        ];
    }
} else {
    $events_data = $dummy_events;
}

// =============================================================================
// LIBRARIES DATA PROCESSING
// =============================================================================

if (!empty($library_posts)) {
    $libraries_data = [];
    foreach ($library_posts as $library) {
        // Get ACF fields
        $book_description = get_field('book_description', $library->ID);
        $book_cover_image = get_field('book_cover_image', $library->ID);
        $book_summary = get_field('book_summary', $library->ID);
        
        $libraries_data[] = [
            'title' => $library->post_title,
            'description' => $book_description ?: $library->post_content,
            'summary' => $book_summary ?: wp_trim_words($book_description ?: $library->post_content, 15),
            'author' => get_post_meta($library->ID, 'book_author', true) ?: 'Unknown Author',
            'year' => get_post_meta($library->ID, 'book_year', true) ?: get_the_date('Y', $library->ID),
            'image' => $book_cover_image ? $book_cover_image['url'] : (get_the_post_thumbnail_url($library->ID, 'medium') ?: 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80'),
            'url' => get_permalink($library->ID)
        ];
    }
} else {
    $libraries_data = $dummy_libraries;
}

// Note: articles_chunks and total_slides are now calculated in the slider section
?>

<!-- =================================================================== -->
<!-- HERO CAROUSEL SECTION -->
<!-- =================================================================== -->
<!-- Hero Carousel JavaScript -->
<script>
function heroCarousel() {
    return {
        slides: <?php echo json_encode($hero_slides); ?>,
        currentSlideIndex: 1,
        autoRotate: true,
        init() {
            setInterval(() => {
                if (this.autoRotate) {
                    this.next();
                }
            }, 5000);
        },
        previous() {
            if (this.currentSlideIndex > 1) {
                this.currentSlideIndex = this.currentSlideIndex - 1;
            } else {
                this.currentSlideIndex = this.slides.length;
            }
            this.autoRotate = false;
            setTimeout(() => { this.autoRotate = true; }, 10000);
        },
        next() {
            if (this.currentSlideIndex < this.slides.length) {
                this.currentSlideIndex = this.currentSlideIndex + 1;
            } else {
                this.currentSlideIndex = 1;
            }
            this.autoRotate = false;
            setTimeout(() => { this.autoRotate = true; }, 10000);
        }
    }
}
</script>

<section x-data="heroCarousel()" class="relative w-full overflow-hidden">

    <!-- previous button -->
    <button type="button" class="absolute left-4 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white hover:bg-gray-50 border border-gray-200 shadow-lg p-3 text-primary transition-all duration-200 hover:shadow-xl hover:scale-105" aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="w-5 h-5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    <!-- next button -->
    <button type="button" class="absolute right-4 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white hover:bg-gray-50 border border-gray-200 shadow-lg p-3 text-primary transition-all duration-200 hover:shadow-xl hover:scale-105" aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="w-5 h-5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>
   
    <!-- slides -->
    <div class="relative min-h-screen w-full">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                
                <!-- Background Image -->
                <img class="absolute w-full h-full inset-0 object-cover text-neutral-600" x-bind:src="slide.image" x-bind:alt="slide.title" />
                
                <!-- Image Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>
                
                <!-- Title and description -->
                <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-center gap-2 px-16 py-12 text-center">
                    <h1 class="w-full lg:w-[80%] text-balance text-3xl lg:text-6xl font-bold text-white mb-6" x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h1>
                    <p class="lg:w-1/2 w-full text-pretty text-lg text-white/90 mb-8" x-text="slide.description" x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                    <a x-bind:href="slide.cta_url" class="inline-block bg-primary hover:bg-primary/90 text-white px-8 py-4 rounded-lg text-lg font-semibold transition transform hover:scale-105" x-text="slide.cta_text"></a>
                </div>
            </div>
        </template>
    </div>
    
    <!-- indicators -->
    <div class="absolute bottom-6 left-1/2 z-20 flex -translate-x-1/2 gap-3 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-gray-200" role="group" aria-label="slides">
        <template x-for="(slide, index) in slides">
            <button 
                class="w-3 h-3 rounded-full transition-all duration-300 hover:scale-110" 
                x-on:click="currentSlideIndex = index + 1; autoRotate = false; setTimeout(() => { autoRotate = true; }, 10000);" 
                :class="currentSlideIndex === index + 1 ? 'bg-primary shadow-lg' : 'bg-gray-300 hover:bg-gray-400'" 
                :aria-label="'Go to slide ' + (index + 1)">
            </button>
        </template>
    </div>
</section>

<!-- =================================================================== -->
<!-- ARTICLES SECTION -->
<!-- =================================================================== -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-8">
            <h2 class="text-3xl md:text-4xl text-primary font-bold mb-4">Berita & Artikel</h2>
            <p class="text-gray-600">
                Jelajahi berita dan artikel yang membahas dialog lintas agama, perdamaian, serta inisiatif kolaboratif dalam membangun harmoni di Indonesia.
            </p>
        </div>

        <!-- Featured Article -->
        <div class="flex justify-center mb-8">
            <a href="<?php echo esc_url($featured_data['url']); ?>" class="relative w-full max-w-[1000px] h-[250px] sm:h-[350px] md:h-[400px] lg:h-[476px]">
                <img src="<?php echo esc_url($featured_data['image']); ?>" alt="<?php echo esc_attr($featured_data['title']); ?>" class="w-full h-full object-cover rounded-lg">
                
                <!-- Image Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-lg"></div>
                
                <!-- Category Badge -->
                <div class="absolute top-4 left-4 bg-primary z-10 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    <?php echo esc_html($featured_data['category']); ?>
                </div>

                <!-- Content Overlay -->
                <div class="absolute inset-0 flex flex-col justify-end p-4 md:p-6 lg:p-8 rounded-lg z-10">
                    <h2 class="text-white text-lg sm:text-xl font-bold mb-2 md:mb-3">
                        <?php echo esc_html($featured_data['title']); ?>
                    </h2>
                    <p class="text-gray-300 text-sm md:text-base">
                        <?php echo esc_html(wp_trim_words($featured_data['content'], 20)); ?>
                    </p>
                </div>
            </a>
        </div>

        <!-- Articles Slider -->
        <?php if (!empty($articles_data)) : ?>
        <?php 
            // Prepare articles for slider - group by 3 for desktop view
            $articles_chunks = array_chunk($articles_data, 3);
            $total_slides = count($articles_chunks);
        ?>
        
        <script>
        function articleSlider() {
            return {
                slides: <?php echo json_encode($articles_chunks); ?>,
                currentSlideIndex: 1,
                totalSlides: <?php echo $total_slides; ?>,
                previous() {
                    if (this.currentSlideIndex > 1) {
                        this.currentSlideIndex = this.currentSlideIndex - 1;
                    } else {
                        this.currentSlideIndex = this.totalSlides;
                    }
                },
                next() {
                    if (this.currentSlideIndex < this.totalSlides) {
                        this.currentSlideIndex = this.currentSlideIndex + 1;
                    } else {
                        this.currentSlideIndex = 1;
                    }
                }
            }
        }
        </script>
        
        <div x-data="articleSlider()" class="relative w-full overflow-hidden">
            
            <!-- Articles count info -->
            <div class="text-sm text-gray-500 mb-4">
                Menampilkan <?php echo count($articles_data); ?> artikel dalam <?php echo $total_slides; ?> slide
                <span class="ml-4 text-xs" x-text="'Current slide: ' + currentSlideIndex + '/' + totalSlides"></span>
            </div>

            <!-- Navigation Arrows -->
            <?php if ($total_slides > 1) : ?>
            <!-- Previous button -->
            <button type="button" class="absolute left-4 top-1/2 z-30 flex rounded-full -translate-y-1/2 items-center justify-center bg-white hover:bg-gray-50 border border-gray-200 shadow-lg p-3 text-primary transition-all duration-200 hover:shadow-xl hover:scale-105" aria-label="previous slide" x-on:click="previous()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="w-5 h-5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>

            <!-- Next button -->
            <button type="button" class="absolute right-4 top-1/2 z-30 flex rounded-full -translate-y-1/2 items-center justify-center bg-white hover:bg-gray-50 border border-gray-200 shadow-lg p-3 text-primary transition-all duration-200 hover:shadow-xl hover:scale-105" aria-label="next slide" x-on:click="next()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="w-5 h-5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
            <?php endif; ?>
           
            <!-- slides -->
            <div class="relative min-h-[500px] w-full">
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.500ms>
                        <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            <template x-for="(article, articleIndex) in slide" :key="articleIndex">
                                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                                    <div class="relative h-48 sm:h-56 md:h-64">
                                        <img :src="article.image" :alt="article.title" class="w-full h-full object-cover">
                                        
                                        <!-- Image Overlay -->
                                        <div class="absolute inset-0 bg-black/20 hover:bg-black/30 transition-colors duration-300"></div>
                                        
                                        <div class="absolute top-4 left-4 bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full z-10" x-text="article.category">
                                        </div>
                                    </div>
                                    <div class="p-4 md:p-6">
                                        <h4 class="text-lg md:text-xl font-semibold mb-2 md:mb-3" x-text="article.title.length > 50 ? article.title.substring(0, 50) + '...' : article.title">
                                        </h4>
                                        <p class="text-gray-600 text-sm md:text-base mb-3" x-text="article.content.length > 100 ? article.content.substring(0, 100) + '...' : article.content">
                                        </p>
                                        <a :href="article.url" class="text-primary hover:text-primary/80 font-medium text-sm">
                                            Baca Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
            
            <!-- Slide Indicators -->
            <?php if ($total_slides > 1) : ?>
            <div class="absolute bottom-6 left-1/2 z-20 flex -translate-x-1/2 gap-3 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-gray-200" role="group" aria-label="slides">
                <template x-for="(slide, index) in slides" :key="index">
                    <button 
                        class="w-3 h-3 rounded-full transition-all duration-300 hover:scale-110" 
                        x-on:click="currentSlideIndex = index + 1" 
                        :class="currentSlideIndex === index + 1 ? 'bg-primary shadow-lg' : 'bg-gray-300 hover:bg-gray-400'" 
                        :aria-label="'Go to slide ' + (index + 1)">
                    </button>
                </template>
            </div>
            <?php endif; ?>
        </div>
        <?php else : ?>
        <div class="text-center py-8">
            <p class="text-gray-500">Tidak ada artikel untuk ditampilkan.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- =================================================================== -->
<!-- EVENTS SECTION -->
<!-- =================================================================== -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-8">
            <h2 class="text-3xl md:text-4xl text-primary font-bold mb-4">Agenda Mendatang</h2>
            <p class="text-gray-600">
                Ikuti berbagai agenda dan diskusi bermakna yang mendorong dialog lintas agama, perdamaian, serta kerja sama dalam membangun harmoni di Indonesia.
            </p>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-8">
            <?php foreach ($events_data as $event) : ?>
            <div x-data="{ openModal: false }" class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl cursor-pointer">
                <div @click="openModal = true">
                    <div class="relative">
                        <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($event['title']); ?>" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        
                        <!-- Image Overlay -->
                        <div class="absolute inset-0 bg-black/20 hover:bg-black/30 transition-colors duration-300"></div>
                        
                        <!-- Date Badge -->
                        <div class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-xs md:text-sm z-10">
                            <?php echo date('d M Y', strtotime($event['date'])); ?>
                        </div>
                        
                        <!-- Time Badge -->
                        <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-xs md:text-sm z-10">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><?php echo $event['time']; ?> WIB</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-4 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold mb-2 md:mb-3">
                            <?php echo esc_html($event['title']); ?>
                        </h3>
                        <p class="text-gray-600 text-sm md:text-base">
                            <?php echo esc_html($event['short_description'] ?: wp_trim_words($event['content'], 15)); ?>
                        </p>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="truncate"><?php echo esc_html($event['location']); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Event Modal -->
                <div x-cloak x-show="openModal" x-transition.opacity.duration.200ms @keydown.escape.window="openModal = false" @click.self="openModal = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true">
                    <div x-show="openModal" x-transition:enter="transition ease-out duration-200 delay-100" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-3xl flex-col gap-4 overflow-hidden rounded-xl border border-neutral-300 bg-white text-neutral-600">
                        
                        <!-- Modal Header -->
                        <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4">
                            <h3 class="font-semibold tracking-wide text-neutral-900"><?php echo esc_html($event['title']); ?></h3>
                            <button @click="openModal = false" aria-label="close modal">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="p-6 max-h-[70vh] overflow-y-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <div class="relative">
                                        <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($event['title']); ?>" class="w-full h-auto rounded-lg object-cover">
                                        <!-- Image Overlay -->
                                        <div class="absolute inset-0 bg-black/10 rounded-lg"></div>
                                    </div>
                                    
                                    <!-- Event Details -->
                                    <div class="mt-4 grid grid-cols-2 gap-3">
                                        <div class="bg-neutral-50 p-3 rounded-lg border border-neutral-200">
                                            <div class="flex items-center text-primary mb-1">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span class="text-sm font-medium">Tanggal</span>
                                            </div>
                                            <p class="text-sm"><?php echo date('d M Y', strtotime($event['date'])); ?></p>
                                        </div>
                                        
                                        <div class="bg-neutral-50 p-3 rounded-lg border border-neutral-200">
                                            <div class="flex items-center text-primary mb-1">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-sm font-medium">Waktu</span>
                                            </div>
                                            <p class="text-sm"><?php echo $event['time']; ?> WIB</p>
                                        </div>
                                        
                                        <div class="bg-neutral-50 p-3 rounded-lg border border-neutral-200 col-span-2">
                                            <div class="flex items-center text-primary mb-1">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span class="text-sm font-medium">Lokasi</span>
                                            </div>
                                            <p class="text-sm"><?php echo esc_html($event['location']); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-primary mb-2">Deskripsi Agenda</h4>
                                        <div class="text-sm text-gray-600 leading-relaxed break-words overflow-wrap-anywhere">
                                            <?php echo wp_kses_post($event['content']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex justify-end border-t border-neutral-300 bg-neutral-50/60 p-4">
                            <button @click="openModal = false" type="button" class="whitespace-nowrap rounded-lg bg-primary hover:bg-primary/90 px-4 py-2 text-center text-sm font-medium tracking-wide text-white transition">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =================================================================== -->
<!-- LIBRARIES SECTION -->
<!-- =================================================================== -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-8">
            <h2 class="text-3xl md:text-4xl text-primary font-bold mb-4">Pustaka</h2>
            <p class="text-gray-600">
                Eksplorasi koleksi buku-buku kami tentang dialog antar agama dan kerukunan umat beragama
            </p>
        </div>

        <!-- Libraries Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 mb-8">
            <?php foreach ($libraries_data as $library) : ?>
            <div class="bg-white rounded-xl overflow-hidden shadow-lg transition hover:shadow-xl">
                <div class="relative aspect-[3/4] overflow-hidden">
                    <img src="<?php echo esc_url($library['image']); ?>" alt="<?php echo esc_attr($library['title']); ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6">
                        <span class="text-xs md:text-sm text-white/80">Religious Studies</span>
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <h3 class="text-lg md:text-xl font-semibold mb-2"><?php echo esc_html($library['title']); ?></h3>
                    <p class="text-gray-600 text-sm md:text-base mb-4">Penulis: <?php echo esc_html($library['author']); ?></p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs md:text-sm text-gray-500"><?php echo $library['year']; ?></span>
                        <a href="<?php echo isset($library['url']) ? esc_url($library['url']) : '#'; ?>" class="text-primary hover:text-primary/80 font-medium text-sm">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center">
            <a href="<?php echo home_url('/category/library'); ?>" class="inline-block px-8 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition transform hover:scale-105">
                Lihat Semua Buku
            </a>
        </div>
    </div>
</section>

<!-- =================================================================== -->
<!-- CTA SECTION -->
<!-- =================================================================== -->
<section class="relative py-32">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($cta_data['image']); ?>" alt="<?php echo esc_attr($cta_data['title']); ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">
                <?php echo esc_html($cta_data['title']); ?>
            </h2>
            <p class="text-lg text-white/90 mb-8">
                <?php echo esc_html($cta_data['subtitle']); ?>
            </p>
            <a href="#" class="inline-block px-8 py-4 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition transform hover:scale-105">
                <?php echo esc_html($cta_data['button_text']); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>