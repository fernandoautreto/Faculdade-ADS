print('-- CALCULO DO SALÁRIO --')
salariobase = float(input('Qual é o teu salário base: R$ '))
grat = salariobase * 5/100
imposto = salariobase * 7/100
salario = salariobase + grat - imposto
print('O salárrio a receber é de R$ {}'.format(salario))
