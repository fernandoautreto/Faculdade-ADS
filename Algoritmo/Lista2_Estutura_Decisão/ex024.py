print('MENU DE OPÇÕES\n'
      '1 - Impostos\n'
      '2 - Novo Salário\n'
      '3 - Classificações')
opcao = int(input('Digite a opção desejada: '))
salario = float(input('Digite o salário: R$ '))
if opcao == 1:
    if salario < 500:
        percent = salario * 0.05
    elif salario >= 500 and salario <= 850:
        percent = salario * 0.1
    else:
        percent = salario * 0.15
    print(f'O imposto a ser pagado sobre R$ {salario} vai ser de R$ {percent}.')
if opcao == 2:
    if salario > 1500:
        new_salario = salario + 25
    elif salario > 750 and salario <= 1500:
        new_salario = salario + 50
    elif salario >= 450 and salario <= 750:
        new_salario = salario + 75
    else:
        new_salario = salario + 100
    print(f'O novo salário será de R$ {new_salario}.')
if opcao == 3:
    if salario <= 700:
        print('Mal remunerado!')
    else:
        print('Bem remunerado!')



