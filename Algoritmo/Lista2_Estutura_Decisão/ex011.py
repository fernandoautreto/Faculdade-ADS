saldo = float(input('Digite o seu saldo: R$ '))
if 0 <= saldo <= 200:
    print('Não receberá credito especial')
elif 201 <= saldo <=400:
    credito1 = saldo * 20/100
    print(f'Como seu soldo está entre R$201 a R$400, recebrá um crédito de R$ {credito1:.2f}, referente a 20% do seu saldo')
elif 401 <= saldo <= 600:
    credito2 = saldo * 30 / 100
    print(f'Como seu soldo está entre R$401 a R$600, recebrá um crédito de R$ {credito2:.2f}, referente a 30% do seu saldo')
else:
    credito3 = saldo * 40 / 100
    print(f'Como seu soldo está a cima de R$601, recebrá um crédito de R$ {credito3:.2f}, referente a 40% do seu saldo')

