produto = 1
total = 0
while produto <= 4:
    preco = float(input(f'Digite o valor do produto {produto}: R$ '))
    total = total + preco
    produto = produto + 1
media = total / 4
print(f'A média de preço dos produtos é R$ {media:.2f}')