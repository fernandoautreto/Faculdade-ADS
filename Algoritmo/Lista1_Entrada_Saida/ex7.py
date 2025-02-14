print('-- CALCULO DO SALÁRIO --')
salaraio_base = float(input('Qual é o sei salário base: R$ '))
imposto = float(input('Digite o percentual do imposto a ser pago, em % '))
imposto_descontar = salaraio_base * imposto/100
salario = salaraio_base + 50 - imposto_descontar
print('O salário será de R$ {}'.format(salario))

