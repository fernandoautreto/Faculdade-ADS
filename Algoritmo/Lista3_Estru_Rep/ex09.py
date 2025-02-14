total = 0
produto = 1
while produto <= 4:
    preco = float(input(f"Digite o preço do produto {produto}: "))
    total = total + preco
    produto = produto + 1
print(f"A soma dos quatro preços é R$ {total:.2f}")