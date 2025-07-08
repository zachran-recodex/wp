        </main>
        
        <!-- Footer -->
        <footer class="bg-background-primary text-white">
            <!-- Main Footer -->
            <div class="container mx-auto px-4 pt-16 pb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Organization Info -->
                    <div class="space-y-4">
                        <img class="h-12" src="<?php echo get_theme_mod('icrp_logo', get_template_directory_uri() . '/assets/img/logo.png'); ?>" alt="Logo ICRP">
                        <p class="text-gray-400">
                            Indonesian Conference on Religion and Peace (ICRP) adalah organisasi yang
                            berdedikasi untuk membangun dialog antar agama dan mempromosikan perdamaian di
                            Indonesia.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-primary transition">
                                <i class="fa-brands fa-facebook w-6 h-6"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary transition">
                                <i class="fa-brands fa-linkedin w-6 h-6"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary transition">
                                <i class="fa-brands fa-youtube w-6 h-6"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary transition">
                                <i class="fa-brands fa-instagram w-6 h-6"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-primary transition">
                                <i class="fa-brands fa-tiktok w-6 h-6"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6">Menu</h4>
                        <nav class="space-y-3">
                            <a href="<?php echo home_url(); ?>" class="block text-gray-400 hover:text-primary transition">Beranda</a>
                            <a href="#" class="block text-gray-400 hover:text-primary transition">Tentang ICRP</a>
                            <a href="#" class="block text-gray-400 hover:text-primary transition">Sahabat ICRP</a>
                            <a href="#" class="block text-gray-400 hover:text-primary transition">Jaringan</a>
                            <a href="#" class="block text-gray-400 hover:text-primary transition">Berita & Artikel</a>
                            <a href="#" class="block text-gray-400 hover:text-primary transition">Pustaka</a>
                        </nav>
                    </div>
                    
                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6">Kontak</h4>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <i class="fa-solid fa-location-dot w-6 h-6 text-primary"></i>
                                <span class="text-gray-400">
                                    Jl. Cempaka Putih Barat XXI No. 34<br>
                                    Jakarta Pusat 10520
                                </span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-phone w-6 h-6 text-primary"></i>
                                <span class="text-gray-400">(021) 42802349</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fa-solid fa-envelope w-6 h-6 text-primary"></i>
                                <span class="text-gray-400">info@icrp.id</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Google Maps -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6">Lokasi</h4>
                        <div class="w-full h-48 bg-gray-700 rounded-lg overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.633068725179!2d106.8659217!3d-6.179844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4ff60232a8b%3A0xc77634900d08328d!2sIndonesian%20Conference%20on%20Religion%20and%20Peace%20(ICRP)!5e0!3m2!1sid!2sid!4v1740990622369!5m2!1sid!2sid"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                class="rounded-lg"
                                title="Lokasi ICRP">
                            </iframe>
                        </div>
                        <p class="text-gray-400 mt-3 text-sm">Kunjungi Rumah Perdamaian kami untuk informasi lebih lanjut.</p>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Footer -->
            <div class="border-t border-white/20">
                <div class="container mx-auto px-4 py-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 text-sm">
                            © <?php echo date('Y'); ?> Indonesian Conference on Religion and Peace (ICRP). All rights reserved.
                        </p>
                        <div class="flex space-x-6 mt-4 md:mt-0">
                            <a href="#" class="text-sm text-gray-400 hover:text-primary transition">Privacy Policy</a>
                            <a href="#" class="text-sm text-gray-400 hover:text-primary transition">Terms of Service</a>
                            <span class="text-sm text-gray-400">Created by <a href="https://recodex.id" target="_blank" class="text-[#86c332]">Recodex ID</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>