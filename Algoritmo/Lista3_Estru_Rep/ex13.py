quanttv = 1
total_tv = 0
preco_total = 0
while quanttv <= 4:
    valor = float(input(f'Digite o valor da TV {quanttv}: R$ '))
    if valor > 1000:
        total_tv = total_tv + 1
        preco_total = preco_total + valor
    quanttv = quanttv + 1
if total_tv > 0:
    media = preco_total / total_tv
    print(f'A quantidade de TVs acima de R$ 1000 é {total_tv}, e a média de preço delas é de R$ {media}')
else:
    print('Todas as TVs tem o preço menor que R$ 1000')

