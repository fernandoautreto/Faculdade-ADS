print('-' * 5, 'CUSTOS DE UM CARRO 0KM', '-' * 5)
preco_fabrica = float(input('Qual é o preço de fábrica do carro: R$ '))
percet_lucro = float(input('Qual é o percentual de lucro do distribuidor: '))
impostos = float(input('Qual é o percentual de imposto: '))
lucro_distribuidor = preco_fabrica * percet_lucro/100
valor_imposto = preco_fabrica * impostos/100
preco_final = preco_fabrica + lucro_distribuidor + valor_imposto
print('O valor de lucro que o distribuidor irá ter, com uma taxa de {}, será de {} \nO valor de imposto a ser pago, será de {} \nO preço total do veículo será de {}'.format(impostos, lucro_distribuidor, valor_imposto, preco_final))
