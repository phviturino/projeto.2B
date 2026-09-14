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

DELIMITER $$
	
create procedure sp_produtos_destaque()
begin
    select * from produto where id in (13, 68, 133, 161, 221, 254, 297, 338) limit 8;
end

call sp_produtos_destaque();

DELIMITER $$
CREATE PROCEDURE sp_listar_produtos(
    IN p_categoria INT,
    IN p_busca VARCHAR(100),
    IN p_limite INT,
    IN p_offset INT
)
BEGIN
    SELECT produto.*, categoria.nome AS categoria_nome
    FROM produto
    JOIN categoria ON produto.id_categoria = categoria.id
    WHERE (p_categoria IS NULL OR produto.id_categoria = p_categoria)
      AND (p_busca IS NULL OR produto.nome LIKE CONCAT('%', p_busca, '%'))
    LIMIT p_limite OFFSET p_offset;
END $$
DELIMITER ;

CALL sp_listar_produtos(NULL, NULL, 10, 0);

create function fn_preco_pix(preco decimal(10,2))
returns decimal(10,2)
deterministic
begin
	return preco * 0.95;
end

SELECT nome, preço as preco_original, fn_preco_pix(preço) AS preco_pix 
FROM produto 
where id = 67;
