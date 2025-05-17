<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasa Djadoel - Toko Makanan Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/header.jpg');
            background-size: cover;
            background-position: center;
            height: 70vh;
        }
        
        .food-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .cart-item {
            transition: all 0.3s ease;
        }
        
        .cart-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header/Navbar -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <i class="fas fa-utensils text-2xl text-orange-500 mr-2"></i>
                <h1 class="text-2xl font-bold text-gray-800">Rasa Djadoel</h1>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="#home" class="text-orange-500 font-medium">Home</a>
                <a href="#menu" class="text-gray-600 hover:text-orange-500">Menu</a>
                <a href="#about" class="text-gray-600 hover:text-orange-500">Tentang Kami</a>
                <a href="#contact" class="text-gray-600 hover:text-orange-500">Kontak</a>
            </nav>
            <div class="flex items-center space-x-4">
                <button id="cart-btn" class="relative">
                    <i class="fas fa-shopping-cart text-xl text-gray-700 hover:text-orange-500"></i>
                    <span id="cart-count" class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </button>
                <button class="md:hidden" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl text-gray-700"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white py-2 px-4 shadow-lg">
            <a href="#home" class="block py-2 text-orange-500 font-medium">Home</a>
            <a href="#menu" class="block py-2 text-gray-600 hover:text-orange-500">Menu</a>
            <a href="#about" class="block py-2 text-gray-600 hover:text-orange-500">Tentang Kami</a>
            <a href="#contact" class="block py-2 text-gray-600 hover:text-orange-500">Kontak</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero flex items-center justify-center text-center text-white">
        <div class="px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Makanan Lezat untuk Setiap Saat</h1>
            <p class="text-xl mb-8">Nikmati hidangan terbaik kami yang dibuat dengan bahan-bahan pilihan</p>
            <a href="#menu" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-full transition duration-300">Lihat Menu</a>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Menu Kami</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Data menu makanan (biasanya ini diambil dari database)
                $menu_items = array(
                    array("id" => 1, "name" => "Nasi Goreng Spesial", "description" => "Nasi goreng dengan bakso, udang, dan sayuran segar.", "price" => 35000, "image" => "images/nasi_goreng.jpg"),
                    array("id" => 2, "name" => "Mie Ayam", "description" => "Mie ayam dengan pangsit dan kaldu gurih.", "price" => 30000, "image" => "images/mie_ayam_jamur.jpeg"),
                    array("id" => 3, "name" => "Sate Ayam", "description" => "Sate ayam dengan bumbu kacang dan lontong.", "price" => 28000, "image" => "images/sate_ayam.jpg"),
                    array("id" => 4, "name" => "Gado-Gado", "description" => "Sayuran segar dengan bumbu kacang dan kerupuk.", "price" => 25000, "image" => "images/gado_gado.jpg"),
                    array("id" => 5, "name" => "Bakso Sapi Spesial", "description" => "Bakso daging sapi dengan mie dan kuah kaldu yang gurih.", "price" => 32000, "image" => "images/bakso.jpg"),
                    array("id" => 6, "name" => "Es Campur", "description" => "Es dengan berbagai buah dan sirup.", "price" => 18000, "image" => "images/es_campur.jpg")
                );

                foreach ($menu_items as $item) {
                    echo '
                    <div class="food-card bg-white rounded-lg overflow-hidden shadow-md transition duration-300">
                        <img src="' . $item['image'] . '" alt="' . $item['name'] . '" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">' . $item['name'] . '</h3>
                            <p class="text-gray-600 mb-4">' . $item['description'] . '</p>
                            <div class="flex justify-between items-center">
                                <span class="text-orange-500 font-bold">Rp ' . number_format($item['price'], 0, ',', '.') . '</span>
                                <button onclick="addToCart(' . $item['id'] . ', \'' . $item['name'] . '\', ' . $item['price'] . ')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-full transition duration-300">
                                    <i class="fas fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <img src="images/tk.jpg" alt="Tentang Kami" class="rounded-lg shadow-lg w-full">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">Tentang Rasa Djadoel</h2>
                    <p class="text-gray-600 mb-4">Rasa Djadoel didirikan pada tahun 2010 dengan misi menyajikan makanan Nusantara lezat dengan bahan-bahan berkualitas tinggi. 
                        Kami percaya bahwa makanan yang baik dapat membawa kebahagiaan dan menciptakan kenangan indah.</p>
                    <p class="text-gray-600 mb-4">Semua hidangan kami dibuat dengan cinta dan perhatian terhadap detail. 
                        Kami menggunakan bahan-bahan segar yang dipilih dengan teliti untuk memastikan kualitas terbaik untuk pelanggan kami.</p>
                    <div class="flex space-x-4 mt-6">
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center w-1/3">
                            <i class="fas fa-award text-3xl text-orange-500 mb-2"></i>
                            <h4 class="font-semibold">10+ Tahun</h4>
                            <p class="text-sm text-gray-600">Pengalaman</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center w-1/3">
                            <i class="fas fa-utensils text-3xl text-orange-500 mb-2"></i>
                            <h4 class="font-semibold">50+</h4>
                            <p class="text-sm text-gray-600">Menu</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center w-1/3">
                            <i class="fas fa-smile text-3xl text-orange-500 mb-2"></i>
                            <h4 class="font-semibold">1000+</h4>
                            <p class="text-sm text-gray-600">Pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Apa Kata Pelanggan Kami</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <img src="images/raisa.jpg" alt="Testimoni" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Raisa Andriana</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Nasi goreng spesialnya benar-benar enak! Rasanya autentik dan bahan-bahannya segar. Pelayanan juga cepat dan ramah."</p>
                </div>
                
                <div class="bg-gray-100 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <img src="images/ningning.jpg" alt="Testimoni" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">NingNing</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Sate ayamnya juara! Bumbu kacangnya pas tidak terlalu manis. Sudah beberapa kali pesan dan selalu konsisten enaknya."</p>
                </div>
                
                <div class="bg-gray-100 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <img src="images/bernadya.jpeg" alt="Testimoni" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Bernadya</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Gado-gadonya segar dan bumbu kacangnya enak banget. Porsinya juga besar untuk harganya. Sangat recommended!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Hubungi Kami</h2>
            
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <form id="contact-form" class="bg-white p-6 rounded-lg shadow-md">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">Nama</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required></textarea>
                        </div>
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-full transition duration-300 w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <div class="bg-white p-6 rounded-lg shadow-md h-full">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-orange-500 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Alamat</h4>
                                    <p class="text-gray-600">Jl. Makanan Enak No. 123, Jakarta Selatan</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-phone-alt text-orange-500 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Telepon</h4>
                                    <p class="text-gray-600">(021) 1234-5678</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-envelope text-orange-500 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Email</h4>
                                    <p class="text-gray-600">info@rasadjadoel.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-clock text-orange-500 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-medium text-gray-800">Jam Operasional</h4>
                                    <p class="text-gray-600">Senin - Minggu: 10:00 - 22:00</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="font-medium text-gray-800 mb-2">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-600 hover:text-orange-500"><i class="fab fa-facebook-f text-xl"></i></a>
                                <a href="#" class="text-gray-600 hover:text-orange-500"><i class="fab fa-instagram text-xl"></i></a>
                                <a href="#" class="text-gray-600 hover:text-orange-500"><i class="fab fa-twitter text-xl"></i></a>
                                <a href="#" class="text-gray-600 hover:text-orange-500"><i class="fab fa-whatsapp text-xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-utensils text-orange-500 mr-2"></i>
                        Rasa Djadoel
                    </h3>
                    <p class="text-gray-400">Menyajikan makanan lezat dengan bahan-bahan berkualitas tinggi sejak 2010.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-orange-500">Home</a></li>
                        <li><a href="#menu" class="text-gray-400 hover:text-orange-500">Menu</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-orange-500">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-orange-500">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu Populer</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-orange-500">Nasi Goreng Spesial</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-500">Mie Ayam </a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-500">Sate Ayam</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-orange-500">Gado-Gado</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Berlangganan untuk mendapatkan promo dan menu baru.</p>
                    <form class="flex">
                        <input type="email" placeholder="Email Anda" class="px-4 py-2 rounded-l-lg focus:outline-none text-gray-800 w-full">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-r-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 Rasa Djadoel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Shopping Cart Modal -->
    <div id="cart-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
        <div class="absolute right-0 top-0 h-full w-full md:w-1/3 bg-white shadow-lg overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Keranjang Belanja</h3>
                    <button id="close-cart" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <div id="cart-items" class="space-y-4">
                    <!-- Cart items will be added here dynamically -->
                    <div class="text-center py-8 text-gray-500" id="empty-cart-message">
                        <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                        <p>Keranjang belanja Anda kosong</p>
                    </div>
                </div>
                
                <div id="cart-summary" class="border-t border-gray-200 mt-6 pt-6 hidden">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Subtotal</span>
                        <span id="cart-subtotal" class="font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-600">Biaya Pengiriman</span>
                        <span class="font-medium">Rp 10,000</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total</span>
                        <span id="cart-total">Rp 10,000</span>
                    </div>
                    
                    <button id="checkout-btn" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-full w-full mt-6 transition duration-300">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Success Modal -->
    <div id="order-success-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4 text-center">
            <div class="text-green-500 text-6xl mb-4">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil!</h3>
            <p class="text-gray-600 mb-6">Terima kasih telah berbelanja di Rasa Djadoel. Pesanan Anda sedang diproses.</p>
            <button id="close-success-modal" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-full transition duration-300">
                Tutup
            </button>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Shopping Cart Functionality
        let cart = [];
        
        // Open/Close Cart Modal
        document.getElementById('cart-btn').addEventListener('click', function() {
            document.getElementById('cart-modal').classList.remove('hidden');
        });
        
        document.getElementById('close-cart').addEventListener('click', function() {
            document.getElementById('cart-modal').classList.add('hidden');
        });
        
        // Close success modal
        document.getElementById('close-success-modal').addEventListener('click', function() {
            document.getElementById('order-success-modal').classList.add('hidden');
        });
        
        // Add to Cart Function
        function addToCart(id, name, price) {
            // Check if item already in cart
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: 1
                });
            }
            
            updateCart();
            
            // Show cart modal when item added
            document.getElementById('cart-modal').classList.remove('hidden');
            
            // Animation for button
            const button = event.target;
            button.innerHTML = '<i class="fas fa-check"></i> Ditambahkan';
            button.classList.remove('bg-orange-500');
            button.classList.add('bg-green-500');
            
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-plus"></i> Tambah';
                button.classList.remove('bg-green-500');
                button.classList.add('bg-orange-500');
            }, 2000);
        }
        
        // Update Cart UI
        function updateCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            const emptyCartMessage = document.getElementById('empty-cart-message');
            const cartSummary = document.getElementById('cart-summary');
            
            // Update cart count
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
            
            // Clear cart items container
            cartItemsContainer.innerHTML = '';
            
            if (cart.length === 0) {
                emptyCartMessage.classList.remove('hidden');
                cartSummary.classList.add('hidden');
            } else {
                emptyCartMessage.classList.add('hidden');
                cartSummary.classList.remove('hidden');
                
                // Add each item to cart
                cart.forEach(item => {
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item bg-gray-50 p-4 rounded-lg flex justify-between items-center';
                    cartItem.innerHTML = `
                        <div>
                            <h4 class="font-medium">${item.name}</h4>
                            <p class="text-sm text-gray-600">Rp ${item.price.toLocaleString()}</p>
                        </div>
                        <div class="flex items-center">
                            <button onclick="updateQuantity(${item.id}, -1)" class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full flex items-center justify-center">
                                <i class="fas fa-minus text-xs"></i>
                            </button>
                            <span class="mx-3 font-medium">${item.quantity}</span>
                            <button onclick="updateQuantity(${item.id}, 1)" class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-8 h-8 rounded-full flex items-center justify-center">
                                <i class="fas fa-plus text-xs"></i>
                            </button>
                            <button onclick="removeFromCart(${item.id})" class="ml-4 text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    cartItemsContainer.appendChild(cartItem);
                });
                
                // Update totals
                const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
                const deliveryFee = 10000;
                const total = subtotal + deliveryFee;
                
                document.getElementById('cart-subtotal').textContent = `Rp ${subtotal.toLocaleString()}`;
                document.getElementById('cart-total').textContent = `Rp ${total.toLocaleString()}`;
            }
        }
        
        // Update Quantity
        function updateQuantity(id, change) {
            const item = cart.find(item => item.id === id);
            
            if (item) {
                item.quantity += change;
                
                // Remove item if quantity reaches 0
                if (item.quantity <= 0) {
                    cart = cart.filter(item => item.id !== id);
                }
                
                updateCart();
            }
        }
        
        // Remove from Cart
        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            updateCart();
        }
        
        // Checkout
        document.getElementById('checkout-btn').addEventListener('click', function() {
            // In a real app, you would send the cart data to the server here
            // For this demo, we'll just show a success message
            
            // Reset cart
            cart = [];
            updateCart();
            
            // Close cart modal
            document.getElementById('cart-modal').classList.add('hidden');
            
            // Show success modal
            document.getElementById('order-success-modal').classList.remove('hidden');
        });
        
        // Form submission
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            
            // In a real app, you would send this data to the server
            // For this demo, we'll just show an alert
            alert(`Terima kasih ${name}! Pesan Anda telah terkirim. Kami akan menghubungi Anda di ${email} segera.`);
            
            // Reset form
            this.reset();
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    document.getElementById('mobile-menu').classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>