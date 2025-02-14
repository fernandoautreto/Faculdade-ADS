# 7. Faça um programa que leia:
# * um vetor com oito posições com os nomes das lojas;
# * um outro vetor com quatro posições com os nomes dos produtos;
# * uma matriz (8 x 4) com os preços de todos os produtos em cada loja.
# O programa deve mostrar todas as relações/print (nome da loja - nome do produto e preço), nas quais o preço não ultrapasse R$ 120,00.


loja = []
i = 0
for linha in range(8):
    loja.append(input(f'Cadastre a {i + 1}ª loja: '))
    i += 1

produto = []
i = 0
for i in range(4):
    produto.append(input(f'Cadastr o {i + 1}º produto: '))
    i += 1

preco = []
for linha in range(len(loja)):
    preco_loja = []
    for coluna in range(len(produto)):
        preco_loja.append(float(input(f'Digite o valor do produto: {produto[coluna]}da loja: {loja[linha]}: R$ ')))
    preco.append(preco_loja)

for linha in range(len(preco)):
    for coluna in range(len(preco[0])):
        if preco[linha][coluna] <= 120:
            print(f'Loja: {loja[linha]};    Produto: {produto[coluna]};      Preço: R$ {preco[linha][coluna]}')
        if preco[linha][coluna] > 120:
            print(5 * '-','Produto não cadastrado', 5 * '-')
