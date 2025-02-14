print('-' * 5, 'VALOR DA CONTA DE ENERGIA', '-' * 5)
salario = float(input('Quanto é o salário mínimo: R$ '))
kwatts_consumo = float(input('Quantos quilowatts foi consumido no mês: '))
valor_kwatts = salario / 5
a_pagar = kwatts_consumo * valor_kwatts
desconto = a_pagar * (15/100)
a_pagar_comdesconto = a_pagar - desconto
print('O valor de cada quilowatts vai ser de {:.2f} KW. '
      'O valor a ser pego por essa residência será de R$ {:.2f}. '
      'Com desconto de 15%, o novo valor a ser pago será de R${:.2f}'.format(valor_kwatts, a_pagar, a_pagar_comdesconto))





