interface Produto {
    id: string,
    id_categoria: string,
    nome: string,
    preço: string,
    imagem: string,
    descricao: string
}

async function buscarProduto(): Promise<Produto[]> {
    try {
        const resposta = await fetch("../api/listar.php");

        if (!resposta.ok) {
            throw new Error("Falha ao buscar produtos");
        }

        const dados: Produto[] = await resposta.json();
        return dados;
    } catch (erro) {
        console.log("Erro ao buscar Produtos", erro);
        return[];
    }
}
function renderizarProdutos(produtos: Produto[]): void {
    const container = document.getElementById("lista-produtos");

    if (container === null ) {
        return
    }

    const cardsHtml = produtos.map((produto) => {
        return `
            <div class="col">
                <div class="card h-100 shadow border-0 bg-dark text-white position-relative">
                    <div class="p-3 bg-white d-flex align-items-center justify-content-center container-foto-produto">
                        <img src="../img/${produto.imagem}" class="img-fluid foto-produto" alt="${produto.nome}">
                    </div>
                    <div class="card-body d-flex flex-column text-center rounded-pill">
                        <h5 class="card-title fs-6 text-uppercase mb-2 nome-produto">${produto.nome}</h5>
                        <p class="card-text fw-bold fs-5 mt-auto mb-2 preço-produto">
                            R$ ${produto.preço}
                        </p>
                        <a href="produto-detalhes.php?id=${produto.id}" class="btn btn-success btn-sm w-100 fw-bold py-2 text-uppercase stretched-link">Ver Produtos</a>
                    </div>
                </div>
            </div>
        `;
    });

    container.innerHTML = cardsHtml.join ("");
}

