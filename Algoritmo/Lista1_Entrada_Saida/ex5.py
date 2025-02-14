print('-- CALCULO DO NOVO SALÁRIO --')
salario = float(input('Qual é o teu salário: R$ '))
perc_de_aumento = float(input('Indique o percentual de aumento, em %: '))
valor_aumento = salario * perc_de_aumento/100
novo_salario = salario + valor_aumento
print('O novo salário será de R$ {}'.format(novo_salario))
