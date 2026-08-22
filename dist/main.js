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
let produtosAtuais = [];
function buscarProduto() {
    return __awaiter(this, void 0, void 0, function* () {
        try {
            const resposta = yield fetch("../api/listar.php");
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
function renderizarProdutos(produtos) {
    const container = document.getElementById("lista-produtos");
    if (container === null) {
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
                            R$ ${produto.preço}
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
        return (produto.id_categoria === categoria);
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
function iniciar() {
    return __awaiter(this, void 0, void 0, function* () {
        const produtos = yield buscarProduto();
        const params = new URLSearchParams(window.location.search);
        const categoriaSelecionada = params.get("categoria");
        const produtosFiltrados = filtrarPorCategoria(produtos, categoriaSelecionada);
        produtosAtuais = ordenaPorNome(produtosFiltrados, true);
        renderizarProdutos(produtosAtuais);
        configurarBotaoOrdenar();
    });
}
iniciar();
