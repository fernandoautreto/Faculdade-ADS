total = 0
for produto in range(1, 5):
    preco = float(input(f'Digite o preço do produto {produto}: R$ '))
    total = total + preco
print(f'A soma dos 4 preços é R$ {total}')
