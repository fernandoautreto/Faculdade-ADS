print('-' * 5, 'CALCULO DE SALÁRIO', '-' * 5)
salario_min = float(input('Quanto é o salário mínimo: R$ '))
horas = int(input('Quantas horas o funcionário trabalhou durante o mês: '))
valor_hora_trabalhada = salario_min / 2
salario_bruto = horas * valor_hora_trabalhada
imposto = salario_bruto * 3/100
salaraio_receber = salario_bruto - imposto
print('O salário a receber será de R$ {}'.format(salaraio_receber))

