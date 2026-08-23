use saudeanimal

create view vw_produto_detalhado as
with contagem_fornecedores as (
	select id_produto, count(*) as total_fornecedores
	from fornecedor_produto
	group by id_produto
)
select
	produto.id,
	produto.nome,
	produto.preço,
	categoria.nome as categoria_nome,
	coalesce(contagem_fornecedores.total_fornecedores, 0) as total_fornecedores
	from produto 
	join categoria on produto.id_categoria = categoria.id
	left join contagem_fornecedores on produto.id = contagem_fornecedores.id_produto;

select * from vw_produto_detalhado;

drop trigger if exists trg_produto_preco_positivo;

create trigger trg_produto_preco_positivo
before update on produto
for each row 
begin
	if new.preço < 0 then
	signal sqlstate '45000'
	set message_text = 'Não é permitido definir um preço negativo para o produto. ';
end if;
end;

update produto set preço = -50 where id = 334;