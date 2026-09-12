"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
function buscarCategorias() {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const resposta = yield fetch("../dashboard/api/categorias.php");
            if (!resposta.ok) {
                throw new Error("Falha ao buscar categorias");
            }
            const dados = yield resposta.json();
            return dados;
        }
        catch (erro) {
            console.log("Erro ao buscar Categorias", erro);
            return [];
        }
    });
}
function renderizarCategorias(categorias) {
    const container = document.getElementById("categorias-nav-links");
    if (container === null) {
        return;
    }
    if (categorias.length === 0) {
        container.innerHTML = '<p class="text-center text-muted">Nenhuma categoria encontrada.</p>';
        return;
    }
    const linksHtml = categorias.map((categoria) => {
        return `<a class="nav-link" href="produtos.php?categoria=${categoria.id}">${categoria.nome}</a>`;
    });
    container.innerHTML = linksHtml.join("");
}
let produtosAtuais = [];
let paginaAtual = 1;
let categoriaAtual = null;
function buscarProduto(categoria, busca, pagina) {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const params = new URLSearchParams();
            if (categoria !== null) {
                params.append("categoria", categoria);
            }
            if (busca !== "") {
                params.append("busca", busca);
            }
            params.append("pagina", pagina.toString());
            const resposta = yield fetch(`../dashboard/api/listar.php?${params.toString()}`);
            if (!resposta.ok) {
                throw new Error("Falha ao buscar produtos");
            }
            const dados = yield resposta.json();
            return dados;
        }
        catch (erro) {
            console.log("Erro ao buscar Produtos", erro);
            return [];
        }
    });
}
function buscarTodosProdutos(categoria) {
    return __awaiter(this, void 0, void 0, function* () {
        let todos = [];
        let pagina = 1;
        let continuar = true;
        while (continuar) {
            const pagina_produtos = yield buscarProduto(categoria, "", pagina);
            if (pagina_produtos.length === 0) {
                continuar = false;
            }
            else {
                todos = todos.concat(pagina_produtos);
                pagina = pagina + 1;
            }
        }
        return todos;
    });
}
function carregarMaisProdutos() {
    return __awaiter(this, void 0, void 0, function* () {
        paginaAtual = paginaAtual + 1;
        const maisProdutos = yield buscarProduto(categoriaAtual, "", paginaAtual);
        produtosAtuais = produtosAtuais.concat(maisProdutos);
        renderizarProdutos(produtosAtuais);
    });
}
function configurarBotaoCarregarMais() {
    const botao = document.getElementById("btn-carregar-mais");
    if (botao === null) {
        return;
    }
    botao.addEventListener("click", () => {
        carregarMaisProdutos();
    });
}
function renderizarProdutos(produtos) {
    const container = document.getElementById("lista-produtos");
    if (container === null) {
        return;
    }
    if (produtos.length === 0) {
        container.innerHTML = '<p class="text-center text-muted">Nenhum produto encontrado.</p>';
        return;
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
                            R$ ${parseFloat(produto.preço).toFixed(2)}
                        </p>
                        <a href="produto-detalhes.php?id=${produto.id}" class="btn btn-success btn-sm w-100 fw-bold py-2 text-uppercase stretched-link">Ver Produtos</a>
                    </div>
                </div>
            </div>
        `;
    });
    container.innerHTML = cardsHtml.join("");
}
function filtrarPorCategoria(produtos, categoria) {
    if (categoria === null) {
        return produtos;
    }
    return produtos.filter((produto) => {
        return (String(produto.id_categoria) === categoria);
    });
}
function ordenaPorNome(produtos, crescente) {
    return produtos.sort((a, b) => {
        if (crescente) {
            return a.nome.localeCompare(b.nome);
        }
        else {
            return b.nome.localeCompare(a.nome);
        }
    });
}
function configurarBotaoOrdenar() {
    const botao = document.getElementById("btn-ordenar");
    if (botao === null) {
        return;
    }
    botao.addEventListener("click", () => {
        produtosAtuais = ordenaPorNome(produtosAtuais, false);
        renderizarProdutos(produtosAtuais);
    });
}
function calcularTotal(produtos) {
    return produtos.reduce((soma, produto) => {
        return soma + parseFloat(produto.preço);
    }, 0);
}
function categoriaDestaque(produtos) {
    const valorPorCategoria = {};
    produtos.forEach((produto) => {
        const categoria = produto.id_categoria;
        const preco = parseFloat(produto.preço);
        if (valorPorCategoria[categoria] === undefined) {
            valorPorCategoria[categoria] = 0;
        }
        valorPorCategoria[categoria] += preco;
    });
    const categorias = Object.keys(valorPorCategoria);
    if (categorias.length === 0) {
        return null;
    }
    let categoriaVencedora = categorias[0];
    categorias.forEach((categoria) => {
        if (valorPorCategoria[categoria] > valorPorCategoria[categoriaVencedora]) {
            categoriaVencedora = categoria;
        }
    });
    return { categoria: categoriaVencedora, total: valorPorCategoria[categoriaVencedora] };
}
function iniciar() {
    return __awaiter(this, void 0, void 0, function* () {
        const categorias = yield buscarCategorias();
        renderizarCategorias(categorias);
        const params = new URLSearchParams(window.location.search);
        const categoriaSelecionada = params.get("categoria");
        categoriaAtual = categoriaSelecionada;
        const produtos = yield buscarProduto(categoriaSelecionada, "", 1);
        const todosProdutos = yield buscarTodosProdutos(null);
        const produtosCategoria = filtrarPorCategoria(todosProdutos, categoriaSelecionada);
        const total = calcularTotal(produtosCategoria);
        const destaque = categoriaDestaque(todosProdutos);
        const destaqueElemento = document.getElementById("categoria-destaque");
        if (destaqueElemento !== null && destaque !== null) {
            const categoriaEncontrada = categorias.find((c) => c.id === destaque.categoria);
            const nomeCategoria = categoriaEncontrada !== undefined ? categoriaEncontrada.nome : destaque.categoria;
            destaqueElemento.textContent = `Categoria em destaque: ${nomeCategoria} - R$ ${destaque.total.toFixed(2)}`;
        }
        const totalElemento = document.getElementById("total-categoria");
        if (totalElemento !== null) {
            totalElemento.textContent = `Valor total nesta categoria: R$ ${total.toFixed(2)}`;
        }
        produtosAtuais = ordenaPorNome(produtos, true);
        renderizarProdutos(produtosAtuais);
        configurarBotaoOrdenar();
        configurarBotaoCarregarMais();
    });
}
iniciar();
