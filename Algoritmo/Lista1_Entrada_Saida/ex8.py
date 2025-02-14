print('-- RENDIMENTO EM CONTA --')
deposito = float(input('Informe o valor do depósito R$ '))
taxa = float(input('Infome  a taxa de juros, em % '))
rendimento_taxa = deposito * taxa/100
rendineto_total = deposito + rendimento_taxa
print('O rentimento do primeiro vai ser de R$ {}'.format(rendimento_taxa))
print('O saldo total ao fim do primeiro mês, será de R$ {}'.format(rendineto_total))
