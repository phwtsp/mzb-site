document.addEventListener("DOMContentLoaded", () => {
  const productsGrid = document.querySelector(".products-grid"); // Main grid container
  const filterBtn = document.querySelector(".products-filter-trigger");
  const filterDropdown = document.querySelector(".products-filter-dropdown");
  const filterOptions = document.querySelectorAll(".filter-option");
  const currentFilterLabel = document.querySelector(".current-filter-label");
  const clearFiltersBtn = document.getElementById("clear-filters-btn");

  let productsData = [];

  // Fallback data in case JSON fetch fails
  const fallbackData = [
    {
      id: "pacaembu_gourmet_500g",
      category: "torrado_moido",
      image: "assets/images/pacaembu_gourmet_500g_torrado.png",
      title:
        "CAFÉ PACAEMBU GOURMET 500 G – TORRADO E MOÍDO (EMBALAGEM A VÁCUO)",
      description:
        "Café gourmet 100% Arábica, com torra clara, que revela notas suaves e um aroma marcante. Ideal para quem aprecia bebidas delicadas e aromáticas.",
    },
    {
      id: "pacaembu_espresso_gourmet_1kg",
      category: "em_grao",
      image: "assets/images/pacaembu_espresso_gourmet_1Kg_graos.png",
      title: "CAFÉ PACAEMBU ESPRESSO GOURMET 1 KG – EM GRÃOS",
      description:
        "Versão em grãos do clássico Pacaembu Gourmet, desenvolvida especialmente para máquinas de espresso ou para moagem na hora.",
    },
    {
      id: "pacaembu_superior_500g_250g",
      category: "torrado_moido",
      image: "assets/images/pacaembu_superior_500g_e_250g_torrado.png",
      title:
        "CAFÉ PACAEMBU SUPERIOR 500 G E 250 G – TORRADO E MOÍDO (EMBALAGEM A VÁCUO)",
      description:
        "Café superior torrado e moído, elaborado com grãos cuidadosamente selecionados para garantir um aroma refinado e um sabor marcante. Equilibrado e encorpado, combina tradição e qualidade para transformar cada momento em uma experiência especial.",
    },
    {
      id: "pacaembu_tradicional",
      category: "torrado_moido",
      image: "assets/images/pacaembu_prod_tradicional.png",
      title: "Linha Tradicional",
      description:
        "Um café torrado e moído tradicional, que leva até você o sabor clássico e marcante do verdadeiro café. Encorpado, aromático e equilibrado, é a escolha ideal para o dia a dia, mantendo a tradição que valoriza qualidade e excelência.",
    },
    {
      id: "pacaembu_extraforte",
      category: "torrado_moido",
      image: "assets/images/pacaembu_prod_extraforte.png",
      title: "Linha Extra Forte",
      description:
        "Um café torrado e moído extra forte, para quem busca intensidade e sabor marcante em cada xícara. Encorpado e vigoroso, mantém a tradição de qualidade e excelência, trazendo a energia ideal para o seu dia.",
    },
    {
      id: "pacaembu_cappuccino_tradicional_1kg",
      category: "instantaneo",
      image: "assets/images/pacaembu_capuccino_tradicional_1kg.png",
      title: "Cappuccino Tradicional Pacaembu 1kg Pacote",
      description:
        "A combinação de ingredientes especiais torna o Cappuccino Tradicional Pacaembu uma bebida saborosa e prática. Versátil: pode ser consumido quente, em shake ou vitaminas geladas. Praticidade: Pronto em instantes.",
    },
    {
      id: "pacaembu_cappuccino_tradicional_100g",
      category: "instantaneo",
      image: "assets/images/pacaembu_capuccino_tradicional_sache_100g.png",
      title: "Cappuccino Tradicional Pacaembu Sachê 100 Gramas",
      description:
        "A combinação de ingredientes especiais torna o Cappuccino Tradicional Pacaembu uma bebida saborosa e prática. Versátil: pode ser consumido quente, em shake ou vitaminas geladas. Praticidade: Pronto em instantes.",
    },
    {
      id: "pacaembu_cappuccino_light_70g",
      category: "instantaneo",
      image: "assets/images/pacaembu_capuccino_light_sache_70g.png",
      title: "Cappuccino Light Pacaembu Sachê 70 Gramas",
      description:
        "Cappuccino light, com 30% menos calorias, mantendo o sabor cremoso e equilibrado da versão tradicional. Uma bebida suave e reconfortante, ideal para quem busca prazer e leveza a cada gole.",
    },
    {
      id: "pacaembu_soluvel_forte_50g",
      category: "instantaneo",
      image: "assets/images/pacaembu_soluvel_forte_50g.png",
      title: "Café Solúvel Forte Sachê Pacaembu 40 Gramas",
      description:
        "O café para quem não tem tempo a perder. Café Solúvel Forte Sachê Pacaembu tem dissolução instantânea em água ou leite quente. Sabor forte e marcante. Praticidade: pronto em instantes!",
    },
    {
      id: "pacaembu_cappuccino_chocolate_200g",
      category: "instantaneo",
      image: "assets/images/pacaembu_capuccino_chocolage_200g.png",
      title: "Cappuccino Chocolate Pacaembu 200 Gramas",
      description:
        "O clássico com um toque especial. O cappuccino que você já conhece combinado com o sabor de chocolate. Versátil: pode ser consumido quente, em shake ou vitaminas geladas. Praticidade: pronto em instantes.",
    },
    {
      id: "pacaembu_cappuccino_tradicional_200g",
      category: "instantaneo",
      image: "assets/images/pacaembu_capuccino_tradicional_200g.png",
      title: "Cappuccino Tradicional Pacaembu 200 Gramas",
      description:
        "A combinação de ingredientes especiais torna o Cappuccino Tradicional Pacaembu uma bebida saborosa e prática. Versátil: pode ser consumido quente, em shake ou vitaminas geladas. Praticidade: pronto em instantes.",
    },
    {
      id: "pacaembu_filtro_reutilizavel",
      category: "filtro",
      image: "assets/images/pacaembu_filtro_reutilizavel.png",
      title: "Filtro Reutilizável Polipropileno Pacaembu 103",
      description:
        "Mais economia e reutilizável. Filtro Reutilizável Polipropileno Pacaembu 103 possui selagem resistente e pode ser reutilizado por até 5 vezes devido à inovadora tecnologia TNT, que garante qualidade do filtro sem alteração no sabor. Filtra mais rápido, proporcionando mais sabor e aroma ao café. Responsabilidade ambiental: é reciclável e não utiliza produtos químicos ou madeira na produção.",
    },
    {
      id: "pacaembu_filtro_descartavel",
      category: "filtro",
      image: "assets/images/pacaembu_filtro_descartavel.png",
      title: "Filtro de Papel Pacaembu 103",
      description:
        "Contém 30 unidades. Filtro de Papel Pacaembu 103 oferece praticidade para passar o melhor café. Descartável e prático, com selagem resistente.",
    },
    {
      id: "pacaembu_capsulas_nostro",
      category: "capsula",
      image: "assets/images/pacaembu_capsulas.png",
      title: "Cápsulas Nostro",
      description:
        "Café em cápsulas de alta tecnologia, com aplicação de nitrogênio para conservar aroma e sabor e embalagens funcionais que podem ser usadas como porta-cápsulas.\nCápsulas compatíveis com máquinas Nespresso.",
    },
  ];

  // Fetch products from JSON
  fetch("assets/json/pacaembu_products.json")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      productsData = data;
      renderProducts(productsData);
    })
    .catch((error) => {
      console.warn(
        "Error loading products JSON (likely local file access), using fallback data:",
        error,
      );
      productsData = fallbackData;
      renderProducts(productsData);
    });

  // Toggle dropdown
  if (filterBtn) {
    filterBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      filterBtn.classList.toggle("active");
      filterDropdown.classList.toggle("show");
    });
  }

  // Close dropdown when clicking outside
  document.addEventListener("click", (e) => {
    if (
      filterDropdown &&
      filterDropdown.classList.contains("show") &&
      !filterDropdown.contains(e.target) &&
      !filterBtn.contains(e.target)
    ) {
      filterDropdown.classList.remove("show");
      filterBtn.classList.remove("active");
    }
  });

  // Handle filter options
  filterOptions.forEach((option) => {
    option.addEventListener("click", () => {
      const filterValue = option.getAttribute("data-filter");
      const isActive = option.classList.contains("active");

      // Update active state
      filterOptions.forEach((opt) => opt.classList.remove("active"));

      if (isActive) {
        // If clicking already active, clear filter (show all)
        renderProducts(productsData);
        if (clearFiltersBtn) clearFiltersBtn.classList.remove("show");
      } else {
        // Activate new filter
        option.classList.add("active");
        const filtered = productsData.filter(
          (product) => product.category === filterValue,
        );
        renderProducts(filtered);
        if (clearFiltersBtn) clearFiltersBtn.classList.add("show");
      }

      // Close dropdown
      filterDropdown.classList.remove("show");
      filterBtn.classList.remove("active");
    });
  });

  if (clearFiltersBtn) {
    clearFiltersBtn.addEventListener("click", () => {
      filterOptions.forEach((opt) => opt.classList.remove("active"));
      renderProducts(productsData);
      clearFiltersBtn.classList.remove("show");
    });
  }

  function renderProducts(products) {
    if (!productsGrid) return;

    productsGrid.innerHTML = ""; // Clear current

    if (!products || products.length === 0) {
      productsGrid.innerHTML =
        '<p style="width:100%; text-align:center; padding: 40px; color: #5C5B5A;">Nenhum produto encontrado.</p>';
      return;
    }

    products.forEach((product, index) => {
      const card = document.createElement("div");
      card.classList.add("product-card", "reveal-up");
      // Stagger delay animation manually since they are added dynamically
      card.style.animationDelay = `${index * 0.1}s`;

      card.innerHTML = `
                <div class="product-image-container">
                    <img src="${product.image}" alt="${product.title}" class="product-full-img">
                </div>
                <h3 class="product-name">${product.title}</h3>
                <p class="product-desc">${product.description}</p>
            `;
      productsGrid.appendChild(card);

      // Trigger animation class after a brief timeout to ensure transition works
      setTimeout(() => {
        card.classList.add("active");
      }, 50);
    });
  }
});
