funcionario = 1
while funcionario <= 10:
    salario = float(input(f"Digite o salário do funcionário {funcionario}: "))
    if salario <= 300:
        salario_reajustado = salario * 1.5
    else:
        salario_reajustado = salario * 1.3
    print(f"O salário reajustado do funcionário {funcionario} é R$ {salario_reajustado:.2f}")
    funcionario = funcionario + 1
