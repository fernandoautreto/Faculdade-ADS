salario_min = float(input('Digite o salário mínimo: R$ '))
horas_trabalhada = int(input('Quantidade de horas trabalhada no mês: '))
horas_extras = int(input('Quantas horas extra foram feitas: '))
filhos = input('Tem filhos? (S/N): ').upper()
if filhos == 'S':
    qnt_filho = int(input('Quantidade de dependentes: '))
    valor_filhos = qnt_filho * 32
if filhos == 'N':
    valor_filhos = 0

valor_hora = salario_min * 0.2
salario_mes = horas_trabalhada * valor_hora
valor_horas_extra = valor_hora * 1.5
valor_horas_extra_total = valor_horas_extra * horas_extras
salario_bruto = salario_mes + valor_horas_extra_total + valor_filhos
print(f'Salário bruto: R$ {salario_bruto}.')
print('-' * 50)
print('IRFF           SALÁRIO BRUTO\n'
      'Insento      Inferior a R$2000\n'
      '10%          De R$2000 até 5000\n'
      '20%          Superior a R$ 5000')
print('-' * 50)
if salario_bruto < 2000:
    salario_liq = salario_bruto
elif salario_bruto > 2000 and salario_bruto <= 5000:
    salario_liq = salario_bruto - (salario_bruto * 0.1)
else:
    salario_liq = salario_bruto - (salario_bruto * 0.2)
print(f'Salário líquido: R$ {salario_liq}')
print('-' * 50)
print('SALÁRIO LÍQUIDO          GRATIFICAÇÃO\n'
      '   Até R$3500                R$ 100\n'
      'Superior à R$3500             R$ 50')
print('-' * 50)
if salario_liq <= 3500:
    salario_total = salario_liq + 100
else:
    salario_total = salario_liq + 50
print(f'O salário a receber: {salario_total}.')





