document.addEventListener('DOMContentLoaded', () => {
    const productsGrid = document.querySelector('.products-grid');
    const filterUsoBtn = document.getElementById('filter-uso-trigger');
    const filterUsoDropdown = document.getElementById('filter-uso-dropdown');
    const filterTipoBtn = document.getElementById('filter-tipo-trigger');
    const filterTipoDropdown = document.getElementById('filter-tipo-dropdown');
    const clearFiltersBtn = document.getElementById('clear-filters-btn');

    const usoOptions = document.querySelectorAll('.filter-option-uso');
    const tipoOptions = document.querySelectorAll('.filter-option-tipo');

    let productsData = [];
    let currentUsoFilter = null;
    let currentTipoFilter = null;

    // Fallback data in case JSON fetch fails
    const fallbackData = [
        {
            "id": "segafredo_selection1k_500g",
            "tipo": "em_grao",
            "uso": "domestico",
            "image": "assets/images/segafredo_selection1K_500g.png",
            "title": "SEGAFREDO ZANETTI SELECTION 1 KG E 500 G EM GRÃO",
            "description": "Blend premium de grãos inteiros à base de Arábica, com um toque de Robusta de alta qualidade, que confere corpo e crema, recriando todos os dias a magia do verdadeiro espresso italiano. Ideal para moagem na hora ou para uso em máquinas automáticas. Apresenta notas de baunilha, caramelo e chocolate."
        },
        {
            "id": "segafredo_selection_moido_500g",
            "tipo": "torrado_moido",
            "uso": "domestico",
            "image": "assets/images/segafredo_selection_moido_500g.png",
            "title": "SEGAFREDO ZANETTI SELECTION 500 G TORRADO E MOÍDO",
            "description": "Versão torrada e moída do blend Selection. Um blend premium à base de grãos Arábica, com um toque de Robusta de alta qualidade, recriando todos os dias a magia do verdadeiro espresso italiano. Apresenta notas de baunilha, caramelo e chocolate. 100% Arábica."
        },
        {
            "id": "segafredo_intermezzo",
            "tipo": "torrado_moido",
            "uso": "domestico",
            "image": "assets/images/segafredo_intermezzo.png",
            "title": "SEGAFREDO ZANETTI INTERMEZZO 500 G TORRADO E MOÍDO",
            "description": "Blend torrado e moído de Arábica + Robusta, com sabor intenso e encorpado, ideal para quem busca um espresso com aroma mais marcante e maior estrutura."
        },
        {
            "id": "segafredo_expresso_casa",
            "tipo": "torrado_moido",
            "uso": "domestico",
            "image": "assets/images/segafredo_expresso_casa.png",
            "title": "SEGAFREDO ZANETTI ESPRESSO CASA 500 G TORRADO E MOÍDO",
            "description": "“O verdadeiro espresso italiano.” Ideal para uso doméstico, mantendo o corpo, o aroma e a crema de um autêntico espresso italiano. Apresenta notas de cereja escura, framboesa e toques terrosos."
        },
        {
            "id": "segafredo_extra_strong",
            "tipo": "em_grao",
            "uso": "profissional",
            "image": "assets/images/segafredo_extra_strong.png",
            "title": "SEGAFREDO ZANETTI EXTRA STRONG 1 KG EM GRÃOS",
            "description": "Blend de torra intensa, com maior proporção de Robusta. Apresenta grãos mais encorpados, ideal para quem aprecia um café forte e intenso."
        },
        {
            "id": "segafredo_extra_mild",
            "tipo": "em_grao",
            "uso": "profissional",
            "image": "assets/images/segafredo_extra_mild.png",
            "title": "SEGAFREDO ZANETTI EXTRA MILD 1 KG EM GRÃOS",
            "description": "Suave e equilibrado, com torra clara a média e maior proporção de Arábica. Perfeito para quem prefere cafés mais delicados ou aprecia várias xícaras ao longo do dia."
        },
        {
            "id": "segafredo_massimo",
            "tipo": "em_grao",
            "uso": "profissional",
            "image": "assets/images/segafredo_massimo.png",
            "title": "SEGAFREDO ZANETTI MASSIMO 1 KG E 500 G EM GRÃOS",
            "description": "Grãos de café superiores e blends exclusivos."
        },
        {
            "id": "segafredo_cap_100_arabica",
            "tipo": "capsula",
            "uso": "domestico",
            "image": "assets/images/segafredo_cap_100_arabica.png",
            "title": "Cápsulas Segafredo Zanetti 100% Arábica",
            "description": "Cápsulas de café para uso doméstico, com sabor refinado e aroma delicado. Compatíveis com máquinas Nespresso®."
        },
        {
            "id": "segafredo_cap_100_intenso",
            "tipo": "capsula",
            "uso": "domestico",
            "image": "assets/images/segafredo_cap_100_intenso.png",
            "title": "Cápsulas Segafredo Zanetti Intenso",
            "description": "Café intenso em cápsulas para uso doméstico. Compatível com máquinas Nespresso®."
        },
        {
            "id": "segafredo_cap_100_classico",
            "tipo": "capsula",
            "uso": "domestico",
            "image": "assets/images/segafredo_cap_100_classico.png",
            "title": "Cápsulas Segafredo Zanetti Clássico",
            "description": "Café clássico em cápsulas para uso doméstico. Compatível com máquinas Nespresso®."
        },
        {
            "id": "segafredo_cap_100_ristretto",
            "tipo": "capsula",
            "uso": "domestico",
            "image": "assets/images/segafredo_cap_100_ristretto.png",
            "title": "Cápsulas Segafredo Zanetti Ristretto",
            "description": "Café ristretto em cápsulas para uso doméstico. Compatível com máquinas Nespresso®."
        },
        {
            "id": "segafredo_cap_100_descafeinado",
            "tipo": "capsula",
            "uso": "domestico",
            "image": "assets/images/segafredo_cap_100_descafeinado.png",
            "title": "Cápsulas Segafredo Zanetti Descafeinado",
            "description": "Cápsulas de café descafeinado para uso doméstico. Desfrute de toda a experiência de sabor, sem cafeína. Compatíveis com máquinas Nespresso®."
        },
        {
            "id": "segafredo_capuccino_200g",
            "tipo": "instantaneo",
            "uso": "domestico",
            "image": "assets/images/segafredo_capuccino_200g.png",
            "title": "SEGAFREDO ZANETTI CAPPUCCINO SELECTION CLÁSSICO 200 G",
            "description": "Mistura prática para o preparo instantâneo de cappuccino. Combina base láctea, creme, café instantâneo e açúcar. Perfeito para lanches ou sobremesas, com a assinatura Segafredo."
        },
        {
            "id": "segafredo_hot_ciok",
            "tipo": "instantaneo",
            "uso": "domestico",
            "image": "assets/images/segafredo_hot_ciok.png",
            "title": "CHOCOLATE EM PÓ HOT CIOK – 25 SACHÊS DE 25 G CADA (IMPORTADO)",
            "description": "Bebida de chocolate quente."
        }
    ];

    // Fetch products from JSON
    fetch('assets/json/segafredo_products.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            productsData = data;
            applyFilters();
        })
        .catch(error => {
            console.warn('Error loading products JSON (likely local file access), using fallback data:', error);
            productsData = fallbackData;
            applyFilters();
        });

    // Toggle USO dropdown
    if (filterUsoBtn) {
        filterUsoBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (filterTipoBtn) {
                filterTipoBtn.classList.remove('active');
                filterTipoDropdown.classList.remove('show');
            }
            filterUsoBtn.classList.toggle('active');
            filterUsoDropdown.classList.toggle('show');
        });
    }

    // Toggle TIPO dropdown
    if (filterTipoBtn) {
        filterTipoBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (filterUsoBtn) {
                filterUsoBtn.classList.remove('active');
                filterUsoDropdown.classList.remove('show');
            }
            filterTipoBtn.classList.toggle('active');
            filterTipoDropdown.classList.toggle('show');
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', (e) => {
        if (filterUsoDropdown && filterUsoDropdown.classList.contains('show') && !filterUsoDropdown.contains(e.target) && !filterUsoBtn.contains(e.target)) {
            filterUsoDropdown.classList.remove('show');
            filterUsoBtn.classList.remove('active');
        }
        if (filterTipoDropdown && filterTipoDropdown.classList.contains('show') && !filterTipoDropdown.contains(e.target) && !filterTipoBtn.contains(e.target)) {
            filterTipoDropdown.classList.remove('show');
            filterTipoBtn.classList.remove('active');
        }
    });

    // Handle USO filter options
    usoOptions.forEach(option => {
        option.addEventListener('click', () => {
            const filterValue = option.getAttribute('data-filter');
            const isActive = option.classList.contains('active');

            usoOptions.forEach(opt => opt.classList.remove('active'));

            if (isActive) {
                currentUsoFilter = null; // Clear filter
            } else {
                option.classList.add('active');
                currentUsoFilter = filterValue;
            }

            applyFilters();
            filterUsoDropdown.classList.remove('show');
            filterUsoBtn.classList.remove('active');
        });
    });

    // Handle TIPO filter options
    tipoOptions.forEach(option => {
        option.addEventListener('click', () => {
            const filterValue = option.getAttribute('data-filter');
            const isActive = option.classList.contains('active');

            tipoOptions.forEach(opt => opt.classList.remove('active'));

            if (isActive) {
                currentTipoFilter = null; // Clear filter
            } else {
                option.classList.add('active');
                currentTipoFilter = filterValue;
            }

            applyFilters();
            filterTipoDropdown.classList.remove('show');
            filterTipoBtn.classList.remove('active');
        });
    });

    function applyFilters() {
        let filtered = productsData;

        if (currentUsoFilter) {
            filtered = filtered.filter(product => product.uso === currentUsoFilter);
        }

        if (currentTipoFilter) {
            filtered = filtered.filter(product => product.tipo === currentTipoFilter);
        }

        if (clearFiltersBtn) {
            if (currentUsoFilter || currentTipoFilter) {
                clearFiltersBtn.classList.add('show');
            } else {
                clearFiltersBtn.classList.remove('show');
            }
        }

        renderProducts(filtered);
    }

    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', () => {
            currentUsoFilter = null;
            currentTipoFilter = null;

            usoOptions.forEach(opt => opt.classList.remove('active'));
            tipoOptions.forEach(opt => opt.classList.remove('active'));

            applyFilters();
        });
    }

    function renderProducts(products) {
        if (!productsGrid) return;

        productsGrid.innerHTML = ''; // Clear current

        if (!products || products.length === 0) {
            productsGrid.innerHTML = '<p style="width:100%; text-align:center; padding: 40px; color: #5C5B5A; grid-column: 1 / -1;">Nenhum produto encontrado.</p>';
            return;
        }

        products.forEach((product, index) => {
            const card = document.createElement('div');
            card.classList.add('product-card', 'reveal-up');
            card.style.animationDelay = `${index * 0.1}s`;

            card.innerHTML = `
                <div class="product-img-wrapper">
                    <img src="${product.image}" alt="${product.title}">
                </div>
                <h3>${product.title}</h3>
                <p>${product.description}</p>
            `;
            productsGrid.appendChild(card);

            setTimeout(() => {
                card.classList.add('active');
            }, 50);
        });
    }
});
