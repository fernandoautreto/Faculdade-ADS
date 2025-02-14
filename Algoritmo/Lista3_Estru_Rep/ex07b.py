cont_par = 0
cont_impar = 0
for cont in range(23):
    n = int(input('Digite um número: '))
    if n % 2 == 0:
        cont_par = cont_par + 1
    else:
        cont_impar = cont_impar + 1
print(f'Tem {cont_par} números pares e {cont_impar} números impares')
print('-' * 5, 'Fim', '-' * 5)
