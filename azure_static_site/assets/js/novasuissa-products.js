document.addEventListener('DOMContentLoaded', () => {
    const productsGrid = document.querySelector('.novasuissa-products-grid');
    const filterBtn = document.querySelector('.products-filter-trigger');
    const filterDropdown = document.querySelector('.products-filter-dropdown');
    const filterOptions = document.querySelectorAll('.filter-option');
    const currentFilterLabel = document.querySelector('.current-filter-label');
    const clearFiltersBtn = document.getElementById('clear-filters-btn');

    let productsData = [];

    // Fallback data in case JSON fetch fails (e.g. local file:// access)
    const fallbackData = [
        {
            "id": "tradicional",
            "category": "torrado_moido",
            "image": "assets/images/novasuissa_prod_tradicional.png",
            "title": "LINHA TRADICIONAL",
            "description": "Café para o consumo diário, com torra mais escura e perfil de sabor mais intenso. Amplamente disponível nos canais de varejo e atacado."
        },
        {
            "id": "extraforte",
            "category": "torrado_moido",
            "image": "assets/images/novasuissa_prod_extraforte.png",
            "title": "LINHA EXTRAFORTE",
            "description": "Café para o consumo diário, com torra mais escura e perfil de sabor mais intenso. Amplamente disponível nos canais de varejo e atacado."
        },
        {
            "id": "filtro_reutilizavel",
            "category": "filtro",
            "image": "assets/images/novasuissa_prod_filtro.png",
            "title": "FILTRO REUTILIZÁVEL 103",
            "description": "Filtro reutilizável Nova Suíça – sustentável, prático e econômico. Substitui os filtros descartáveis preservando o sabor natural do café, com fácil limpeza e durabilidade para o uso diário."
        }
    ];

    // Fetch products from JSON
    fetch('assets/json/nova_suissa_products.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            productsData = data;
            renderProducts(productsData);
        })
        .catch(error => {
            console.warn('Error loading products JSON (likely local file access), using fallback data:', error);
            productsData = fallbackData;
            renderProducts(productsData);
        });

    // Toggle dropdown
    if (filterBtn) {
        filterBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            filterBtn.classList.toggle('active');
            filterDropdown.classList.toggle('show');
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (filterDropdown && filterDropdown.classList.contains('show') && !filterDropdown.contains(e.target) && !filterBtn.contains(e.target)) {
            filterDropdown.classList.remove('show');
            filterBtn.classList.remove('active');
        }
    });

    // Handle filter options
    filterOptions.forEach(option => {
        option.addEventListener('click', () => {
            const filterValue = option.getAttribute('data-filter');
            const isActive = option.classList.contains('active');

            // Update active state
            filterOptions.forEach(opt => opt.classList.remove('active'));

            if (isActive) {
                // If clicking already active, clear filter (show all)
                renderProducts(productsData);
                if (clearFiltersBtn) clearFiltersBtn.classList.remove('show');
            } else {
                // Activate new filter
                option.classList.add('active');
                const filtered = productsData.filter(product => product.category === filterValue);
                renderProducts(filtered);
                if (clearFiltersBtn) clearFiltersBtn.classList.add('show');
            }

            // Close dropdown
            filterDropdown.classList.remove('show');
            filterBtn.classList.remove('active');
        });
    });

    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', () => {
            filterOptions.forEach(opt => opt.classList.remove('active'));
            renderProducts(productsData);
            clearFiltersBtn.classList.remove('show');
        });
    }

    function renderProducts(products) {
        if (!productsGrid) return;

        productsGrid.innerHTML = ''; // Clear current

        if (!products || products.length === 0) {
            productsGrid.innerHTML = '<p style="width:100%; text-align:center; padding: 40px; color: #5C5B5A;">Nenhum produto encontrado.</p>';
            return;
        }

        products.forEach((product, index) => {
            const card = document.createElement('div');
            card.classList.add('novasuissa-product-card', 'reveal-up');
            // Stagger delay animation manually since they are added dynamically
            card.style.animationDelay = `${index * 0.1}s`;

            card.innerHTML = `
                <img src="${product.image}" alt="${product.title}" class="novasuissa-product-img">
                <div class="novasuissa-product-info">
                    <h3 class="novasuissa-product-title">${product.title}</h3>
                    <p class="novasuissa-product-desc">${product.description}</p>
                </div>
            `;
            productsGrid.appendChild(card);

            // Trigger animation class after a brief timeout to ensure transition works
            setTimeout(() => {
                card.classList.add('active');
            }, 50);
        });
    }
});
