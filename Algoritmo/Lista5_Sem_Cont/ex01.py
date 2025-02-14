total_salarios = 0
salario = float(input('Digite o salário e zero para sair...: '))
while salario > 0:
    total_salarios = total_salarios + salario
    salario = float(input('Digite o salário: '))
print('Total de salários pagos',total_salarios)
