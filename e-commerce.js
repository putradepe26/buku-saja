// Array data produk (salin dari bagian sebelumnya)
const products = [
    {
      id: 'p001',
      name: 'Kemeja Biru Katun Pria',
      price: 150000,
      description: 'Kemeja Katun  lengan panjang bahan katun berkualitas tinggi, nyaman dipakai sehari-hari.',
      image: 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2hpcnR8ZW58MHx8MHx8fDA%3D', // Placeholder image
      category: 'pakaian pria'
    },
    {
      id: 'p002',
      name: 'Celana Jeans Slim Fit Wanita',
      price: 220000,
      description: 'Celana jeans model slim fit yang stylish dan nyaman untuk wanita.',
      image: 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8amVhbnN8ZW58MHx8MHx8fDA%3D', // Placeholder image
      category: 'pakaian wanita'
    },
    {
      id: 'p003',
      name: 'Jaket Bomber Coklat',
      price: 15000000,
      description: 'Jaket bomber ini memiliki waterproof dan stylish.',
      image: 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8amFja2V0fGVufDB8fDB8fHww', // Placeholder image
      category: 'jaket'
    },
    {
      id: 'p004',
      name: 'Blazer Pria',
      price: 7500000,
      description: 'Jaket blazer profesional dan elegan.',
      image: 'https://images.unsplash.com/photo-1592878904946-b3cd8ae243d0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzR8fGphY2tldHxlbnwwfHwwfHx8MA%3D%3D', // Placeholder image
      category: 'jaket'
    },
    {
      id: 'p005',
      name: 'Dress Musim Panas Floral',
      price: 180000,
      description: 'Dress ringan dengan motif floral yang cocok untuk suasana musim panas.',
      image: 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZHJlc3N8ZW58MHx8MHx8fDA%3D', // Placeholder image
      category: 'pakaian wanita'
    },
    {
      id: 'p006',
      name: 'Sepatu Boot',
      price: 350000,
      description: 'Sepatu boot ini tahan lama dan nyaman, ideal untuk aktivitas outdor.',
      image: 'https://images.unsplash.com/photo-1622611996550-55d5258b1c92?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2VwYXR1fGVufDB8fDB8fHww', // Placeholder image
      category: 'sepatu'
    },
    {
      id: 'p007',
      name: 'Sepatu Vans',
      price: 250000,
      description: 'Sepatu boot ini ringan dan nyaman, ideal untuk aktivitas jalan-jalan.',
      image: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2hvZXN8ZW58MHx8MHx8fDA%3D', // Placeholder image
      category: 'sepatu'
    },
    {
      id: 'p008',
      name: 'Kemeja Putih Pria',
      price: 150000,
      description: 'Kemeja putih lengan panjang bahan katun berkualitas tinggi, nyaman dipakai sehari-hari.',
      image: 'https://plus.unsplash.com/premium_photo-1661627681947-4431c8c97659?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWVuJTIwc2hpcnR8ZW58MHx8MHx8fDA%3D', // Placeholder image
      category: 'pakaian pria'
    }
    
  ];

const productListDiv = document.getElementById('product-list');
const filterButtons = document.querySelectorAll('.filters button');

// Fungsi untuk format harga ke Rupiah
const formatRupiah = (amount) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
};

// Fungsi untuk menampilkan produk
const displayProducts = (productsToDisplay) => {
    productListDiv.innerHTML = ''; // Kosongkan daftar produk sebelum menambahkan yang baru
    productsToDisplay.forEach(product => {
        const productCard = document.createElement('div');
        productCard.classList.add('product-card');
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <p class="price">${formatRupiah(product.price)}</p>
        `;
        productListDiv.appendChild(productCard);
    });
};

// Inisialisasi: Tampilkan semua produk saat halaman pertama kali dimuat
displayProducts(products);

// Tambahkan event listener untuk tombol filter
filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        const category = button.dataset.category;

        // Hapus kelas 'active' dari semua tombol
        filterButtons.forEach(btn => btn.classList.remove('active'));
        // Tambahkan kelas 'active' ke tombol yang sedang diklik
        button.classList.add('active');

        let filteredProducts = [];
        if (category === 'all') {
            filteredProducts = products;
        } else {
            filteredProducts = products.filter(product => product.category === category);
        }
        displayProducts(filteredProducts);
    });
});