import math
print('-' * 5, 'CALCULADORA', '-' * 5)
n1 = float(input('Digite um número: '))
n2 = float(input('Digite outro npumero '))
p = math.pow(n1, n2)
print('Elevando o {} a {}, o resultado vai ser de {}'.format(n1, n2, p))
