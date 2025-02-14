# Faça um programa que receba o salário inicial de um funcionário, calcule e mostre o novo salário, acrescido de bonificação e de auxílio escola.
salario = float(input('Digite o salário: R$ '))
filhos = input('Tem filhos? (S/N) ').upper()
if salario <= 500:
    boni = '5%'
    new_salario = salario * 1.05
elif salario > 500 and salario <= 1200:
    boni = '12%'
    new_salario = salario * 1.12
else:
    boni = '0%'
    new_salario = salario

if filhos == 'S':
    if salario <= 600:
        boni_filho = '150'
        new_salario_filho = new_salario + 150
    elif salario > 600:
        boni_filho = 100
        new_salario_filho = new_salario + 100
    print(f'Com o salário de R$ {salario}, vai ter uma bonificação de {boni}. E como tem filhos, tem direito ao auxilio escola de R$ {boni_filho}. Somando o benefício, auxilio escola e o salário, terá um novo salário de R$ {new_salario_filho}.')
if filhos == 'N':
    new_salario_filho = new_salario
    print(
        f'Com o salário de R$ {salario}, vai ter uma bonificação de {boni}, terá novo salario de R$ {new_salario}.')
