n1 = int(input('Digite um número: '))
n2 = int(input('Digite outro número: '))
if n1 > n2:
    dif1 = n1 - n2
    print(f'A diferença entre os números {n1} e {n2} é de {dif1}')
elif n1 == n2:
    print('Os dois números são iguais, portanto a diferença é 0')
else:
    dif2 = n2 - n1
    print(f'A diferença entre os números {n2} e {n1} é de {dif2}')

