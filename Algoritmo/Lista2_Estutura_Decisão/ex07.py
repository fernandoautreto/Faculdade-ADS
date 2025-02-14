print('Professor Nível 1 - 11,00 reais por hora/aula\n'
      'Professor Nível 2 - 15,00 reais por hora/aula\n'
      'Professor Nível 3 - 19,00 reais por hora/aula')
nivel = int(input('Professor, qual é o seu nível: '))
horas_aula = float(input('Quantidade de hora/aula ministrada: '))

if nivel == 1:
    n1 = horas_aula * 11
    print(f'O seu salário será de R$ {n1:.2f}')
elif nivel == 2:
    n2 = horas_aula * 15
    print(f'O seu salário será de R$ {n2:.2f}')
else:
    n3 = horas_aula * 19
    print(f'O seu salário será de R$ {n3:.2f}')
