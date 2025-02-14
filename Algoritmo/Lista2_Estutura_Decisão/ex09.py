ano = int(input('Qual é o ano de fabricação do carro: '))
fipe = float(input('Qual é o valor da tabela fipe do carro: R$ '))
if ano < 1990:
    transf_1 = fipe * (1/100)
    print(f'Com 1% de imposto na tranferência do veículo, o valor a ser pago será de R$ {transf_1}')
else:
    transf_2 = fipe * (1.5/100)
    print(f'Com 1.5% de imposto na tranferência do veículo, o valor a ser pago será de R$ {transf_2}')
